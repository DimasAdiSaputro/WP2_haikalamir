<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihansatu extends CI_Controller{

    //controller
    public function index(){
        echo "<h1>Contoh class</h1>";
    }

    //controller
    public function biodatasatu(){
        echo "<h1>Perkenalkan</h1>";
        echo "<br>";
        echo "Nama : Haikal Tegar Amir";
    }

    //controller dan view
    public function biodatadua(){
        
        $this->load->view("view_biodata");
    
    }

    //menggunakan controller dan model
    public function biodatatiga(){
        $this->load->model("Model_biodata");  //Panggil model
        $bio = $this->Model_biodata->biodata();

        echo "<h1>Perkenalkan</h1>";
        echo "<br>";
        echo "Nama : Haikal Tegar Amir";


    }

    //menggunakan controller,model dan view
    public function biodataempat(){
        $this->load->model("Model_biodata");  //Panggil model
        $bio = $this->Model_biodata->biodata();
        $data['title'] = "Form Biodata ";

        $this->load->view("view_biodata", $data); //panggil view
    }
}