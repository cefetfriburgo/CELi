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

function selecionaAluno($nome){

    $conexao = conexaobd();
    if($conexao){
        $limit="";
        if(trim($nome)==""){
            $limit = "LIMIT 3";
        }
        $nome = "%".$nome."%";
        $sql= "SELECT aluno.idaluno, aluno.nome FROM aluno WHERE nome like '$nome' $limit";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        $alunos=array();
        $aluno = array();
        while($linha = mysqli_fetch_assoc($query)){
            $aluno[0] = $linha['idaluno'];
            $aluno[1] = $linha ['nome'];
            array_push($alunos, $aluno);
        }
        return $alunos;
    }
    
    else{
        echo "Conexão com o BD não estabelecida!";
        return FALSE;
    }
    
}

