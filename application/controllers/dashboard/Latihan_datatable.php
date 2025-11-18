<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Latihan_datatable extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Latihan_datatable_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'Latihan DataTable',
            'sub_title' => 'Latihan DataTable with Server-Side Processing',

        );
        $this->load->view('dashboard/latihan_datatable/list_view', $data);
    }

    // Endpoint untuk DataTables server-side
    public function get_data()
    {
        $post = $this->input->post();
        $list = $this->Latihan_datatable_model->get_datatables($post);
        $data = array();
        foreach ($list as $row) {
            $data[] = [
                'name' => $row->nama,
                'nim' => $row->no_mhs,
                'angkatan' => $row->angkatan
            ];
        }
        $output = array(
            "draw" => isset($post['draw']) ? intval($post['draw']) : 0,
            "recordsTotal" => $this->Latihan_datatable_model->count_all(),
            "recordsFiltered" => $this->Latihan_datatable_model->count_filtered($post),
            "data" => $data,
        );
        header('Content-Type: application/json');
        echo json_encode($output);
    }
}
