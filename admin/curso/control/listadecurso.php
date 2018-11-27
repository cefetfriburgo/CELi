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
        $like = " WHERE nome like '$nome' ";
        $_SESSION['busca']=$nome;
    }
    require "../../../arquivosfixos/pdao/pdaoscript.php";
    
    
    $campo = "idcurso, nome";
    $tabela = "curso";
    $condicao = "$like LIMIT 30 OFFSET $total";
    $result = selecionarbd($campo, $tabela, $condicao);

   
    $condicao = "$like";
    $conta = selecionarbd($campo, $tabela, $condicao);
   


    
    $div2=$conta->num_rows/30;
    
    if($_GET['busca']){
        if(is_int($div2)){
            $div=($conta->num_rows/30)-1;
        }else{
            $div = $conta->num_rows/30;
        }
    }
    else{
        if(is_int($div2)){
            $div=($conta->num_rows/30)-1;
        }else{
            $div = $conta->num_rows/30;
        }
    }
    
    