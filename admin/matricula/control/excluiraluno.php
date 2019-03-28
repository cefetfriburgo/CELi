<?php 
session_start();
$alunos = $_SESSION['alunos'];
$idSelecionado = $_POST['idExcluir'];
$idturma = $_POST['idturma'];
foreach($alunos as $key=>$aluno){
    if($aluno[0]==$idSelecionado){
        if($key==0){
            array_splice($alunos, $key, $key+1);
        }else{
            array_splice($alunos, $key, $key);
        }
    }
}
$_SESSION['alunos'] = $alunos;


header('Location: ../html/matricular.php?turma='.$idturma);
?>