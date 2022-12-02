<?php require("header.php") ?>

<body>

    <?php
    require("menu.php");

    require_once("./BancoDeDados/avaliacao.php");
    require_once("./BancoDeDados/materia.php");

    ?>


    <div class="content">
        <h2>Manutenção de alunos </h2>
        <hr />

        <form action="proc_ins_materia.php" method="POST">
            <label>Matéria: <input name="dsmateria" type="text"> </label>
            </select>
            <input type="submit" value="cadastrar">
        </form>
        <hr />
        <?php
        $materia = ListamateriaALuno();

        echo "<table>" .
            "<thead>" .
            "<tr>" .
            "<th>Matérias:</th>" .
            "<th>Exclusão:</th>" .
            "</tr>" .
            "</thead>" .
            "<tbody> ";

        foreach ($materia as $registro) {
            echo '<tr>' .
                '        <td>' . $registro['dsmateria'] . '</td>' .
                ' <td>' .


                '<form action="proc_del_materias.php" method="POST">' .
                '    <input type="hidden" name="idmateriaDEL" value="' . $registro['idmateria'] . '" />' .
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