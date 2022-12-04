<?php
require_once("header.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/matricula.php");
require_once("./BancoDeDados/login.php");

$idMatricula = $_POST['idMatriculaDEL'];


if (isset($idMatricula)) {
    if (caracteresInvalidos($idMatricula)) {
        die("Caracteres inválidos detectados!");
    } else {
        if (getNameMatricula($idMatricula)) {
            deleteMatricula($idMatricula);
        } else {
            die("Não foi possivel!");
        }
    }
}
