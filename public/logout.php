<?php
	session_start();
	session_destroy();
	header("Location: php/Login.php?e=4");
?>