<?php namespace App\Models;

use CodeIgniter\Model;

class GradModel extends Model
{
    protected $table      = 'grad';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['ime', 'ptt','idDrzava'];
}