<?php
session_start();
include("../controlers/helpersModelControler.php");
Helper::estConnecter($_SESSION);
$superAdmin = Helper::buildUser($_SESSION);
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
                <div class="panel">
                    <div class="panel-heading"><strong>LISTE DES ADMINISTRATEURS</strong></div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>NOM D'UTILISATEUR</th>
                                    <th>NOM ET PRENOM</th>
                                    <th>TELEPHONE</th>
                                    <th>EMAIL</th>
                                    <th>GRADE</th>
                                    <th>STATUS</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getAdminList = $superAdmin->getAdminUserList(connexionDb());
                                $getAdminList->execute();
                                while ($admin = $getAdminList->fetch()) {
                                    static $i = 1;
                                ?>
                                    <tr class="success">
                                        <td><?php echo $i ?> </td>
                                        <td><input type="text" class="form-control" name="" placeholder="<?php echo $admin['userName'] ?>"> </td>
                                        <td>
                                            <input type="text" class="form-control" name="" placeholder="<?php echo $admin['nom'];
                                                                                                            echo $admin['prenom']; ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="" placeholder=" <?php echo $admin['numTel'] ?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="" placeholder=" <?php echo $admin['email'] ?>">
                                        </td>
                                        <td>
                                            <?php echo $admin['grade'] ?> </td>
                                        <td>
                                            <div class="<?php echo $admin['statut']
                                                            == 'online' ? 'bg-success' : 'bg-danger' ?>">
                                                <?php echo $admin['statut'] ?>
                                            </div>
                                        </td>
                                        <td>
                                            <a href=""><img src="../../img/update_blue.svg" alt=""></a>
                                            &nbsp &nbsp
                                            <a href=""><img src="../../img/delete_red.svg" alt=""></a>
                                        </td>
                                    </tr>
                                <?php $i = $i + 1;
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>