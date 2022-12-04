<?php
require_once("header.php");
require_once("./BancoDeDados/aluno.php");
require_once("valida_formulario.php");





if (isset($_POST['idalunoUPD'])) {
    if (caracteresInvalidos($_POST['nmaluno'])) {
        die("Caracteres inválidos detectados!");


        echo "caracteres ou ja existe";
    } elseif (verificanomealuno(trim($_POST['nmaluno']))) {

        die("ja cadastrado ");
    } else {
        $id = trim($_POST['idalunoUPD']);
        $nome = trim($_POST['nmaluno']);
        setName($id, $nome);
        header("Location: form_aluno.php?upd=1");
    }
}
