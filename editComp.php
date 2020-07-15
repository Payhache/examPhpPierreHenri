<?php
include_once('parts/includes.php');
// Verif si user loggué
include_once('parts/logok.php');
// déclaration du tableau d'erreur
$errors = [];
// Affichage de la compétence à éditer
$compSelected = getCompById($dataBase, $_GET['id']);
$resultCompSelected = $compSelected->fetch();
// Resultat du POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $returnValidation = valideFormComps($dataBase);
	$errors = $returnValidation['errors'];
	if(count($errors) === 0 ){
        editComp($dataBase, $_GET['id']);
		header('Location: gestioncv.php');
	}
}

?>

<h1>Editer la compétence : </h1>

<form action="" method="post">
<label for="titre">Ajout de la compétence</label>
<input type="text" name="titre" placeholder="Compétence"
            <?php echo('value="'.$resultCompSelected['titre'].'"');
            ?>
            <?php if(isset($_POST['titre'])){
            echo('value="'.$_POST['titre'].'"');
            }?>>
<br>
<label for="note">Ajout de la maitrise de la compétence</label>
<input type="number" name="note"
            <?php echo('value="'.$resultCompSelected['note'].'"');
            ?>
            <?php if(isset($_POST['note'])){
            echo('value="'.$_POST['note'].'"');
            }?>>
<br>
<input type="submit">
</form>

<?php
            displayErrors($errors);
?>
