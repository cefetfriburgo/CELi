<?php
$conexao = mysqli_connect("localhost", "", "","");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$id = $_POST['id'];
$nome = $_POST['nome'];
$documento = $_POST['documento'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$ie= $_POST['ie'];
$idcurso=  $_POST['curso'];

echo $id;
echo $nome;
echo $documento;
echo $telefone;
echo $email;
echo $ie;
echo $idcurso;

$erro_id = $erro_nome = $erro_documento = $erro_telefone = $erro_email = $erro_ie = $erro_idcurso = false;
if($erro_nome == false && $erro_email== false && $erro_documento== false &&  $erro_telefone == false && $erro_email == false && $erro_ie == false && $erro_idcurso = false){

  $query= mysqli_query($conexao,"INSERT INTO candidato(id,nome,documento,telefone, email, ie, idcurso) VALUES($id,'$nome', '$documento' ,  '$telefone', '$email', '$ie' , '$idcurso')") or die("Erro ao tentar cadastrar");
    echo "Cadastro realizado com sucesso";
}
else{
    echo "Erro ao cadastrar, houve erros";
}
