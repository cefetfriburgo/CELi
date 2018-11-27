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
if(isset($_GET['busca']) && $_GET['busca']!=""){
    $ano = $_GET['busca'];
    $like = " WHERE YEAR(data_ini)<='$ano' AND YEAR(data_fim)>='$ano'" ;
    $_SESSION['busca']=$ano;
}
require "../../../arquivosfixos/pdao/pdaoscript.php";
$campo = "idedital, date_format(data_ini, '%d/%m/%Y') as 'inicio', date_format(data_fim, '%d/%m/%Y') as 'fim', time_format(hora_ini, '%h:%i') as 'hora_inicio', time_format(hora_fim, '%h:%i') as 'hora_final'";
$tabela = "edital";
$condicao = "$like LIMIT 30 OFFSET $total";
$conta = selecionarbd($campo, $tabela, $condicao);
$condicao2 = null;
$conta2 = selecionarbd($campo, $tabela, $condicao1);
$condicao1 ="$like";
$conta3 = selecionarbd($campo, $tabela, $condicao1);
$div2=$conta3->num_rows/30;
if($_GET['busca']){
    if(is_int($div2)){
        $div=($conta3->num_rows/30)-1;
    }else{
        $div = $conta3->num_rows/30;
    }
}
else{
    if(is_int($div2)){
        $div=($conta2->num_rows/30)-1;
    }else{
        $div = $conta2->num_rows/30;
    }
}