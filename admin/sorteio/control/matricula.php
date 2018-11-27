<?php
// Inicia a sessão
session_start();

// Verificando se já tem sessão estabelecida
if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
    header('location: ../../login/html/loginAdmin.php');
}

require_once "../../../arquivosfixos/pdao/pdaoscript.php";

$idCandidato = $_POST['idAluno'];
$tabela = "candidato";
$campo ="nome, rg, orgaoemissor, cpf, nascimento, logradouro, complemento, bairro, cep, cidade, uf, email, telefone1, telefone2, situacao";
$condicao="WHERE idcandidato = $idCandidato"; 

$selectInfos = selecionarbd ($campo, $tabela, $condicao);

while ($row = mysqli_fetch_array($selectInfos)){
    
    

    $nome = $row['nome'];
    $rg = $row['rg'];
    $orgaoemissor= $row['orgaoemissor'];
    $cpf= $row['cpf'];
    $nascimento= $row['nascimento'];
    $logradouro=$row['logradouro'];
    $complemento=$row['complemento'];
    $bairro=$row['bairro'];
    $cep= $row['cep'];
    $cidade= $row['cidade'];
    $uf=$row['uf'];
    $email=$row['email'];
    $telefone1=$row['telefone1'];
    $telefone2=$row['telefone2'];
    $situacao=$row['situacao'];

}

$tabela2 = "aluno";
$elementos = "nome, rg, orgaoemissor, cpf, nascimento, logradouro, complemento, bairro, cep, cidade, uf, email, telefone1, telefone2, situacao";
$conteudo = "'$nome', $rg, '$orgaoemissor', '$cpf', '$nascimento', '$logradouro','$complemento','$bairro', '$cep', '$cidade', '$uf', '$email', '$telefone1', '$telefone2',  '$situacao'";


$insertInfo = inserirbd ($tabela2, $elementos, $conteudo, NULL);
 if($insertInfo==TRUE){
    
     function matricularealizada($idCandidato) {
         $conexao = conexaobd();
         if($conexao){
             $sql="UPDATE sorteados SET matriculaEfetuada=1 WHERE candidato= $idCandidato";
             $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
             
         }
         else{
             echo "Conexao com o BD nao estabelecida!";
             
         }
     }
     matricularealizada($idCandidato);
}

//header('location:'); CRIAR MENSAGEM DE AÇÃO CONCLUIDA!!