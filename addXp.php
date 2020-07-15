<?php
// Tableau pour afficher les erreures
$errors = [];

require_once('parts/includes.php');
require_once('parts/logok.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $returnValidation = valideFormXp($dataBase);
	$errors = $returnValidation['errors'];
	if(count($errors) === 0 ){
        var_dump($_POST);
		addXp($dataBase);
		header('Location: gestioncv.php');
	}
}
?>

<h1>Ajouter une experience : </h1>

<form action="" method="post">
<label for="titre">Ajout Entreprise</label>
<br>
<input type="text" name="titre" required
            <?php if(isset($_POST['titre'])){
            echo('value="'.$_POST['titre'].'"');
            }?>>
<br>
<label for="description">Ajout de la descripton</label>
<br>
<input type="text" name="description" required
            <?php if(isset($_POST['description'])){
            echo('value="'.$_POST['description'].'"');
            }?>>
<br>

<label for="date_debut">Ajout de la date de début </label>
<input type="date" name="date_debut" placeholder="Compétence" required
            <?php if(isset($_POST['date_debut'])){
            echo('value="'.$_POST['date_debut'].'"');
            }?>>
<br>
<label for="date_fin">Ajout de la date de fin </label>
<input type="date" name="date_fin" 
            <?php if(isset($_POST['date_fin'])){
            echo('value="'.$_POST['date_fin'].'"');
            }?>>
<br>
<input type="submit">
</form>

<?php
            displayErrors($errors);
?>
