<?php
require_once __DIR__."/vendor/autoload.php";
$atividade = Atividade::find($_GET['id']);
$atividade->delete();
header("location:index.php");