<?php namespace App\Controllers;

use App\Models\FilePathDokumentacijeSmestajaModel;
use App\Models\SmestajModel;

class Oglasavac extends BaseController
{ 
	protected function prikaz($page,$data){
            $data['controller']='Oglasavac';
            $data['oglasavac']=$this->session->get('oglasavac');
            echo view('sablon/header_oglasavac',$data);
            echo view("stranice/$page",$data);
            echo view('sablon/footer');
	}
        
        public function proveraPostavkeOglasa(){
            $this->prikaz('provera',['poruka'=>'provera']);
        }
        
        public function postavljanjeOglasa(){
            $this->prikaz('postavljanje_oglasa',[]);
        }
        
        public function postavljanjeOglasaSubmit(){
            if(!$this->validate(['naziv'=>'required','room_type'=>'required','kapacitet'=>'required','povrsina'=>'required',
                'cena'=>'required','kitchen_type'=>'required','parking'=>'required','opis'=>'required|max_length(1500)','terasa'=>'required',
                'ulica'=>'required','broj'=>'required','grad'=>'required','drzava'=>'required','opis'=>'required','koordinateX'=>'required',
                'koordinateY'=>'required'])){
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
            $images = $this->request->getVar("slikeSmestaja");
            if($images!=null){
                foreach($images as $image){
                    $slikeModel->save([
                        'filepath' => "slike/proba/".$image,
                        'idSmestaj' => $smestajModel->getInsertId()
                    ]);
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
            
        }
        public function neodgRecenzijeOglasavaca(){
            
        }
        
        public function pretraga(){
            
        }
        
        public function smestajiOglasavaca(){
            $smestajModel = new SmestajModel();
            $smestaji = $smestajModel->dohvOglaseOglasavaca($this->session->get('oglasavac')->id);
            $this->prikaz('smestaji_oglasavaca',['smestaji'=>$smestaji]);
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
