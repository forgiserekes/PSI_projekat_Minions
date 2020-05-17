<?php namespace App\Controllers;

use App\Models\KorisniciModel;
use App\Models\SmestajModel;

class Gost extends BaseController
{   
    protected function prikaz($page, $data){
        $data['controller']='Gost';
        echo view('sablon/header_gost');
        echo view("stranice/$page",$data);
        echo view('sablon/footer');
    }
    
    public function index(){
        $smestajModel = new SmestajModel();
        $this->prikaz('pocetna_gost',['sviSmestaji'=>$smestajModel->dohvSveOglase()]);
    }
    
    public function register($poruka = null){
        $this->prikaz('register',['poruka'=>$poruka]);
    }
    
    public function pretraga(){
        $this->prikaz('pretraga',[]);
    }

    public function pretragaSubmit(){
        $smestajModel = new SmestajModel();
        $sviSmestaji = $smestajModel->dohvTrazeneOglase($this->request->getVar('naziv'));
        //$smestaji = $smestajModel->dohvSveOglase();
        $this->prikaz('pocetna_gost',['sviSmestaji'=>$sviSmestaji,'trazeno'=>$this->request->getVar('naziv')]);
    }

    public function registerCommit(){
        if(!$this->validate(['ime'=>'required|min_length[5]|max_length[45]', 'prezime'=>'required|min_length[5]|max_length[45]',
            'registration_password'=>'required|min_length[8]|max_length[45]','registration_password_confirm' => 'required|min_length[8]|max_length[45]|matches[registration_password]',
            'datum_rodjenja'=>'required','adresa'=>'required|max_length[70]','registration_type'=>'required'])){
            return $this->prikaz('register', 
                ['errors'=>$this->validator->getErrors()]);
        }
        
        $korisniciModel = new KorisniciModel();
        if($this->request->getVar('registration_type') == 'oglasavacReg'){
            $tip = 'oglasavac';
        }else{
            $tip='korisnik';
        }
        $korisniciModel->save([
           'ime' => $this->request->getVar('ime'),
           'prezime' => $this->request->getVar('prezime'),   
           'tip' => $tip,
           'username'=> $this->request->getVar('username'),
           'password'=> $this->request->getVar('registration_password'),
           'email'=>$this->request->getVar('email'),
           'datumRodjenja'=>$this->request->getVar('datum_rodjenja'),
           'adresa' => $this->request->getVar('adresa')
        ]);
        return redirect()->to(site_url("Gost/login/"));
    }
    
    public function login($poruka = null){
        $this->prikaz('login',['poruka'=>$poruka]);
    }
    
    public function smestajPrikaz($id){
        $smestajModel = new SmestajModel();
        $smestaj = $smestajModel->find($id);
        $this->prikaz('smestaj',['smestaj'=>$smestaj]);
    }
    
    public function loginSubmit(){
        if(!$this->validate(['login_username'=>'required', 'login_password'=>'required'])){
            return $this->prikaz('login', 
                ['errors'=>$this->validator->getErrors()]);
        }
        
        $korisniciModel = new KorisniciModel();
        $korisnik = $korisniciModel->where('username',$this->request->getVar('login_username'))->first();
        if($korisnik==null){//ne postoji korisnicko ime
            return $this->login('Korisnik ne postoji');
        }
        if($korisnik->password!=$this->request->getVar('login_password'))
            return $this->login('Pogresna lozinka');
        if($korisnik->tip=='oglasavac'){
            $this->session->set('oglasavac',$korisnik);
            return redirect()->to(site_url('Oglasavac'));
        }
        else{ 
            $this->session->set('korisnik',$korisnik);
            return redirect()->to(site_url('Korisnik'));
        } 
    }
    
    public function backToHome(){
        return redirect()->to(site_url('Gost/index')); 
    }
}