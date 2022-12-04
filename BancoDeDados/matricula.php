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
function cadastrarMatricula($idaluno, $idmateria)
{


    $sqlInsert = "insert into alunomatriculado (idaluno, idmateria) values ( @idaluno, @idmateria)";

    $sql = str_replace("@idaluno", $idaluno, $sqlInsert);
    $sql = str_replace("@idmateria", $idmateria, $sql);


    insereRegistro($sql);
}
function deleteMatricula($id)
{
    $sql = "DELETE FROM alunomatriculado WHERE idalunomatriculado=" . $id;

    return deleteRegistro($sql);
}
function ListaMatriculaAlunos()
{
    // $sqlselect =  "SELECT * FROM aluno A INNER JOIN alunomatriculado AM ON A.idaluno = AM.idaluno INNER JOIN materia M ON M.idmateria = AM.idmateria";
    $sqlselect = "SELECT * FROM aluno A INNER JOIN alunomatriculado AM ON A.idaluno = AM.idaluno INNER JOIN materia M ON M.idmateria = AM.idmateria inner join avaliacaoaluno AV on AV.idavaliacao";


    return selectRegistros($sqlselect);
}
function getNameMatricula($id)
{
    $retorno = selectRegistros("select * from alunomatriculado where idalunomatriculado='" . $id . "'");

    return $retorno[0]['idmateria'];
}
function GetMatricula($id)
{
    $retorno = selectRegistros("select * from alunomatriculado where idalunomatriculado ='" . $id . "'");

    return $retorno[0];
}
function AttMatricula($materia, $id)
{

    $sql = "UPDATE alunomatriculado SET `idmateria`=  $materia   WHERE idalunomatriculado=" . $id;


    return updateRegistro($sql);
}
function ListaAlunosMatriculados()
{
    $sqlselect =  "SELECT * FROM aluno A INNER JOIN alunomatriculado AM ON A.idaluno = AM.idaluno INNER JOIN materia M ON M.idmateria = AM.idmateria";


    return selectRegistros($sqlselect);
}
