<div class="panel" id="table-admin">
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
                </tr>
            </thead>
            <tbody>
                <?php
                $getAdminList = $superAdmin->getAdminUserList(connexionDb());
                $getAdminList->execute();
                while ($admin = $getAdminList->fetch()) {
                    static $i = 1;
                ?>
                    <tr class="success" >
                        <td><?php echo $i ?> </td>
                        <td><?php echo $admin['userName'] ?> </td>
                        <td><?php echo $admin['nom'];
                            echo $admin['prenom']; ?> </td>
                        <td><?php echo $admin['numTel'] ?> </td>
                        <td><?php echo $admin['email'] ?> </td>
                        <td><?php echo $admin['grade'] ?> </td>
                        <td>
                            <div class="<?php echo $admin['statut']
                                            == 'online' ? 'bg-success' : 'bg-danger' ?>">
                                <?php echo $admin['statut'] ?>
                            </div>
                        </td>
                       
                    </tr>
                <?php $i = $i + 1;
                } ?>
            </tbody>
        </table>

    </div>
</div>
