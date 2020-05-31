<?php namespace App\Controllers;

use App\Models\SmestajModel;
use App\Models\RezervacijaModel;
use App\Models\RecenzijaModel;
use App\Models\ObavestenjeModel;


class Korisnik extends BaseController
{ 
	protected function prikaz($page,$data){
            $data['controller']='Korisnik';
            $data['korisnik']=$this->session->get('korisnik');
            echo view('sablon/header',$data);
            echo view("stranice/$page",$data);
            echo view('sablon/footer');
	}
        
        public function index(){
            $smestajModel = new \App\Models\SmestajModel();
            $this->prikaz('pocetna',['sviSmestaji'=>$smestajModel->dohvSveOglase()]);
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
                    if($val->kapacitet <= $this->request->getVar('brojOsoba')) { 
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
        
        public function smestajPrikaz($id){
            $smestajModel = new SmestajModel();
            $smestaj = $smestajModel->find($id);
            $smeDaOstavi = $this->smeDaOstaviRecenziju($id);
            
            $this->prikaz('smestaj',['smestaj'=>$smestaj,'smeDaOstaviRecenziju'=>$smeDaOstavi]);
        }
        
        public function rezervisi($id){
            $smestajModel = new SmestajModel();
            $smestaj = $smestajModel->dohvatiSmestajSaId($id);
            $this->session->set('id',$id);
            $this->prikaz('rezervacija_smestaja',[]);
        }
        
        public function rezervisiSubmit(){
            if(!$this->validate(['datumOd'=>'required',
                                 'datumDo'=>'required',
                                 'brojOsoba' =>'required',
                                 'napomena'=>'required']))
                                 {            
                                    return $this->prikaz('rezervacija_smestaja', 
                                    ['errors'=>$this->validator->getErrors()]);
            }
            //provera da li je zadati smesta razervisan u trazenom terminu
            $rezervacijaModel = new RezervacijaModel();
            $smestajModel = new SmestajModel();
            $rezervacije = $rezervacijaModel->pretraziRezervacijeSmestaja($this->session->get('id'));
            $greska = "Termin koji ste odabrali nije dostupan.";
           
            $smestaj = $smestajModel->find($this->session->get('id'));
            // echo count($rezervacije). "<br>";
            foreach ($rezervacije as $value){
                // echo $value->datumOd." ". strtotime($value->datumOd). "<br>";
                //pocetni datum trazene rezervacije se nalazi unutar vec recervisanog termina
                if(strtotime($value->datumOd)<=strtotime($this->request->getVar('datumOd')) &&
                   strtotime($value->datumDo)>strtotime($this->request->getVar('datumOd'))){
                  
                   return $this->prikaz('rezervacija_smestaja',['greska'=>$greska]);
                }
                ////krajnji datum trazene rezervacije se nalazi unutar vec recervisanog termina
                else if(strtotime($value->datumOd)<strtotime($this->request->getVar('datumDo')) &&
                        strtotime($value->datumDo)>=strtotime($this->request->getVar('datumDo'))){
                       
                        return $this->prikaz('rezervacija_smestaja',['greska'=>$greska]);
                }
                //ako trazeni termin obuhvata neki drugi termin
                else if(strtotime($value->datumOd)>=strtotime($this->request->getVar('datumOd')) &&
                        strtotime($value->datumDo)<=strtotime($this->request->getVar('datumDo'))){
                        
                        return $this->prikaz('rezervacija_smestaja',['greska'=>$greska]);
                } 

            }
            if($smestaj->kapacitet < $this->request->getVar('brojOsoba')){
                $greska = "Ovaj smestaj nema dovoljan kapacitet.";
                return $this->prikaz('rezervacija_smestaja',['greska'=>$greska]);
            }
            
            if(strtotime($this->request->getVar('datumOd') >= strtotime($this->request->getVar('datumDo')))){
                $greska = "Niste uneli validan datum.";
                return $this->prikaz('rezervacija_smestaja',['greska'=>$greska]);
            }

            $rezervacijaModel->save([
                'datumOd' => $this->request->getVar('datumOd'),
                'datumDo' => $this->request->getVar('datumDo'),   
                'brojOsoba'=> $this->request->getVar('brojOsoba'),
                'napomena'=> $this->request->getVar('napomena'),
                'status'=>'nepotvrdjena',
                'idSmestaj'=> $this->session->get('id') ,
                'idKorisnika'=> $this->session->get('korisnik')->id             
             ]);
            
            $brojRecenzijaModel = new \App\Models\BrojRecenzijaModel();
            if(!($brojRecenzijaModel->daLiPostoji($this->session->get('korisnik')->id,$this->session->get('id')))){
                $brojRecenzijaModel->save([
                    'idKorisnik'=>$this->session->get('korisnik')->id,
                    'idSmestaj'=>$this->session->get('id'),
                    'broj'=>'0',
                ]);
            }
            
            return redirect()->to(site_url('Korisnik')); 
        }
        
        public function sveRecenzijeOglasa($id){
            $smestajModel = new SmestajModel();
            $smestaj = $smestajModel->dohvSmestaj($id)[0];
            $this->prikaz('spisak_recenzija',['smestaj'=>$smestaj]);
        }
        
        public function smeDaOstaviRecenziju($idSmestaj){
            $brojRecenzijaModel = new \App\Models\BrojRecenzijaModel();
            if($brojRecenzijaModel->smeDaOstaviRecenziju($this->session->get('korisnik')->id,$idSmestaj)) return true;
            else false;
        }
        
        public function ostaviRecenziju($id){
            $this->prikaz('postavljanje_recenzije',['idSmestajRecenzija'=>$id]);
        }
        
        public function ostaviRecenzijuSubmit($id){
            $smestajModel = new SmestajModel();
            $smestaj = $smestajModel->dohvSmestaj($id)[0];
            
            $recenzijaModel = new RecenzijaModel();
            $recenzijaModel->save([
                'cistoca'=>$this->request->getVar('cistoca'),
                'kvalitet'=>$this->request->getVar('kvalitet'),
                'ljubaznost'=>$this->request->getVar('ljubaznost'),
                'lokacija'=>$this->request->getVar('lokacija'),
                'opstiUtisak'=>$this->request->getVar('utisak'),
                'komfor'=>$this->request->getVar('komfor'),
                'tip'=>$this->request->getVar('tipPutnika'),
                'komentar'=>$this->request->getVar('recenzijaKomentar'),
                'idSmestaj'=>$id,
                'idOglasavac'=>$smestaj->idVlasnik,
                'idKorisnik'=>$this->session->get('korisnik')->id,
            ]);

            $obavestenjeModel = new ObavestenjeModel();
            $smestajModel = new SmestajModel();
            $smestaj = $smestajModel->dohvSmestaj($id)[0];
            
            $data = [
                'idKorisnik'=>$smestaj->idVlasnik,
                'naslov'=> 'Nova recenzija!',
                'opis'=> "Korisnik " . $this->session->get('korisnik')->ime . " ". $this->session->get('korisnik')->prezime . " je ostavio recenziju za boravak u Vašem smeštaju ". $smestaj->naziv,
                'tip' => 'success',
            ];
            $obavestenjeModel->save($data);
            
            $brojRecenzijaModel = new \App\Models\BrojRecenzijaModel();
            $brojRecenzijaModel->smanji($this->session->get('korisnik')->id,$id);
            return redirect()->to(site_url('Korisnik'));
        }

        public function obavestenja(){
            $obavestenjeModel = new ObavestenjeModel();
            $obavestenja = $obavestenjeModel->dohvObavestenjaKorisnika($this->session->get('korisnik')->id);
            $this->prikaz('obavestenja',['obavestenja'=>$obavestenja]);
        }

        public function obrisiObavestenje($id){
            $obavestenjeModel = new ObavestenjeModel();
            $obavestenjeModel->obrisiObavestenje($id);
            return redirect()->to(site_url('Korisnik/obavestenja'));
        }
        
        public function logout(){
            $this->session->destroy();
            return redirect()->to(site_url('/')); 
        }
        
        public function backToHome(){
            return redirect()->to(site_url('Korisnik')); 
        }

        public function dohvBrojObavestenja(){
            if($this->session->get('korisnik')){
                $obavestenjeModel = new ObavestenjeModel();
                $data = [
                    'broj'=> $obavestenjeModel->dohvBrojObavestenja($this->session->get('korisnik')->id),
                ];
                header("Content-Type: application/json" );
                echo json_encode($data);
            }
        }
        
        public function date_range($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

            $dates = array();
            $current = strtotime($first);
            $last = strtotime($last);

            while( $current <= $last ) {

                $dates[] = date($output_format, $current);
                $current = strtotime($step, $current);
            }

            return $dates;
        }
}
