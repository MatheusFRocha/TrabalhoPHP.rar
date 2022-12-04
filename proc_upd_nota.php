<?php
require_once("header.php");
require_once("./BancoDeDados/NotasAlunos.php");
require_once("valida_formulario.php");

$id = $_POST['idTroca'];
$nota = trim($_POST['nota']);

if ($nota > 10) {
    die("Nota do aluno não pode ultrapassar 10!");
} else {
    att($id, $nota);
}
