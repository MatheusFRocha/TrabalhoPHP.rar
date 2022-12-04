<?php

require_once("header.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/NotasAlunos.php");

$dsnota = $_POST["dsnota"];
$idaavaliacao =  $_POST["idavaliacao"];
$idaluno =  $_POST["idaluno"];





if ($dsnota >= 10 or null) {
    echo "padrão de nota inválido";
} else {
    cadastrarNotaAluno($idaavaliacao, $dsnota, $idaluno);
}
