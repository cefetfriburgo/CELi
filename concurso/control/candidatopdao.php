<?php
// Função para estabelecer conexão com o BD
function conexao(){
    $conexao = mysqli_connect("localhost", "", "", "");
    if (!$conexao){
        echo "ERROR! failure to connect to the database.";
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit();
    }
    return $conexao;
};
//   Função para adicionar candidato no BD
function insert ($nome,$rg,$orgaoemissor,$CPF,$nascimento,$logradouro,$complemento,$bairro,$cidade,$uf,$email,$telefone1,$telefone2,$situacao){
    $conexao = conexao();
    $qtd1=0;
    $qtd2=0;
    if(isset($CPF)){
        $qtd1 = procurar("cpf",$CPF);
    }
    if(isset($rg)){
        $qtd2 = procurar("rg",$rg);
    }
    $qtd= $qtd1+$qtd2;
    if($qtd==0){
        $sql = "INSERT INTO candidato (nome,rg,orgaoemissor,cpf,nascimento,logradouro,complemento,bairro,cidade,uf,email,telefone1,telefone2,situacao) VALUES ( '$nome','$rg','$orgaoemissor','$CPF','$nascimento','$logradouro','$complemento','$bairro','$cidade','$uf','$email','$telefone1','$telefone2','$situacao');";
        $query = mysqli_query($conexao, $sql) or die("ERRO: Insert não concluido (".mysqli_error($conexao).")");
    }
    else{
       header('Location:../html/invalido.php');
    }
};
function procurar ($indice, $obj){
    $conexao = conexao();
    $sql = "SELECT * FROM candidato WHERE $indice = '$obj'";
    $query = mysqli_query($conexao, $sql);
    $qtdelinha = mysqli_num_rows($query);
    return $qtdelinha;
};
function procurarWhile (){
    $conexao = conexao();
    
    
    $query = mysqli_query($conexao, $sql);
    return $query;
}
