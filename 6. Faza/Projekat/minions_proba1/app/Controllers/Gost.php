<?php namespace App\Controllers;

class Gost extends BaseController
{   
    protected function prikaz($page, $data){
        $data['controller']='Gost';
        echo view('sablon/header_gost');
        echo view("stranice/$page",$data);
        echo view('sablon/footer');
    }
    
    public function index(){
        $this->prikaz('pocetna_gost',[]);
    }
    
    public function register(){
        $this->prikaz('register',[]);
    }
    
    public function login(){
        $this->prikaz('login',[]);
    }
}
