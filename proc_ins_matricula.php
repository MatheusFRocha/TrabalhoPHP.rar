<?php

require_once("header.php");
require_once("./valida_formulario.php");
require_once("./BancoDeDados/matricula.php");

$idaluno =  $_POST["idalunomatricula"];
$idmateria =  $_POST["idmateria"];

cadastrarMatricula($idaluno, $idmateria);
