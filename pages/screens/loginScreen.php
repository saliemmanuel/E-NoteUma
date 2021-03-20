<?php
session_start();
include("../controlers/helpersModelControler.php");
if (isset($_POST['matricule']) && isset($_POST['pass'])) {
    $matricule = $_POST['matricule'];
    $pass  = $_POST['pass'];
    $errorLogin = Helper::connexionEutidiant($matricule, $pass);
    $errorLogin = Helper::connexionAdministrateur($matricule, $pass);
    $errorLogin = Helper::connexionSuperAdministrateur($matricule, $pass);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/bootstrap.min.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="dott">
        <div class="login-page">
            <form action="" method="POST">
                <div class="text-connexion">Connexion</div>
                <div class="email-imput">
                    <input type="text" class="form-control" placeholder="Matricule" name="matricule" required>
                </div>
                <div class="password-input">
                    <input type="password" class="form-control" placeholder="Mot de Passe" name="pass" required>
                </div><br>
                <div class="check-box">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label">rester connecter</label>
                </div>
                <div class="form-button">
                    <button type="submit" class="btn btn-lg btn-secondary ">Connexion</button>
                    <button type="reset" class="btn btn-lg btn-danger ">Annuler</button>
                </div><br>
                <?php if (!empty($errorLogin)) { ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Erreur !!! :</strong> <?= $errorLogin ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>

</body>

</html>