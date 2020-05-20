<?php namespace App\Models;

use CodeIgniter\Model;

class KorisniciModel extends Model
{
    protected $table      = 'korisnici';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['ime', 'prezime','username','password','email','adresa','tip','datumRodjenja','status'];
    public function dohvSveZahteve(){
        return $this->where('status','cekanje')->findAll();
    }
    public function odobriZahtev($id){
       $data = [
           'status' => 'aktivan'
       ];
       return $this->update($id,$data); 
    }
    public function odbijZahtev($id){
       $data = [
           'status' => 'odbijen'
       ];
       return $this->update($id,$data);
    }
    public function dohvSveKorisnike(){
      return $this->like('tip','oglasavac')->orLike('tip','korisnik')->findAll(); 
    }
    public function obrisiKorisnika($id){
      return $this->delete($id);
    }
    public function dohvKorisnika($id){
        return $this->where('id',$id)->findAll();
    }
}