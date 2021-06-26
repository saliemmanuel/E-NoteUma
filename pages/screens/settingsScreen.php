<?php
session_start();
include("../controlers/helpersModelControler.php");
Helper::estConnecter($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/bootstrap.min.js"></script>
    <title>Dashboard</title>
</head>

<body>
    <div class="dashBoard">
        <?php include("../widgets/side-bar.php") ?>
        <div class="body-dashBord">
            <?php include("../widgets/header.php") ?>
            <div class="container">
                <br>
                <?php if (!empty($_SESSION['user'])) {
                    if ($_SESSION['user']['grade'] == 'etudiant') { ?>
                        <!-- Interface settings Etudiant -->
                        <?php $etudiant = Helper::buildUser($_SESSION); ?>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>DOMAINE DE L'ETABLISSEMENT :</strong>
                            <?= $etudiant->getDomaineEtablissement(connexionDb()) ?></p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>MENTION :</strong>
                            <?= $etudiant->getMention(connexionDb()) ?></p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>PARCOURS :</strong>
                            <?= $etudiant->getParcour(connexionDb()) ?></p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>CYCLE : </strong>
                            <?= $etudiant->getCycle(connexionDb()) ?> </p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>MATRICULE :</strong>
                            <?= $etudiant->getMatricule() ?></p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>NOM ET PRENOM :</strong>
                            <?= $etudiant->getNom() . " " . $etudiant->getPrenom() ?></p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>NIVEAU :</strong>
                            <?= $etudiant->getNiveau() ?></p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>DATE ET LIEU DE NAISSAINCE :</strong>
                            <?php echo $etudiant->getDateNaiss();
                            echo ' <strong> A </strong>' . $etudiant->getLieuNaiss() ?></p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>NUMEROS DE TELEPHONE :</strong>
                            <?= $etudiant->getNumTel() ?>&nbsp &nbsp <a href="">
                                <!-- <img src="../../img/edite.svg" alt=""> -->

                            </a> </p>
                        <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>EMAIL :</strong>
                            <?= $etudiant->getEmail() ?> &nbsp &nbsp <a href="">
                                <!-- <img src="../../img/edite.svg" alt=""> -->
                            </a>
                            </button> </p>
                        <!-- <p> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <strong>MOT DE PASSE :</strong> -->
                        <!-- &nbsp &nbsp <a href=""> -->
                        <!-- <img src="../../img/edite.svg" alt=""> -->
                        </a>
                        </button> </p>
                        <br>
                    <?php
                    }
                    if ($_SESSION['user']['grade'] == 'admin') { ?>
                        <!-- Interface settings admin -->
                        <?php $admin = Helper::buildUser($_SESSION); ?>
                        Admin
                    <?php }
                    if ($_SESSION['user']['grade'] == 'superAdmin') { ?>
                        <!-- Interface setting super Admin -->
                        <?php $superAdmin = Helper::buildUser($_SESSION); ?>
                        Super Admin
                <?php  }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>