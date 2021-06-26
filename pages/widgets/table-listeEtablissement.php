<?php if (!empty($_SESSION['user'])) {
    if ($_SESSION['user']['grade'] == 'admin') { ?>
        <div class="panel">
            <div class="panel-heading">ETABLISSEMENTS A VOTRE CHARGE</div>
            <div class="panel-body">
                <?php $getEtab = $admin->getEtablissementList(connexionDb());
                $getEtab->execute();
                while ($etab = $getEtab->fetch()) {
                    static $i = 1; ?>
                    <div class="col-lg-3 col-6">
                        <div class="small-box <?= $i % 2 == 0 ? "bg-info" : "bg-success" ?> ">
                            <a href="addScreen.php?mention=<?= $etab['mention'] ?>&idEtablissement=<?= $etab['idEtablissement'] ?>">
                                <div class="inner">
                                    <img src="../../img/domain_white.svg" alt="">
                                    <p><?php echo $etab['mention'] ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php $i++;
                } ?>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">PAYEMENTS</div>
            <div class="panel-body">
                <div class="row">
                <div class="col-lg-3 col-6">
                        <div class="small-box bg-success ">
                            <a href="../screens/addNewPayementScreen.php">
                                <div class="inner">
                                    <img src="../../img/add.svg" alt="">
                                    <p>AJOUTER PAYEMENTS</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box " style="background-color: grey;">
                                <div class="inner">
                                    <img src="../../img/update.svg" alt="">
                                    <p>METTRE A JOURS PAYEMENTS</p>
                                </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box " style="background-color: grey;">
                                <div class="inner">
                                    <img src="../../img/librar_white.svg" alt="">
                                    <p>AFFICHER PAYEMENTS</p>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box " style="background-color: grey;">
                           
                                <div class="inner">
                                    <img src="../../img/delete.svg" alt="">
                                    <p> ANNULER PAYEMENTS</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php  }
    if ($_SESSION['user']['grade'] == 'superadmin') {
        //Table view for Super Admin
    ?>
        <div class="panel" id="list-etablissement">
            <div class="panel-heading">LISTE DES ETABLISSEMENTS</div>
            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>DOMAINE ETABLISSEMENT</th>
                            <th>MENTION</th>
                            <th>PARCOURS</th>
                            <th>CYCLE</th>
                            <th>NOM ADMINISTRATEUR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getEtabList = $superAdmin->getEtablissementList(connexionDb());
                        $getEtabList->execute();
                        while ($etab = $getEtabList->fetch()) {
                            $etablisement = Helper::builEtablissement($etab);
                            
                            static $i = 1;
                        ?>
                            <tr class="success">
                                <td><?php echo $i ?> </td>
                                <td><?php echo $etablisement->getDomaineEtablissement() ?> </td>
                                <td><?php echo $etablisement->getMention() ?> </td>
                                <td><?php echo $etablisement->getParcours() ?> </td>
                                <td><?php echo $etablisement->getCycles() ?> </td>
                                <td><?=$etablisement->getNomAdministrateur(connexionDb())?> </td>
                            </tr>
                        <?php $i = $i + 1;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div> <?php
            }
        } ?>