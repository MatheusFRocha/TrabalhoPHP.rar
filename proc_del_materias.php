<?php
require_once("header.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/materia.php");
require_once("./BancoDeDados/matricula.php");

// var_dump($_POST['idmateriasDEL']);
$podeexcluir = true;

if (isset($_POST['idmateriaDEL'])) {

    $idMateria = $_POST['idmateriaDEL'];

    if (!is_numeric($idMateria)) {
        die("Não pode!");
    } else {
        foreach (ListamatriculaALuno() as $matricula) {
            if ($matricula['idmateria'] == $idMateria) {
                $podeexcluir = false;
            }
        }
        if ($podeexcluir) {
            deleteMateria($idMateria);
        } else {
            die('A matéria está em uso!');
        }

        header('Location: form_materia.php');
    }
}
