<?php
include_once('parts/includes.php');
include_once('parts/logok.php');
$xps = getXp($dataBase)->fetchAll();
$comps = getComp($dataBase)->fetchAll();

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-end">
  <a class="btn btn-info  m-2 " href="addcomp.php"> Ajouter une compétence</a>
  <a class="btn btn-info  m-2 " href="addxp.php"> Ajouter une experience</a>
  <a class="btn btn-info  m-2 " href="index.php"> voir mon CV </a>
  <a class="btn btn-warning  m-2  " href="logout.php"> Se déconnecter</a>
</nav>
<h1 class="text-center">Gestion du CV</h1>

<h1 class="m-5">Compétences </h1>
<table class="table w-75 m-auto table-striped ">
  <thead class="thead-dark">
    <tr> 
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Note</th>
      <th class="text-right" scope="col">Action a appliquer</th>
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
            <a class="btn btn-info float-right mr-2" href="editComp.php?id='.$comp['id'].'">modifier</a>
            <a class="btn btn-warning float-right mr-2"href="deleteComp.php?id='.$comp['id'].'">supprimer</a>
            </td>');
            echo('<tr>');
        }
        ?>
  </tbody>
</table>

<h1 class="m-5">Experiences </h1>
<table class="table w-75 m-auto table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Date de début</th>
      <th scope="col">Date de fin</th>
      <th class="text-right"scope="col">Action a appliquer</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach ($xps as $xp) {
          echo('<tr>');
            echo('<th scope="row">'.$xp['id'].'</th>');
            echo('<td>'.$xp['titre'].'</td>');
            echo('<td>'.$xp['description'].'</td>');
            echo('<td>'.$xp['date_debut'].'</td>');
            echo('<td>'.$xp['date_fin'].'</td>');
            echo('<td>
            <a class="btn btn-info float-right mr-2"href="editXp.php?id='.$xp['id'].'">modifier</a>
            <a class="btn btn-warning float-right mr-2"href="deleteXp.php?id='.$xp['id'].'">supprimer</a>
            </td>');
            echo('<tr>');
        }
        ?>
  </tbody>
</table>