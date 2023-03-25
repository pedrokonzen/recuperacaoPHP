<?php
if (isset($_POST['botao'])) {
    require_once __DIR__ . "/vendor/autoload.php";
    $aluno = new Aluno
    ($_POST['nome'], 
    $_POST['materia'], 
    $_POST['nota'],
    ($_POST['frequencia'] == "on") ? 1 : 0);
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
    <title>Adicionar Aluno</title>
</head>
<body>
    <form action="formCad.php" method="post">
        <label for="nome">Insira o Nome: </label>
        <input type="text" name="nome" required>
        <br>
        <label for="materia">Informe a Matéria: </label>
        <select name="materia">
            <option selected disabled="disabled">Selecione a Matéria</option>
            <option>TESTE COMMIT</option>
            <option>Português</option>
            <option>Filosofia</option>
            <option>Biologia</option>
        </select>
        <br>
        <label for="nota">Insira a Nota: </label>
        <input type="number" name="nota" max="10" min="0" required>
        <br>
        <label for="frequencia">Registre a frequência: </label>
        <input type="checkbox" name="frequencia" >
        <input type='submit' name='botao'>
    </form>
    
</body>
</html>