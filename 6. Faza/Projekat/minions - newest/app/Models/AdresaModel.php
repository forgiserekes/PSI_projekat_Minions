<?php namespace App\Models;

use CodeIgniter\Model;

class AdresaModel extends Model
{
    protected $table      = 'adresa';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['broj', 'idUlica'];
}