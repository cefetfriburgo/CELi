<?php
$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
mysqli_set_charset($conexao,"utf8");
if (!$conexao){
    echo "ERROR! failure to connect to the database.";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}

if(isset($_POST['nomealuno']) && ((isset($_POST['rgaluno'])  && isset($_POST['orgaoemissoraluno']))  || isset($_POST['cpfaluno']))
    && isset($_POST['nascimentoaluno']) && isset($_POST['logradouroaluno']) && isset($_POST['complementoaluno']) && isset($_POST['bairroaluno'])
    && isset($_POST['cepaluno']) && isset($_POST['cidadealuno']) && isset($_POST['ufaluno']) && isset($_POST['emailaluno']) && isset($_POST['telefone1aluno'])
    && isset($_POST['telefone2aluno']) && isset($_POST['radio']) && isset($_POST['radioDeficiencia'])){
    
    $novonome = trim($_POST['nomealuno']);
    $novorg = trim($_POST['rgaluno']);
    $novoorgaoemissor = trim($_POST['orgaoemissoraluno']);
    $novocpf = trim($_POST['cpfaluno']);
    $novonascimento = trim($_POST['nascimentoaluno']);
    $novologradouro = trim($_POST['logradouroaluno']);
    $novocomplemento = trim($_POST['complementoaluno']);
    $novobairro = trim($_POST['bairroaluno']);
    $novocep = trim($_POST['cepaluno']);
    $novacidade = trim($_POST['cidadealuno']);
    $novouf = trim($_POST['ufaluno']);
    $novoemail = trim($_POST['emailaluno']);
    $novotelefone1 = trim($_POST['telefone1aluno']);
    $novotelefone2 = trim($_POST['telefone2aluno']);
    $novasituacao = trim($_POST['radio']);
    $novadeficiencia = trim($_POST['radioDeficiencia']);
    echo "deu certo";
    if($novonome != "" && (($novorg != "" && $novoorgaoemissor != "") || $novocpf != "") && $novonascimento != "" && $novologradouro != "" 
        && $novocomplemento != "" && $novobairro != "" && $novocep != "" && $novacidade != "" && $novouf != "" && $novoemail != "" 
        && $novotelefone1 != "" && $novotelefone2 != "" && $novasituacao != "" && $novadeficiencia != ""){
        
       $editar = "UPDATE aluno SET nome ='". $novonome . "', rg ='".$novorg."', orgaoemissor ='".$novoorgaoemissor."', cpf ='".$novocpf."', nascimento ='".$novonascimento."', logradouro ='".$novologradouro."', complemento ='".$novocomplemento."', bairro ='".$novobairro."', cep ='".$novocep."', cidade ='".$novacidade."', uf ='".$novouf."', email ='".$novoemail."', situacao ='".$novasituacao."', telefone1 ='".$novotelefone1."', telefone2 ='".$novotelefone2."', deficiencia ='".$novadeficiencia."' WHERE idaluno=" . $_POST['idaluno'];
        if(mysqli_query($conexao, $editar))
        {
            header('location: ../html/editado.php');
        }
            
    }
    else{
            
            header('location: ../html/invalido.php');
        
    }
    
    
}