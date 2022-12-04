<?php
require_once("mysql.php");

$sqlSelect = "select * from aluno where lower(nmaluno) like '%";
$novoAluno = "insert into aluno(nmaluno) values ('@')";

function selecionaAluno($nome)
{
    global $sqlSelect;

    $sql = $sqlSelect . strtolower($nome) . "%'";

    return selectRegistros($sql);
}

function listaAlunos()
{
    return selectRegistros("select * from aluno");
}

function existeAluno($nome)
{
    //$sql = "select * from aluno where lower(nmaluno)='" . strtolower(utf8_encode($nome)) . "'";

    //die($sql);

    $retorno = selectRegistros("select * from aluno where lower(nmaluno)='" . strtolower($nome) . "'");

    if (count($retorno) > 0) return true;
    else return false;
}
function cadastrarAluno($nome)
{
    //die($nome);
    global $novoAluno;

    $sql = str_replace("@", $nome, $novoAluno);

    return insereRegistro($sql);
}

function getNameAluno($id)
{
    $retorno = selectRegistros("select * from aluno where idaluno='" . $id . "'");


    return $retorno[0];
}


function verificanomealuno($nomealuno)
{

    $retorno   = selectRegistros("select * from aluno where nmaluno ='" . $nomealuno . "'");

    if (count($retorno) > 0) {

        return True;
    } else {
        return false;
    }
}




function setName($id, $nome)
{
    $sql = "UPDATE ALUNO SET NMaluno='" . $nome . "' WHERE idaluno=" . $id;

    return updateRegistro($sql);
}
//var_dump(listaAluno("teste"));
//var_dump(listaAlunos());
function delID($id)
{
    $sql = "DELETE FROM ALUNO  WHERE idaluno=" . $id;

    return deleteRegistro($sql);
}

