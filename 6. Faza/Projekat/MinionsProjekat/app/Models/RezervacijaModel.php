<?php namespace App\Models;

use CodeIgniter\Model;

class RezervacijaModel extends Model
{
    protected $table      = 'rezervacija';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = ['datumOd', 
                                'datumDo',
                                'brojOsoba',
                                'napomena',
                                'idSmestaj',
                                'idKorisnika'
                                ];

    public function pretraziRezervacijeSmestaja($kljuc){
        return $this->where('idSmestaj',$kljuc)->findAll();
    }

}