<?php
interface ControllerCo{
    public function run($url);
    public function checkUrl($url);
    public function redirect();
    public function validation($url);
}

interface ControllerAd{

}

interface ControllerWr{

}