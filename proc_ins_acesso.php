<?php

require_once("header.php");
require_once("./BancoDeDados/aluno.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/login.php");

$login = $_POST["dslogin"];
$senha = $_POST["dssenha"];


if (!caracteresInvalidos($_POST['idaluno']) && trim($_POST['idaluno']) != "") {
    $valor = trim($_POST['idaluno']);
    if (verificarAcesso($valor)) {
        die("Já existe um cadastro com esse Id.");
    } else {
        $valor = trim($_POST['idaluno']);
        cadastrarLogin($login, $senha, $valor);
        header('Location: form_aluno.php');
    }
}
