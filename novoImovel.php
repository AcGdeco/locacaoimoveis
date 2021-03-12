<?php
include 'Partes iguais/Cabecalho.php';
?>
<div id = 'div1' style = "z-index:6;display:none;position:fixed;width:100%;background-color:lightgray;height:100%;opacity:0.8;align-items: center;justify-content:center;" ><span style = "opacity:1;font-weight:bolder;color:black;" >Carregando...</span></div>

<?php
include 'Partes iguais/menu.php';
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

</script>

<br><br>
<!--
Informações
--> 
<form action = "BDCadastroImovel.php" method="post" enctype="multipart/form-data" >
<div style = "display:flex;justify-content:center;" >
<table style = "border-collapse:collapse;border:solid 1px gray;" >
<tr><td style = "background-color:LightGoldenRodYellow;padding:10px;border:solid 1px gray;font-weight:bolder;" colspan = "3" >
&equiv; Cadastro de Imóveis
</td></tr>
<tr><td style = "padding:10px;" colspan = "3" >
<a href = "imoveis.php" style = "text-decoration:none;" ><span style = "background-color:#E8E8E8;border:solid 1px gray;font-weight:bolder;color:black;padding:5px;cursor:pointer;padding-left:10px;padding-right:10px;">&lt; Voltar</span></a> 
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
IMAGEM
</td>
</tr>
<tr>
<td  style = "padding:10px;padding-top:1px;" >
<input type = "text" name = "valor" />
</td>
<td style = "padding:10px;padding-top:1px;" >
<input type = "text" name = "cep"/>
</td>
<td style = "padding:10px;padding-top:1px;" >

<div class='input-wrapper'>
  <label style = "cursor:pointer;" for='input-file'>
    Selecione
  </label>
  <input onchange="AparecerNomeArquivo()" style = "display:none;" id='input-file' type='file' name = "fileToUpload" value='' />
  <span style = "border:solid 1px black;padding:5px;margin:0px;" id='file-name'>Nenhum arquivo selecionado</span>
</div>

<select style = "display:none;" name = "status"  >
<option value=""></option>
<option selected value='ativo' >Ativo</option>
<option value='inativo' >Inativo</option>
 </select>
</td>
</tr>
<tr>
<td colspan = '3' style = 'text-align:center;' style = "padding:10px;padding-bottom:2px;" >
INFORMAÇÕES
</td>

</tr>
<tr>
<td colspan = '3' style = 'text-align:center;' style = "padding:10px;padding-top:1px;" >
<textarea name = "informacoes" rows="4" cols="50" />
</textarea>
</td>

</tr>
<tr><td style = "padding:10px;" colspan = "3" align="right" > 
<input style = "border-radius:0px;background-color:green;border:solid 1px darkgreen;font-weight:bolder;color:black;padding:3px;cursor:pointer;padding-left:10px;padding-right:10px;color:white;" type="submit" value="&#10004; Salvar">
</td></tr>
</table>
</form>
<?php
include 'Partes iguais/Rodape.php';
?>