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

    <title>Dashboard Admin </title>
</head>

<body>
    <div class="dashBoard">
        <?php include("../widgets/side-bar.php") ?>
        <div class="body-dashBord">
            <?php include("../widgets/header.php") ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info ">
                            <a href="updateAdministrateurScreen.php">
                                <div class="inner">
                                    <img src="../../img/update.svg" alt="">
                                    <p>METRE A JOURS UN ADMINISTRATEUR</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info ">
                            <a href="updateEtablissementScreen.php">
                                <div class="inner">
                                    <img src="../../img/update.svg" alt="">
                                    <p>METRE A JOURS UN ETABLISSEMENT</p>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</body>

</html>