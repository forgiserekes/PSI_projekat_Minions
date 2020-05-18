<?php namespace App\Models;

use CodeIgniter\Model;

class RecenzijaModel extends Model
{
    protected $table      = 'rezervacija';
    protected $primaryKey = 'idRezervacija';
    protected $returnType = 'object';
    protected $allowedFields = ['datumOd',
                                'datumDo',
                                'brojOsoba',
                                'napomena',
                                'idSmestaj',
                                'idKorisnika'
                            ];
}