<?php
require_once __DIR__."/vendor/autoload.php"; 
$livros = Livro::findall();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Livros</title>
</head>
<body>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Título</th>
      <th scope="col">Autoras</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($livros as $livro){
        echo "<tr>";
        echo "<td>{$livro->getTitulo()}</td>";
        echo "<td>{$livro->getAutoras()}</td>";
        echo "<td>".(($livro->getStatus() == 0)? 'Lido' : 'Não Lido')."</td>";


        echo "<td>
                <a href='formEdit.php?id={$livro->getId()}'>Editar</a>
                <a href='excluir.php?id={$livro->getId()}'>Excluir</a> 
             </td>";
        echo "</tr>";
    }
    ?>
  </tbody>
</table>
<a href='formCad.php'>Criar Livro</a><br>
<a href='livrosLidos.php'>Livros já lidos</a><br>
<a href='livrosNaoLidos.php'>Livros não lidos</a><br>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>






