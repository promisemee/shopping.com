<?php
	session_start();
	if (isset($_SESSION['user'])){
		setcookie(session_name(), '', 100);
		session_unset();
		session_destroy();
		$_SESSION = array();
		
		header('Location:/');

	}else{
		echo '?';
	}
?>