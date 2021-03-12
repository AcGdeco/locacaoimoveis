<?php
include 'Partes iguais/Cabecalho.php';
include("Partes iguais/menu.php");
?>

<br><br><br><br><br>

<script type="text/javascript">
	function aparecerImagem(){

		for(i = 1; i < table.rows.length; i++){
			table.rows[i].cells[5].innerHTML = "<img width = '300px' height = '300px' src = '"+table.rows[i].cells[4].innerHTML+"' />";
		}

	}
  function EditarExcluir(id, valor, cep, informacoes, imagem){
	  
	  var a = id;
	  var b = valor;
	  var c = cep;
	  var d = informacoes;
	  var e = imagem;
	  
	var xhttp = new XMLHttpRequest();

	  xhttp.onreadystatechange = function() {

	  if (xhttp.readyState == 4 && xhttp.status == 200) {

	  window.open('editarexcluirimovel.php','_self');

	  }

	};

	xhttp.open("POST", "PassarIDSessionImovel.php", true);

	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhttp.send("id=" + a + "&valor=" + b + "&cep=" + c + "&informacoes=" + d + "&imagem=" + e);
	  
  }	

  function mudarImagem(Numero){
	
	 var filt = document.getElementById('filt').value;
	 var filt2 = document.getElementById('filt2').value;
	 var filt3 = document.getElementById('filt3').value;
	 var filt4 = document.getElementById('filt4').value;
	 //var filt5 = document.getElementById('filt5').value;
	 
	  document.getElementById('filt').value = "";
	  document.getElementById('filt2').value = "";
	  document.getElementById('filt3').value = "";
	  document.getElementById('filt4').value = "";
	  //document.getElementById('filt5').value = "";
	
	filter ('nãoUtilizadoMais', 'lista', 'nãoUtilizadoMais');
	
	var coluna;
	var Numero;
	
	if(Numero == 1){
		coluna = 'id';
	}
	if(Numero == 2){
		coluna = 'valor';
	}
	if(Numero == 3){
		coluna = 'subtipo';
	}
	if(Numero == 4){
		coluna = 'nome';
	}
	if(Numero == 5){
		coluna = 'ordem';
	}
	
	//alert(document.getElementById('img'+Numero).src);
	
	var table = document.getElementById('lista');  

	var tabela = [];
	
	//Passando dados da tabela para objeto
	for(i = 1; i < table.rows.length; i++){
		
		var objeto = {id:table.rows[i].cells[0].innerHTML, valor:table.rows[i].cells[1].innerHTML, subtipo:table.rows[i].cells[2].innerHTML, nome:table.rows[i].cells[3].innerHTML, ordem:table.rows[i].cells[4].innerHTML, click:table.rows[i].onclick};
		
	    tabela.push(objeto);
	}
	
	//Organizar a tabela
	//Para organizar números
	
	for(i = 1; i <= 4; i++){
		document.getElementById('img'+i).src = 'imagens/setadesativada.jpg';
	}
	
	if(coluna == 'id'){
		if(coluna == 'id' && (colunaUltima == "" || colunaUltima == 'idbaixo' || colunaUltima != 'idcima')){
			tabela.sort(function(a, b){return a.id - b.id});
			document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
			colunaUltima = 'idcima';
		}else if(coluna == 'id' && colunaUltima == 'idcima'){
			tabela.sort(function(a, b){return b.id - a.id});
			document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
			colunaUltima = 'idbaixo';
		}
	}

	if(coluna == 'valor'){
		if(coluna == 'valor' && (colunaUltima != "valorcima" || colunaUltima == 'valorbaixo')){
			tabela.sort(function(a, b){return a.valor - b.valor});
			document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
			colunaUltima = 'valorcima';
		}else if(coluna == 'valor' && colunaUltima == 'valorcima'){
			tabela.sort(function(a, b){return b.valor - a.valor});
			document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
			colunaUltima = 'valorbaixo';
		}
	}
	
	if(coluna == 'tipo'){
		if(coluna == 'tipo' && (colunaUltima != "tipocima" || colunaUltima == 'tipobaixo')){
			tabela.sort(function(a,b) {
			return a.tipo.toLowerCase() < b.tipo.toLowerCase() ? -1 : a.tipo.toLowerCase() > b.tipo.toLowerCase() ? 1 : 0;
			});
			document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
			colunaUltima = 'tipocima';
		}else if(coluna == 'tipo' && colunaUltima == 'tipocima'){
			tabela.sort(function(a,b) {
			return a.tipo.toLowerCase() > b.tipo.toLowerCase() ? -1 : a.tipo.toLowerCase() < b.tipo.toLowerCase() ? 1 : 0;
			});
			document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
			colunaUltima = 'tipobaixo';
		}
	}
	
	if(coluna == 'subtipo'){
		if(coluna == 'subtipo' && (colunaUltima != "subtipocima" || colunaUltima == 'subtipobaixo')){
			tabela.sort(function(a,b) {
			return a.subtipo.toLowerCase() < b.subtipo.toLowerCase() ? -1 : a.subtipo.toLowerCase() > b.subtipo.toLowerCase() ? 1 : 0;
			});
			document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
			colunaUltima = 'subtipocima';
		}else if(coluna == 'subtipo' && colunaUltima == 'subtipocima'){
			tabela.sort(function(a,b) {
			return a.subtipo.toLowerCase() > b.subtipo.toLowerCase() ? -1 : a.subtipo.toLowerCase() < b.subtipo.toLowerCase() ? 1 : 0;
			});
			document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
			colunaUltima = 'subtipobaixo';
		}
	}
	
	if(coluna == 'nome'){
		if(coluna == 'nome' && (colunaUltima != "nomecima" || colunaUltima == 'nomebaixo')){
			tabela.sort(function(a,b) {
			return a.nome.toLowerCase() < b.nome.toLowerCase() ? -1 : a.nome.toLowerCase() > b.nome.toLowerCase() ? 1 : 0;
			});
			document.getElementById('img'+Numero).src = 'imagens/setacima.jpg';
			colunaUltima = 'nomecima';
		}else if(coluna == 'nome' && colunaUltima == 'nomecima'){
			tabela.sort(function(a,b) {
			return a.nome.toLowerCase() > b.nome.toLowerCase() ? -1 : a.nome.toLowerCase() < b.nome.toLowerCase() ? 1 : 0;
			});
			document.getElementById('img'+Numero).src = 'imagens/setabaixo.jpg';
			colunaUltima = 'nomebaixo';
		}
	}
	
	for(i = 1; i < table.rows.length; i++){
		y = i - 1; 
		table.rows[i].onclick = tabela[y].click;
		table.rows[i].cells[0].innerHTML = tabela[y].id;
		table.rows[i].cells[1].innerHTML = tabela[y].valor;
		table.rows[i].cells[2].innerHTML = tabela[y].subtipo;
		table.rows[i].cells[3].innerHTML = tabela[y].nome;
		table.rows[i].cells[4].innerHTML = tabela[y].ordem;
			
	}
	
	 document.getElementById('filt').value = filt;
	 document.getElementById('filt2').value = filt2;
	 document.getElementById('filt3').value = filt3;
	 document.getElementById('filt4').value = filt4;
	 //document.getElementById('filt5').value = filt5;
		
	 filter ('nãoUtilizadoMais', 'lista', 'nãoUtilizadoMais');
	 
	 aparecerImagem();

	}
	
