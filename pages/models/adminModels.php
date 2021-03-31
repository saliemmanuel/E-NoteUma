<?php

class Administrateur extends Users
{

    private $idAdministrateur;
    private $grade;
    private $idSuperAdministrateur;

    public function __construct(
        $idAdministrateur,
        $idSuperAdministrateur,
        $userName,
        $passWord,
        $nom,
        $prenom,
        $numTel,
        $email,
        $statut
    ) {
        parent::__construct($userName, $passWord, $nom, $prenom, $numTel, $email, $statut);
        $this->idAdministrateur = $idAdministrateur;
        $this->grade  = "admin";
        $this->idSuperAdministrateur = $idSuperAdministrateur;
    }

    public function getIdAdministrateur()
    {
        return $this->idAdministrateur;
    }

    public function getIdSuperAdministrateur()
    {
        return $this->idSuperAdministrateur;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getPassWord()
    {
        return $this->passWord;
    }

    public function setPassWord($newPassWord)
    {
        $this->passWord = $newPassWord;
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
        $requete = 'SELECT  `statut` FROM `administrateur`
        WHERE id = "' . $this->id . '"';
        $getStat =  $bdd->prepare($requete);
        $getStat->execute();
        if ($res = $getStat->fetch()) {
            $this->statut = $res['statut'];
        }
        return $this->statut;
    }

    public function setStatutAdmin($bdd, $newStatut)
    {
        $requete =
            'UPDATE `administrateur` SET
        `statut` = "' . $newStatut . '"
        WHERE `administrateur`.`idAdministrateur` = "' . $this->idAdministrateur . '" ';
        $modif =  $bdd->prepare($requete);
        $modif->execute();
        return $this->statut;
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function getEtablissementList($bdd)
    {
        $requete = 'SELECT * FROM `etablissement` WHERE
        idAdministrateur = "' . $this->idAdministrateur . '" ';
        $getEtab =  $bdd->prepare($requete);
        return $getEtab;
    }

    public function getEtudiantsList($bdd)
    {
        $requete = ' SELECT `idEtudiant`, `matricule`,
        `grade`, `niveau`, `dateNaiss`, `lieuNaiss`,
        `userName`, `passWord`, `nom`, `prenom`,
        `numTel`, `email`, `statut`, `idEtablissement`,
        `idAdministrateur` FROM `etudiant` WHERE idAdministrateur = "' . $this->idAdministrateur . '" ';
        $getEtut =  $bdd->prepare($requete);
        return $getEtut;
    }

    //Methode ajout etudiant depuit un fichier CSV
    public function addNewEtudiant($bdd, $file, $idAdmin, $idEtab)
    {
        $valAjouter = "";
        $statut = 'offline';
        if (isset($_POST['ajouter'])) {
            if (isset($file)) {
                $handle = fopen($file["file"]["tmp_name"], "r");
                $flag = true;
                while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
                    if ($flag) {
                        $flag = false;
                        continue;
                    }
                    $data[4] = str_replace('/', '-', $data[4]);
                    $requete = 'INSERT INTO `etudiant`(`idEtudiant`,
                         `matricule`, `grade`, `niveau`,
                         `dateNaiss`, `lieuNaiss`, `userName`,
                         `passWord`, `nom`, `prenom`, `numTel`,
                         `email`, `statut`, `idEtablissement`,
                         `idAdministrateur`) VALUES 
                         ("' . $data[0] . '","' . $data[1] . '",
                          "' . $data[2] . '","' . $data[3] . '",
                          "' . $data[4] . '","' . $data[5] . '",
                          "' . $data[6] . '","' . $data[7] . '",
                          "' . $data[8] . '","' . $data[9] . '",
                          "' . $data[10] . '","' . $data[11] . '",
                          "' . $statut . '","' . $idEtab . '",
                          "' . $idAdmin . '")';
                    $addEtu =  $bdd->prepare($requete);
                    $addEtu->execute();
                }
                fclose($handle);
                $valAjouter = "Ajout effectuer avec succes !";
            }
        }
        return $valAjouter;
    }

    //Methode ajout Notes depuit un fichier CSV
    public function addNewNoteUniteEn($bdd, $file, $idAdmin, $idEtab)
    {
        $valAjouter = "";
        if (isset($_POST['ajouter'])) {
            if (isset($file)) {
                $handle = fopen($file["file"]["tmp_name"], "r");
                $flag = true;
                while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
                    if ($flag) {
                        $flag = false;
                        continue;
                    }
                    $requete = 'INSERT INTO `uniteenseignement` (
                            `idUniteEnseignement`, `categorie`,
                            `codeUniteEnseignement`, `libelle`,
                            `M`, `A`, `S`, `MEN`, `nbCredit`, `semestreUE`, `CC`,
                            `TPE`, `TP`, `EE`, `idEtablissement`, `matricule`, `idAdministrateur`)
                             VALUES ("", "' . $data[1] . '",
                              "' . $data[2] . '", "' . $data[3] . '",
                              "' . $data[4] . '", "' . $data[5] . '",
                              "' . $data[6] . '", "' . $data[7] . '",
                              "' . $data[8] . '", "' . $data[9] . '",
                              "' . $data[10] . '","' . $data[11] . '",
                              "' . $data[12] . '", "' . $data[13] . '",
                              "' . $idEtab . '", "' . $data[14] . '", "' . $idAdmin . '");';
                    $addNote =  $bdd->prepare($requete);
                    $addNote->execute();
                }
                fclose($handle);
                $valAjouter = "Ajout effectuer avec succes !";
            }
        }
        return $valAjouter;
    }

    //Methode ajout Payement depuit un fichier CSV
    public function addNewPayement($bdd, $file, $idAdmin)
    {
        $valAjouter = "";
        if (isset($_POST['ajouter'])) {
            if (isset($file)) {
                $handle = fopen($file["file"]["tmp_name"], "r");
                $flag = true;
                while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
                    if ($flag) {
                        $flag = false;
                        continue;
                    }
                    $requete = 'INSERT INTO `payement` (`idPayement`,
                        `codePayement`, `tranche`, `idAdministrateur`, 
                        `semestre`, `matricule`) VALUES ("",
                        "' . $data[0] . '", "' . $data[1] . '", 
                        "' . $idAdmin . '", "' . $data[2] . '",
                        "' . $data[3] . '")';
                    $addEtu =  $bdd->prepare($requete);
                    $addEtu->execute();
                }
                fclose($handle);
                $valAjouter = "Ajout effectuer avec succes !";
            }
        }
        return $valAjouter;
    }


    public function __destruct()
    {
    }
}
