<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller{

    public function __construct(){
        parent :: __construct();
        $this->load->model('Model_biodata','bio'); //mengambil nama modelnya
    
    }

    
    public function index($x = 'Tidak Terisi', $z = 'Kosong'){

        $data['model'] = $this->bio->Biodata($x, $z); //mengambil data pada model tertentu

        $this->load->view('view_biodata', $data);
    }
        
    public function coba(){

        echo "Methode coba";
    }
}