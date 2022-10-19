<?php
require_once __DIR__ . "/vendor/autoload.php";
$alunos = Aluno::findallPMateriaBiologia();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Alunos de Biologia</title>
</head>

<body>
    <h1>PEDRO</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Nota</th>
                <th scope="col">Frequência</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($alunos as $aluno) {
                echo "<tr>";
                echo "<td>{$aluno->getNome()}</td>";
                echo "<td>{$aluno->getNota()}</td>";
                echo "<td>".(($aluno->getFrequencia() == 1) ? 'Presente' : 'Falta')."</td>";

                echo "<td>
                <a href='formEdit.php?id={$aluno->getId()}'>Editar</a>
                <a href='excluir.php?id={$aluno->getId()}'>Excluir</a> 
             </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href='index.php'>Voltar</a><br>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>