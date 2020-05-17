<?php namespace App\Models;

use CodeIgniter\Model;

class SmestajModel extends Model
{
    protected $table      = 'smestaj';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['naziv','opis', 'cena','idVlasnik','drzava','grad','ulica','broj','tipSmestaja','kapacitet','povrsina','cena','kuhinja','terasa','parking'];

    public function dohvOglaseOglasavaca($idOglasavaca){
        return $this->where('idVlasnik',$idOglasavaca)->findAll();
    }
    public function dohvSveOglase(){
        return $this->findAll();
    }
}