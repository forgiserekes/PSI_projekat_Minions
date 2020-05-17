<?php namespace App\Models;

use CodeIgniter\Model;

class RecenzijaModel extends Model
{
    protected $table      = 'autor';
    protected $primaryKey = 'korime';
    protected $returnType = 'object';
}