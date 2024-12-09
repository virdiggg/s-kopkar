<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('str');
        $this->load->library('Authorization');
    }

    public function signIn() {
        // Ini buat login
        header("Content-Type: application/json");
        // if ($this->authorization->verifyJWTToken() === false) {
        //     http_response_code(401);
        //     echo json_encode([
        //         'statusCode' => 401,
        //         "message" => 'Unauthorized',
        //     ]);
        //     return;
        // }

        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        if (empty($stream_clean)) {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
            ]);
            return;
        }

        $paramJSON = json_decode($stream_clean);

        $param = [
            'username' => clean($paramJSON->username),
            'password' => clean($paramJSON->password),
        ];

        $this->load->model('user_m');
        $query = $this->user_m->login($param);
        if ($query->num_rows() === 0) {
            http_response_code(404);
            echo json_encode([
                'statusCode' => 404,
                "message" => 'User not found',
            ]);
            return;
        }

        $user = $query->row();
        $token = $this->authorization->generateJWTToken($user);
        // Buat nandain kalo user udah pernah login lewat API/apps
        $this->user_m->update($user->anggota_id, ['token' => $token]);

        echo json_encode([
            'statusCode' => 200,
            "message" => 'Authorized',
            'token' => $token,
        ]);
        return;
    }

    public function signOut() {
        // Ini buat cek token expired apa enggak
        header("Content-Type: application/json");
        $auth = $this->authorization->verifyJWTToken();
        if ($auth === false) {
            http_response_code(401);
            echo json_encode([
                'statusCode' => 401,
                "message" => 'Unauthorized',
            ]);
            return;
        }

        $this->user_m->update($auth->anggota_id, ['token' => null]);

        echo json_encode([
            'statusCode' => 200,
            "message" => 'Signed out',
        ]);
        return;
    }
}