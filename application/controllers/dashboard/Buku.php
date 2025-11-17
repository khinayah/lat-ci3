<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
    }

    public function index()
    {
        // ambil data
        $get_data = $this->Buku_model->get_data();


        $data = array(
            'title' => 'Dashboard Home',
            'sub_title' => 'Welcome to the Dashboard Home Page',
            'get_data' => $get_data,
        );

        $this->load->view('dashboard/buku/list', $data);
    }
}
