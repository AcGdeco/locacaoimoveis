<?php
include 'Partes iguais/dbmysql.php';

$id = $_POST["id"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT imagem, id FROM imoveis ORDER BY id ASC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		
if($row["id"] == $id){
	if($row["imagem"] != "imagens bancos/semimagem.jpg"){
		//Deletar as imagens
		unlink($row["imagem"]);
	}
}
	}
}

mysqli_close($conn);

//Banco de dados

include 'Partes iguais/dbmysql.php';

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);



//Adicionar clientes no banco de dados

$sql = "UPDATE imoveis SET imagem='imagensImoveis/semimagem.jpg' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {

	echo "Apagado";

} else {
     echo "<tr><td>Error: " . $sql . "<br>" . $conn->error."</td></tr>";
	echo "<tr><td>Não foi possível atualizar o imóvel</td></tr>";
}

mysqli_close($conn);

?>