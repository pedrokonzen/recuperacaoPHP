<?php
require_once __DIR__."/vendor/autoload.php";
$livros = Livro::findAllLidos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Livros lidos</title>
</head>

<body>
    <div class="container">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Título</th>
              <th scope="col">Autoras</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach($livros as $livro){
                echo "<tr>";
                echo "<td>{$livro->getTitulo()}</td>";
                echo "<td>{$livro->getAutoras()}</td>";
                
                echo "</tr>";
            }
            ?>
          </tbody>
        </table>

        <div class="btn">
            <a href='index.php'>Voltar</a>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</body>
</html>