function filter (phrase, _id, cellNr){ 
  
  var table = document.getElementById(_id);
  
  for (var r = 1; r < table.rows.length; r++){ 
	linhasFicaramInvisiveisPeloFiltro[r] = "";
  }
  
  var filt = [];
  
  filt[0] = document.getElementById('filt').value.toLowerCase();
  filt[1] = document.getElementById('filt2').value.toLowerCase();
  filt[2] = document.getElementById('filt3').value.toLowerCase();
  filt[3] = document.getElementById('filt4').value.toLowerCase();
  filt[4] = "";
  filt[5] = "";
  filt[6] = document.getElementById('filt7').value.toLowerCase();

  var ele; 

  for(var r = 1; r < table.rows.length; r++){
	table.rows[r].style.display = '';  
  }
  
  var linhaDeveAparecer = [];
  
  for(var r = 1; r < table.rows.length; r++){
	linhaDeveAparecer[r] = '';  
  }
  
  for(var y = 0; y <= 6; y++){
	  suche = filt[y];
	  if(y != 6){
		  if(y != 5){
			  for (var r = 1; r < table.rows.length; r++){  	
				ele = table.rows[r].cells[y].innerHTML.replace(/<[^>]+>/g,"");  	
				if (ele.toLowerCase().indexOf(suche)>=0 ){
					if(table.rows[r].style.display != 'none'){
						table.rows[r].style.display = '';
					}			
				}else{ 
					table.rows[r].style.display = 'none'; 
					linhasFicaramInvisiveisPeloFiltro[r] = r;
					
				}	
			  }
		  }
	  }else{
		  for (var r = 1; r < table.rows.length; r++){  
			   for (var c = 0; c < 5; c++){  
				ele = table.rows[r].cells[c].innerHTML.replace(/<[^>]+>/g,"");  	
				if (ele.toLowerCase().indexOf(suche)>=0 ){ 
					if(table.rows[r].style.display != 'none'){
						table.rows[r].style.display = '';
						linhaDeveAparecer[r] = r;
						break;
					}
			   }
			  }
			  
			  if(linhaDeveAparecer[r] != r){
				table.rows[r].style.display = 'none'; 
				linhasFicaramInvisiveisPeloFiltro[r] = r;
			}
			  
		  }
	  }
   }
	  
   mostrardividido('lista', paginaAtual);	  
   
  }
  
  function mostrardividido(_id, pagina){
	 
    paginaAtual = 1;	
    
	var table = document.getElementById(_id);
	
	var limite = document.getElementById("Mostrar").value;
	
	if(limite == 'Todos'){
		limite = table.rows.length;
	}
	
	var numeroregistrosmostrados = table.rows.length - 1;
	
	for (var r = 1; r < table.rows.length; r++){ 
		if(linhasFicaramInvisiveisPeloFiltro[r] == r){
			numeroregistrosmostrados -= 1;
		}
	}
	
	var limitepaginaSuperior = [];
	var QuantidadeLinhaTabelaPagina = [];
	var contadorLimite;
	contadorLimite = 1;
	var b = 1;
	
	var NumeroPaginas = (numeroregistrosmostrados) / limite;
	NumeroPaginas = Math.ceil(NumeroPaginas);
	
	for(var y = 1; y <= NumeroPaginas; y++){
		limitepaginaSuperior[y] = 0;
		QuantidadeLinhaTabelaPagina[y] = 0;
	}
	
    for (var y = 1; y <= NumeroPaginas; y++){	
		for (var r = b; r < table.rows.length; r++){
			if(linhasFicaramInvisiveisPeloFiltro[r] != r && limitepaginaSuperior[y] <= limite){
				limitepaginaSuperior[y] += 1;
			}
			
			QuantidadeLinhaTabelaPagina[y] += 1;
			 
			if(limitepaginaSuperior[y] == limite){
				b = r + 1;
				break;
			}
		}
	}
	
	for (var y = 2; y <= NumeroPaginas; y++){
		x = y - 1;
		QuantidadeLinhaTabelaPagina[y] += QuantidadeLinhaTabelaPagina[x];
	}
	
	var limiteSuperior = QuantidadeLinhaTabelaPagina[pagina];
	
	var limitepaginaInferior = [];
	
	if(pagina == 1){
		limitepaginaInferior[1] = 1;
	}else{
		for(var y = 2; y <= NumeroPaginas; y++){
			x = y - 1;
			limitepaginaInferior[y] = QuantidadeLinhaTabelaPagina[x] + 1;
		}
	}	
	
	var limiteInferior = limitepaginaInferior[pagina];
    
	for (var r = 1; r < table.rows.length; r++){  	
		if (r <= limiteSuperior && r >= limiteInferior){
			if(linhasFicaramInvisiveisPeloFiltro[r] != r){	
				table.rows[r].style.display = ''; 
			}
		}else{
			table.rows[r].style.display = 'none'; 
		}
	}
	
	var list = document.getElementById("myDIV");

	while (list.hasChildNodes()) {  
	  list.removeChild(list.firstChild);
	}
	
	var NumeroBotoes = (numeroregistrosmostrados) / limite;
	
	NumeroBotoes = Math.ceil(NumeroBotoes);
	
	//Criar botão anterior
	var para = document.createElement("span");   
	para.id = "anterior";
	para.style.cssText = 'border:solid 1px gray;padding:5px;padding-right:10px;padding-left:10px;background-color:white;cursor:pointer;';
	var t = document.createTextNode('Anterior');      
	para.appendChild(t);                                          
	document.getElementById("myDIV").appendChild(para);
	if(pagina != 1){
		var anterior = pagina - 1;	
	}else{
		var anterior = 1;
	}
	document.getElementById("anterior").addEventListener("click", mostrardividido.bind(null, 'lista', anterior));
	
	//Limite dos botões
	var limiteSuperiorBotao = pagina + 5;
	var limiteInferiorBotao = pagina - 5;
	
	//Criar botões intermediários
    for(i = 1; i <= NumeroBotoes; i++){
		if(pagina == 1 || pagina == 2 || pagina == 3 || pagina == 4){
			limiteSuperiorBotao = 10;
		}
		var paginafinal = NumeroBotoes - pagina;
		if(paginafinal == 1 || paginafinal == 2 || paginafinal == 3 || paginafinal == 4 || paginafinal == 0){
			limiteInferiorBotao = pagina - 10 + paginafinal + 1;
		}
		if(i <= limiteSuperiorBotao && i >= limiteInferiorBotao){
			var para = document.createElement("div");   
			para.id = "mosres"+i;
			if(pagina != i){
				para.style.cssText = 'width:10px;display:inline-block;border:solid 1px gray;padding:5px;padding-right:15px;padding-left:10px;background-color:white;cursor:pointer;';
			}else{
				para.style.cssText = 'width:10px;display:inline-block;border:solid 1px darkblue;padding:5px;padding-right:15px;padding-left:10px;background-color:blue;cursor:pointer;color:white;';
			}
			var t = document.createTextNode(i);      
			para.appendChild(t);                                          
			document.getElementById("myDIV").appendChild(para); 
			document.getElementById("mosres"+i).addEventListener("click", mostrardividido.bind(null, 'lista', i));
		}
	}

	//Criar botão seguinte
	var para = document.createElement("span");   
	para.id = "seguinte";
	para.style.cssText = 'border:solid 1px gray;padding:5px;padding-right:10px;padding-left:10px;background-color:white;cursor:pointer;';
	var t = document.createTextNode('Seguinte');      
	para.appendChild(t);                                          
	document.getElementById("myDIV").appendChild(para);
	if(pagina != NumeroBotoes){
		var seguinte = pagina + 1;	
	}else{
		var seguinte = NumeroBotoes;
	}
	document.getElementById("seguinte").addEventListener("click", mostrardividido.bind(null, 'lista', seguinte));

	//Escrever texto em myDIVdois
	if(pagina != NumeroBotoes){
		var limiteSuperiorFinal = (pagina * limite);	
		var limiteInferiorFinal = limiteSuperiorFinal - limite + 1;	
	}else if(pagina == NumeroBotoes){
		var limiteSuperiorFinal = numeroregistrosmostrados;
		var limiteInferiorFinal = (pagina - 1) * limite + 1;	
	}
		
	document.getElementById("myDIVdois").innerHTML = "Mostrando de " + limiteInferiorFinal + " até " + limiteSuperiorFinal + " de " + numeroregistrosmostrados + " registros.";
}

