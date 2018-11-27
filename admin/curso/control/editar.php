<?php
include "validacaocurso.php";
    
$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
mysqli_set_charset($conexao,"utf8");
if (!$conexao){
    echo "ERROR! failure to connect to the database.";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}
if(isset($_POST['nomecurso']))
{
    
    $novonome = trim($_POST['nomecurso']);
    $validacaocurso = validarnomecurso($novonome);
    if($validacaocurso == 0)
    {
        $editar = "UPDATE curso SET nome ='". $novonome . "' WHERE idcurso=" . $_POST['idcurso'];
        if(mysqli_query($conexao, $editar))
        {
            header('location: /admin/curso/editado');
        }
    }
    else{
            header('location: /admin/curso/invalido');
    }
}