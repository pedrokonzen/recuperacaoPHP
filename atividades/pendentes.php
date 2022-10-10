<?php
require_once __DIR__ . "/vendor/autoload.php";
$atividades = Atividade::findallPENDENTES();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Atividades</title>
</head>

<body>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Descricao</th>
        <th scope="col">Data</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($atividades as $atividade) {
        echo "<tr>";
        echo "<td>{$atividade->getDescricao()}</td>";
        echo "<td>{$atividade->getData()}</td>";
        echo "<td>" . (($atividade->getStatus() == 0) ? 'Realizada' : 'Pendente') . "</td>";


        echo "<td>
                    <a href='editar.php?id={$atividade->getId()}'>Editar</a>
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
</body>

</html>