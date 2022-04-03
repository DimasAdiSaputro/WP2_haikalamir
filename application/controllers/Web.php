<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Web extends CI_Controller{
 function __construct(){
    parent::__construct();
    $this->load->helper('url');
 }
 public function index(){
    $data['Judul'] = "Halaman Depan";
    $this->load->view('v_header',);
    $this->load->view('v_index', $data);
    $this->load->view('v_footer',);
 }
 public function about(){
   $data['Judul'] = "Halaman About";
   $this->load->view('v_header',);
   $this->load->view('v_about', $data);
   $this->load->view('v_footer',);
}
}