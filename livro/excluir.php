<?php
require_once __DIR__."/vendor/autoload.php";
$livro = Livro::find($_GET['id']);
$livro->delete();
header("location:index.php");