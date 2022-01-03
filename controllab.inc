<?php

session_start();

if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "OK")){
	header("Location: login_lab.php");
	exit;
}
?>