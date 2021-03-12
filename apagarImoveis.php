<?php

include 'Partes iguais/dbmysql.php';

$id = $_POST["id"];

$imagem = $_POST["imagem"];

	if($imagem != "imagensImoveis/semimagem.jpg"){
		//Deletar as imagens
		unlink($imagem);
	}

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// sql to delete a record
	$sql = "DELETE FROM imoveis WHERE id=$id";

	if ($conn->query($sql) === TRUE) {
		echo "O imóvel foi apagado";
	} else {
		echo "Error deleting record: " . $conn->error;
	}

	$conn->close();

?>