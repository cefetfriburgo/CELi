 <?php
    
    if(empty($_GET['pagina'])){
        $_GET['pagina'] =0;
        $pagina =  $_GET['pagina'];
    }
    else {
        $pagina =  $_GET['pagina'];
    }
    
    $total = $pagina * 30;
    
    $like = "WHERE";
    
    if(isset($_GET['busca'])){
        $nome = $_GET['busca'];
        $nome = "%".$nome."%";
        $like = " WHERE concat(c.nome, t.titulo) like '$nome' AND" ;
        $_SESSION['busca']=$nome;    
    
    }
    require "../../../arquivosfixos/pdao/pdaoscript.php";
    
    $campo = "t.idturma, c.idcurso, t.titulo, t.modulo, c.nome";
    $tabela = "turma t";
    $tabela2 = "curso c";
    $condicao = "$like t.idcurso = c.idcurso order by idturma  LIMIT 30 OFFSET $total";
    $result =  selecionarbdJOIN($campo, $tabela,  $tabela2, $condicao);
    
    $condicao2 = "$like t.idcurso = c.idcurso order by idturma";
    $result2 =  selecionarbdJOIN($campo, $tabela,  $tabela2, $condicao2);
    
    $div2 = $result2->num_rows/30;
    
    if($_GET['busca']){
        if(is_int($div2)){
            $div = ($result2->num_rows/30)-1;
        }else{
            $div = $result2->num_rows/30;
        }
        
    }
    else{
        if(is_int($div2)){
            $div=($result2->num_rows/30)-1;
        }else{
            $div = $result2->num_rows/30;
        }
        
    }
    