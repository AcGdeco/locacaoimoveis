<?php
include 'Partes iguais/Cabecalho.php';
?>
<div id = 'div1' style = "z-index:6;display:none;position:fixed;width:100%;background-color:lightgray;height:100%;opacity:0.8;align-items: center;justify-content:center;" ><span style = "opacity:1;font-weight:bolder;color:black;" >Carregando...</span></div>

<?php
include 'Partes iguais/menu.php';
?>
<?php

$id = $_SESSION["id"];

$valor = $_SESSION["valor"];

$cep = $_SESSION["cep"];

$informacoes = $_SESSION["informacoes"];

$imagem = $_SESSION["imagem"];

?>
<style>
.input-wrapper label {
  background-color: lightgray;
  border-radius: 0px;
  color: black;
  margin: 0px;
  padding:5px;
  border:solid 1px;
}

.input-wrapper label:hover {
  opacity:0.8;
}

/* Chrome, Safari, Edge, Opera Tirar as setas dos input number*/
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}

</style>

<script>

function deletarImagem(){
	
	if (confirm("Você realmente deseja apagar essa imagem?")) {
	
	Carregando();
	
	var a;
	
	var c;
	
	a = <?php echo $id; ?>;
	
	var xhttp = new XMLHttpRequest();

	  xhttp.onreadystatechange = function() {

	  if (xhttp.readyState == 4 && xhttp.status == 200) {

		c = xhttp.responseText;
		
		PararCarregando();
		
		if(c == "Apagado"){

			alert('A imagem foi deletada');
			window.open('imoveis.php','_self');
			
		}else{

			alert(c);

		}

	  }

	};

	xhttp.open("POST", "apagarImagemImovel.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.send("id=" + a);
	}
	
}

function Carregando(){
	document.getElementById('div1').style.display = 'flex';
}

function PararCarregando(){
	document.getElementById('div1').style.display = 'none';
}
function AparecerNomeArquivo(){
	var txt = "";
	var x = document.getElementById("input-file");
	var c = x.files[0].name;
	document.getElementById("file-name").innerHTML = c;
}

function Editar(){
	document.getElementById('valor').disabled = false;
	document.getElementById('cep').disabled = false;
	document.getElementById('informacoes').disabled = false;
	document.getElementById('input-file').disabled = false;
	document.getElementById('salvar').style.display = 'inline';
}

function Excluir(){
	
	if (confirm("Você realmente deseja apagar esse imóvel?")) {
	  g = <?php echo $id; ?>;
	  
	  h = '<?php echo $imagem; ?>';
	  
	var xhttp = new XMLHttpRequest();

	  xhttp.onreadystatechange = function() {
      Carregando();
	  if (xhttp.readyState == 4 && xhttp.status == 200) {

		c = xhttp.responseText;

		PararCarregando();
		
		if(c == "O imóvel foi apagado"){

			alert('O imóvel foi apagado');
			window.open('imoveis.php','_self');
			
		}else{

			alert(c);

		}

	  }

	};

	xhttp.open("POST", "apagarImoveis.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.send("id=" + g + "&imagem=" + h);
	
	}
	
}

</script>

<br><br>
<form action = "editarImoveis.php" method="post" enctype="multipart/form-data" >
<div style = "display:flex;justify-content:center;" >
<table style = "border-collapse:collapse;border:solid 1px gray;" >
<tr><td style = "background-color:LightGoldenRodYellow;padding:10px;border:solid 1px gray;font-weight:bolder;" colspan = "3" >
&equiv; Cadastro de Imóveis
</td></tr>
<tr><td style = "padding:10px;" colspan = "3"  >
<a onclick="window.open(document.referrer,'_self');" style = "text-decoration:none;" ><span style = "background-color:#E8E8E8;border:solid 1px gray;font-weight:bolder;color:black;padding:5px;cursor:pointer;padding-left:10px;padding-right:10px;">&lt; Voltar</span></a> 

<span onclick = "Editar()" style = "background-color:orange;font-weight:bolder;color:white;padding:5px;cursor:pointer;border:solid 1px chocolate;padding-left:10px;padding-right:10px;margin:1px;"> <img width = "15px;" src = "imagens/editar.jpg" /> Editar </span>

<span onclick = "Excluir()" style = "background-color:red;font-weight:bolder;color:white;padding:5px;cursor:pointer;border:solid 1px darkred;padding-left:10px;padding-right:10px;margin:1px;"> <img width = "15px;" src = "imagens/Lixeira.jpg" /> Excluir </span>

</td></tr> 
<tr>
<td style = "padding:10px;padding-bottom:2px;">
VALOR<span style = "color:red;">*</span>
</td>
<td style = "padding:10px;padding-bottom:2px;" >
CEP<span style = "color:red;">*</span>
</td>
<td style = "padding:10px;padding-bottom:2px;" >
<!--Status<span style = "color:red;">*</span>-->
Imagem
</td>
</tr>
<tr>
<td  style = "padding:10px;padding-top:1px;" >
<input type = "text" name = "valor" id = "valor" disabled value = "<?php echo $valor; ?>" />
</td>
<td style = "padding:10px;padding-top:1px;" >
<input type = "text" name = "cep" id = "cep" disabled value = "<?php echo $cep; ?>" />
</td>
<td style = "padding:10px;padding-top:1px;" >

<div class='input-wrapper'>
  <label style = "cursor:pointer;" for='input-file' >
    Selecione
  </label>
  <input onchange="AparecerNomeArquivo()" style = "display:none;" id='input-file' type='file' name = "fileToUpload" value='' disabled />
  <span style = "border:solid 1px black;padding:5px;margin:0px;" id='file-name'>Nenhum arquivo selecionado</span>
</div>

</td>
</tr>
<tr>
<td colspan = '3' style = 'text-align:center;' style = "padding:10px;padding-bottom:2px;" >
INFORMAÇÕES
</td>

</tr>
<tr>
<td colspan = '3' style = 'text-align:center;' style = "padding:10px;padding-top:1px;" >
<textarea disabled id = "informacoes" name = "informacoes" rows="4" cols="50" />
<?php echo $informacoes; ?>
</textarea>
</td>
</tr>

<tr><td style = "padding:10px;" colspan = "3" align="right" > 
<input id = "salvar" style = "display:none;border-radius:0px;background-color:green;border:solid 1px darkgreen;font-weight:bolder;color:black;padding:3px;cursor:pointer;padding-left:10px;padding-right:10px;color:white;" type="submit" value="&#10004; Salvar" />
</td></tr>
<tr><td style = "background-color:LightGoldenRodYellow;padding:10px;border:solid 1px gray;font-weight:bolder;" colspan = "3" >
<img src = "imagens/camera.png" width = "15px;" /> Imagem do Imóvel
</td></tr>
<tr><td style = "padding:10px;border:solid 1px gray;font-weight:bolder;" colspan = "3" >
<span onclick = "deletarImagem()" id = "deletarImagem" style = "background-color:ghostwhite;cursor:pointer;padding:5px;border:solid 1px black;" >Clique para deletar essa imagem</span>
</td></tr>
<tr><td colspan = "3" style = "text-align:center;padding:20px;" >
<img src = "<?php echo $imagem; ?>" width = "500px" />
<input style = "display:none;" type = "text" name = "imagem" value = "<?php echo $imagem; ?>" />
<input style = "display:none;" type = "text" name = "id" value = "<?php echo $id; ?>" />
</td></tr>
</table>
</form>
</div>
<br><br>

<?php
include 'Partes iguais/Rodape.php';
?>