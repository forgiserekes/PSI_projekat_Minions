<?php namespace App\Models;

use CodeIgniter\Model;

class FilePathDokumentacijeSmestajaModel extends Model
{
    protected $table      = 'filepathdokumentacijesmestaja';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['filepath', 'idSmestaj'];
    public function dohvSlikeSmestaja($id){
        return $this->where('idSmestaj',$id)->findAll();
    }
}