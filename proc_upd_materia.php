<?php
require_once("header.php");
require_once("./BancoDeDados/materia.php");
require_once("valida_formulario.php");

$id = $_POST['idTroca'];
$materia = $_POST['materia'];

if (isset($id)) {
    if (caracteresInvalidos($_POST['materia'])) {
        die("Caracteres inválidos detectados!");


        echo "caracteres ou ja existe";
    } elseif (VerificaMateria(trim($_POST['materia']))) {

        die("ja cadastrado ");
    } else {
        $id = trim($_POST['idTroca']);
        $nome = trim($_POST['materia']);
        setMateriaName($id, $nome);
        header("Location: form_materia.php?upd=1");
    }
}
