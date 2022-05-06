<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_buku');
        if(!$this->session->userdata('uid')) {
            $this->session->set_flashdata('msg_error', 'Silakan login terlebih dahulu!');
            redirect(base_url() . 'auth');
        }
        if ($this->session->userdata('uid') && $this->session->userdata('role') != 1 && !in_array($this->router->fetch_method(), array('index', 'cari'))) {
            $this->session->set_flashdata('msg_error', 'Kamu bukan admin!');
            redirect(base_url() . 'buku');
        }
    }

    public function index()
    {
        $data['list_buku'] = $this->Model_buku->default_show();
        $data['title'] = 'Buku';
        $this->load->view('template/header', $data);
        $this->load->view('buku', $data);
        $this->load->view('template/footer');
    }

    public function cari()
    {
        if($this->input->post('pencarian')) {
            $data['list_buku'] = $this->Model_buku->search($this->input->post('pencarian'));
        }
        $data['title'] = 'Pencarian Buku';
        $this->load->view('template/header', $data);
        $this->load->view('buku_cari', $data);
        $this->load->view('template/footer');
    }
    
    public function add()
    {
        $data['title'] = 'Tambah Buku';
        $this->form_validation->set_rules('judul_buku', 'Judul', 'required|trim');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|trim');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|trim');
        $this->form_validation->set_rules('isbn', 'ISBN', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'required|trim');
        
        $this->form_validation->set_message('required', 'Kolom ini wajib di-isi!');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('buku_tambah');
            $this->load->view('template/footer');
        } else {
            if(!$this->session->userdata('role') === 1) {
                redirect(base_url() . 'user');
            } else {
                $this->Model_buku->add();
            }
        }
        

    }

    public function edit()
    {
        $data['title'] = 'Edit Buku';
        if ($this->input->post('book_target_id')) {
            $data['book'] = $this->Model_buku->get_by_id($this->input->post('book_target_id'));

            $this->load->view('template/header', $data);
            $this->load->view('buku_edit', $data);
            $this->load->view('template/footer');
        } else if($this->input->post('book_id')) {
            $this->Model_buku->edit($this->input->post('book_id'));
        } else {
            redirect(base_url() . 'user');
        }
    }

    public function delete()
    {
        $this->Model_buku->delete();
    }
    
    public function pinjam()
    {
        $this->Model_buku->booking();
        $this->session->set_flashdata('msg_success', 'Buku dipinjam!');
        redirect(base_url() . 'user');
    }
    
    public function kembalikan()
    {
        $this->Model_buku->kembalikan();
        $this->session->set_flashdata('msg_success', 'Buku dikembalikan!');
        redirect(base_url() . 'user');
    }

}