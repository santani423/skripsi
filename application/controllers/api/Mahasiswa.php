<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Mahasiswa extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'model');
    }

    public function index_post()
    {
        $response = $this->model->get($this->input->post());
        return $this->response($response);
    }

    public function create_post()
    {
        // Ambil raw body request
        $json = $this->input->raw_input_stream;
        $data = json_decode($json, true);

        // Kalau bukan JSON, fallback ke form-data
        if (json_last_error() !== JSON_ERROR_NONE || empty($data)) {
            $data = $this->input->post();
        }

        // Kirim ke model
        $response = $this->model->create($data);

        // Kembalikan response JSON
        return $this->response($response, 200);
    }


    public function update_post($id = null)
    {
        $response = $this->model->update($this->input->post(), $id);
        return $this->response($response);
    }

    public function update2_post($id = null)
    {
        $response = $this->model->update2($this->input->post(), $id);
        return $this->response($response);
    }

    public function destroy_post($id = null)
    {
        $response = $this->model->destroy($id);
        return $this->response($response);
    }

    public function detail_post($id = null)
    {
        $response = $this->model->detail($id);
        return $this->response($response);
    }

    public function search_post()
    {
        $response = $this->model->search($this->input->post());
        return $this->response($response);
    }

    public function dataperprodi_post()
    {
        $response = $this->model->dataperprodi();
        return $this->response($response);
    }

    public function verifikasi_post($id = null)
    {
        $response = $this->model->verifikasi($this->input->post(), $id);
        return $this->response($response);
    }
}

/* End of file Mahasiswa.php */
