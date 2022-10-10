<?php
require_once __DIR__."/vendor/autoload.php";
$receita = Receita::find($_GET['id']);
$receita->delete();
header("location:index.php");