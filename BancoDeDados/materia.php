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



function deleteMateria($id)
{
    $sql = "DELETE FROM materia WHERE idmateria=" . $id;

    return deleteRegistro($sql);
}
function GetMaterias($id)
{
    $retorno = selectRegistros("select * from materia where idmateria ='" . $id . "'");

    return $retorno[0];
}
function setMateriaName($id, $nome)
{
    $sql = "UPDATE materia SET dsmateria='" . $nome . "' WHERE idmateria=" . $id;

    return updateRegistro($sql);
}
