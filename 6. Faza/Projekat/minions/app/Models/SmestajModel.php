<?php namespace App\Models;

use CodeIgniter\Model;

class SmestajModel extends Model
{
    protected $table      = 'smestaj';
    protected $primaryKey = 'idOglasi';
    protected $returnType = 'object';
    protected $allowedFields = ['opis', 'cena','idVlasnik','idAdresa','tipSmestaja','kapacitet','povrsina','cena','kuhinja','terasa','parking'];
}