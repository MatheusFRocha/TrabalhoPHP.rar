<?php
require_once("header.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/NotasAlunos.php");

$idNota = $_POST['idnotasDEL'];

if (isset($idNota)) {
    if (caracteresInvalidos($idNota)) {
        die("Caracteres inválidos detectados!");
    } else {
        deleteNota($idNota);
        header('Location: form_notaAluno.php');
    }
}
