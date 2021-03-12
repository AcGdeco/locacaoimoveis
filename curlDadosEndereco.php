<?php
// Listar dados do endereço
$url ="viacep.com.br/ws/".$cep."/json/";

$ch = curl_init();
curl_setopt( $ch, CURLOPT_URL, $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec( $ch );

//var_dump($response);
//echo $response;

//Converte a resposta json em um objeto
$objeto = json_decode($response);

//echo $objeto->cep;

//echo "<pre>";
//var_dump($response);
//echo "</pre>";



























?>