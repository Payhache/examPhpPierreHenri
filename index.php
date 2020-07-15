<?php
include_once('parts/includes.php');
$errors = [];
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