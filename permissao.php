<?php 
	session_start();

	if(!isset($_SESSION['login'])){
	  header("Location: index.php");
	}
							
	$login = $_SESSION['login'];
	$senha = $_SESSION['senha'];
	$nome = $_SESSION['nome'];
	$permissao = $_SESSION['permissao'];
	

?>