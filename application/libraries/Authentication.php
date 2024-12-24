<?php defined('BASEPATH') or exit('No direct script access allowed');

class Authentication
{
    /**
     * Instance CI
     * 
     * @return object
     */
	private $CI;

    /**
     * Expiration time in minutes.
     * 
     * @return int
     */
    protected $min = 2;

    /**
     * Expiration JWT time in seconds. (30 days)
     * 
     * @return int
     */
    protected $exp = 60 * 60 * 24 * 30;

    public $user;
    public $token;

	public function __construct()
	{
		$this->CI = &get_instance();

        $this->CI->load->helper(['encrypt', 'str']);
	}

    /**
     * Generate CSRF token
     * 
     * @return string
     */
    public function generateCSRFToken() {
        $token = bin2hex(random_bytes(32)).'+'.strtotime('+'.$this->min.' minutes', time()).'+'.bin2hex(random_bytes(32));
        $this->CI->session->set_userdata('csrf-token', $token);
        return encrypt($token);
    }

    /**
     * Verify CSRF token
     * 
     * @return bool
     */
    public function verifyCSRFToken() {
        $csrf = $this->CI->input->request_headers()['X-CSRF-TOKEN'] ? $this->CI->input->request_headers()['X-CSRF-TOKEN'] : null;

        if (empty($csrf)) {
            return false;
        }

        try {
            $csrf = decrypt($csrf);

            if ($csrf !== $this->CI->session->userdata('csrf-token')) {
                return false;
            }

            list($head, $date, $tail) = explode('+', $this->CI->session->userdata('csrf-token'));
            if (time() - $date > ($this->min * 60)) {
                return false;
            }
        } catch (Exception $e) {
            log_message('error', $e);
            return false;
        }

        return true;
    }

    /**
     * Generate JWT token
     * 
     * @param mixed $identifier
     * 
     * @return string
     */
    public function generateJWTToken($identifier = null) {
        $identifier = $identifier ? $identifier : bin2hex(random_bytes(32));
        $param = [
            'user' => $identifier,
            'date' => strtotime('+'.($this->exp).' seconds', time())
        ];
        $token = bin2hex(random_bytes(32)).'+'.json_encode($param).'+'.bin2hex(random_bytes(32));
        $token = encrypt($token);
        $this->token = $token;
        return $this->token;
    }

    /**
     * Verify JWT token
     * 
     * @param bool $returnRaw
     * @throws Exception
     * @return bool|object
     */
    public function verifyJWTToken($returnRaw = false) {
        $this->CI->load->model('user_m');
        try {
            $JWT = isset($this->CI->input->request_headers()['Authorization']) ? $this->CI->input->request_headers()['Authorization'] : null;

            if (empty($JWT)) {
                throw new Exception('Authorization header not found. (Empty token)');
            }

            if (strpos($JWT, 'Bearer ') === false) {
                throw new Exception('Authorization header not found. (Bearer not found)');
            }

            $JWT = after($JWT, 'Bearer ');
            $decryptedJWT = decrypt($JWT);

            if (!$decryptedJWT) {
                throw new Exception('Authorization header cannot be verified.');
            }

            list($head, $tokenJWT, $tail) = explode('+', $decryptedJWT);

            $data = json_decode($tokenJWT);
            $user = $data->user;
            $date = $data->date;

            $this->user = $user;

            $verifyTokenInDB = $this->CI->user_m->find([
                'anggota_id' => $user->anggota_id,
                'token' => $JWT
            ]);

            if (!$verifyTokenInDB) {
                throw new Exception('Token not found or user not found. (Empty token)');
            }

            if (($returnRaw === false) && (time() - $date > ($this->exp))) {
                throw new Exception('Token expired.');
            }
        } catch (Exception $e) {
            return false;
        }

        return $this->CI->user_m->collect($verifyTokenInDB);
    }
}
