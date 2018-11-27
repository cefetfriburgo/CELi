<?php 
session_start();
$alunos = $_SESSION['alunos'];
$idSelecionado = $_POST['idExcluir'];

foreach($alunos as $key=>$aluno){
    if($aluno[0]==$idSelecionado){
        unset($alunos[$key]);
    }
}
$_SESSION['alunos'] = $alunos;
header('Location:../html/matricular.php?turma=.'$idturma.');
?>