<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function sendSelfie() {
        header("Content-Type: application/json");
        if (authorization() === false) {
            http_response_code(401);
            echo json_encode([
                'statusCode' => 401,
                "message" => 'Unauthorized',
            ]);
            return;
        }

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

        $nik = $paramJSON->nik;
        $long = $paramJSON->long;
        $lat = $paramJSON->lat;
        $mime = hex2bin($paramJSON->mime);
        $photo = $mime . $paramJSON->photo;

        $this->load->helper('str');
        $date = date('Y-m-d ');
        $time = date('H:i:s');

        if ($time > '12:00:00') {
            $postFix = '_pulang';
        } else {
            $postFix = '_masuk';
        }
        $result = decode_base64_image($photo, $nik . $postFix, 'selfie');

        // remove bg
        $img = imagecreatefromstring($result['imageDecoded']);
        // rgba white
        $white = imagecolorallocate($img, 255, 255, 255);
        imagecolortransparent($img, $white);

        header('Content-Type: image/png');
        // save tanda tangan jadi img
        $path = $this->get_directory(TRUE) . $result['imageName'];
        imagepng($img, $path);

        $param = [
            'NIK' => $nik,
            'time' => $date . $time,
            'TerminalID' => '7',
        ];
        $res = json_decode($this->simple_login->api_eztna($param, 'insert_absensi'));

        if (!$res || ($res && !$res->status)) {
            http_response_code(500);
            echo json_encode([
                'statusCode' => 500,
                'message' => 'Gagal presensi',
            ]);
            return;
        }

        $result = $this->db->select('k.nik, k.nik_lama, k.nama_karyawan, l.username, l.username_default')
            ->from('ms_karyawan k')
            ->join('tbl_login l', 'l.NIK = k.nik')
            ->where('k.nik', $nik)
            ->get()->row();

        $result->time = $param['time'];
        echo json_encode([
            'statusCode' => 200,
            'message' => 'Selfie uploaded successfully',
            'data' => $result,
        ]);
        return;
    }
}