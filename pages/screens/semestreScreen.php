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
    <script type="text/javascript" src="../../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="../../js/scriptJs.js"></script>
    <title>Dashboard</title>
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
                        $getSemestre = $_GET['semestre'];
                        $getNote = $etudiant->getNoteEtudiant(connexionDb(), $getSemestre, 'fondamentale');
                        $getNote->execute(); ?>
                        <!-- UNITE FONDA -->
                        <h4>UNITES D'ENSEIGNEMENT FONDAMENTALES</h4>

                        <!-- Table display unite -->
                        <?php while ($curentNote = $getNote->fetch()) {
                            $noteUe = Helper::builUE($curentNote); ?>
                            <table class="">
                                <thead>
                                    <tr class="bg-success">
                                        <th scope="col">PROCES VERBAL DE : <?= $noteUe->getCodeUniteEnseignement() ?> / <?= $noteUe->getNbCredit() ?> <?= $noteUe->getLibelle() ?></th>
                                    </tr>
                                </thead>
                                <br>
                                <tbody>
                                    <tr>
                                        <th>
                                            <!-- tableau sous element -->
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">CC</th>
                                                        <th scope="col">TPE</th>
                                                        <th scope="col">TP</th>
                                                        <th scope="col">EE</th>
                                                        <th scope="col">M</th>
                                                        <th scope="col">A</th>
                                                        <th scope="col">S</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th> <b><?= $noteUe->getCC() ?></b> </th>
                                                        <th> <b><?= $noteUe->getTPE() ?> </b></th>
                                                        <th> <b><?= $noteUe->getTP() ?></b> </th>
                                                        <th> <b><?= $noteUe->getEE() ?></b> </th>
                                                        <th> <b><?= $noteUe->getM() ?></b> </th>
                                                        <th> <b><?= $noteUe->getA() ?></b> </th>
                                                        <th> <b><?= $noteUe->getS() ?></b> </th>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- fin tableau sous element -->
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Fin Table display unite -->
                        <?php    }
                        ?>
                        <br>
                        <?php
                        $getNote = $etudiant->getNoteEtudiant(connexionDb(), $getSemestre, 'optionnele');
                        $getNote->execute(); ?>
                        <!-- UNITE OPTIONNELLE -->
                        <h4>UNITES D'ENSEIGNEMENT OPTIONNELLE</h4>
                        <!-- Table display unite -->
                        <?php while ($curentNote = $getNote->fetch()) {
                            $noteUe = Helper::builUE($curentNote); ?>
                            <table class="">
                                <thead>
                                    <tr class="bg-success">
                                        <th scope="col">PROCES VERBAL DE : <?= $noteUe->getCodeUniteEnseignement() ?> / <?= $noteUe->getNbCredit() ?> <?= $noteUe->getLibelle() ?></th>
                                    </tr>
                                </thead>
                                <tbody><br>
                                    <tr>
                                        <th>
                                            <!-- tableau sous element -->
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">CC</th>
                                                        <th scope="col">TPE</th>
                                                        <th scope="col">TP</th>
                                                        <th scope="col">EE</th>
                                                        <th scope="col">M</th>
                                                        <th scope="col">A</th>
                                                        <th scope="col">S</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th> <b><?= $noteUe->getCC() ?></b> </th>
                                                        <th> <b><?= $noteUe->getTPE() ?> </b></th>
                                                        <th> <b><?= $noteUe->getTP() ?></b> </th>
                                                        <th> <b><?= $noteUe->getEE() ?></b> </th>
                                                        <th> <b><?= $noteUe->getM() ?></b> </th>
                                                        <th> <b><?= $noteUe->getA() ?></b> </th>
                                                        <th> <b><?= $noteUe->getS() ?></b> </th>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- fin tableau sous element -->
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Fin Table display unite -->
                        <?php    }
                        ?>
                        <br> <?php
                                $getNote = $etudiant->getNoteEtudiant(connexionDb(), $getSemestre, 'complementaire');
                                $getNote->execute(); ?>
                        <!-- UNITE COMPLEMENTAIRES -->
                        <h4>UNITES D'ENSEIGNEMENT COMPLEMENTAIRES</h4>
                        <!-- Table display unite -->
                        <?php while ($curentNote = $getNote->fetch()) {
                            $noteUe = Helper::builUE($curentNote); ?>
                            <table class="">
                                <thead>
                                    <tr class="bg-success">
                                        <th scope="col">PROCES VERBAL DE : <?= $noteUe->getCodeUniteEnseignement() ?> / <?= $noteUe->getNbCredit() ?> <?= $noteUe->getLibelle() ?></th>
                                    </tr>
                                </thead>
                                <tbody><br>
                                    <tr>
                                        <th>
                                            <!-- tableau sous element -->
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">CC</th>
                                                        <th scope="col">TPE</th>
                                                        <th scope="col">TP</th>
                                                        <th scope="col">EE</th>
                                                        <th scope="col">M</th>
                                                        <th scope="col">A</th>
                                                        <th scope="col">S</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <th> <b><?= $noteUe->getCC() ?></b> </th>
                                                        <th> <b><?= $noteUe->getTPE() ?> </b></th>
                                                        <th> <b><?= $noteUe->getTP() ?></b> </th>
                                                        <th> <b><?= $noteUe->getEE() ?></b> </th>
                                                        <th> <b><?= $noteUe->getM() ?></b> </th>
                                                        <th> <b><?= $noteUe->getA() ?></b> </th>
                                                        <th> <b><?= $noteUe->getS() ?></b> </th>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!-- fin tableau sous element -->
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Fin Table display unite -->
                        <?php    }
                        ?>

                <?php }
                } ?>
            </div>
        </div>
    </div>
</body>

</html>