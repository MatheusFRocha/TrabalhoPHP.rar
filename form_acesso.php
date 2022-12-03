<?php require_once("header.php");
require_once("menu.php");
require_once("./BancoDeDados/login.php");


//var_dump($alunos);
?>

<div class="content">
    <h2>Manutenção de alunos </h2>
    <hr />

    <form action="proc_ins_acesso.php" method="POST">
        <label>Usuário: <input name="dslogin" type="text"> </label>
        <label>Senha: <input name="dssenha" type="password"> </label>
        <select name="idaluno">
            <option selected></option>

            <?php
            $alunos = ListarAlunosValidos();

            foreach ($alunos as $aluno) {
                echo '<option value="' . $aluno['idaluno'] . '">' . $aluno['nmaluno'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="cadastrar">
    </form>

    <hr />

    <table style="border: 1px; color:black;">
        <thead>
            <th>Usuário</th>
            <th>Senha</th>
            <th>Aluno</th>

            <th> Excluir </th>
        </thead>
        <tbody>
            <?php
            $listagem = ListarTodosLogin();
            foreach ($listagem as $login) {


                echo '<tr>' .

                    '        <td> <a href=form_acesso.php?alterarid=' . $login['dslogin'] . '>' . $login['dslogin'] . '</a></td>' .
                    '        <td>' . $login['dssenha'] . '</td>' .

                    ' <td>' . $login['nmaluno'] . '</td>' .
                    "<td>" .
                    '<form action="proc_del_acesso.php" method="POST" >' .
                    '<input type="hidden" name ="idAcessoDel" value="' .  $login['idaluno']  . '">' .
                    '<input type="submit"  value=" Excluir "/>' .
                    "</form>" .
                    "</td>" .
                    "</tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <?php
                    if (isset($_GET['upd'])) echo "Registro alterado";
                    if (isset($_GET['del'])) {
                        switch ($_GET['del']) {
                            case "0":
                                echo "o registro não pode ser excluído";
                                break;
                            case "1":
                                echo "registro excluído";
                                break;
                            case "2":
                                echo "O administrador não pode ser excluído";
                                break;
                            default:
                                echo "comando inválido";
                        }
                    }

                    ?></td>
            </tr>
        </tfoot>
    </table>
    <hr />
    <?php

    if (isset($_GET['alterarid'])) {
        echo '<form action="proc_upd_acesso.php" method="POST">';
        echo '    <input type="text" name="dssenha" value=" ' . GetAcesso($_GET['alterarid'])['dssenha'] . ' " />';
        echo '    <input type="hidden" name="idTrocasenha" value="' . $_GET['alterarid'] . '" />';

        echo '    <input type="submit" value="alterar" />';
        echo '</form>';
    }
    ?>
</div>
</div>