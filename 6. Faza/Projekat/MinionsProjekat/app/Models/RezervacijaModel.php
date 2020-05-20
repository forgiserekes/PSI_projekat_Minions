<?php namespace App\Models;

use CodeIgniter\Model;

class RezervacijaModel extends Model
{
    protected $table      = 'rezervacija';
    protected $primaryKey = 'id';
    protected $returnType = 'object';

    protected $allowedFields = ['datumOd', 
                                'datumDo',
                                'brojOsoba',
                                'napomena',
                                'status',
                                'idSmestaj',
                                'idKorisnika'
                                ];

    public function pretraziRezervacijeSmestaja($kljuc){
        return $this->where('idSmestaj',$kljuc)->findAll();
    }
    public function potvrdiRezervaciju($idRezervacija){
        $this->update($idRezervacija,['status'=>'potvrdjena']);
    }
    public function odbijRezervaciju($idRezervacija){
        $this->update($idRezervacija,['status'=>'odbijena']);
    }
    
    public function dohvSveNepotrvrdjene($id){
        $smestajModel = new SmestajModel();
        $sviSmestajiOglasavaca = $smestajModel->dohvOglaseOglasavaca($id);
        $cnt=0;
        foreach($sviSmestajiOglasavaca as $smestaj){
            if(count($this->where('idSmestaj',$smestaj->id)->findAll())>0){
                $rezervacije[$cnt++] = $this->where('idSmestaj',$smestaj->id)->findAll();
            }
        }
        
        foreach($rezervacije as $rezervacijaKey=>$rezervacijaValue){
            foreach($rezervacijaValue as $rezKey=>$rezValue){
                if($rezervacijaValue[$rezKey]->status ==='potvrdjena' || $rezervacijaValue[$rezKey]->status ==='odbijena') unset($rezervacije[$rezervacijaKey][$rezKey]);   
            }
            
        }
        
        return $rezervacije;
    }
}