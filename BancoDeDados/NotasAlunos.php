<?php
require_once("mysql.php");
require_once("valida_formulario.php");

$sqlSelect = "select * from aluno where lower(nmaluno) like '%";
$sqlInsert = "insert into avaliacaoaluno(idavaliacao, nota, idaluno ) values (@idavaliacao, @nota, @idaluno )";



function AselecionaAluno($nome)
{
    global $sqlSelect;

    $sql = $sqlSelect . strtolower($nome) . "%'";

    return selectRegistros($sql);
}

function ListaNotasAlunos()
{
    return selectRegistros("select * from avaliacaoaluno AVA inner join avaliacao AV on AV.idavaliacao = AVA.idavaliacao inner join aluno A on A.idaluno = AVA.idaluno");
}

function AexisteAluno($nome)
{
    //$sql = "select * from aluno where lower(nmaluno)='" . strtolower(utf8_encode($nome)) . "'";

    //die($sql);

    $retorno = selectRegistros("select * from aluno where lower(nmaluno)='" . strtolower($nome) . "'");

    if (count($retorno) > 0) return true;
    else return false;
}

//cadastro de nota para o aluno
function cadastrarNotaAluno($avaliacao, $nota, $idaluno)
{
    global $sqlInsert;

    $sql = str_replace("@nota", $nota, $sqlInsert);
    $sql = str_replace("@idavaliacao", $avaliacao, $sql);
    $sql = str_replace("@idaluno", $idaluno, $sql);

    echo $sql;



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



function deleteNota($id)
{
    $sql = "DELETE FROM avaliacaoaluno WHERE idavaliacaoaluno=" . $id;

    return deleteRegistro($sql);
}
