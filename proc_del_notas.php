<?php
require_once("header.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/NotasAlunos.php");

$idNota = $_POST['idnotasDEL'];


var_dump($_POST['idnotasDEL']);

if (isset($idNota)) {
    if (caracteresInvalidos($idNota)) {
        die("Caracteres inválidos detectados!");
    } else {
        $id = trim($idNota);
            if (liberarExclusao($id)) {
                deleteNota($id);

        } 
        else {
           echo"não foi possivel";
        }
    }
}
