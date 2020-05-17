<?php namespace App\Controllers;

use App\Models\SmestajModel;

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
            $smestajModel = new \App\Models\SmestajModel();
            $this->prikaz('pocetna_korisnik',['sviSmestaji'=>$smestajModel->dohvSveOglase()]);
        }
        
         public function pretraga(){
            $this->prikaz('pretraga',[]);
        }

        public function pretragaSubmit(){
            $smestajModel = new SmestajModel();
            $sviSmestaji = $smestajModel->dohvTrazeneOglase($this->request->getVar('naziv'));
            //$smestaji = $smestajModel->dohvSveOglase();
            $this->prikaz('pocetna_korisnik',['sviSmestaji'=>$sviSmestaji,'trazeno'=>$this->request->getVar('naziv')]);
        }
        
        public function smestajPrikaz($id){
            $smestajModel = new SmestajModel();
            $smestaj = $smestajModel->find($id);
            $this->prikaz('smestaj',['smestaj'=>$smestaj]);
        }
        
        public function rezervisi($id){
            
        }
        
        public function rezervisiSubmit(){
            
        }
        
        public function logout(){
            $this->session->destroy();
            return redirect()->to(site_url('/')); 
        }
        
        public function backToHome(){
            return redirect()->to(site_url('Korisnik')); 
        }
}
