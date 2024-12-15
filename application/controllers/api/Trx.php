<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trx extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('str');
        $this->load->library('authentication');
    }

    // Simpan
    public function deposit() {
        $auth = $this->authentication->verifyJWTToken();
        if ($auth === false) {
            http_response_code(401);
            echo json_encode([
                'statusCode' => 401,
                "message" => 'Unauthorized',
            ]);
            return;
        }

		$this->load->library('form_validation');
		$this->form_validation->set_rules('simpanan_sukarela', 'Jumlah Simpanan Pokok', 'required|trim');		
        if (!$this->form_validation->run()) {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
                'errors' => $this->form_validation->error_array(),
            ]);
            return;
        }

        if (empty($_FILES['bukti_transfer']['name'])) {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
                'errors' => [
                    'image' => 'File Tidak Boleh Kosong',
                ],
            ]);
            return;
        }

        $this->load->library('upload');
        try {
            // Buat foldernya dulu
            $path = './assets/bukti_transfer/';
            if (!is_dir($path)) {
                mkdir($path, 0775, TRUE);
            }

            // Ekstensi jadi huruf kecil
            $fileInfo = pathinfo($_FILES['bukti_transfer']['name']);
            $fileName = $fileInfo['filename'] . '.' . strtolower($fileInfo['extension']);
            $_FILES['value_component']['name'] = $fileName;

            $config['upload_path']          = $path;
            $config['file_name']            = 'bukti_transfer_' . $auth['koperasi_id'] . '_' . date('ymd').'-'.substr(md5(rand()),0,10) . '.' . pathinfo($_FILES['bukti_transfer']['name'], PATHINFO_EXTENSION);
            $config['allowed_types']        = 'jpg|png|jpeg|gif|jfif';
            $config['max_size']             = 50000; // 50MB
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti_transfer')) {
                throw new Exception($this->upload->display_errors());
            }

            $bukti_transfer = $this->upload->data('file_name');
            // Jadi angka semua
            $simpanan_sukarela = normalize($this->input->post('simpanan_sukarela'));

            $param = [
                // Ini user-nya yang simpan uang
                'koperasi_id' => $auth['koperasi_id'],
                'simpanan_sukarela' => $simpanan_sukarela,
                // Ini user yang input, karena dia input dari apps (login sendiri), jadi pengurus = koperasi_id
                'pengurus' => $auth['koperasi_id'],
                'bukti_transfer' => $bukti_transfer,
            ];

            $this->load->model('ssukarela_m');
            $this->ssukarela_m->tambah_data_sukarela($param);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ]);
            return;
        }

        echo json_encode([
            'statusCode' => 200,
            "message" => 'Berhasil mengajukan simpan uang',
        ]);
        return;
    }

    // Pinjam
    public function loan() {
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

        $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
        if (empty($stream_clean)) {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
            ]);
            return;
        }

        try {
            $paramJSON = json_decode($stream_clean);

            // Jadi angka semua
            $jumlah_pinjaman = normalize($paramJSON->jumlah_pinjaman);
            if (!$jumlah_pinjaman) {
                throw new Exception('Jumlah Pinjaman harus diisi');
            }

            // Jadi angka semua
            $lama_angsuran = normalize($paramJSON->lama_angsuran);
            if (!$lama_angsuran) {
                throw new Exception('Lama Angsuran harus diisi');
            }

            $param = [
                // Ini user-nya yang simpan uang
                'koperasi_id' => $auth['koperasi_id'],
                'jumlah_pinjaman' => $jumlah_pinjaman,
                'lama_angsuran' => $lama_angsuran,
                'tgl_pengajuan' => date('Y-m-d'),
                // Ini user yang input, karena dia input dari apps (login sendiri), jadi pengurus = koperasi_id
                'diajukan' => $auth['koperasi_id'],
                'jenis_pinjaman' => 'HARDLOAN',
                'status_pengajuan' => 'MENUNGGU',
            ];

            $this->load->model('aktivitas_m');
            $this->aktivitas_m->pengajuan_hardloan_simpan($param);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ]);
            return;
        }

        echo json_encode([
            'statusCode' => 200,
            "message" => 'Berhasil mengajukan pinjaman uang',
        ]);
        return;
    }

    // History
    public function histories() {
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

        $type = clean($paramJSON->type);

        // Jadi angka semua
        $start = normalize($paramJSON->start);

        if (!$type || !in_array($type, ['pinjaman', 'simpanan']) || $start === '') {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
            ]);
            return;
        }

        $limit = 10;
        $this->load->model('aktivitas_m');
        if ($type === 'pinjaman') {
            $res = $this->aktivitas_m->scrollable($limit, $start);
            $result = $res['data'];
            $next = $res['next'];
        } else if ($type === 'simpanan') {
            $this->load->model('ssukarela_m');
            $res = $this->ssukarela_m->scrollable($limit, $start);
            $result = $res['data'];
            $next = $res['next'];
        }

        $data = $this->aktivitas_m->parse($result, $start);

        echo json_encode([
            'statusCode' => 200,
            'message' => 'Data found',
            'data' => $data,
            'next' => $next,
        ]);
        return;
    }

    // Total
    public function total() {
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

        $type = clean($paramJSON->type);

        if (!$type || !in_array($type, ['pinjaman', 'simpanan'])) {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
            ]);
            return;
        }

        if ($type === 'pinjaman') {
            $this->load->model('aktivitas_m');
            $total = $this->aktivitas_m->total($auth['koperasi_id'], 'DISETUJUI');
        } else if ($type === 'simpanan') {
            $this->load->model('ssukarela_m');
            $total = $this->ssukarela_m->total($auth['koperasi_id']);
        }

        echo json_encode([
            'statusCode' => 200,
            'message' => 'Data found',
            'data' => number_format($total, 0, ',', '.'),
        ]);
        return;
    }
}