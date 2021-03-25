<?php
session_start();
error_reporting(0);
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
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/scriptJs.js"></script>
    <title>Dashboard Admin </title>
</head>

<body>
    <div class="dashBoard">
        <?php include("../widgets/side-bar.php") ?>
        <div class="body-dashBord">
            <?php include("../widgets/header.php") ?>
            <div class="container">
                <?php if (!empty($_SESSION['user'])) {
                    if ($_SESSION['user']['grade'] == 'etudiant') {
                        $etudiant = Helper::buildUser($_SESSION);
                        $etudiant->setStatut(connexionDb(), 'online'); ?>
                        <!-- Dashbord Etudiant -->
                        <?php include('../widgets/informationEtudiant.php'); ?>
                    <?php }
                    if ($_SESSION['user']['grade'] == 'admin') { ?>
                        <!-- Code pour DASHBORD ADMIN -->
                        <?php $admin = Helper::buildUser($_SESSION);  ?>
                        <?php $admin->setStatutAdmin(connexionDb(), 'online'); ?>
                        <?php include('../widgets/table-listeEtablissement.php'); ?>
                        <?php include('../widgets/adminEtudiantsList.php'); ?>
                    <?php } ?>
                    <?php if ($_SESSION['user']['grade'] == 'superadmin') { ?>
                        <!-- code pour DASHBORD SUPER ADMIN -->
                        <?php $superAdmin = Helper::buildUser($_SESSION);
                        $superAdmin->setStatutSuperAdmin(connexionDb(), 'online'); ?>
                        <?php include('../widgets/dashMenuItem.php'); ?>
                        <?php include('../widgets/table-listeAdmin.php'); ?>
                        <?php include('../widgets/table-listeEtablissement.php'); ?>
                <?php   }
                } ?>
            </div>
        </div>
    </div>

</body>

</html>