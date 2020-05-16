<?php namespace App\Models;

use CodeIgniter\Model;

class KorisniciModel extends Model
{
    protected $table      = 'korisnici';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['ime', 'prezime','username','password','email','adresa','tip','datumRodjenja'];
}