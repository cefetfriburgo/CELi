<?php
$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
mysqli_set_charset($conexao,"utf8");
if (!$conexao){
    echo "ERROR! failure to connect to the database.";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}
$selecionar = "SELECT nome FROM curso WHERE idcurso=" . $curso;
$query = mysqli_query($conexao, $selecionar);
$nome = mysqli_fetch_assoc($query);
if(isset($_POST['excluirCurso'])){
    $deletar = "DELETE FROM curso WHERE idcurso=" . $curso;
    if(mysqli_query($conexao, $deletar))
    {
        header('location: /admin/curso/excluido');
    }
    
}