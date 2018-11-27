<?php

$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
mysqli_set_charset($conexao,"utf8");
if (!$conexao){
    echo "ERROR! failure to connect to the database.";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}

$repeticoes = $_POST['repeticoes'];
$turma = $_POST['idturma'];

if(isset($_POST['tituloturma']) && $_POST['tituloturma'] != null &&
    isset($_POST['moduloturma']) && $_POST['moduloturma'] != null &&
    isset($_POST['anoturma']) && $_POST['anoturma'] != null &&
    isset($_POST['semestreturma']) && $_POST['semestreturma'] != null )
{
    $novotitulo = trim($_POST['tituloturma']);
        $editar = "UPDATE turma SET titulo ='". $novotitulo . "' WHERE idturma=" . $_POST['idturma'];
        $query =  mysqli_query($conexao, $editar);
        
        $novomodulo = trim($_POST['moduloturma']);
        $editar2 = "UPDATE turma SET modulo ='". $novomodulo . "' WHERE idturma=" . $_POST['idturma'];
        $query2 =  mysqli_query($conexao, $editar2);
        
        $novoano = trim($_POST['anoturma']);
        $editar3 = "UPDATE turma SET ano ='". $novoano . "' WHERE idturma=" . $_POST['idturma'];
        $query3 =  mysqli_query($conexao, $editar3);
        
        $novosemestre = trim($_POST['semestreturma']);
        $editar4 = "UPDATE turma SET semestre ='". $novosemestre . "' WHERE idturma=" . $_POST['idturma'];
        $query4 =  mysqli_query($conexao, $editar4);
       
        for($i=0; $i<$repeticoes; $i++){
            $mediaEscrita = $_POST["medesc".$i];
            $mediaOral = $_POST["medoral".$i];
            $idAluno = $_POST["idaluno".$i];
            $editar5 =  "UPDATE nota SET medesc=$mediaEscrita, medoral=$mediaOral WHERE idaluno=$idAluno  AND idturma=$turma;";
            $query5 = mysqli_query($conexao, $editar5);
        }
        
        if(isset($query5)){
            if($query && $query2 && $query3 && $query4 && $query5)
            {
                header('location: /admin/turma/editado');
            }else{
                header('location: /admin/turma/invalido');
            }
        }else{
            if($query && $query2 && $query3 && $query4)
            {
                header('location: /admin/turma/editado');
            }else{
                header('location: /admin/turma/invalido');
            }
        }
   
    
} else{
    //header('location: /admin/turma/invalido');
}