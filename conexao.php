<?php
	try {
		$con = new PDO("mysql:host=robb0378.publiccloud.com.br; dbname=atom_escola", "atom_escola", "manaus@#321");
	} catch (Exception $e) {
		echo $e->getMessage();
	}

?>