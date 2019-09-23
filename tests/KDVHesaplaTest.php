<?php

require_once 'KDVHesapla.php';

class KDVHesaplaTest extends PHPUnit_Framework_TestCase{
    public function testKDVSonucuDogruMu(){
        $kdv = new KDV_Hesapla(50);
        $this->assertEquals(59, $kdv->kdv_dahil_tutar());
    }
}

?>