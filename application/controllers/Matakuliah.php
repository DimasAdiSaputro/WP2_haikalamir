<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller{

    public function index()
    {
        $this->load->view('view_form_matakuliah');

    }

    public function cetak(){
        $Kode = $this->input->post("Kode", true);
        $Nama = $this->input->post("Nama", true);
        $SKS = $this->input->post("SKS", true);

        $data = [
            'Kode' => $Kode,
            'Nama' => $Nama,
            'SKS' => $SKS
        ]; 
        $this->load->view('view_data_matakuliah', $data);     
    }
}