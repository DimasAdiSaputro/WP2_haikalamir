<?php

class Model_latihan1 extends CI_Model{


    public function penjumlahan()
    {

        $nilai1 = 10;
        $nilai2 = 20;
        
        $penjumlahan  = $nilai1 + $nilai2;

        return $penjumlahan;
    }    

    public function penjumlahan2($n1, $n2)
    {

        $nilai1 = $n1;
        $nilai2 = $n2;
        
        $penjumlahan  = $nilai1 + $nilai2;

        return $penjumlahan;
    }
}

