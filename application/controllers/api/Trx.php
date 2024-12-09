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
    public function saving() {
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

        // Jadi angka semua
        $simpanan_sukarela = normalize($paramJSON->simpanan_sukarela);

        if (!$simpanan_sukarela) {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
            ]);
            return;
        }

        $param = [
            // Ini user-nya yang simpan uang
            'koperasi_id' => $auth['koperasi_id'],
            'simpanan_sukarela' => $simpanan_sukarela,
            // Ini user yang input, karena dia input dari apps (login sendiri), jadi pengurus = koperasi_id
            'pengurus' => $auth['koperasi_id'],
        ];

        try {
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

        $paramJSON = json_decode($stream_clean);

        // Jadi angka semua
        $jumlah_pinjaman = normalize($paramJSON->jumlah_pinjaman);
        $lama_angsuran = normalize($paramJSON->lama_angsuran);
        $tgl_pengajuan = date('Y-m-d', strtotime(clean($paramJSON->tgl_pengajuan)));

        if (!$jumlah_pinjaman || !$lama_angsuran || !$tgl_pengajuan) {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
            ]);
            return;
        }

        $param = [
            // Ini user-nya yang simpan uang
            'koperasi_id' => $auth['koperasi_id'],
            'jumlah_pinjaman' => $jumlah_pinjaman,
            'lama_angsuran' => $lama_angsuran,
            'tgl_pengajuan' => $tgl_pengajuan,
            // Ini user yang input, karena dia input dari apps (login sendiri), jadi pengurus = koperasi_id
            'diajukan' => $auth['koperasi_id'],
            'jenis_pinjaman' => 'HARDLOAN',
            'status_pengajuan' => 'MENUNGGU',
        ];

        try {
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

        // Jadi angka semua
        $jumlah_pinjaman = normalize($paramJSON->jumlah_pinjaman);
        $lama_angsuran = normalize($paramJSON->lama_angsuran);
        $tgl_pengajuan = date('Y-m-d', strtotime(clean($paramJSON->tgl_pengajuan)));

        if (!$jumlah_pinjaman || !$$lama_angsuran || !$tgl_pengajuan) {
            http_response_code(422);
            echo json_encode([
                'statusCode' => 422,
                'message' => 'Unprocessable',
            ]);
            return;
        }

        $param = [
            // Ini user-nya yang simpan uang
            'koperasi_id' => $auth['koperasi_id'],
            'jumlah_pinjaman' => $jumlah_pinjaman,
            'lama_angsuran' => $lama_angsuran,
            'tgl_pengajuan' => $tgl_pengajuan,
            'jenis_pinjaman' => 'HARDLOAN',
            'status_pengajuan' => 'MENUNGGU',
            // Ini user yang input, karena dia input dari apps (login sendiri), jadi pengurus = koperasi_id
            'diajukan' => $auth['koperasi_id'],
        ];

        try {
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
}