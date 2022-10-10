<?php
if(isset($_GET['id'])){
    require_once __DIR__."/vendor/autoload.php";
    $atividade = Atividade::find($_GET['id']);
}
if(isset($_POST['botao'])){
    require_once __DIR__."/vendor/autoload.php";
    $atividade = new Atividade
    ($_POST['descricao'],
    $_POST['data'],
    $_POST['status'] = ( isset($_POST['status']) ) ? false : 0);
    $atividade->setId($_POST['id']);
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
    <title>Editar Status</title>
</head>
<body>
    <form action='editar.php' method='POST'>
        <?php
            echo "Descrição: <input name='descricao' value='{$atividade->getDescricao()}' type='text' required> <br>";
            echo "Data: <input name='data' value='{$atividade->getData()}' type='date' required><br>";
            echo "Status: <input name='status' type='checkbox' ".($atividade->getStatus() ? 'checked' : '0' )." ><br>";
            echo "<input name='id' value='{$atividade->getId()}' type='hidden'>";


        ?>
        <input type='submit' name='botao'>
    </form>
</body>
</html>

