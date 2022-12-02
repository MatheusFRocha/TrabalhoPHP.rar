<?php
require_once("mysql.php");
require_once("valida_formulario.php");

$sqlSelect = "select * from alunomatriculado where lower(dsmatricula) like '%";
$novoMatricula = "insert into alunomatriculado(dsmatricula) values ('@matricula')";



function SelecionaMatricula($dsmatricula)
{
    global $sqlSelect;

    $sql = $sqlSelect . strtolower($dsmatricula) . "%'";

    return selectRegistros($sql);
}

function ListamatriculaALuno()
{
    return selectRegistros("select * from alunomatriculado");
}

function existeMatricula($dsmatricula)
{
    $retorno = selectRegistros("select * from alunomatriculado where lower(dsmatricula)='" . strtolower($dsmatricula) . "'");

    if (count($retorno) > 0) return true;
    else return false;
}

//cadastro de nota para o aluno
function cadastrarMatricula($dsmatricula)
{


    $sql = "insert into alunomatriculado(dsmatricula) values ('$dsmatricula')";


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



function deleteMatricula($id)
{
    $sql = "DELETE FROM matricula WHERE idmatricula=" . $id;

    return deleteRegistro($sql);
}
