<?php
require_once("header.php");
require_once("./BancoDeDados/aluno.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/login.php"); //verificação da exclusão

if (isset($_POST['idalunoDEL'])) {
    if (caracteresInvalidos($_POST['idalunoDEL'])) {
        die("Caracteres inválidos detectados!");
    } else {
        $id = trim($_POST['idalunoDEL']);
        if (liberarExclusao($id)) {
            if ($id != 1) {
                delID($id);
                header("Location: form_aluno.php?del=1");
            } else {
                header("Location: form_aluno.php?del=2");
            }
        } else {
            header("Location: form_aluno.php?del=0");
        }
    }
}
