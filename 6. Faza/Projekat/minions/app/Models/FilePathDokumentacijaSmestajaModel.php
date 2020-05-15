<?php namespace App\Models;

use CodeIgniter\Model;

class FilePathDokumentacijaSmestajaModel extends Model
{
    protected $table      = 'filepathdokumentacijasmestaja';
    protected $primaryKey = 'idFilepath';
    protected $returnType = 'object';
    protected $allowedFields = ['filepath', 'idOglas'];
}