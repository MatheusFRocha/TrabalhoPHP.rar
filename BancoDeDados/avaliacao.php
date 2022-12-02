<?php
require_once("mysql.php");

function ListaAvaliacoes()
{
    return selectRegistros("select * from avaliacao");
}