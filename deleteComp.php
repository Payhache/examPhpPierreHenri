<?php
require_once('parts/includes.php');
require_once('parts/logok.php');
$id = $_GET['id'];

deleteComp($dataBase, $id);
header('Location: gestioncv.php');
?>