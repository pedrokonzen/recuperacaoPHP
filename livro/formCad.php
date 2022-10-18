<?php
if (isset($_POST['botao'])) {
    require_once __DIR__ . "/vendor/autoload.php";
    $livro = new Livro
    ($_POST['titulo'], 
    $_POST['autoras'], 
    ($_POST['status'] == "on") ? 1 : 0);
    $livro->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Livro</title>
</head>

<body>
    <form action='formCad.php' method='POST'>
        Título: <input name='titulo' type='text' required>
        <br>
        Autoras: <input name='autoras' type='text' required>
        <br>
        Status:
        <br>
        <input type="checkbox" name="status">Lido / Não Lido:
        <input type='submit' name='botao'>
    </form>
</body>

</html>