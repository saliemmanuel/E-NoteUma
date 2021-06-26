<h3>Vos information</h3>
<br>
<table class="table table-striped table-bordered">
    <thead>
        <tr class="bg-success">
            <th scope="col">Matricule</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Parcours</th>
            <th scope="col">Cycle</th>
            <th scope="col">Niveau</th>
            <th scope="col">Date et Lieu de Naissance</th>
            <th scope="col">Telephone</th>
            <th scope="col">Eamil</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><?= $etudiant->getMatricule() ?></th>
            <th><?= $etudiant->getNom() ?></th>
            <th><?= $etudiant->getPrenom() ?></th>
            <th><?= $etudiant->getParcour(connexionDb()) ?></th>
            <th><?= $etudiant->getCycle(connexionDb()) ?></th>
            <th><?= $etudiant->getNiveau() ?></th>
            <th><?= $etudiant->getDateNaiss() . " A " ?><?= $etudiant->getLieuNaiss() ?></th>
            <th><?= $etudiant->getNumTel() ?></th>
            <th><?= $etudiant->getEmail() ?></th>
        </tr>
    </tbody>
</table><br><br><br><br>
<h3>Plus d'option</h3>

<div class="col-lg-3 col-6">
    <div class="small-box bg-dark ">
        <a href="" target="_blank">
            <div class="inner">
                <img src="../../img/edite_white.svg" alt="">
                <p>FORMULER UNE REQUETE</p>
            </div>
        </a>
    </div>
</div>