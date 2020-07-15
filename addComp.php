<?php
// Tableau pour afficher les erreures
$errors = [];

require_once('parts/includes.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $returnValidation = valideFormComps($dataBase);
	$errors = $returnValidation['errors'];
	if(count($errors) === 0 ){
		addComp($dataBase);
		header('Location: gestioncv.php');
	}
}
?>

<h1>Ajouter une compétence : </h1>

<form action="" method="post">
<label for="titre">Ajout de la compétence</label>
<input type="text" name="titre" placeholder="Compétence" required
            <?php if(isset($_POST['titre'])){
            echo('value="'.$_POST['titre'].'"');
            }?>>
<br>
<label for="note">Ajout de la maitrise de la compétence</label>
<input type="number" name="note" required
            <?php if(isset($_POST['note'])){
            echo('value="'.$_POST['note'].'"');
            }?>>
<br>
<input type="submit">
</form>

<?php
            displayErrors($errors);
?>
