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

                <?php if (!empty($_SESSION['user'])) {

                    if ($_SESSION['user']['grade'] == 'admin') { ?>
                    <br>
                        <!-- Add screen admin -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success ">
                                    <a href="addNewEtudiantScreen.php?mention=<?= $_GET['mention'] ?>&idEtablissement=<?= $_GET['idEtablissement'] ?>">
                                        <div class="inner">
                                            <img src="../../img/add.svg" alt="">
                                            <p>AJOUTER ETUDIANT</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success ">
                                    <a href="../screens/addNewNoteScreen.php?mention=<?= $_GET['mention'] ?>&idEtablissement=<?= $_GET['idEtablissement'] ?>">
                                        <div class="inner">
                                            <img src="../../img/add.svg" alt="">
                                            <p>AJOUTER NOTE</p>
                                        </div>
                                    </a>
                                </div>
                            </div>


                    <?php  }
                    if ($_SESSION['user']['grade'] == 'superadmin') {
                    ?>
                        <!-- Add screen super admin -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success ">
                                    <a href="addNewAdministrateurScreen.php">
                                        <div class="inner">
                                            <img src="../../img/add.svg" alt="">
                                            <p>AJOUTER UN ADMINISTRATEUR</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success ">
                                    <a href="addNewEtablissementScreen.php">
                                        <div class="inner">
                                            <img src="../../img/add.svg" alt="">
                                            <p>AJOUTER UN ETABLISSEMENT</p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div> <?php
                            }
                        }
                                ?>

            </div>
        </div>
    </div>
</body>

</html>