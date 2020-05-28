<?php namespace App\Controllers;

use App\Models\FilePathDokumentacijeSmestajaModel;
use App\Models\SmestajModel;
use App\Models\RezervacijaModel;
use App\Models\RecenzijaModel;

class Oglasavac extends BaseController
{ 
	protected function prikaz($page,$data){
            $data['controller']='Oglasavac';
            $data['oglasavac']=$this->session->get('oglasavac');
            echo view('sablon/header',$data);
            echo view("stranice/$page",$data);
            echo view('sablon/footer');
	}
        
        public function proveraPostavkeOglasa(){
            $this->prikaz('provera',['poruka'=>'provera']);
        }
        
        public function postavljanjeOglasa(){
            $this->prikaz('postavljanje_oglasa',[]);
        }
        
        public function postavljanje_oglasa_submit(){
            if(!$this->validate([
                                 'naziv'=>'required',
                                 'room_type'=>'required',
                                 'kapacitet'=>'required',
                                 'povrsina'=>'required',
                                 'cena'=>'required',
                                 'kitchen_type'=>'required',
                                 'parking'=>'required',
                                 'opis'=>'required|max_length(1500)',
                                 'terasa'=>'required',
                                 'ulica'=>'required',
                                 'broj'=>'required',
                                 'grad'=>'required',
                                 'drzava'=>'required',
                                 'opis'=>'required',
                                 'koordinateX'=>'required',
                                 'koordinateY'=>'required'
                                ])){                                   
                return $this->prikaz('postavljanje_oglasa',['errors'=>$this->validator->getErrors()]);
            }
            
            //$this->session->set('oglasavac',$korisnik);
            //$korisnik = $korisniciModel->where('username',$this->request->getVar('login_username'))->first();
            
           
            $smestajModel = new SmestajModel();
            if($this->request->getVar('room_type')=='soba'){
                $room_type='Soba';
            }else if($this->request->getVar('room_type')=='apartman'){
                $room_type='Apartman';
            }else if($this->request->getVar('room_type')=='hotelskaSoba'){
                $room_type = 'Hotelska soba';
            }else {
                $room_type = 'Vikendica';
            }
            
            $smestaji = $smestajModel->findAll();
            foreach ($smestaji as $smestaj) {
                if($this->request->getVar('naziv') == $smestaj->naziv){
                    $greska = "Ovo ime je vec zauzeto.";
                    return $this->prikaz('postavljanje_oglasa',['greska'=>$greska]);
                }
            }
            

            $smestajModel->save([
                'naziv'=>$this->request->getVar('naziv'),
                'opis'=>$this->request->getVar('opis'),
                'drzava'=>$this->request->getVar('drzava'),
                'grad'=>$this->request->getVar('grad'),
                'ulica'=>$this->request->getVar('ulica'),
                'broj'=>$this->request->getVar('broj'),
                'cena'=>(int)$this->request->getVar('cena'),
                'idVlasnik'=>$this->session->get('oglasavac')->id,
                'tipSmestaja'=>$this->request->getVar('room_type'),
                'kapacitet'=>(int)$this->request->getVar('kapacitet'),
                'povrsina'=>(int)$this->request->getVar('povrsina'),
                'kuhinja'=> $this->request->getVar('kitchen_type')==='da'?true:false,
                'terasa'=>$this->request->getVar('terasa')==='da'?true:false,
                'parking'=>$this->request->getVar('parking')==='da'?true:false
            ]);
            
            $slikeModel = new FilePathDokumentacijeSmestajaModel();
            //napravi nov direktorijum u public/slike koji se zove kao naziv smestaja
            $ime = $this->request->getVar('naziv');
            mkdir("slike/".$ime."/");
            
            $count = count($_FILES["fileToUpload"]["name"]);
          
            $target_dir = "slike/".$ime ."/";
            $uploadOk = 1;
            //prevera da li je file odgovarajuceg tipa
            
            //echo $imageFileType;

            for ($i=0; $i < $count; $i++) { 
                $target_dir = "slike/".$ime ."/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                if($imageFileType == 'png' || $imageFileType == 'jpg' || $imageFileType == 'jpeg'|| 
                   $imageFileType == 'PNG' || $imageFileType == 'JPG' || $imageFileType == 'JPEG'
                ){
                    $slikeModel->save([
                        'filepath' => "slike/".$ime."/".$_FILES["fileToUpload"]["name"][$i],
                        'idSmestaj' => $smestajModel->getInsertId()
                    ]);  
                    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file);
    
                }
            }
            
             return redirect()->to(site_url("Oglasavac/smestajPrikaz/{$smestajModel->getInsertId()}"));
        }
        
        public function smestajPrikaz($id){
            $smestajModel = new SmestajModel();
            $smestaj = $smestajModel->find($id);
            $this->prikaz('smestaj',['smestaj'=>$smestaj]);
        }
        
        public function obrisiOglas($id){
            $smestajModel = new SmestajModel();
            $smestajModel->obrisiSmestaj($id);
            $recenzijaModel = new \App\Models\RecenzijaModel();
            $recenzijaModel->obrisiRecenzijeZaOglas($id);
            $rezervacijaModel = new \App\Models\RezervacijaModel();
            $rezervacijaModel->obrisiRezervacijeZaOglas($id);
            return redirect()->to(site_url("Oglasavac/smestajiOglasavaca/"));
        }
        
         public function sveRecenzijeOglasa($id){
            $smestajModel = new SmestajModel();
            $smestaj = $smestajModel->dohvSmestaj($id)[0];
            $this->prikaz('spisak_recenzija',['smestaj'=>$smestaj]);
        }
        
        public function sveRecenzijeOglasavaca(){
            $this->prikaz('spisak_recenzija',['idOglasavaca'=>$this->session->get('oglasavac')->id]);
        }
        
        public function pretraga(){
            $kljucPretrage = $this->request->getVar('kljucPretrage');
            $smestajModel = new SmestajModel();
            $smestaji = $smestajModel->pretrazi($kljucPretrage);
            $this->prikaz('pocetna',['smestaji'=>$smestaji,'trazeno'=>$kljucPretrage]);
        }
        
        public function rezervacije(){
            $rezervacijaModel = new \App\Models\RezervacijaModel();
            $nepotvrdjeneRezervacije = $rezervacijaModel->dohvSveNepotrvrdjene($this->session->get('oglasavac')->id);
            $this->prikaz('nepotvrdjene_rezervacije_oglasavac',['nepotvrdjeneRezervacije'=>$nepotvrdjeneRezervacije]);
        }
        
        public function potvrdiRezervaciju($idRezervacija){
            $brojRecenzijaModel = new \App\Models\BrojRecenzijaModel();
            $brojRecenzijaModel->povecaj($_SESSION['idKorisnikRezervacija'],$_SESSION['idSmestajRezervacija']);
            $rezervacijaModel = new RezervacijaModel();
            $rezervacijaModel->potvrdiRezervaciju($idRezervacija);
            return redirect()->to(site_url('Oglasavac/rezervacije'));
        }
        
        public function odbijRezervaciju($idRezervacija){
            $brojRecenzijaModel = new \App\Models\BrojRecenzijaModel();
            $brojRecenzijaModel->smanji($_SESSION['idKorisnikRezervacija'],$_SESSION['idSmestajRezervacija']);
            $rezervacijaModel = new RezervacijaModel();
            $rezervacijaModel->odbijRezervaciju($idRezervacija);
            return redirect()->to(site_url('Oglasavac/rezervacije'));
        }
        public function odgovorNaRecenziju($idRecenzije){
            $this->prikaz('odgovor_na_recenziju',['idRecenzije'=>$idRecenzije]);
        }
        
        public function odgovorNaRecenzijuSubmit($idRecenzije){
            $odgovor = $this->request->getVar('recenzijaOdgovor');
            $recenzijaModel = new RecenzijaModel();
            $recenzijaModel->unesiOdgovor($idRecenzije,$odgovor);
            return redirect()->to(site_url('Oglasavac/sveRecenzijeOglasavaca'));
        }
        
        public function smestajiOglasavaca(){
            $smestajModel = new SmestajModel();
            $smestaji = $smestajModel->dohvOglaseOglasavaca($this->session->get('oglasavac')->id);
            $this->prikaz('pocetna',['sviSmestaji'=>$smestaji]);
        }
        
        public function index(){
            $this->prikaz('pocetna_oglasavac',[]);
        }

        public function logout(){
            $this->session->destroy();
            return redirect()->to(site_url('/')); 
        }
        
        public function backToHome(){
            return redirect()->to(site_url('Oglasavac')); 
        }
}
