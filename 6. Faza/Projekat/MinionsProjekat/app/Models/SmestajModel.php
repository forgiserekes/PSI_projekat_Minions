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
                                'parking',
                                'lat',
                                'lon'
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
    public function obrisiSmestajeKorisnika($id){
        $smestajiKorisnika = $this->where('idVlasnik',$id)->findAll();
        foreach($smestajiKorisnika as $smestaj){
            $this->obrisiSmestaj($smestaj->id);
        }
    }
    public function obrisiSmestaj($id){
        $recenzijaModel = new \App\Models\RecenzijaModel();
        $recenzijaModel->obrisiRecenzijeZaOglas($id);
        $rezervacijaModel = new \App\Models\RezervacijaModel();
        $rezervacijaModel->obrisiRezervacijeZaOglas($id);
        return $this->delete($id);
    }
    public function dohvOglasPoNazivu($naziv){
        return $this->like('naziv',$naziv)->findAll();
    }
    public function dohvSmestaj($id){
        return ($this->where('id',$id)->find());
    }
    public function dohvatiSmestajSaId($id) {
        return $this->where('id', $id)->find();
    }
    public function dohvBrojSmestajaOglasavaca($id){
        return count($this->where('idVlasnik',$id)->findAll());
    }
    public function dohvBrojSmestaja(){
        return count($this->findAll());
    }
}