<?php

class Etablissement{

    private $idEtablissement;
    private $domaineEtablissement;
    private $mention;
    private $parcours;
    private $cycles;
    private $idSuperAdministrateur;
    private $idAdministrateur;

    public function __construct(
        $idEtablissement,
        $domaineEtablissement,
        $mention,
        $parcours,
        $cycles,
        $idSuperAdministrateur,
        $idAdministrateur
    ) {
        $this->idEtablissement = $idEtablissement;
        $this->domaineEtablissement = $domaineEtablissement;
        $this->mention = $mention;
        $this->parcours = $parcours;
        $this->cycles = $cycles;
        $this->idSuperAdministrateur = $idSuperAdministrateur;
        $this->idAdministrateur = $idAdministrateur;
    }

        public function getIdEtablissement(){
            return $this->idEtablissement;
        }

        public function getDomaineEtablissement(){
            return $this->domaineEtablissement;
        }

        public function getMention(){
            return $this->mention;
        }

        public function getParcours(){
            return $this->parcours;
        }

        public function getCycles(){
            return $this->cycles;
        }

        public function getIdSuperAdministrateur(){
            return $this->idSuperAdministrateur;
        }

        public function getIdAdministrateur(){
            return $this->idAdministrateur;
        }

        public function getNomAdministrateur($bdd){
           $requete = 'SELECT `userName` FROM
          `administrateur` WHERE idAdministrateur = "'.$this->idAdministrateur.'"';
            $nomAdmin =  $bdd->prepare($requete);
            $nomAdmin->execute();  
            $valNameAdmin = $nomAdmin->fetch();
            return $valNameAdmin["userName"];
    }
    public function __destruct() {
    }
}
