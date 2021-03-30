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

                        <h3>AJOUTER UN ETABLISSEMENT</h3>
                        <div>Domaine Etablissement *</div>
                        <input type="text" class="form-control" placeholder="Domaine Etablissement (exemple : SCIENCES ET TECHNOLOGIES" name="domaineEtablissement" required>

                        <div>Mention *</div>
                        <input type="text" class="form-control" placeholder="Mention (exemple: INFORMATIQUE(IN))" name="mention" required>

                        <div>Parcour *</div>
                        <input type="text" class="form-control" placeholder="Parcour (exemple: INFORMATIQUE(IN))" name="parcour" required>

                        <div>cycle *</div>
                        <input type="text" class="form-control" placeholder="cycle (exemple: LICENCE)" name="cycle" required>

                        <div>Administrateur à la charge *</div>
                        <br>

                        <?php if (isset($_POST["ajouter"])) {
                            if (empty($_POST["admin"])) { ?>
                                <div class="alert alert-danger">
                                    <?= "<strong>Erreur!!</strong> Selectionner un Administrateur SVP !!!." ?> </div>
                        <?php } else {
                                if (isset($_POST["admin"])) {
                                    $valAjouter = Helper::addNewEtablissements($_POST);
                                }
                            }
                        }
                        ?>
                        <?php
                        $superAdmin = Helper::buildUser($_SESSION);
                        $getAdminList = $superAdmin->getAdminUserList(connexionDb());
                        $getAdminList->execute();
                        ?>
                        <select name="admin" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" required>
                            <option selected disabled> --- Sélectionner un administrateur --- </option>
                            <?php while ($admin = $getAdminList->fetch()) { ?>
                                <option value="<?php echo $admin['idAdministrateur'] ?>"><?php echo $admin['nom']; echo $admin['prenom']; ?></option>
                            <?php } ?>
                        </select>
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