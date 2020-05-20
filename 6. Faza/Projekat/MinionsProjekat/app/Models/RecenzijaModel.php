<?php namespace App\Models;

use CodeIgniter\Model;

class RecenzijaModel extends Model
{
    protected $table      = 'recenzija';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['cistoca','komfor','kvalitet','lokacija','ljubaznost','opstiUtisak','tip','idSmestaj','idKorisnik','komentar'];
    public function dohvSveRecenzijeOglasa($id){
        return $this->where('idSmestaj',$id)->findAll();
    }
}