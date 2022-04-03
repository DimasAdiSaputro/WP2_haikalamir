<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Latihan1 extends CI_Controller
{

    public function index() //hanya menggunakan controller
    {

        echo "Selamat datang..... selamat belajar web programing";

    }

    public function penjumlahan() //Tidak pakai model
    {
        $nilai1 = 10;
        $nilai2 = 20;

        $penjumlahan = $nilai1 + $nilai2;

        echo "Hasil penjumlahan " . $nilai1 ."+". $nilai2. "=". $penjumlahan;
    }

    public function penjumlahan2() //pakai model
    {
        $this->load->model('Model_latihan1');
        $hasil = $this->Model_latihan1->penjumlahan();
        echo "Hasil penjumlahan " . $hasil;
    }

    public function penjumlahan3($n1 = '0', $n2 = '0') //pakai model dan parameter di method
    {
        $this->load->model('Model_latihan1');
        $hasil = $this->Model_latihan1->penjumlahan2($n1, $n2);
        echo "Hasil penjumlahan " . $hasil;
    }

    public function penjumlahan4($n1 = '0', $n2 = '0') //pakai model dan parameter di method dan view
    {
        $this->load->model('Model_latihan1');
        $hasil = $this->Model_latihan1->penjumlahan2($n1, $n2);
        $data['hasilnilai'] = $hasil;
        $this->load->view('view_latihan1', $data);
    }

}