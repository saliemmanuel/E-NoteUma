<?php
session_start();
include("../controlers/helpersModelControler.php");
Helper::estConnecter($_SESSION);
$admin = Helper::buildUser($_SESSION);
$valAjouter = $admin->addNewPayement(connexionDb(), $_FILES, $admin->getIdAdministrateur());
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/bootstrap.min.js"></script>
    <title>Dashboard Admin </title>
</head>

<body>
    <div class="dashBoard">
        <?php include("../widgets/side-bar.php") ?>
        <div class="body-dashBord">
            <?php include("../widgets/header.php") ?>
            <div class="container">
                <br>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <h4>Ajout Payements Selectionner un fichier au format '.CSV'</h4><br>
                        <input type="file" name="file" required>
                    </div><br>
                    <button type="submit" class="btn btn-lg btn-secondary" name="ajouter">Ajouter</button>
                    <button type="reset" class="btn btn-lg btn-danger">Annuler</button>
                </form>
                <br> <br>
                <?php if (!empty($valAjouter)) { ?>
                    <div class="alert alert-success">
                        <?= $valAjouter ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>