<?php
if (isset($_POST['botao'])) {
    require_once __DIR__ . "/vendor/autoload.php";
    $receita = new Receita
    ($_POST['titulo'], 
    $_POST['ingredientes'], 
    $_POST['categoria']);
    $receita->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Receita</title>
</head>

<body>
    <form action='formCad.php' method='POST'>
        Título: <input name='titulo' type='text' required>
        <br>
        Ingredientes: <input name='ingredientes' type='text' required>
        <br>
        Categoria (Informe o grau de dificuldade, 1-5): 
        <br> 
        <input type="number" required name="categoria" min="1" max="5"> 
        <br>
        <input type='submit' name='botao'>
    </form>
</body>

</html>