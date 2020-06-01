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

    public function dohvRezervaciju($id){
        return $this->where('id',$id)->first();
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

        $rezervacije = array();
        foreach($sviSmestajiOglasavaca as $smestaj){
            if(count($this->where('idSmestaj',$smestaj->id)->findAll())>0){
                $rezervacije[$cnt++] = $this->where('idSmestaj',$smestaj->id)->findAll();
            }
        }

        if(count($rezervacije)>0){
            foreach($rezervacije as $rezervacijaKey=>$rezervacijaValue){
                foreach($rezervacijaValue as $rezKey=>$rezValue){
                    if($rezervacijaValue[$rezKey]->status ==='potvrdjena' || $rezervacijaValue[$rezKey]->status ==='odbijena') unset($rezervacije[$rezervacijaKey][$rezKey]);   
                    if(count($rezervacije[$rezervacijaKey]) == 0) unset($rezervacije[$rezervacijaKey]);
                }
            }
            $cnt = 0;
            $rezervacijaFinal = array();
            foreach($rezervacije as $rezervacijaKey => $rezervacijaValue){
                foreach($rezervacijaValue as $rezKey=>$rezValue){
                    $rezervacijaFinal[$cnt++] = $rezValue;
                }
            }
            return $rezervacijaFinal;
        }
        return $rezervacije;
    }

    public function dohvBrojRezervacijaOglasavaca($id){
        $smestajModel = new SmestajModel();
        $sviSmestajiOglasavaca = $smestajModel->dohvOglaseOglasavaca($id);
        $cnt = 0;
        foreach($sviSmestajiOglasavaca as $smestaj){
            if(count($this->where('idSmestaj',$smestaj->id)->findAll())>0){
                $cnt++;
            }
        }
        return $cnt;
    }

    public function dohvIdKorisnika($id){
        return $this->where('id',$id)->first()->idKorisnika;
    }

    public function dohvSmestajId($idRezervacija){
        return $this->where('id',$idRezervacija)->first()->idSmestaj;
    }
    
    public function obrisiRezervacijeZaOglas($id){
        $rezervacije = $this->where('idSmestaj',$id)->findAll();
        foreach($rezervacije as $rezervacija){
            $this->delete($rezervacija->id);
        }
    }
}