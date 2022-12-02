<?php
require_once("header.php");
require_once("./BancoDeDados/aluno.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/login.php"); //verificação da exclusão



$id = $_POST["idAcessoDel"];

var_dump($id);

excluiacesso($id);