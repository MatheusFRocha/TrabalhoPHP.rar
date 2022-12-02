<?php
require_once("header.php");
require_once("./BancoDeDados/aluno.php");
require_once("valida_formulario.php");

if (isset($_POST['idmateriaUPD'])) {
    if (caracteresInvalidos($_POST['idmateriaUPD'])) {
        die("Caracteres inválidos detectados!");
    } else {
        $id = trim($_POST['idmateriaUPD']);
        $materia = trim($_POST['materia']);
        setName($id, $nome);
        header("Location: form_materia.php?upd=1");
    }
}
