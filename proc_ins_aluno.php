<?php

require_once("header.php");
require_once("./BancoDeDados/aluno.php");
require_once("valida_formulario.php");

if (!caracteresInvalidos($_POST['cadAluno']) && trim($_POST['cadAluno']) != "") {
    $valor = trim($_POST['cadAluno']);
    if (existeAluno($valor)) {
        die("Já existe um cadastro com esse nome.");
    } else {
        $valor = trim($_POST['cadAluno']);
        cadastrarAluno($valor);
        header('Location: form_aluno.php');
    }
}
