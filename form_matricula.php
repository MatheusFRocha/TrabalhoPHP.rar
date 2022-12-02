<?php require("header.php") ?>

<body>

    <?php
    require("menu.php");

    require_once("./BancoDeDados/materia.php");
    require_once("./BancoDeDados/matricula.php");

    ?>


    <div class="content">
        <h2>Manutenção de alunos </h2>
        <hr />

        <form action="proc_ins_matricula.php" method="POST">

            </select>
            <select name="idalunomatricula">
                <?php
                $alunos = ListarAlunosValidos();

                foreach ($alunos as $aluno) {
                    echo '<option value="' . $aluno['idaluno'] . '">' . $aluno['nmaluno'] . "</option>";
                }
                ?>
            </select>



            <select name="idmateria">
                <?php

                $materias = ListarMateria();

                echo $materias;
                foreach ($materias as $materia) {
                    echo '<option value="' . $materia['idmateria'] . '">' . $materia['dsmateria'] . "</option>";
                }
                ?>
            </select>




            <input type="submit" value="cadastrar">
        </form>
        <hr />
        <?php
        $matricula = ListaMatriculaAlunos();

        echo "<table>" .
            "<thead>" .
            "<tr>" .
            "<th>Identificação</th>" .
            "<th>Aluno:</th>" .
            "<th>Matricula:</th>" .
            "<th>Matéria:</th>" .
            "<th>Exclusão:</th>" .
            "</tr>" .
            "</thead>" .
            "<tbody> ";

        foreach ($matricula as $registro) {
            echo '<tr>' .
                '        <td> <a href=form_matricula.php?alterarid=' . $registro['idalunomatriculado'] . '>' . $registro['idalunomatriculado'] . '</a></td>' .
                '        <td>' . $registro['nmaluno'] . '</td>' .
                '        <td>' . $registro['idalunomatriculado'] . '</td>' .
                '        <td>' . $registro['dsmateria'] . '</td>' .
                ' <td>' .





                '<form action="proc_del_matricula.php" method="POST">' .
                '    <input type="hidden" name="idmatriculadDel" value="' . $registro['idalunomatriculado'] . '" />' .
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