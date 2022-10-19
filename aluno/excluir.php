<?php
require_once __DIR__."/vendor/autoload.php";
$aluno = Aluno::find($_GET['id']);
$aluno->delete();
header("location:index.php");