<?php
session_start();
include("../controlers/helpersModelControler.php");
Helper::estConnecter($_SESSION);
if (isset($_POST['retour'])) {
    header('location:addScreen.php');
}
$valAjouter = Helper::addNewAdministrateurs($_POST);
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

                <div class="container-addNewAdmin">
                    <!-- <img src="../img/login-img.png" width="550px"> -->
                    <form action="" method="POST">

                        <h3>AJOUTER UN ADMINISTRATEUR</h3>
                        <div>Nom d'utilisateur *</div>
                        <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="userName" required>

                        <div>Mot de Passe *</div>
                        <input type="password" class="form-control" placeholder="Mot de Passe" name="passWord" required>

                        <div>Confirmer mot de passe *</div>
                        <input type="password" class="form-control" placeholder="Confirmer mot de passe" name="passWord2"required>

                        <div>Nom *</div>
                        <input type="text" class="form-control" placeholder="Nom" name="nom" required>

                        <div>Prénom *</div>
                        <input type="text" class="form-control" placeholder="Prénom" name="prenom" required>

                        <div>Telephone *</div>
                        <input type="number" class="form-control" placeholder="Telephone" name="numTel" required>

                        <div>Email *</div>
                        <input type="email" class="form-control" placeholder="Email" name="email" required>

                        <div>Grade </div>
                        <input class="form-control" placeholder="admin" name="grade" disabled>

                        <div>Statut</div>
                        <input class="form-control" placeholder="offline" name="statut" disabled>

                        <div class="form-button">
                            <button type="submit" class="btn btn-lg btn-secondary" name="ajouter">Ajouter</button>
                            <button type="reset" class="btn btn-lg btn-danger">Annuler</button>
                        </div>
                        <br>
                        <?php if (!empty($valAjouter)) { ?>
                            <div class="alert alert-success">
                                <?= $valAjouter ?>
                            </div>
                        <?php } ?>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>