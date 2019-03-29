<?php
function conexaobd (){
    $conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
    mysqli_set_charset($conexao, "utf8");
    if (!$conexao){
        echo "ERROR! failure to connect to the database.";
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    }
    return $conexao;
};
    
    function selecionaTurma($idturma){
        $conexao = conexaobd();
        if($conexao){
            
            $sql= "SELECT turma.titulo, turma.modulo, curso.nome FROM turma JOIN curso ON turma.idcurso=curso.idcurso WHERE turma.idturma=$idturma";
            $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            return $query;
        }
        else{
            echo "Conexão com o BD não estabelecida!";
            return FALSE;
        }
        
    }
    
    