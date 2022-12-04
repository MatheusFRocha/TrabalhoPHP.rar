<?php require("header.php") ?>

<body>

    <?php
    require("menu.php");

    require_once("./BancoDeDados/avaliacao.php");
    require_once("./BancoDeDados/NotasAlunos.php");
    require_once("./BancoDeDados/aluno.php");

    ?>


    <div class="content">
        <h2>Manutenção de alunos </h2>
        <hr />

        <form action="proc_ins_nota.php" method="POST">
            <label>Nota: <input name="dsnota" type="number"> </label>
            <select name="idavaliacao">
                <?php
                $materias = ListaAvaliacoes();

                foreach ($materias as $avaliacao) {
                    echo '<option value="' . $avaliacao['idavaliacao'] . '">' . $avaliacao['dsavaliacao'] . "</option>";
                }
                ?>
            </select>
            <select name="idaluno">
                <?php
                $alunos = listaAlunos();

                foreach ($alunos as $aluno) {
                    echo '<option value="' . $aluno['idaluno'] . '">' . $aluno['nmaluno'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="cadastrar">
        </form>
        <hr />
        <?php
        $notas = ListaNotasAlunos();

        echo "<table>" .
            "<thead>" .
            "<tr>" .
            "<th>Identificação</th>" .
            "<th>Aluno:</th>" .
            "<th>Avaliação:</th>" .
            "<th>Notas:</th>" .
            "<th>Exclusão:</th>" .
            "</tr>" .
            "</thead>" .
            "<tbody> ";

        foreach ($notas as $registro) {
            echo '<tr>' .
                '        <td> <a href=form_notaAluno.php?alterarid=' . $registro['idavaliacaoaluno'] . '>' . $registro['idavaliacaoaluno'] . '</a></td>' .
                '        <td>' . $registro['nmaluno'] . '</td>' .
                '        <td>' . $registro['dsavaliacao'] . '</td>' .
                '        <td>' . $registro['nota'] . '</td>' .
                ' <td>' .





                '<form action="proc_del_notas.php" method="POST">' .
                '    <input type="hidden" name="idnotasDEL" value="' . $registro['idavaliacaoaluno'] . '" />' .
                '    <input type="submit" value="Excluir" />' .
                '</form>' .
                '        </td>' .

                '     </tr>';
        }
        ?>

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
            echo '<form action="proc_upd_nota.php" method="POST">';
            echo '    <input type="text" name="nota" value=" ' . GetNotas($_GET['alterarid'])['nota'] . ' " />';
            echo '    <input type="hidden" name="idTroca" value="' . $_GET['alterarid'] . '" />';
            echo '    <input type="submit" value="alterar" />';
            echo '</form>';
        }
        ?>
    </div>


</body>

</html>