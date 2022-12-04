<?php
require_once("header.php");
require_once("./BancoDeDados/aluno.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/login.php"); //verificação da exclusão



$id = $_POST["idacessoDel"];
if (existeacessomatricula($id)) {

    die("Aluno tem matricula cadastrada!");
} else {
    excluiacesso($id);
    header("Location: form_acesso.php?del=0");
}
