<?php
session_start();

include("../controlers/helpersModelControler.php");
if (isset($_POST["generer"])) {
    Helper::estConnecter($_SESSION);
    $etudiant = Helper::buildUser($_SESSION);
    Helper::genererProfilAccademique(
        $etudiant->getDomaineEtablissement(connexionDb()),
        $etudiant->getNom(),
        $etudiant->getPrenom(),
        $etudiant->getMatricule(),
        $etudiant->getDateNaiss(),
        $etudiant->getLieuNaiss(),
        $etudiant->getMention(connexionDb()),
        $etudiant->getNiveau(),
        $etudiant->getParcour(connexionDb()),
        $etudiant->getCycle(connexionDb()),
        $_GET['semestre1'],
        $_GET['semestre2']
    );
}

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
                <form action="" method="post">
                    <h3>Générer votre profil accademique du Semestre : <?= $_GET['semestre1'] ?> et du Semestre : <?= $_GET['semestre2'] ?></h3>
                    <br> <button type="submit" name="generer" class="btn  btn-secondary btn-lg">Cliquer ici pour generer</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>