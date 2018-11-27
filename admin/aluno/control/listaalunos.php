<?php
if(empty($_GET['pagina'])){
    $_GET['pagina'] = 0;
    $pagina =  $_GET['pagina'];
}
else {
    $pagina =  $_GET['pagina'];
}

$total = $pagina * 30;

$like = "";

if(isset($_GET['busca'])){
    $nome = $_GET['busca'];
    $nome = "%".$nome."%";
    $like = "  WHERE nome like '$nome'" ;
    $_SESSION['busca']=$nome; 
} 

require "../../../arquivosfixos/pdao/pdaoscript.php";

//quantidade em busca para paginação
$campos = "idaluno, nome";
$tabela = "aluno";
$condicao = "$like LIMIT 30 OFFSET $total";
$conta = selecionarbd($campos, $tabela, $condicao);

//quantidade total de registros
$condicao2=NULL;
$conta2 = selecionarbd($campos, $tabela, $condicao2);

//quantidade em busca
$condicao = "$like";
$conta3 = selecionarbd($campos, $tabela, $condicao);

$div2=$conta3->num_rows/30;

if($_GET['busca']){
    if(is_int($div2)){
        $div=($conta->num_rows/30)-1;
    }else{
        $div = $conta->num_rows/30;
    }
}
else{
    if(is_int($div2)){
        $div=($conta2->num_rows/30)-1;
    }else{
        $div = $conta2->num_rows/30;
    }
}

