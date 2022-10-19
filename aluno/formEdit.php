<?php
if(isset($_GET['id'])){
    require_once __DIR__."/vendor/autoload.php";
    $aluno = Aluno::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $aluno = new Aluno
    ($_POST['nome'],
    $_POST['materia'],
    $_POST['nota'],
    ($_POST['frequencia'] == "on") ? 1 : 0);

    $aluno->setId($_POST['id']);
    $aluno->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
</head>
<body>
    <form action='formEdit.php' method='POST'>
        <?php
            echo "Nome: <input name='nome' value='{$aluno->getNome()}' type='text' required> <br>";
            echo "Matéria: <input name='materia' value='{$aluno->getMateria()}' type='text' required><br>";
            echo "Nota: <input name='nota' value='{$aluno->getNota()}' type='number' required><br>";
            echo "Frequência: <input name='frequencia' type='checkbox' ".($aluno->getFrequencia() ? 'checked' : '0' )."> <br>";
            echo "<input name='id' value='{$aluno->getId()}' type='hidden'>";


        ?>
        <input type='submit' name='botao'>
    </form>
</body>
</html>

