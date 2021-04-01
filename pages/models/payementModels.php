<?php

class Payement
{

    private $idPayement;
    private $codePayement;
    private $tranche;
    private $idAdministrateur;
    private $semestre;
    private $matricule;


    public function __construct(
        $idPayement,
        $codePayement,
        $tranche,
        $idAdministrateur,
        $semestre,
        $matricule
    ) {
        $this->idPayement = $idPayement;
        $this->codePayement = $codePayement;
        $this->tranche = $tranche;
        $this->idAdministrateur = $idAdministrateur;
        $this->semestre = $semestre;
        $this->matricule = $matricule;
    }

    public function  getIdPayement()
    {
        return $this->idPayement;
    }

    public function getCodePayement()
    {
        return $this->codePayement;
    }

    public function setCodePayement($code)
    {
    }


    public function getTranche()
    {
        return $this->tranche;
    }


    public function getIdAdministrateur()
    {
        return $this->idAdministrateur;
    }

    public function getIdEtudiant()
    {
        return $this->idEtudiant;
    }

    public function getSemestre()
    {
        return $this->semestre;
    }

    public function  getMatricule()
    {
        return $this->matricule;
    }
}
