<?php

class UniteEnseignement {
    private $idUniteEnseignement;
    private $categorie;
    private $codeUniteEnseignement;
    private $libelle;
    private $M;
    private $A;
    private $S;
    private $MEN;
    private $nbCredit;
    private $semestreUE;
    private $CC;
    private $TPE;
    private $TP;
    private $EE;
    private $idEtablissement;
    private $matricule;
    private $idAdministrateur;
    

    public function __construct(
        $idUniteEnseignement,
        $categorie,
        $codeUniteEnseignement,
        $libelle,
        $M,
        $A,
        $S,
        $MEN,
        $nbCredit,
        $semestreUE,
        $CC,
        $TPE,
        $TP,
        $EE,
        $idEtablissement,
        $matricule,
        $idAdministrateur
    ) {
        $this->idUniteEnseignement = $idUniteEnseignement;
        $this->categorie = $categorie;
        $this->codeUniteEnseignement = $codeUniteEnseignement;
        $this->libelle = $libelle;
        $this->M = $M;
        $this->A = $A;
        $this->S = $S;
        $this->MEN = $MEN;
        $this->nbCredit = $nbCredit;
        $this->semestreUE = $semestreUE;
        $this->CC = $CC;
        $this->TPE = $TPE;
        $this->TP = $TP;
        $this->EE = $EE;
        $this->idEtablissement = $idEtablissement;
        $this->matricule = $matricule;
        $this->idUniteEnseignement = $idAdministrateur;
    }

    public function getIdUniteEnseignement(){
        return $this->idUniteEnseignement;
    }
    
    public function getCategorie(){
        return $this->categorie;
    }

    public function getCodeUniteEnseignement(){
        return $this->codeUniteEnseignement;
    }

    public function getLibelle(){
        return $this->libelle;
    }

    public function getM(){
        return $this->M;
    }

    public function getA(){
        return $this->A;
    }

    public function getS(){
        return $this->S;
    }
    public function getMEN(){
        return $this->MEN;
    }

    public function getNbCredit(){
        return $this->nbCredit;
    }

    public function getSemestreUE(){
        return $this->semestreUE;
    }
   
    public function getCC(){
        return $this->CC;
    }
   
    public function getTPE(){
        return $this->TPE;
    }

    public function getTP(){
        return $this->TP;
    }

    public function getEE(){
        return $this->EE;
    }

    public function getIdEtablissement(){
        return $this->idEtablissement;
    }


    public function getMatricule(){
        return $this->matricule;
    }

    public function getIdAdministrateur(){
        return $this->idAdministrateur;
    }
}