function MudarOpacity(id){
	document.getElementById(id).style.opacity = 0.5;	
} 

function MudarOpacityRetorno(id){
	document.getElementById(id).style.opacity = 1;	
}    
  
</script>

<style>
tr:nth-child(even) {background: #E8E8E8}
tr:nth-child(odd) {background: #FFF}
</style>

<div style = "display:flex;justify-content:center;" >
<table style = "border-collapse:collapse;border:solid 1px gray;" >
<tr><td style = "background-color:LightGoldenRodYellow;padding:10px;border:solid 1px gray;font-weight:bolder;" >
&equiv; IMÓVEIS PARA LOCAÇÃO
</td></tr>
<tr><td style = "padding:10px;background-color:white;" >
 
<?php if(!empty($_SESSION["banovoLogin"]) && $_SESSION["banovoLogin"] == "true"){ ?> 
<a href = "novoBanco.php" style = "text-decoration:none;" ><span style = "background-color:blue;font-weight:bolder;color:white;padding:5px;cursor:pointer;border:solid 1px DarkBlue;padding-left:10px;padding-right:10px;margin:1px;"> + Novo </span></a>
<?php } ?>

<a href = "organizarPlanoContas.php" style = "text-decoration:none;" ><span style = "background-color:#E8E8E8;font-weight:bolder;color:black;padding:5px;cursor:pointer;border:solid 1px gray;padding-left:10px;padding-right:10px;margin:1px;display:none;">&#8682; Ordenar </span></a>
</td></tr> 
<tr><td style = "padding:5px;" >
<table style = "border:1px solid gray;border-collapse:collapse;" >
<tr>
<td colspan = "2" style = "padding-left:7px;padding-bottom:2px;" >
Mostrar<br>
<select id = "Mostrar" style = "width:75px;" onchange = "mostrardividido('lista', 1)"  >
  <option value="10">10</option>
  <option value="15" selected >15</option>
  <option value="25">25</option>
  <option value="50">50</option>
  <option value="Todos">Todos</option>
</select>
<br>
Registros
</td>
<td>
</td>
<td style = "text-align:right;" >
<img src = "imagens/lupa.jpg" height = "20" />
</td>
<td style = "padding:5px;width:135px;" >
<input style = "width:135px;" id = "filt7" name="filt7" type="text" onKeyUp="filter(this, 'lista', 'indefinido')">
</td>
</tr>
<tr>
<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
ALUGAR<img onclick = "mudarImagem(1)" id = "img1" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "display:none;float:right;cursor:pointer;" />
</td>
<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
VALOR<img onclick = "mudarImagem(2)" id = "img2" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "float:right;cursor:pointer;" />
</td>
<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
ENDEREÇO<img onclick = "mudarImagem(3)" id = "img3" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "float:right;cursor:pointer;" />
</td>
<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
INFORMACOES<img onclick = "mudarImagem(4)" id = "img4" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "float:right;cursor:pointer;" />
</td>
<td style = "border:solid 1px gray;padding:5px;font-weight:bolder;background-color:white;" >
IMAGEM<!--<img onclick = "mudarImagem(5)" id = "img5" src = "imagens/setadesativada.jpg" height = "20px" width = "7px" style = "float:right;cursor:pointer;" />-->
</td>
</tr>

<tr>    
  <td style = "width:75px;padding:5px;border:solid 1px black;" >
  <input style = "width:100px;"  name="filt" id = "filt" type="text" onKeyUp="filter(this, 'lista', '0')">
  </td>
  <td style = "width:200px;padding:5px;border:solid 1px black;" > 
  <input style = "width:200px;" name="filt2" id = "filt2" type="text" onKeyUp="filter(this, 'lista', '1')">
  </td>    
  <td style = "width:200px;padding:5px;border:solid 1px black;" >
  <input style = "width:200px;" name="filt3" id = "filt3" type="text" onKeyUp="filter(this, 'lista', '2')">
  </td>    
  <td style = "width:135px;padding:5px;border:solid 1px black;" >
  <input style = "width:135px;" name="filt4" id = "filt4" type="text" onKeyUp="filter(this, 'lista', '3')">
  </td>    
  <td style = "width:300px;padding:5px;border:solid 1px black;" >
  <!--<input style = "width:150px;" name="filt5" id = "filt5" type="text" onKeyUp="filter(this, 'lista', '4')">-->
  </td> 
</tr>
</table>

<table style = "border:1px solid gray;border-collapse:collapse;" id="lista" >
<tr><td></td></tr>
<?php
include 'Partes iguais/dbmysql.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT id, valor, cep, informacoes, imagem FROM imoveis ORDER BY id ASC";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {

echo "<tr style = '' id = ".$row["id"]." onMouseOver = '' onMouseOut = '' onclick = '' ><td style = 'border:solid 1px gray;padding:5px;width:100px;' >
	 <span style = 'border-radius:0px;background-color:green;border:solid 1px darkgreen;font-weight:bolder;color:black;padding:3px;cursor:pointer;padding-left:10px;padding-right:10px;color:white;' onclick = \"alert('Funcionalidade não desenvolvida')\" >ALUGAR</span>
	  </td>";
echo "<td style = 'border:solid 1px gray;padding:5px;width:200px;' >
	 ".$row["valor"]."
	  </td>";
echo "<td style = 'border:solid 1px gray;padding:5px;width:200px;' >";
     $cep = $row["cep"];
     include("curlDadosEndereco.php");
     echo "cep = ".$objeto->cep."<br>";
     echo "logradouro = ".$objeto->logradouro."<br>";
     echo "complemento = ".$objeto->complemento."<br>";
     echo "bairro = ".$objeto->bairro."<br>";
     echo "localidade = ".$objeto->localidade."<br>";
     echo "uf = ".$objeto->uf."<br>";
echo "</td>";
echo "<td style = 'border:solid 1px gray;padding:5px;width:135px;' >
	 ".$row["informacoes"]."
	  </td>";
echo "<td style = 'border:solid 1px gray;padding:5px;width:150px;text-align:center;display:none;' >
	 ".$row["imagem"]." 
	 </td>";
echo "<td style = 'border:solid 1px gray;padding:5px;width:150px;text-align:center;' >
	 
	  </td>";
echo "</tr>";
	}
}

mysqli_close($conn);

?>


</table>
</td></tr>
<tr>
<td style = "padding:20px;" >
<span style = "float:left;font-size:10px;" id="myDIVdois" ></span>
<span style = "float:right;" id="myDIV" ></span>
</td>
</tr>
</table>
</div>

<script>

var paginaAtual = 1;	

var table = document.getElementById('lista');

var linhasFicaramInvisiveisPeloFiltro = [];

for (var r = 1; r < table.rows.length; r++){  	
	linhasFicaramInvisiveisPeloFiltro[r] = '';
}

var pag = 1;
mostrardividido('lista', pag);
var colunaUltima = "";
mudarImagem(1);

aparecerImagem();

</script>

<?php
include 'Partes iguais/Rodape.php';
?>