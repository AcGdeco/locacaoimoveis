<style>
td{
	padding:5px;
	color:red;
	border:solid 1px black;
}
</style>

<?php
function test_input($data) {

  $data = trim($data);

  $data = stripslashes($data);

  $data = htmlspecialchars($data);

  return $data;

}

include 'Partes iguais/Cabecalho.php';
include 'Partes iguais/menu.php';

echo "<br><br><br><br>";
echo "<div style = 'display:flex;justify-content:center;' >";
echo "<table style = 'border-collapse:collapse;' >";
echo "<tr><td style = 'border:none;padding:20px;' ><a href = 'novoImovel.php' style = 'text-decoration:none;' ><span style = 'background-color:#E8E8E8;border:solid 1px gray;font-weight:bolder;color:black;padding:5px;cursor:pointer;padding-left:10px;padding-right:10px;'>&lt; Voltar</span></a></td></tr>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	//Validar o valor

   if (empty($_POST["valor"])) {

    echo  "<tr><td>Valor é requirido</td></tr>";

	$Erro = 1;

  } else {

    $valor = test_input($_POST["valor"]);

    if (!preg_match("/^[0-9 ]*$/", $valor)) {

      echo  "<tr><td>O valor não é válido</td></tr>";

	  $Erro = 1;

    }

  }
  
  //Validar o CEP

   if (empty($_POST["cep"])) {

    echo  "<tr><td>CEP é requirido</td></tr>";

	$Erro = 1;

  } else {

    $cep = test_input($_POST["cep"]);

    if (!preg_match("/^[0-9 ]*$/", $cep)) {

      echo  "<tr><td>O CEP não é válido</td></tr>";

	  $Erro = 1;

    }else{
      include("curlDadosEndereco.php");
      if(empty($objeto->cep)){
        echo "<tr><td>O CEP não existe.</td></tr>";
        $Erro = 1;
      }
    }

  }
  
  //Validar o informações

   if (empty($_POST["informacoes"])) {

  
  } else {

    $informacoes = test_input($_POST["informacoes"]);

  }
  

if(empty($Erro)){

if(!empty($_FILES["fileToUpload"]["name"])){	
//(imagem 1)Código para fazer o upload do arquivo 
$target_dir = "imagensImoveis/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

//Checar o tamanho do endereço das imagens
if (strlen($target_file) > 60) {
  echo "<tr><td>O nome da imagem é muito grande. Não pode superar 60 caracteres.</td></tr>";
  $uploadOk = 0;
}

// (imagem 1)Check if image file is a actual image or fake image
if(isset($_FILES["fileToUpload"]["tmp_name"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false) {
        echo "<tr><td>Não é uma imagem</td></tr>";
        $uploadOk = 0;
    }
}

// (imagem 1)Check if file already exists
if (file_exists($target_file)) {
    echo "<tr><td>Já existe um arquivo com esse nome</td></tr>";
    $uploadOk = 0;
}

// (imagem 1)Allow certain file formats
if($imageFileType != "GIF" && $imageFileType != "JPEG" && $imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "<tr><td>O arquivo deve apresentar alguma das extensões - JPG, JPEG, PNG & GIF</td></tr>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<tr><td>Desculpe, nenhuma de suas imagens foram carregadas</td></tr>";

// if everything is ok, try to upload file
} else {
	//Para a imagem 1
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

    } else {
        echo "<tr><td>Desculpe, houve um erro<br>em carregar o arquivo.".basename( $_FILES["fileToUpload"]["name"])."</td></tr>";
    }

}
}else{
	$target_file = 'imagensImoveis/semimagem.jpg';
	$uploadOk = 1;
}

if($uploadOk != 0){

//Banco de dados

include 'Partes iguais/dbmysql.php';

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);



//Adicionar clientes no banco de dados

$sql = "INSERT INTO imoveis (valor, cep, informacoes, imagem)

VALUES ('$valor', '$cep', '$informacoes', '$target_file')";



if (mysqli_query($conn, $sql)) {

	echo "
	<script>
	alert('Imóvel cadastrado');
	window.open('novoImovel.php','_self');
	</script>
	";

} else {
     echo "<tr><td>Error: " . $sql . "<br>" . $conn->error."</td></tr>";
	echo "<tr><td>Não foi possível cadastrar o imóvel</td></tr>";
}

mysqli_close($conn);
 
}

}

}
echo "</table>";
echo "</div>";

include 'Partes iguais/Rodape.php';

?>