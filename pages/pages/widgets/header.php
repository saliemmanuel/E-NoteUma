<div class="nav-bar">
    <nav class="navbar navbar-expand-lg ">
        <?php if (!empty($_SESSION['user'])) {?>
            <a class="navbar-brand" href="#">Dashbord </a>
            
        <?php  } else { ?>
            <a class="navbar-brand" href="../../pages/screens/homeScreen.php">E-note Universite de Maroua</a>
        <?php } if (!empty($_SESSION['user'])) { ?>
            <?php if ($_SESSION['user']['grade'] == 'etudiant') {?>
                     <div class="navbar-left">
                        <a class="navbar-brand" href="../screens/settingsScreen.php"><?php 
                            echo $_SESSION['user']['nom']; echo" ". $_SESSION['user']['prenom'];
                    } ?></a>
              
            <?php  if ($_SESSION['user']['grade'] == 'admin') {?>
                     <div class="navbar-left">
                        <a class="navbar-brand" href="../screens/settingsScreen.php"><?php 
                            echo" ". $_SESSION['user']['grade'];
                    } ?></a>

            <?php  if ($_SESSION['user']['grade'] == 'superadmin') {?>
                     <div class="navbar-left">
                        <a class="navbar-brand" href="../screens/settingsScreen.php"><?php 
                            echo" superAdmin";
                    } ?></a>
            </div>
        
        <?php } else { ?>
            <div class="navbar-left">
                <a class="navbar-brand" href="#header">Acceuil</a>
                <a class="navbar-brand" href="#about">À-propos</a>
                <a class="navbar-brand" href="#faq">FAQ</a>
                <a href="../../pages/screens/loginScreen.php">
                    <button type="button" class="btn btn-outline-light">Se connecter</button></a>
            </div>
        <?php } ?>
    </nav>
</div>