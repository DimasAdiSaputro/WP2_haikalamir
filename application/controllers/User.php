<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('uid')) {
            $this->session->set_flashdata('msg_error', 'Silakan login terlebih dahulu!');
            redirect(base_url() . 'auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->model('Model_buku');
        $data['booked_list'] = $this->Model_buku->booked();
        $this->load->view('template/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $this->load->view('template/header', $data);
        $this->load->view('profile');
        $this->load->view('template/footer');
    }

}