<?php
require_once("header.php");
require_once("./BancoDeDados/matricula.php");
require_once("valida_formulario.php");

$id = $_POST['idTroca'];
$materia = trim($_POST['materia']);

var_dump($materia);
var_dump($id);

AttMatricula($materia, $id);
