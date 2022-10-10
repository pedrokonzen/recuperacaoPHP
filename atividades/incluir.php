<?php
if (isset($_POST['botao'])){
    require_once __DIR__ . "/vendor/autoload.php";
    $atividade = new Atividade
    ($_POST['descricao'],
    $_POST['data'],
    ($_POST['status'] == "on") ? 0 : 1);
    $atividade->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Atividade</title>
</head>
<body>
    <form action='incluir.php' method='POST'>
        Descrição: <input name='descricao' type='text' required>
        <br>
        Data: <input name='data' type='date' required>
        <br>
        <input type="checkbox" name="status">
        Realizado:
        <br>
        <input type='submit' name="botao">
    </form>
</body>
</html>