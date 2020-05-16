<?php namespace App\Controllers;

class Korisnik extends BaseController
{ 
	protected function prikaz($page,$data){
            $data['controller']='Korisnik';
            $data['korisnik']=$this->session->get('korisnik');
            echo view('sablon/header_korisnik',$data);
            echo view("stranice/$page",$data);
            echo view('sablon/footer');
	}
        
        public function index(){
            $this->prikaz('pocetna_korisnik',[]);
        }

        public function logout(){
            $this->session->destroy();
            return redirect()->to(site_url('/')); 
        }
        
        public function backToHome(){
            return redirect()->to(site_url('Korisnik')); 
        }
}
