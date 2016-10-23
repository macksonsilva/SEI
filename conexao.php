<?php
	try {
		$con = new PDO("mysql:host=robb0378.publiccloud.com.br; dbname="BANCO", "USUARIO", "SENHA");
	} catch (Exception $e) {
		echo $e->getMessage();
	}

?>