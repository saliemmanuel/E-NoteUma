<?php
include("../controlers/connexiondb.php");
include("../models/etudiantModels.php");
include("../models/adminModels.php");
include("../models/superAdminModels.php");
include("../models/etablissementModels.php");
include("../models/payementModels.php");
include("../models/uniteEnseignementModels.php");
include("../models/profilGenerator.php");

class Helper
{

    //Methode gestion connexion Etudiant
    public static function connexionEutidiant($userMatricule, $userPass)
    {
        $bdd = connexionDb();
        $requete = 'SELECT `idEtudiant`,
         `grade`, `matricule`, `niveau`, `dateNaiss`,
         `lieuNaiss`, `userName`,
         `nom`, `prenom`, `numTel`, `email`, 
         `statut`, `idEtablissement`, `idAdministrateur` FROM
         `etudiant` WHERE `matricule` = "' . $userMatricule . '"
          AND `passWord` = "' . $userPass . '"';
        $connexion =  $bdd->prepare($requete);
        $connexion->execute();
        if ($res = $connexion->fetch()) {
            $_SESSION['user'] = $res;
            $errorLogin  = "";
            header('location:../screens/dashbordScreen.php', true);
        } else {
            // Message d'erreur de connexion
            $errorLogin =  $_SESSION['error-connexion'] = "lors de la connexion.";
        }
        return $errorLogin;
    }


    //Methode gestion connexion Admin / Super Admin
    public static  function connexionAdministrateur($userName, $userPass)
    {
        $bdd = connexionDb();
        $requete = 'SELECT `idAdministrateur`, `grade`,
        `userName`, `passWord`, `nom`,
        `prenom`, `numTel`, `email`, `statut`,
        `idSuperAdministrateur` FROM `administrateur`
         WHERE userName = "' . $userName . '" 
         AND passWord = "' . $userPass . '"';
        $connexion =  $bdd->prepare($requete);
        $connexion->execute();
        if ($res = $connexion->fetch()) {
            $_SESSION['user'] = $res;
            $errorLogin  = "";
            if ($res['grade'] == 'admin') {
                header("location:../screens/dashbordScreen.php", true);
            }
        } else {
            // Message d'erreur de connexion
            $errorLogin =  $_SESSION['error-connexion'] = "lors de la connexion.";
        }
        return $errorLogin;
    }

    //Methode gestion connexion Admin / Super Admin
    public static  function connexionSuperAdministrateur($userName, $userPass)
    {
        $bdd = connexionDb();
        $requete = 'SELECT `idSuperAdministrateur`, `grade`,
        `userName`, `passWord`, `nom`, `prenom`, `numTel`,
        `email`, `statut` FROM `superadministrateur`
         WHERE userName = "' . $userName . '" 
          AND passWord = "' . $userPass . '"';
        $connexion =  $bdd->prepare($requete);
        $connexion->execute();
        if ($res = $connexion->fetch()) {
            $_SESSION['user'] = $res;
            $errorLogin  = "";
            if ($res['grade'] == 'superadmin') {
                header("location:../screens/dashbordScreen.php", true);
            }
        } else {
            // Message d'erreur de connexion
            $errorLogin =  $_SESSION['error-connexion'] = "lors de la connexion.";
        }
        return $errorLogin;
    }

    //Methode builde permet de construire facilement les instances des utilisateurs
    public static function buildUser($sessionUser)
    {
        if (!empty($sessionUser['user'])) {
            if ($sessionUser['user']['grade'] == 'etudiant') {
                $user = new Etudiant(
                    $sessionUser['user']['idEtudiant'],
                    $sessionUser['user']['matricule'],
                    $sessionUser['user']['niveau'],
                    $sessionUser['user']['dateNaiss'],
                    $sessionUser['user']['lieuNaiss'],
                    $sessionUser['user']['userName'],
                    "",
                    $sessionUser['user']['nom'],
                    $sessionUser['user']['prenom'],
                    $sessionUser['user']['numTel'],
                    $sessionUser['user']['email'],
                    $sessionUser['user']['statut'],
                    $sessionUser['user']['idEtablissement'],
                    $sessionUser['user']['idAdministrateur']
                );
            } else
            if ($sessionUser['user']['grade'] == 'admin') {
                $user = new Administrateur(
                    $sessionUser['user']['idAdministrateur'],
                    $sessionUser['user']['idSuperAdministrateur'],
                    $sessionUser['user']['userName'],
                    "",
                    $sessionUser['user']['nom'],
                    $sessionUser['user']['prenom'],
                    $sessionUser['user']['numTel'],
                    $sessionUser['user']['email'],
                    $sessionUser['user']['statut']
                );
            } else
            if ($sessionUser['user']['grade'] == 'superadmin') {
                $user = new SuperAdministrateur(
                    $sessionUser['user']['idSuperAdministrateur'],
                    $sessionUser['user']['userName'],
                    "",
                    $sessionUser['user']['nom'],
                    $sessionUser['user']['prenom'],
                    $sessionUser['user']['numTel'],
                    $sessionUser['user']['grade'],
                    $sessionUser['user']['email'],
                    $sessionUser['user']['statut']
                );
            }
        }
        return $user;
    }

    //Methode verification authetification de connexion 
    public static function estConnecter($sessionUser)
    {
        if (!isset($sessionUser['user'])) {
            //Contrôle de l'authentification de l'etudiant
            if ($sessionUser['user']['grade'] == 'etudiant') {
                header('location:../screens/loginScreen.php', true);
                exit();
            }
            //Contrôle de l'authentification de l'Administrateur
            if ($sessionUser['user']['grade'] == 'admin') {
                header('location:../screens/loginScreen.php', true);
                exit();
            }
            //Contrôle de l'authentification de super Administrateur
            if ($sessionUser['user']['grade'] == 'superadmin') {
                header('location:../screens/loginScreen.php', true);
                exit();
            }
        }
    }

