<?php namespace App\Controllers;

use App\Models\KorisniciModel;
use App\Models\SmestajModel;

class Admin extends BaseController
{    
    protected function prikaz($page,$data){
        $data['controller']='Admin';
        $data['admin']=$this->session->get('admin');
        echo view('sablon/header_admin',$data);
        echo view("stranice/$page",$data);
        echo view('sablon/footer');
    }
    
     public function index(){
        $this->prikaz('pocetna_admin',[]);
    }
    
    public function pretraga(){
        $kljucPretrage = $this->request->getVar('kljucPretrage');
        $smestajModel = new SmestajModel();
        $smestaji = $smestajModel->pretrazi($kljucPretrage);
        $this->prikaz('spisak_smestaja_admin',['smestaji'=>$smestaji,'trazeno'=>$kljucPretrage]);
    }
    
    public function pregledSvihSmestaja(){
        $smestajModel = new SmestajModel();
        $smestaji = $smestajModel->dohvSveOglase();
        $this->prikaz('spisak_smestaja_admin',['smestaji'=>$smestaji]);
    }
    
    public function obrisiSmestaj($id){
        $smestajModel = new SmestajModel();
        $smestajModel->obrisiSmestaj($id);
        return redirect()->to(site_url("Admin/pregledSvihSmestaja/"));
    }
    
    public function pregledSvihRecenzija(){
        $this->prikaz('spisak_recenzija',[]);
    }
    
    public function pregledSvihKorisnika(){
        $this->prikaz('spisak_korisnika',[]);
    }
    
    public function ukloniKorisnika($id){
        $korisniciModel = new KorisniciModel();
        $korisniciModel->obrisiKorisnika($id);
        $smestajModel = new SmestajModel();
        $smestajModel->obrisiSmestajeKorisnika($id);
        
        
        return redirect()->to(site_url("Admin/pregledSvihKorisnika/"));
    }
    
    public function pregledSvihZahteva(){
        $this->prikaz('spisak_zahteva',[]);
    }
    
    public function odobriZahtev($id){
        $korisniciModel = new KorisniciModel();
        $korisniciModel->odobriZahtev($id);
        return redirect()->to(site_url("Admin/pregledSvihZahteva/"));
    }
    
    public function odbijZahtev($id){
        $korisniciModel = new KorisniciModel();
        $korisniciModel->odbijZahtev($id);
        return redirect()->to(site_url("Admin/pregledSvihZahteva/"));
    }
    
    public function smestajPrikaz($id){
        $smestajModel = new SmestajModel();
        $smestaj = $smestajModel->find($id);
        $this->prikaz('smestaj',['smestaj'=>$smestaj]);
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to(site_url('/')); 
    }

    public function backToHome(){
        return redirect()->to(site_url('Admin')); 
    }
}
