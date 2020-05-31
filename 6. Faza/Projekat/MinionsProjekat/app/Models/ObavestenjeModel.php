<?php namespace App\Models;

use CodeIgniter\Model;

class ObavestenjeModel extends Model
{
    protected $table      = 'obavestenja';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['idKorisnik', 'opis', 'naslov','tip'];
    public function dohvObavestenjaKorisnika($id){
        return $this->where('idKorisnik',$id)->findAll();
    }
    public function dohvBrojObavestenja($id){
        return count($this->where('idKorisnik',$id)->findAll());
    }
    public function obrisiObavestenje($id){
        return $this->delete($id);
    }
}