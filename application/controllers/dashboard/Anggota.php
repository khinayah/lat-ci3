<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
    }

    public function index()
    {
        $data = array(
            'title' => 'Dashboard Home',
            'sub_title' => 'Welcome to the Dashboard Home Page',
            'get_data' => $this->Anggota_model->get_data(),

        );
        // echo "<pre>";
        // print_r($data);
        // die();;
        $this->load->view('dashboard/anggota/list', $data);
    }
}
