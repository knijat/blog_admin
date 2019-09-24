<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/14/2019
 * Time: 10:53 PM
 */
class KDV_Hesapla{
    private $tutar;
    public $kdv_dahil_tutar;
    public function __construct($tutar){
        $this->tutar = $tutar;
    }
    public function kdv_hesapla(){
        return $this->kdv_dahil_tutar = $this->tutar * 1.18;
    }
}

?>