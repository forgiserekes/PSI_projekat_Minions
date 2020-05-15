<?php namespace App\Models;

use CodeIgniter\Model;

class SmestajModel extends Model
{
    protected $table      = 'smestaj';
    protected $primaryKey = 'idOglasi';
    protected $returnType = 'object';
    protected $allowedFields = ['opis', 'cena','idVlasnik','tipSmestaja','kapacitet','cena','kuhinja','terasa','parking'];
}