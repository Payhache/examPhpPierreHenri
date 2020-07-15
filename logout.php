<?php
include_once('includes.php');
session_start();
if(isset($_SESSION['email'])){
    session_destroy();
    header('Location: index.php');
}
?>