    //Methode gestion deconnection 
    public static function seDeconnecter($sessionUser)
    {
        $user = Helper::buildUser($sessionUser);
        if (!empty($sessionUser['user'])) {
            if ($sessionUser['user']['grade'] == 'etudiant') {
                //Ici la gestion offline / Online
                $user->setStatut(connexionDb(), 'offline');
                //Déconnection
                session_destroy();
                header('location:../screens/loginScreen.php', true);
            }
            if ($sessionUser['user']['grade'] == 'admin') {
                //Ici la gestion offline / online
                $user->setStatutAdmin(connexionDb(), 'offline');
                //Déconnection
                session_destroy();
                header('location:../screens/loginScreen.php', true);
            }
            if ($sessionUser['user']['grade'] == 'superadmin') {
                //Ici la gestion offline / online
                $user->setStatutSuperAdmin(connexionDb(), 'offline');
                //Déconnection
                session_destroy();
                header('location:../screens/loginScreen.php', true);
            }
        }
    }

    public static function addNewAdministrateurs($post)
    {
        $valAjouter = '';
        // if (isset($post['retour'])) {
        //     header('location:addScreen.php');
        // }
        if (isset($post['ajouter'])) {
            $userName = isset($_POST['userName']) ? $_POST['userName'] : null;
            $passWord = isset($_POST['passWord']) ? $_POST['passWord'] : null;
            $passWord2 = isset($_POST['passWord2']) ? $_POST['passWord2'] : '';
            $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
            $numTel = isset($_POST['numTel']) ? $_POST['numTel'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            if ($passWord == $passWord2) {
                $superAdmin = Helper::buildUser($_SESSION);
                $newAdmin = new Administrateur(
                    "",
                    $superAdmin->getIdSuperAdministrateur(),
                    $userName,
                    $passWord2,
                    $nom,
                    $prenom,
                    $numTel,
                    $email,
                    'offline'
                );
                $valAjouter = $superAdmin->addNewAdministrateur(connexionDb(), $newAdmin);
            }
            return $valAjouter;
        }
    }

    public static function addNewEtablissements($post)
    {
        $valAjouter = '';
        // if (isset($post['retour'])) {
        //     header('location:addScreen.php');
        // }
        if (isset($post['ajouter'])) {
            $domaineEtablissement = isset($_POST['domaineEtablissement']) ? $_POST['domaineEtablissement'] : null;
            $mention = isset($_POST['mention']) ? $_POST['mention'] : null;
            $parcours = isset($_POST['parcour']) ? $_POST['parcour'] : null;
            $cycles = isset($_POST['cycle']) ? $_POST['cycle'] : null;
            $idAdministrateurALaCharge  = isset($_POST["admin"]) ? $_POST["admin"] : null;
            $newEtab = "";
            $superAdmin = Helper::buildUser($_SESSION);
            $newEtab = new Etablissement(
                '',
                $domaineEtablissement,
                $mention,
                $parcours,
                $cycles,
                $superAdmin->getIdSuperAdministrateur(),
                $idAdministrateurALaCharge
            );

            $valAjouter = $superAdmin->addNewEtablissement(connexionDb(), $newEtab);
        }

        return $valAjouter;
    }

    //Methode spécifique pour la construction d'un etudiant lors
    //de l'ajout par L'admin
    public static function etudiat($curentEtudiant)
    {
        $etudiant = new Etudiant(
            $curentEtudiant["idEtudiant"],
            $curentEtudiant["matricule"],
            $curentEtudiant["niveau"],
            $curentEtudiant["dateNaiss"],
            $curentEtudiant["lieuNaiss"],
            $curentEtudiant["userName"],
            $curentEtudiant["passWord"],
            $curentEtudiant["nom"],
            $curentEtudiant["prenom"],
            $curentEtudiant["numTel"],
            $curentEtudiant["email"],
            $curentEtudiant["statut"],
            $curentEtudiant["idEtablissement"],
            $curentEtudiant["idAdministrateur"]
        );
        return $etudiant;
    }

    public static function builUE($note)
    {

        $noteUE = new UniteEnseignement(
            $note['idUniteEnseignement'],
            $note['categorie'],
            $note['codeUniteEnseignement'],
            $note['libelle'],
            $note['M'],
            $note['A'],
            $note['S'],
            $note['MEN'],
            $note['nbCredit'],
            $note['semestreUE'],
            $note['CC'],
            $note['TPE'],
            $note['TP'],
            $note['EE'],
            $note['idEtablissement'],
            $note['matricule'],
            $note['idAdministrateur']
        );
        return $noteUE;
    }

    //MEthode construction d'un etablissement
    public static function  builEtablissement($etab)
    {
        $etablissement = new Etablissement(
            $etab['idEtablissement'],
            $etab['domaineEtablissement'],
            $etab['mention'],
            $etab['parcours'],
            $etab['cycles'],
            $etab['idSuperAdministrateur'],
            $etab['idAdministrateur']
        );
        return $etablissement;
    }

    public static function genererProfilAccademique(
        $domaineEtablissement,
        $nom,
        $prenom,
        $matricule,
        $dateNaiss,
        $lieuNaiss,
        $mention,
        $niveau,
        $parcours,
        $cycles,
        $semestre1,
        $semestre2
    ) {
        $php2 = new PDFGenerator();

        $php2->bodyPDF(
            $domaineEtablissement,
            $nom,
            $prenom,
            $matricule,
            $dateNaiss,
            $lieuNaiss,
            $mention,
            $niveau,
            $parcours,
            $cycles,
            connexionDb(),
            $semestre1,
            $semestre2
        );
    }
}
