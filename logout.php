<?php
	session_start();
	unset($_SESSION['user']);
	$_SESSION['user']['valid'] = 'FALSE';
    $_SESSION['message']['logout'] = "Odjavljeni ste!";
	header("Location: administrator.php");
?>