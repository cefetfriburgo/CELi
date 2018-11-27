<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
mysqli_set_charset($conexao,"u tf8");
if (!$conexao){
    echo "ERROR! failure to connect to the database.";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}

$selecionar = "SELECT titulo FROM turma WHERE idturma=" . $turma;
$query = mysqli_query($conexao, $selecionar);
$nome = mysqli_fetch_assoc($query);

if(isset($_POST['excluirCurso'])){
    $deletar = "DELETE FROM turma WHERE idturma=" . $turma;
    if(mysqli_query($conexao, $deletar))
    {
        header('location: /admin/turma/excluido');
    }
    
} 