<div class="panel" id="#etudiant-inscrit">
    <div class="panel-heading">ETUDIANTS INSCRIT</div>
    <div class="panel-body">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>MATRICULE</th>
                    <th>NOM ET PRENOM</th>
                    <th>NIVEAU</th>
                    <th>DATE ET LIEU</th>
                    <th>TELEPHONE</th>
                    <th>EMAIL</th>
                    <th>PARCOURS</th>
                    <th>CYCLES</th>
                    <th>PAYEMENT</th>
                    <th>STATUS</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $getEtudiantList = $admin->getEtudiantsList(connexionDb());
                $getEtudiantList->execute();
                while ($etudiant = $getEtudiantList->fetch()) {
                    $currentEtudiant = Helper::etudiat($etudiant);
                    static $i = 1;
                ?>

                    <tr class="table-bordered success">
                        <td><?php echo $i ?> </td>
                        <td><?php echo $currentEtudiant->getMatricule() ?> </td>
                        <td><?php echo $currentEtudiant->getNom();
                            echo " " . $currentEtudiant->getPrenom(); ?> </td>
                        <td><?php echo $currentEtudiant->getNiveau() ?> </td>
                        <td><?php echo $currentEtudiant->getDateNaiss();
                            echo " A " . $currentEtudiant->getLieuNaiss(); ?> </td>
                        <td><?php echo $currentEtudiant->getNumTel() ?> </td>
                        <td><?php echo $currentEtudiant->getEmail() ?> </td>
                        <td><?php echo $currentEtudiant->getParcour(connexionDb()) ?> </td>
                        <td><?php echo $currentEtudiant->getCycle(connexionDb()) ?> </td>
                        <td>
                            <!-- sous tableau  payement -->
                            <table class="table-bordered">
                                <thead>
                                    <?php $payement = $currentEtudiant->getPayement(connexionDb()) ?>
                                    <tr>
                                        <th><strong>TRANC </strong></th>
                                        <th><strong>&nbsp SEMES </strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <div class=<?= $payement->getTranche() == null ? "bg-danger" : "bg-success" ?>><?= $payement->getTranche() == null ? " #!VALEUR " : $payement->getTranche() ?> </div>
                                        </th>
                                        <th>
                                            <div class=<?= $payement->getSemestre() == null ? "bg-danger" : "bg-success" ?>><?= $payement->getSemestre() == null ? " #!VALEUR " : $payement->getSemestre() ?></div>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- fin sous tableau payement -->
                        </td>
                        <td>
                            <div class="<?php echo $currentEtudiant->getStatut(connexionDb())
                                            == 'online' ? 'bg-success' : 'bg-danger' ?>">
                                <?php echo $currentEtudiant->getStatut(connexionDb()) ?>
                            </div>
                        </td>

                    </tr>
                <?php $i = $i + 1;
                } ?>
            </tbody>
        </table>

    </div>
</div>