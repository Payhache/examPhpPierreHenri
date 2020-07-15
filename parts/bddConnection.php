<?php
try {
	$dbHost = 'localhost';
	$dbBase = 'cvph';
	$dbUser = 'root';
	$dbPassword = '';

		$dataBase = new PDO("mysql:host=".$dbHost.";dbname=".$dbBase.";charset=utf8", $dbUser, $dbPassword);
		 echo "Connexion possible avec PDO <br>\n";
 } catch ( PDOException $e ) {
		echo 'Échec connexion PDO : ' . $e->getMessage() . "<br>\n";
}

?>
?>