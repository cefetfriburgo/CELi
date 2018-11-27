<?php
include_once '../../../arquivosfixos/pdao/pdaoscript.php';
// Verifica se os dados do formulário foi setado
if(isset($_POST['nomealuno']) && ((isset($_POST['rgaluno'])  && isset($_POST['orgaoemissoraluno']))  || isset($_POST['cpfaluno']))
    && isset($_POST['nascimentoaluno']) && isset($_POST['logradouroaluno']) && isset($_POST['complementoaluno']) && isset($_POST['bairroaluno'])
    && isset($_POST['cepaluno']) && isset($_POST['cidadealuno']) && isset($_POST['ufaluno']) && isset($_POST['emailaluno']) && isset($_POST['telefone1aluno'])
    && isset($_POST['telefone2aluno']) && isset($_POST['radio']) && isset($_POST['radioDeficiencia'])){
    
        
     if(trim($_POST['nomealuno'])!=NULL && ((trim($_POST['rgaluno'])!=NULL && trim($_POST['orgaoemissoraluno'])!=NULL) || trim($_POST['cpfaluno'])!=NULL)  
        && trim($_POST['nascimentoaluno'])!=NULL  && trim($_POST['logradouroaluno'])!=NULL && trim($_POST['complementoaluno'])!=NULL && trim($_POST['bairroaluno'])!=NULL
        && trim($_POST['cepaluno'])!=NULL && trim($_POST['cidadealuno'])!=NULL && trim($_POST['ufaluno'])!=NULL && trim($_POST['emailaluno'])!=NULL
        && trim($_POST['telefone1aluno'])!=NULL && trim($_POST['telefone2aluno']) && trim($_POST['radio'])!=NULL && trim($_POST['radioDeficiencia'])!=NULL){
   
        // Sendo setado, pega os dados do formulário e armazena em variáveis
        $nome = $_POST['nomealuno'];
        $rg = $_POST['rgaluno'];
        $orgao= $_POST['orgaoemissoraluno'];
        $cpf = $_POST['cpfaluno'];
        $nascimento = $_POST['nascimentoaluno'];
        $logradouro = $_POST['logradouroaluno'];
        $complemento = $_POST['complementoaluno'];
        $bairro = $_POST['bairroaluno'];
        $cep = $_POST['cepaluno'];
        $cidade = $_POST['cidadealuno'];
        $uf = $_POST['ufaluno'];
        $email = $_POST['emailaluno'];
        $tel1 = $_POST['telefone1aluno'];
        $tel2 = $_POST['telefone2aluno'];
        $situacao= $_POST['radio'];
        $deficiencia = $_POST['radioDeficiencia'];
    
            // Data coerente (correto!)
            $tabela = "aluno";
            $elementos = "nome, rg, orgaoemissor, cpf, nascimento, logradouro, complemento, bairro, cep, cidade, uf, email, telefone1, telefone2, situacao, deficiencia";
            $conteudo = "'$nome', '$rg', '$orgao', '$cpf', '$nascimento', '$logradouro', '$complemento', '$bairro','$cep', '$cidade', '$uf', '$email', '$tel1', '$tel2', '$situacao','$deficiencia'";
            
            // Inseri na tabela "edital" do Banco de Dados
            $insert = inserirbd($tabela, $elementos, $conteudo, NULL);
 
            // Verifica o insert...
            if($insert){
                // Deu Certo. Inseriu!
                header('location: /admin/aluno/registrado');
            }
            else{
                // Deu Errado. Não inseriu!
                header('location: /admin/aluno/erro');
            }
        }
        else{
            // Data incoerente (incorreto!)
            header('location: /admin/aluno/erro');
        }
}
else{
    header('location: /admin/aluno/erro');
}
?>




