<?php 

class Autentikasi extends CI_Controller{

    public function index()
    {
        $this->load->view('templates/auto_header');
        $this->load->view('admin/login');
        $this->load->view('templates/auto_footer');

    }
}