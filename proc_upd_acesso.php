<?php
require_once("header.php");
require_once("./BancoDeDados/login.php");
require_once("valida_formulario.php");

$id = $_POST['idTrocasenha'];
$senha = trim($_POST['dssenha']);
$msg = '';



if (caracteresInvalidos($id) or caracteresInvalidos($senha)) {
    $msg = $msg . 'Os dados estão inválidos, tente novamente!<br>';
}
if ($msg == "") {
    attacesso($senha, $id);
} else {
    die($msg);
}
