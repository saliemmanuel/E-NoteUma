<?php
require("usersModels.php");

class Etudiant extends Users
{

    private $idEtudiant;
    private $grade;
    private $matricule;
    private $niveau;
    private $dateNaiss;
    private $lieuNaiss;
    private $idEtablissement;
    private $idAdministrateur;


    public function __construct(
        $idEtudiant,
        $matricule,
        $niveau,
        $dateNaiss,
        $lieuNaiss,
        $userName,
        $passWord,
        $nom,
        $prenom,
        $numTel,
        $email,
        $statut,
        $idEtablissement,
        $idAdministrateur
    ) {
        parent::__construct($userName, $passWord, $nom, $prenom, $numTel, $email, $statut);
        $this->idEtudiant = $idEtudiant;
        $this->grade  = "etudiant";
        $this->matricule = $matricule;
        $this->niveau = $niveau;
        $this->dateNaiss = $dateNaiss;
        $this->lieuNaiss = $lieuNaiss;
        $this->idEtablissement = $idEtablissement;
        $this->idAdministrateur = $idAdministrateur;
    }

    public function getIdEtudiant()
    {
        return $this->idEtudiant;
    }

    public function getGrade()
    {
        return $this->grade;
    }
    public function getMatricule()
    {
        return $this->matricule;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }

    public function getDateNaiss()
    {
        return $this->dateNaiss;
    }

    public function getLieuNaiss()
    {
        return $this->lieuNaiss;
    }

    public function getIdAdministrateur()
    {
        return $this->idAdministrateur;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getPassWord()
    {
        return $this->passWord;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNumTel()
    {
        return $this->numTel;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getStatut($bdd)
    {
        $requete = 'SELECT `statut` FROM
        `etudiant` WHERE idEtudiant = "' . $this->idEtudiant . '"';
        $getStat =  $bdd->prepare($requete);
        $getStat->execute();
        $valStat = $getStat->fetch();
        return $valStat['statut'];
    }
    public function setStatut($bdd, $newStatut)
    {
        $requete = 'UPDATE `etudiant` SET
        `statut` = "' . $newStatut . '" WHERE
        `etudiant`.`idEtudiant` = "' . $this->idEtudiant . '"';
        $setStat =  $bdd->prepare($requete);
        $setStat->execute();
    }

    public function getDomaineEtablissement($bdd)
    {
        $requete = 'SELECT `domaineEtablissement`FROM `etablissement`
        WHERE idEtablissement = "' . $this->idEtablissement . '"';
        $getDom =  $bdd->prepare($requete);
        $getDom->execute();
        if ($valDom = $getDom->fetch()) {
            $domaineEtablissements = $valDom;
        }
        return $valDom['domaineEtablissement'];
    }

    public function getMention($bdd)
    {
        $requete = 'SELECT `mention`FROM `etablissement`
        WHERE idEtablissement = "' . $this->idEtablissement . '"';
        $getMen =  $bdd->prepare($requete);
        $getMen->execute();
        if ($valMen = $getMen->fetch()) {
            $mentions = $valMen;
        }
        return $mentions['mention'];
    }

    public function getParcour($bdd)
    {
        $requete = 'SELECT `parcours`FROM `etablissement`
        WHERE idEtablissement = "' . $this->idEtablissement . '"';
        $getPar =  $bdd->prepare($requete);
        $getPar->execute();
        if ($valPar = $getPar->fetch()) {
            $parcour = $valPar;
        }
        return $parcour['parcours'];
    }

    public function getCycle($bdd)
    {
        $requete = 'SELECT `cycles`FROM `etablissement`
        WHERE idEtablissement = "' . $this->idEtablissement . '"';
        $getCy =  $bdd->prepare($requete);
        $getCy->execute();
        if ($valCy = $getCy->fetch()) {
            $cycle = $valCy;
        }
        return $cycle['cycles'];
    }

    public function getPayement($bdd)
    {

        $requete = 'SELECT `idPayement`, `codePayement`,
        `tranche`, `idAdministrateur`, `semestre`,
        `matricule` FROM
       `payement` WHERE matricule = "' . $this->matricule . '"';
        $getPay =  $bdd->prepare($requete);
        $getPay->execute();
        $pay = $getPay->fetch();
        $payement = new Payement(
            $pay['idPayement'],
            $pay['codePayement'],
            $pay['tranche'],
            $this->idAdministrateur,
            $pay['semestre'],
            $this->matricule
        );
        return $payement;
    }


    public function getNoteEtudiant($bdd, $semestre, $categorie)
    {
        $requete =  'SELECT `idUniteEnseignement`,
         `categorie`, `codeUniteEnseignement`,
         `libelle`, `M`, `A`, `S`, `MEN`,
         `nbCredit`, `semestreUE`, `CC`, `TPE`,
         `TP`, `EE`, `uniteenseignement`.`idEtablissement`,
         `uniteenseignement`.`matricule`,
         `uniteenseignement`.`idAdministrateur` FROM
         `uniteenseignement`, `payement` WHERE 
         idEtablissement = "' . $this->idEtablissement . '" AND `uniteenseignement`.matricule = "' . $this->matricule . '"
         AND `payement`.`matricule` = "' . $this->matricule . '" AND `payement`.`semestre` = "' . $semestre . '" AND
         `uniteenseignement`.idAdministrateur = "' . $this->idAdministrateur . '" AND 
         categorie = "' . $categorie . '" AND semestreUE = "' . $semestre . '"';
        $getNote =  $bdd->prepare($requete);
        return $getNote;
    }
    ////////////
    public function getNoteNiveau($bdd, $semestre)
    {
        $requete =  'SELECT `idUniteEnseignement`,
        `categorie`, `codeUniteEnseignement`,
        `libelle`, `M`, `A`, `S`, `MEN`,
        `nbCredit`, `semestreUE`, `CC`, `TPE`,
        `TP`, `EE`, `uniteenseignement`.`idEtablissement`,
        `uniteenseignement`.`matricule`,
        `uniteenseignement`.`idAdministrateur` FROM
        `uniteenseignement`, `payement` WHERE 1';
        $getEtut =  $bdd->prepare($requete);
        return $getEtut;
    }

    /////

    public function genereProfilAcademique($bdd, $semestre, $categorie)
    {
        header('');
    }

    public function __destruct()
    {
    }
}
