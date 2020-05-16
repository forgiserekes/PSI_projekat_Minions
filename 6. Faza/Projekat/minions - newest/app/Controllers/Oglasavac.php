<?php namespace App\Controllers;

use App\Models\FilePathDokumentacijeSmestajaModel;
use App\Models\SmestajModel;
use App\Models\GradModel;
use App\Models\UlicaModel;
use App\Models\DrzavaModel;
use App\Models\AdresaModel;

class Oglasavac extends BaseController
{ 
	protected function prikaz($page,$data){
            $data['controller']='Oglasavac';
            $data['oglasavac']=$this->session->get('oglasavac');
            echo view('sablon/header_oglasavac',$data);
            echo view("stranice/$page",$data);
            echo view('sablon/footer');
	}
        
        public function postavljanjeOglasa(){
            $this->prikaz('postavljanje_oglasa',[]);
        }
        
        public function postavljanjeOglasaSubmit(){
            if(!$this->validate(['room_type'=>'required','kapacitet'=>'required','povrsina'=>'required',
                'cena'=>'required','kitchen_type'=>'required','parking'=>'required','terasa'=>'required',
                'ulica'=>'required','broj'=>'required','grad'=>'required','drzava'=>'required','opis'=>'required','koordinateX'=>'required',
                'koordinateY'=>'required','slikeSmestaja'=>'required'])){
                return $this->prikaz('postavljanje_oglasa',['errors'=>$this->validator->getErrors()]);
            }
            
            //$this->session->set('oglasavac',$korisnik);
            //$korisnik = $korisniciModel->where('username',$this->request->getVar('login_username'))->first();
            
            $drzavaModel = new DrzavaModel();
            $drzavaModel->save([
                'ime'=>$this->request->getVar('drzava')
            ]);
            
            $gradModel = new GradModel();
            $gradModel->save([
                'ime'=>$this->request->getVar('grad'),
                'ptt'=>$this->request->getVar('ptt'),
                'idDrzava'=>$drzavaModel->getInsertID()
            ]);
            
            $ulicaModel = new UlicaModel();
            $ulicaModel->save([
                'ime'=>$this->request->getVar('ulica'),
                'idGrad'=>$gradModel->getInsertId()
            ]);
           
            $adresaModel = new AdresaModel();
            $adresaModel->save([
                'broj'=>$this->request->getVar('broj'),
                'idUlica'=>$ulicaModel->getInsertId()
            ]);
            
            $smestajModel = new SmestajModel();
            if($this->request->getVar('room_type')=='soba'){
                $room_type='Soba';
            }else if($this->request->getVar('room_type')=='apartman'){
                $room_type='Apartman';
            }else if($this->request->getVar('room_type')=='hotelskaSoba'){
                $room_type = 'Hotelska soba';
            }else $room_type = 'Vikendica';
            
            $smestajModel->save([
                'opis'=>$this->request->getVar('opis'),
                'cena'=>(int)$this->request->getVar('cena'),
                'idVlasnik'=>$this->session->get('oglasavac')->id,
                'tipSmestaja'=>$this->request->getVar('room_type'),
                'kapacitet'=>(int)$this->request->getVar('kapacitet'),
                'povrsina'=>(int)$this->request->getVar('povrsina'),
                'kuhinja'=> $this->request->getVar('kitchen_type')==='da'?true:false,
                'terasa'=>$this->request->getVar('terasa')==='da'?true:false,
                'parking'=>$this->request->getVar('parking')==='da'?true:false,
                'idAdresa'=>$adresaModel->getInsertId()
            ]);
            
            $slikeModel = new FilePathDokumentacijeSmestajaModel();
            $images = $this->request->getVar("slikeSmestaja");
            foreach($images as $image){
                $slikeModel->save([
                    'filepath' => "./public/slike/".$image,
                    'idSmestaj' => $smestajModel->getInsertId()
                ]);
            }
            
            $this->prikaz('provera',['poruka'=>'Smestaj uspesno postavljen.']);
        }
        
        public function neodgRecenzijeOglasavaca(){
            
        }
        
        public function oglasiOglasavaca(){
           
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
