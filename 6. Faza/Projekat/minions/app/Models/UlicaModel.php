<?php namespace App\Models;

use CodeIgniter\Model;

class UlicaModel extends Model
{
    protected $table      = 'ulica';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['ime', 'idGrad'];
}