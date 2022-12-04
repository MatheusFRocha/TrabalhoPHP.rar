<?php

require_once("header.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/NotasAlunos.php");

$dsnota = $_POST["dsnota"];
$idaavaliacao =  $_POST["idavaliacao"];
$idaluno =  $_POST["idaluno"];

$select = ListaNotasAlunos();

foreach ($select as $nota) {
    if ($nota['idaluno'] == $idaluno && $nota['idavaliacao'] == $idaavaliacao) {
        die("Não é possivel cadastrar notas para a mesma avaliação!");
    }
}

if ($dsnota >= 10 or null) {
    echo "padrão de nota inválido";
} else {
    cadastrarNotaAluno($idaavaliacao, $dsnota, $idaluno);
}
