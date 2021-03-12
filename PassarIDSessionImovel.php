<?php

session_start();

$_SESSION["id"] = $_POST["id"];

$_SESSION["valor"] = $_POST["valor"];

$_SESSION["cep"] = $_POST["cep"];

$_SESSION["informacoes"] = $_POST["informacoes"];

$_SESSION["imagem"] = $_POST["imagem"];

?>