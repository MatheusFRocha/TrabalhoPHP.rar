<?php
require_once("mysql.php");
require_once("valida_formulario.php");

$sqlSelect = "select * from materia where lower(dsmateria) like '%";
$novoMateria = "insert into materia(dsmateria) values ('@materia')";



function SelecionaMateria($dsmateria)
{
    global $sqlSelect;

    $sql = $sqlSelect . strtolower($dsmateria) . "%'";

    return selectRegistros($sql);
}

function ListamateriaALuno()
{
    return selectRegistros("select * from materia");
}

function existeMateria($dsmateria)
{
    $retorno = selectRegistros("select * from materia where lower(dsmateria)='" . strtolower($dsmateria) . "'");

    if (count($retorno) > 0) return true;
    else return false;
}

//cadastro de nota para o aluno
function cadastrarMateria($dsmateria)
{


    $sql = "insert into materia(dsmateria) values ('$dsmateria')";


    insereRegistro($sql);
}

function att($id, $nota)
{

    $sql = " update avaliacaoaluno set `nota` = $nota where idavaliacaoaluno = $id   ";

    updateRegistro($sql);
}



function GetNotas($id)
{
    $retorno = selectRegistros("select * from avaliacaoaluno where idavaliacaoaluno ='" . $id . "'");

    return $retorno[0];
}


//var_dump(listaAluno("teste"));
//var_dump(listaAlunos());

function AgetNota($idavaliacaoaluno)
{
    $retorno = selectRegistros("select * from nota where nmnota='" . $idavaliacaoaluno     . "'");

    return $retorno[0]['nota'];
}



function deleteMateria($id)
{
    $sql = "DELETE FROM materia WHERE idmateria=" . $id;

    return deleteRegistro($sql);
}
