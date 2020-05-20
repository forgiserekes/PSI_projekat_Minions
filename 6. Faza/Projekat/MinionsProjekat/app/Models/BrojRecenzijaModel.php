<?php namespace App\Models;

use CodeIgniter\Model;

class BrojRecenzijaModel extends Model
{
    protected $table      = 'brojrecenzija';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = ['idKorisnik', 
                                'idSmestaj',
                                'broj'
                                ];
    public function povecaj($idKorisnik,$idSmestaj){
        $db = \Config\Database::connect();
        $builder = $db->table('brojrecenzija');
        $res = $builder->getWhere(['idKorisnik'=>$idKorisnik,'idSmestaj'=>$idSmestaj]);
        $result = $res->getResultObject();
        foreach($result as $tmp){
            $this->update($tmp->id,[
               'broj' => ++$tmp->broj
            ]);
        }
    }
    
    public function smanji($idKorisnik,$idSmestaj){
        $db = \Config\Database::connect();
        $builder = $db->table('brojrecenzija');
        $res = $builder->getWhere(['idKorisnik'=>$idKorisnik,'idSmestaj'=>$idSmestaj]);
        $result = $res->getResultObject();
        foreach($result as $tmp){
            $this->update($tmp->id,[
               'broj' => (--$tmp->broj<0?0:$tmp->broj)
            ]);
        } 
    }
    
    public function daLiPostoji($idKorisnik, $idSmestaj){
        $db = \Config\Database::connect();
        $builder = $db->table('brojrecenzija');
        $res = $builder->getWhere(['idKorisnik'=>$idKorisnik,'idSmestaj'=>$idSmestaj]);
        $result = $res->getResultObject();
        if($result) return true;
        else return false;
    }
    
    public function smeDaOstaviRecenziju($idKorisnik, $idSmestaj){
        $db = \Config\Database::connect();
        $builder = $db->table('brojrecenzija');
        $res = $builder->getWhere(['idKorisnik'=>$idKorisnik,'idSmestaj'=>$idSmestaj]);
        $result = $res->getResultObject();
        foreach($result as $tmp){
            return $tmp->broj>0;
        }
    }    
}