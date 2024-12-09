<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('str');
        $this->load->library('authentication');
    }

    public function profile() {
        header("Content-Type: application/json");
        $auth = $this->authentication->verifyJWTToken();
        if ($auth === false) {
            http_response_code(401);
            echo json_encode([
                'statusCode' => 401,
                "message" => 'Unauthorized',
            ]);
            return;
        }

        echo json_encode([
            'statusCode' => 200,
            "message" => 'Profile found',
            'data' => $auth
        ]);
        return;
    }
}