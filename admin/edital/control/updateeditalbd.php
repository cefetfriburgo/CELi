<?php
    // Linkando o arquivo pdao
    require "../../../arquivosfixos/pdao/pdaoscript.php";
    // Linkando o arquivo de validação
    require "./validacaoedital.php";
    // Conexão com o Banco de Dados
    $conexao = conexaobd();
    
    // Verifica se os dados do formulário foi setado
    if(isset($_POST['idEdital']) && isset($_POST['dataabertura']) && isset($_POST['horaabertura']) && isset($_POST['dataencerramento']) && isset($_POST['horaencerramento'])){
        
        // Sendo setado, pega os dados do formulário e armazena em variáveis
        $idEdital = $_POST['idEdital'];
        $dataAbert = $_POST['dataabertura'];
        $horaAbert = $_POST['horaabertura'];
        $dataEncer = $_POST['dataencerramento'];
        $horaEncer = $_POST['horaencerramento'];
        $condicao = $_POST['condicao'];
        
        // validação
        $validDataHora = validarDataCoerencia($dataAbert, $dataEncer, $horaAbert, $horaEncer);
        
        if($validDataHora == 0){
            
            $tabela = "edital";
            $elementos = array(
                0 => 'data_ini',
                1 => 'data_fim',
                2 => 'hora_ini',
                3 => 'hora_fim',
                4 => 'condicao'
            );
            $conteudos = array(
                0 => $dataAbert,
                1 => $dataEncer,
                2 => $horaAbert,
                3 => $horaEncer,
                4 => $condicao
            );
            
            for($i=0; $i<count($elementos); $i++){
                // Update na tabela "edital" do Banco de Dados
                $update = alterar($tabela, $idEdital, $elementos[$i], $conteudos[$i]);
            }
            $gabarito = array();
            
            $query = "SELECT COUNT(idcurso) FROM curso";
            $query = mysqli_query($conexao, $query) or die(mysqli_error($conexao));
            $qtdCurso = mysqli_fetch_assoc($query);
            if(isset($_POST['idCurso'])){
                $idCurso = $_POST['idCurso'];
                $intCurso = $_POST['intCurso'];
                $extCurso = $_POST['extCurso'];
            }
            for($i=0; $i<count($idCurso); $i++){
                $dadosCurso = array();
                array_push($dadosCurso, $idCurso[$i], $intCurso[$i], $extCurso[$i]);
                array_push($gabarito, $dadosCurso);
            }
            // Deletando os dados antigos da tabela 'editalcurso'
            $sql = "DELETE FROM editalcurso WHERE idedital = $idEdital";
            mysqli_query($conexao, $sql) or die($conexao);
            // Adicionando as mudanças nessa mesma tabela
            $tabela = "editalcurso";
            $elementos = "idedital, idcurso, vagainterna, vagaexterna";
            foreach ($gabarito as $curso){
                $conteudos = "$idEdital, $curso[0], $curso[1], $curso[2]";
                $adicionar = adicionar($tabela, $elementos, $conteudos);
            }
            if($update ){
                header('location: /admin/edital/alterado');
            }
            else{
                header("location: /admin/edital/naoalterado");
            }
        }
        else{
            header('location: /admin/edital/invalido');
        }
    }
    else{
        header('location: /admin/edital/invalido');
    }
    
    
    function alterar($tabela, $idEdital, $elementos, $conteudo){
        $conexao = conexaobd();
        if($conexao){
            $sql = "UPDATE $tabela SET $elementos = '$conteudo' WHERE idedital = $idEdital;";
            $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            
            return TRUE;            
        }
        else{
            echo "Conexão com o BD não estabelecida!";
            return FALSE;
        }
    }
    function adicionar ($tabela, $elementos, $conteudo){
        $conexao = conexaobd();
        if($conexao){
            $sql = "INSERT INTO $tabela ($elementos) VALUES ($conteudo)";
            $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            
            return TRUE;
        }
        else{
            echo "Conexão com o BD não estabelecida!";
            return FALSE;
        }
    }
?>