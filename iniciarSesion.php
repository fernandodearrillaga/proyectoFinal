<?php
session_start();
var_dump($_POST);
$_SESSION["usuario"]= $_POST["usuario"];
echo $_SESSION["usuario"];
header("Location: index.php");
?>