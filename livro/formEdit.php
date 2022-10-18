<?php
if(isset($_GET['id'])){
    require_once __DIR__."/vendor/autoload.php";
    $livro = Livro::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $livro = new Livro
    ($_POST['titulo'],
    $_POST['autoras'],
    ($_POST['status'] == "on") ? 1 : 0);

    $livro->setId($_POST['id']);
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
    <title>Editar Status</title>
</head>
<body>
    <form action='formEdit.php' method='POST'>
        <?php
            echo "Título: <input name='titulo' value='{$livro->getTitulo()}' type='text' required> <br>";
            echo "Autoras: <input name='autoras' value='{$livro->getAutoras()}' type='text' required><br>";
            echo "Status: <input name='status' type='checkbox' ".($livro->getStatus() ? 'checked' : '0' )." ><br>";
            echo "<input name='id' value='{$livro->getId()}' type='hidden'>";


        ?>
        <input type='submit' name='botao'>
    </form>
</body>
</html>

