<?php

require_once("header.php");
require_once("./BancoDeDados/materia.php");
require_once("valida_formulario.php");

if (!caracteresInvalidos($_POST['dsmateria']) && trim($_POST['dsmateria']) != "") {
    $valor = trim($_POST['dsmateria']);
    if (existeMateria($valor)) {
        die("Já existe um cadastro com esse nome.");
    } else {
        cadastrarMateria($valor);
        header('Location: form_materia.php');
    }
}
