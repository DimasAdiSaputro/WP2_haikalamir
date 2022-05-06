<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('uid') && $this->router->fetch_method() !== 'logout') {
            redirect(base_url() . 'user');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[3]|max_length[50]');

        $this->form_validation->set_message('valid_email', 'Email yang anda masukan tidak valid!');
        $this->form_validation->set_message('required', 'Kolom ini wajib di-isi!');
        $this->form_validation->set_message('min_length', 'Kolom harus di-isi minimal 3 karakter!');
        $this->form_validation->set_message('max_length', 'Kolom harus di-isi maksimal 50 karakter!');

        if($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login Page';
            $this->load->view('template/header', $data);
            $this->load->view('login');
            $this->load->view('template/footer');
        } else {
            $this->load->model('User_model');
            $this->User_model->login();
        }
    }
    
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[50]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('pass1', 'Password 1', 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('pass2', 'Password 2', 'required|min_length[3]|max_length[50]|matches[pass1]');

        $this->form_validation->set_message('valid_email', 'Email yang anda masukan tidak valid!');
        $this->form_validation->set_message('required', 'Kolom ini wajib di-isi!');
        $this->form_validation->set_message('matches', 'Password tidak sesuai!');
        $this->form_validation->set_message('min_length', 'Kolom harus di-isi minimal 3 karakter!');
        $this->form_validation->set_message('max_length', 'Kolom harus di-isi maksimal 50 karakter!');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register Page';

            $this->load->view('template/header', $data);
            $this->load->view('register');
            $this->load->view('template/footer');
        } else {
            $this->load->model('User_model');
            $this->User_model->register();
        }
    }

    public function logout()
    {
        if($this->session->userdata('uid')) {
            $this->session->unset_userdata(array('nama', 'email', 'role', 'uid', 'img'));
            $this->session->set_flashdata('msg_success', 'Berhasil keluar!');
        } else {
            $this->session->set_flashdata('msg_error', 'Kamu belum login!');
        }
        redirect(base_url() . 'auth');
    }

}