<?php
require_once("header.php");
require_once("./BancoDeDados/materia.php");
require_once("valida_formulario.php");

$id = $_POST['idTroca'];
$materia = $_POST['materia'];

setMateriaName($id, $materia);
