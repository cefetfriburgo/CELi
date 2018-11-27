<?php

$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
mysqli_set_charset($conexao,"utf8");
if (!$conexao){
    echo "ERROR! failure to connect to the database.";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}

$selecionar = "SELECT idaluno, nome FROM aluno WHERE idaluno=" . $idaluno;
$query = mysqli_query($conexao, $selecionar);
$aluno = mysqli_fetch_assoc($query);

if(isset($_POST['excluirAluno'])){
    $deletar = "DELETE FROM aluno WHERE idaluno=" . $idaluno;
    if(mysqli_query($conexao, $deletar))
    {
        header('location: /admin/aluno/excluido');
    }
    
}