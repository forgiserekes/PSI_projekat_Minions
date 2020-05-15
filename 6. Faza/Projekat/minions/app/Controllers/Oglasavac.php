<?php namespace App\Controllers;

use App\Models\FilePathDokumentacijaSmestajaModel;
use App\Models\SmestajModel;
use App\Models\GradModel;
use App\Models\UlicaModel;
use App\Models\DrzavaModel;
use App\Models\AdresaModel;

class Oglasavac extends BaseController
{ 
	protected function prikaz($page,$data3){
            $data3['controller']='Oglasavac';
            $data3['oglasavac']=$this->session->get('oglasavac');
            echo view('sablon/header_oglasavac',$data3);
            echo view("stranice/$page",$data3);
            echo view('sablon/footer');
	}
        
        public function postavljanjeOglasa(){
            $this->prikaz('postavljanje_oglasa',[]);
        }
        
        public function postavljanjeOglasaSubmit(){
            if(!$this->validate(['room_type'=>'required','kapacitet'=>'required','povrsina'=>'required',
                'cena'=>'required','kitchen_type'=>'required','parking'=>'required','terasa'=>'required',
                'ulica'=>'required','broj'=>'required','opis'=>'required','koordinateX'=>'required',
                'koordinateY'=>'required','slikeSmestaja'=>'required'])){
                return $this->prikaz('postavljanje_oglasa',['errors'=>$this->validator->getErrors()]);
            }
            
            $drzavaModel = new DrzavaModel();
            $drzavaModel->save([
                'ime'=>$this->request->getVar('drzava')
            ]);
            
            $gradModel = new GradModel();
            $gradModel->save([
                'ime'=>$this->request->getVar('grad'),
                'ptt'=>$this->request->getVar('ptt'),
                'idDrzava'=>$drzavaModel->getInsertId()
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
                'idAdresa'=>$adresaModel->getInsertId(),
                'tipSmestaja'=>$this->request->getVar('room_type'),
                'kapacitet'=>(int)$this->request->getVar('kapacitet'),
                'povrsina'=>(int)$this->request->getVar('povrsina'),
                'kuhinja'=> $this->request->getVar('kitchen_type')==='da'?true:false,
                'terasa'=>$this->request->getVar('terasa')==='da'?true:false,
                'parking'=>$this->request->getVar('parking')==='da'?true:false,
            ]);
            
            $filepathSmestajModel = new FilePathDokumentacijaSmestajaModel();
            
            //$files = array();
            //$count_files = count($_FILES["slikeSmestaja"]["name"]);
            //if($count_files!=0){
            //    for($i=0;$i<$count_files;$i++){
                    
            //    }
            //}
            //if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
            //    move_uploaded_file($_FILES["pic"]["tmp_name"],"./public/slike/".$_FILES["pic"]["name"]);
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
