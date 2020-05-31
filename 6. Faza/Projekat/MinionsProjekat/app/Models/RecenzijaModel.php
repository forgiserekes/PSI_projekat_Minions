<?php namespace App\Models;

use CodeIgniter\Model;

class RecenzijaModel extends Model
{
    protected $table      = 'recenzija';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['cistoca','komfor','kvalitet','lokacija','ljubaznost','opstiUtisak','tip','idSmestaj','idKorisnik','idOglasavac','komentar','odgovor'];
    public function dohvSveRecenzijeOglasa($id){
        return $this->where('idSmestaj',$id)->findAll();
    }
    public function dohvSmestajId($id){
        return $this->where('id',$id)->first()->idSmestaj;
    }
    public function dohvKorisnikId($id){
        return $this->where('id',$id)->first()->idKorisnik; 
    }
    public function dohvSveRecenzijeOglasavaca($id){
        return $this->where('idOglasavac',$id)->findAll();
    }
    public function dohvSveRecenzije(){
        return $this->findAll();
    }
    public function dohvRecenziju($id){
        return $this->where('id',$id)->findAll()[0];
    }
    public function unesiOdgovor($id,$odgovor){
       $data = [
           'odgovor' => $odgovor
       ];
       return $this->update($id,$data); 
    }
    public function obrisiRecenziju($id){
        return $this->delete($id);
    }
    
    public function obrisiRecenzijeZaOglas($id){
        $recenzije = $this->where('idSmestaj',$id)->findAll();
        foreach($recenzije as $recenzija){
            $this->delete($recenzija->id);
        }
    }
    
    public function dohvProsek($kljuc,$idSmestaj){
        $data = [
            'opstiUtisak'=>$kljuc,
            'idSmestaj'=>$idSmestaj,
        ];
        $res1 =  count($this->where('opstiUtisak',$kljuc)->where('idSmestaj',$idSmestaj)->findAll());
        $res2 =  count($this->where('idSmestaj',$idSmestaj)->findAll());
        if($res1 == 0 || $res2 == 0) return 0; 
        return 100*($res1/$res2);//0.66667 ceil  je 1
    }
    
    public function dohvProsecnuOcenu($idSmestaj){
        $recenzije = $this->where('idsmestaj',$idSmestaj)->findAll();
        $sum = 0;
        $cnt=0;
        foreach($recenzije as $recenzija){
            $cnt++;
            $sum+=($recenzija->komfor+$recenzija->kvalitet+$recenzija->ljubaznost+$recenzija->cistoca+$recenzija->lokacija)/5;
        }
        if($sum==0 || $cnt==0) return 0;
        return $sum/$cnt;
    }
    
    public function dohvBrojRecenzija($idSmestaj){
        return count($this->where('idSmestaj',$idSmestaj)->findAll());
    }
    
    public function dohvBrojSvihRecenzija(){
        return count($this->findAll());
    }
}