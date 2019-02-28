<?php

if(isset($_POST['excluirCurso'])){
$edital = $_POST['excluirCurso'];
}

$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
mysqli_set_charset($conexao,"utf8");
if (!$conexao){
    echo "ERROR! failure to connect to the database.";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}

$selecionar = "SELECT idedital, date_format(data_ini, '%d/%m/%Y') as 'inicio', date_format(data_fim, '%d/%m/%Y') as 'fim', time_format(hora_ini, '%h:%i') as 'hora_inicio', time_format(hora_fim, '%h:%i') as 'hora_final' FROM edital WHERE idedital=" . $edital;
$query = mysqli_query($conexao, $selecionar);
$id = mysqli_fetch_assoc($query);

if(isset($_POST['excluirCurso'])){
    $deletar = "DELETE FROM edital WHERE idedital = $edital";
    $sql = "DELETE FROM editalcurso WHERE idedital = $edital";
    if(mysqli_query($conexao, $deletar) && mysqli_query($conexao, $sql))
    {
        header('location: /admin/edital/excluido');
    }
    
}
