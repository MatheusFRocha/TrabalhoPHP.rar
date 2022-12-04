<?php
require_once("mysql.php");
require_once("valida_formulario.php");

function cadastrarLogin($dslogin, $dssenha, $idaluno)
{
    echo "teste";
    if (membroValido($dslogin, "usuario") != "1") die("Erro no usuário");
    if (membroValido($dssenha, "senha") != "1") die("Erro na senha");

    $sqlInsert = "insert into login(dslogin,dssenha,idaluno) values
         ('@nome','@senha','@id')";

    $sql = str_replace("@nome", $dslogin, $sqlInsert);
    $sql = str_replace("@senha", md5($dssenha), $sql);
    $sql = str_replace("@id", $idaluno, $sql);

    //var_dump($sql);
    insereRegistro($sql);
}

function verificarLogin($dslogin, $dssenha)
{
    $sqlValida = "Select * from login where dslogin='@login' and dssenha='@senha'";
    $sql = str_replace("@login", $dslogin, $sqlValida);
    $sql = str_replace("@senha", md5($dssenha), $sql);

    //die($dssenha);
    $login = selectRegistros($sql);

    if (count($login) > 0) return true;
    else return false;
}


function verificarAcesso($idaluno)
{
    $sqlValida = "Select * from login where idaluno='@idaluno'";
    $sql = str_replace("@idaluno", $idaluno, $sqlValida);


    //die($dssenha);
    $idaluno = selectRegistros($sql);

    if (count($idaluno) > 0) return true;
    else return false;
}

function revalidarLogin()
{
    session_name(md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']));
    session_start();

    if (
        empty($_SESSION['token']) || empty($_SESSION['dssenha']) ||
        empty($_SESSION['dslogin'])
    ) {
        return false;
    }

    $tokenBody = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

    if ($_SESSION['token'] != $tokenBody) {
        return false;
    }

    $sqlValida = "Select * from login where dslogin='@login' and dssenha='@senha'";
    $sql = str_replace("@login", $_SESSION['dslogin'], $sqlValida);
    $sql = str_replace("@senha", md5($_SESSION['dssenha']), $sql);

    $login = selectRegistros($sql);

    if (count($login) > 0) return true;
    else return false;
}

function liberarExclusao($id)
{
    $sql = "SELECT * FROM login WHERE idaluno=" . $id;

    $login = selectRegistros($sql);

    if (count($login) > 0) return false;
    else return true;
}


function excluiacesso($id)
{

    $sql = "DELETE FROM LOGIN WHERE idaluno  = " . $id;


    return deleteRegistro($sql);
}
function listarLogins()
{
    return selectRegistros("select * from login");
}
//cadastraLogin("teste","testesenha",1);
//var_dump(verificarLogin('Aluno Valido','teste123'));

function ListarAlunosValidos()
{
    $sql = "select * " .
        "from aluno a " .
        "where a.idaluno not in (select idaluno from login l where l.idaluno = a.idaluno) ";

    return selectRegistros($sql);
}

function ListarTodosLogin()
{
    $sql = "select l.dslogin," .
        " l.dssenha," .
        " l.idaluno," .
        " a.nmaluno" .
        " from login l," .
        " aluno a" .
        " where l.idaluno = a.idaluno";

    return selectRegistros($sql);
}




function GetAcesso($dslogin)
{
    return selectRegistros("select * from login where dslogin ='" . $dslogin . "'")[0];
}

function attacesso($senha, $id)
{

    $sql = " update login set `dssenha` = '" . trim(md5($senha)) . "' where dslogin = '$id '  ";

    updateRegistro($sql);
}


//verifica se existe algum acesso na tabela de matricula.
function existeacessomatricula($id)
{

    $retorno = selectRegistros("SELECT * FROM alunomatriculado M 
    INNER JOIN login L ON M.idaluno = L.idaluno where M.idaluno = $id");

    return $retorno;
}
