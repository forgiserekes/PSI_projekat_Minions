<?php namespace App\Models;

use CodeIgniter\Model;

class DrzavaModel extends Model
{
    protected $table      = 'drzava';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['ime'];
}