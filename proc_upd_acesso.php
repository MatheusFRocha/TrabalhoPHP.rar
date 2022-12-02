<?php
require_once("header.php");
require_once("./BancoDeDados/NotasAlunos.php");
require_once("valida_formulario.php");

$id = $_POST['idTrocasenha'];
$senha = $_POST['dssenha'];


attacesso($senha, $id);