<?php
require_once("header.php");
require_once("./BancoDeDados/aluno.php");
require_once("valida_formulario.php");
require_once("./BancoDeDados/login.php"); //verificação da exclusão
require_once('./BancoDeDados/matricula.php');

if (isset($_POST['idalunoDEL'])) {
    if (caracteresInvalidos($_POST['idalunoDEL'])) {
        die("Caracteres inválidos detectados!");
    } else {
        $id = trim($_POST['idalunoDEL']);

       
        if (liberarExclusao($id)) {
            if ($id != 1) {
                delID($id);
              
                foreach (ListamatriculaALuno() as $matricula) {
                    if ($matricula['idaluno'] == $idMateria) {
                        $podeexcluir = false;
                    }
                }

                header("Location: form_aluno.php?del=1");
                echo "err1";
            } else {
                header("Location: form_aluno.php?del=2");
                echo "teste";
            }
        } else {
            header("Location: form_aluno.php?del=0");
            echo "teste2";
        }
    }
}
