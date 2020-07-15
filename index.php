<?php
include_once('parts/includes.php');

// Tableau pour afficher les erreures
$errors = [];
// Gestion de la connection de l'utilisateur
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$checkUserLogin = validateLogin();
	$errors = $checkUserLogin['errors'];
	if(count($errors) === 0){
		$errors = logUser($dataBase);
		if(count($errors) === 0){
			header('Location: gestioncv.php');
		}
	}
}
//$themes = getThemes($dataBase)->fetchAll();
$xps = getXp($dataBase)->fetchAll();
$comps = getComp($dataBase)->fetchAll();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="login">
    <form class="m-2"action="" method="post">
        <label for="login">Mail</label>
        <input type="mail" name="email">
        <label for="password">password</label>
        <input type="password" name="mot_de_passe">
        <input type="submit">
    </form>
</div>
</nav>

<?php
            displayErrors($errors);
?>

<h1>Cv de Pierre-Henri</h1>

<i class="fas fa-star"></i>
<i class="far fa-star"></i>


<h2> Compétences  </h2>
<?php foreach($comps as $comp) {
    echo('<h3> Maîtrise de la compétence : '.$comp['titre'].'</h3>');
    echo('<h3> Avec un niveau de : ' .$comp['note']. ' / 5</h3>');
    for ($i=0; $i < $comp['note'] ; $i++) { 
        echo('<i class="fas fa-star"></i>');
    }
    for ($i=$comp['note']; $i < 5 ; $i++) { 
        echo('<i class="far fa-star"></i>');
    }
} 
?>

<h2> Expériences </h2>

<?php foreach($xps as $xp) {
    echo('<h3>'.$xp['titre'].'</h3>');
    echo('<h3> Période du : ' .$xp['date_debut']. ' au '.$xp['date_fin']. '</h3>');
    echo('<p>'.$xp['description'].'</p>');
} 


