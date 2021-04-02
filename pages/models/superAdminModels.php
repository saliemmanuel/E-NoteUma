<?php
class SuperAdministrateur extends Users{
    private $idSuperAdministrateur;
    private $grade;

    public function __construct(
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
        $this->idSuperAdministrateur = $idSuperAdministrateur;
        $this->grade = "superAdmin";
        $this->statut = $statut;
    }

    public function getIdSuperAdministrateur(){
        return $this->idSuperAdministrateur;
    }

    public function getGrade(){
        return $this->grade;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function setPassWord($newPassWord){
        $this->passWord = $newPassWord;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getNumTel(){
        return $this->numTel;
    }

    public function getEmail(){
        return $this->email;
    }



    public function getStatut($bdd){
        $requete = 'SELECT  `statut` FROM `administrateur`
        WHERE id = "'.$this->id.'"';
         $getStat =  $bdd->prepare($requete);
         $getStat->execute();
         if ($res = $getStat->fetch()) {
             $this->statut = $res['statut'];
         }
        return $this->statut;
    }
    
    public function setStatutSuperAdmin($bdd, $newStatut){
        $requete = 'UPDATE `superadministrateur`
        SET `statut` = "'.$newStatut.'"  WHERE
        `superadministrateur`.`idSuperAdministrateur` =
        "'.$this->idSuperAdministrateur.'" ';
        $modif =  $bdd->prepare($requete);
        $modif->execute();
    return $this->statut;
}

    public function getAdminUserList($bdd){
        $requete = "SELECT * FROM `administrateur`
        WHERE grade = 'admin'";
        $getAdm =  $bdd->prepare($requete);
        return $getAdm;
    }

    public function getEtablissementList($bdd){
        $requete ='SELECT * FROM `etablissement`';
        $getEtab =  $bdd->prepare($requete);
        return $getEtab;
    }

    public function addNewAdministrateur($bdd, $newAdmin ){
        $statut =  $newAdmin->getUserName() != null ? 'offline' : null;
        $grade =   $newAdmin->getUserName() != null ? 'admin' : null;
        $requete = 'INSERT INTO `administrateur` (`idAdministrateur`,
        `grade`, `userName`, `passWord`, `nom`, `prenom`, `numTel`,
        `email`, `statut`, `idSuperAdministrateur`) VALUES ( "",
        "'.$grade.'",  "'.$newAdmin->getUserName().'",
        "'.$newAdmin->getPassWord().'",
        "'.$newAdmin->getNom().'", "'.$newAdmin->getPrenom().'", 
        "'.$newAdmin->getNumTel().'", "'.$newAdmin->getEmail().'",
        "'.$statut.'","'.$this->idSuperAdministrateur.'")';
        
            $addAdm =  $bdd->prepare($requete);
            $addAdm->execute();
            $valAjouter = "<strong>Vous avez ajouter </strong></br>".'
            <strong>UserName : </strong>'.$newAdmin->getUserName().'.</br>
            <strong>Nom : </strong>'.$newAdmin->getNom().'.</br>
            <strong>Prenom : </strong>'.$newAdmin->getPrenom().'.</br>
            <strong>Telephone : </strong>'.$newAdmin->getNumTel().'.</br>
            <strong>Email : </strong>'.$newAdmin->getEmail().'.</br>';
            return $valAjouter;
    }

    public function addNewEtablissement($bdd, $newEtab){
        $requete = 'INSERT INTO `etablissement`
        (`idEtablissement`, `domaineEtablissement`,
        `mention`, `parcours`, `cycles`,
        `idSuperAdministrateur`,
        `idAdministrateur`) VALUES
        ("'.$newEtab->getIdEtablissement().'",
        "'.$newEtab->getDomaineEtablissement().'",
        "'.$newEtab->getMention().'",
        "'.$newEtab->getParcours().'",
        "'.$newEtab->getCycles().'",
        "'.$newEtab->getIdSuperAdministrateur().'",
        "'.$newEtab->getIdAdministrateur().'")';
        $addEtab =  $bdd->prepare($requete);
        $addEtab->execute();
        $valAjouter = "<strong>Vous avez ajouter </strong></br>".'
        <strong>DomaineEtablissement : </strong>'.$newEtab->getDomaineEtablissement().'.</br>
        <strong>Mention : </strong>'.$newEtab->getMention().'.</br>
        <strong>Parcour : </strong>'.$newEtab->getParcours().'.</br>
        <strong>Cycle : </strong>'.$newEtab->getCycles().'';
        return $valAjouter;
    }
    public function __destruct(){
        
    }
}
