<?php
include_once('parts/includes.php');
include_once('parts/logok.php');
$xps = getXp($dataBase)->fetchAll();
$comps = getComp($dataBase)->fetchAll();

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="btn btn-info  m-2 " href="logout.php"> se déconnecter</a>
    <a class="btn btn-info  m-2 " href="addcomp.php"> Ajouter une compétence</a>
    <a class="btn btn-info  m-2 " href="addxp.php"> Ajouter une experience</a>
    <a class="btn btn-info  m-2 " href="index.php"> voir mon CV </a>
</nav>
<h1>Gestion du CV</h1>

<h1>Compétences </h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Note</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($comps as $comp) {
            echo('<tr>');
            echo('<th scope="row">'.$comp['id'].'</th>');
            echo('<td>'.$comp['titre'].'</td>');
            echo('<td>'.$comp['note'].'</td>');
            echo('<td>
            <a class="btn btn-info"href="editComp.php?id='.$comp['id'].'">modifier</a>
            <a class="btn btn-warning"href="#">Supprimer</a></td>');
            echo('<tr>');
        }
        ?>
  </tbody>
</table>

<h1>Experiences </h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Date de début</th>
      <th scope="col">Date de fin</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        foreach ($xps as $xp) {
            echo('<th scope="row">'.$xp['id'].'</th>');
            echo('<td>'.$xp['titre'].'</td>');
            echo('<td>'.$xp['description'].'</td>');
            echo('<td>'.$xp['date_debut'].'</td>');
            echo('<td>'.$xp['date_fin'].'</td>');
            echo('<td>
            <a class="btn btn-info"href="editComp.php?id='.$xp['id'].'">modifier</a>
            <a href="gestioncv.php">supprimer</a></td>');
        }
        ?>
    </tr>
  </tbody>
</table>