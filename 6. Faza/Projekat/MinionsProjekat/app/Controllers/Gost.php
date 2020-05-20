<?php namespace App\Controllers;

use App\Models\KorisniciModel;
use App\Models\SmestajModel;
use App\Models\RezervacijaModel;

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
        $this->prikaz('pocetna',['sviSmestaji'=>$smestajModel->dohvSveOglase()]);
    }
    
    public function register($poruka = null){
        $this->prikaz('register',['poruka'=>$poruka]);
    }
    
    public function pretraga(){
        $this->prikaz('pretraga',[]);
    }

    public function pretragaSubmit(){
        $smestajModel = new SmestajModel();
        $rezervacijaModel = new RezervacijaModel();
        $sviSmestaji = $smestajModel->dohvOglasPoNazivu($this->request->getVar('naziv'));
        if($this->request->getVar('naziv') == ''){
            $sviSmestaji=$smestajModel->dohvSveOglase();
        }
        
        if($this->request->getVar('datumOd') != '' && $this->request->getVar('datumDo') != ''){
                           
            foreach($sviSmestaji as $smestaj => $valSmestaj) { 
                $rezervacije = $rezervacijaModel->pretraziRezervacijeSmestaja($valSmestaj->id);
                    foreach($rezervacije as $rezervacija => $valRezervacija) { 
                        if(strtotime($valRezervacija->datumOd)<= strtotime($this->request->getVar('datumOd')) &&
                           strtotime($valRezervacija->datumDo)> strtotime($this->request->getVar('datumOd'))){
                            unset($sviSmestaji[$smestaj]); 
                            
                            break; 
                        }
                        if(strtotime($valRezervacija->datumOd)< strtotime($this->request->getVar('datumDo')) &&
                           strtotime($valRezervacija->datumDo)>= strtotime($this->request->getVar('datumDo'))){
                            unset($sviSmestaji[$smestaj]); 
                            
                            break; 
                        }
                        if(strtotime($valRezervacija->datumOd)>= strtotime($this->request->getVar('datumOd')) &&
                           strtotime($valRezervacija->datumDo)<= strtotime($this->request->getVar('datumDo'))){
                            unset($sviSmestaji[$smestaj]); 
                            
                            break; 
                        }                            
                    } 
            } 
        }
        if($this->request->getVar('kategorija') != ''){
            foreach($sviSmestaji as $k => $val) { 
                if($val->tipSmestaja != $this->request->getVar('kategorija')) { 
                    unset($sviSmestaji[$k]); 
                    //echo 'kategorija';
                } 
            } 
        }
        if($this->request->getVar('brojOsoba') != ''){
            foreach($sviSmestaji as $k => $val) { 
                if($val->kapacitet < $this->request->getVar('brojOsoba')) { 
                    unset($sviSmestaji[$k]); 

                } 
            } 
        }  
        if($this->request->getVar('cena') != ''){
            foreach($sviSmestaji as $k => $val) { 
                if($val->cena <= $this->request->getVar('cena')) { 
                    unset($sviSmestaji[$k]); 
                    //echo 'cena';
                } 
            } 
        } 
        if($this->request->getVar('grad') != ''){
            foreach($sviSmestaji as $k => $val) { 


                $a = $val->grad;
                $search = $this->request->getVar('grad');
                if(preg_match("/{$search}/i", $a)) {                     
                }
                else{                   
                    unset($sviSmestaji[$k]);   
                }
                 
            }                
        }                         
        $this->prikaz('pocetna',['sviSmestaji'=>$sviSmestaji]);
    }

    public function registerCommit(){
        if(!$this->validate(['ime'=>'required|min_length[1]|max_length[45]', 'prezime'=>'required|min_length[5]|max_length[45]',
            'registration_password'=>'required|min_length[8]|max_length[45]','registration_password_confirm' => 'required|min_length[8]|max_length[45]|matches[registration_password]',
            'datum_rodjenja'=>'required','adresa'=>'required|max_length[70]','registration_type'=>'required'])){
            return $this->prikaz('register', 
                ['errors'=>$this->validator->getErrors()]);
        }
        
        $korisniciModel = new KorisniciModel();
        if($this->request->getVar('registration_type') == 'oglasavacReg'){
            $tip = 'oglasavac';
            $status = 'cekanje';
        }else{
            $tip = 'korisnik';
            $status = 'aktivan';
        }
        
        $korisniciModel->save([
           'ime' => $this->request->getVar('ime'),
           'prezime' => $this->request->getVar('prezime'),   
           'tip' => $tip,
           'username'=> $this->request->getVar('username'),
           'password'=> $this->request->getVar('registration_password'),
           'email'=>$this->request->getVar('email'),
           'datumRodjenja'=>$this->request->getVar('datum_rodjenja'),
           'adresa' => $this->request->getVar('adresa'),
           'status'=>$status
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
            if($korisnik->status=='cekanje') return $this->login('Zahtev na cekanju.');
            else if($korisnik->status=='odbijen') return $this->login('Zahtev je odbijen.');
            $this->session->set('oglasavac',$korisnik);
            return redirect()->to(site_url('Oglasavac'));
        }
        else if($korisnik->tip=='korisnik'){
            $this->session->set('korisnik',$korisnik);
            return redirect()->to(site_url('Korisnik'));
        }
        else{ 
            $this->session->set('admin',$korisnik);
            return redirect()->to(site_url('Admin'));
        } 
    }
    
    public function sveRecenzijeOglasa($id){
        $smestajModel = new SmestajModel();
        $smestaj = $smestajModel->dohvSmestaj($id);
        $this->prikaz('spisak_recenzija_za_oglas',['smestaj'=>$smestaj]);
    }
    
    public function backToHome(){
        return redirect()->to(site_url('Gost/index')); 
    }
}
