<div class="side-bar">
    <div class="header-side-bar"><a class="nav-link pl-0" href="../screens/dashbordScreen.php"><strong>E-Note Uma</strong></a></div>
    <div class="side-bar-content">
        <?php if (!empty($_SESSION['user'])) {
            //Section side-bar Etudiant
            if ($_SESSION['user']['grade'] == 'etudiant') {

        ?>
                <a class="nav-link pl-0" href="../screens/dashbordScreen.php"><img src="../../img/home2.svg" alt=""> Acceuil</a>
                <a class="nav-link pl-0" href="#"><img src="../../img/librar.svg" alt=""> Résultats</a>
                <div class="content-Admin-menu">
                    <ul>
                        <li>
                            <a href="../screens/semestreScreen.php?semestre=S1">Semestre 1</a>
                        </li>
                        <li>
                            <a href="../screens/semestreScreen.php?semestre=S2">Semestre 2</a>
                        </li>
                        <li>
                            <a href="../screens/semestreScreen.php?semestre=S3">Semestre 3</a>
                        </li>
                        <li>
                            <a href="../screens/semestreScreen.php?semestre=S4">Semestre 4</a>
                        </li>
                        <li>
                            <a href="../screens/semestreScreen.php?semestre=S5">Semestre 5</a>
                        </li>
                        <li>
                            <a href="../screens/semestreScreen.php?semestre=S6">Semestre 6</a>
                        </li>
                    </ul>
                </div>
                <a class="nav-link pl-0" href="#"><img src="../../img/sticky.svg" alt=""> Profil académique</a>
                <div class="content-Admin-menu">

                    <ul>
                        <li>
                            <a href="../screens/profilAccademiqueScreen.php?semestre1=S1&semestre2=S2">Niveau I</a>
                        </li>
                        <li>
                            <a href="../screens/profilAccademiqueScreen.php?semestre1=S3&semestre2=S4">Niveau II</a>
                        </li>
                        <li>
                            <a href="../screens/profilAccademiqueScreen.php?semestre1=S5&semestre2=S6">Niveau III</a>
                        </li>

                    </ul>
                </div>
                <a class="nav-link pl-0" href="../screens/settingsScreen.php"><img src="../../img/settings.svg" alt=""> Paramètres</a>
                <a class="nav-link pl-0" href="../controlers/seDeconnecter.php"><img src="../../img/logout.svg" alt=""> Déconnexion</a>

            <?php }
            //Section side-bar Administrateur
            if ($_SESSION['user']['grade'] == 'admin') { ?>
                <a class="nav-link pl-0" href="../screens/dashbordScreen.php"><img src="../../img/home2.svg" alt=""> Dashbord</a>
                <!-- <a class="nav-link pl-0" href="#"><img src="../../img/groups.svg" alt=""> Etudiants</a>
                <a class="nav-link pl-0" href="#"><img src="../../img/sticky.svg" alt=""> Notes</a>
                <a class="nav-link pl-0" href="#"><img src="../../img/closed_.svg" alt="">Payements</a> -->
                <a class="nav-link pl-0" href="../screens/settingsScreen.php"><img src="../../img/settings.svg" alt=""> Paramètres</a>
                <a class="nav-link pl-0" href="../controlers/seDeconnecter.php"><img src="../../img/logout.svg" alt=""> Déconnexion</a>

            <?php  }
            //Section side-bar Super Administrateur
            if ($_SESSION['user']['grade'] == 'superadmin') { ?>
                <a class="nav-link pl-0" href="../screens/dashbordScreen.php"><img src="../../img/home2.svg" alt=""> Dashbord</a>
                <a class="nav-link pl-0" href="#table-admin"><img src="../../img/group.svg" alt=""> Administrateurs</a>
                <div class="content-Admin-menu">
                    <ul>
                        <li>
                            <a href="addNewAdministrateurScreen.php">Ajouter</a>
                        </li>
                        <li>
                            <a href="">Mettre à jour</a>
                        </li>
                        <li>
                            <a href="">Suprrimer</a>
                        </li>
                    </ul>
                </div>
                <a class="nav-link pl-0" href="#list-etablissement"><img src="../../img/domaine.svg" alt=""> Etablissements</a>
                <div class="content-Etab-menu">
                    <ul>
                        <li>
                            <a href="addNewEtablissementScreen.php">Ajouter</a>
                        </li>
                        <li>
                            <a href="">Mettre à jour</a>
                        </li>
                        <li>
                            <a href="">Suprrimer</a>
                        </li>
                    </ul>
                </div>

                <a class="nav-link pl-0" href="../screens/settingsScreen.php"><img src="../../img/settings.svg" alt=""> Paramètres</a>
                <a class="nav-link pl-0" href="../controlers/seDeconnecter.php"><img src="../../img/logout.svg" alt=""> Déconnexion</a>
        <?php }
        } ?>

    </div>
</div>