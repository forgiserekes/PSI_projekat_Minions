<?php namespace App\Models;

use CodeIgniter\Model;

class SmestajModel extends Model
{
    protected $table      = 'smestaj';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['naziv',
                                'opis', 
                                'cena',
                                'idVlasnik',
                                'drzava',
                                'grad',
                                'ulica',
                                'broj',
                                'tipSmestaja',
                                'kapacitet',
                                'povrsina',
                                'cena',
                                'kuhinja',
                                'terasa',
                                'parking'
                               ];

    public function dohvOglaseOglasavaca($idOglasavaca){
        return $this->where('idVlasnik',$idOglasavaca)->findAll();
    }
    public function dohvSveOglase(){
        return $this->findAll();
    }
    public function pretrazi($kljuc){
        return $this->like('naziv',$kljuc)->orLike('drzava',$kljuc)->orLike('grad',$kljuc)->orLike('ulica',$kljuc)->findAll();
    }
    
    public function obrisiSmestaj($id){
        return $this->delete($id);
    }
    
    public function dohvOglasPoNazivu($naziv){
        return $this->like('naziv',$naziv)->findAll();
    }
    public function dohvSmestaj($id){
        return ($this->where('id',$id)->findAll())[0];
    }
    public function dohvatiSmestajSaId($id) {
        return $this->where('id', $id)->find();      
        
    }
}