<?php
  // Linkando o arquivo pdao
  require "../../../arquivosfixos/pdao/pdaoscript.php";
  // Linkando o arquivo de validação
  require "./validacaoedital.php";

  
  if($_POST['dataabertura'] !=NULL && $_POST['horaabertura'] !=NULL  && $_POST['dataencerramento'] !=NULL  && $_POST['horaencerramento']){
      
  // Verifica se os dados do formulário foi setado
  if(isset($_POST['dataabertura']) && isset($_POST['horaabertura']) && isset($_POST['dataencerramento']) && isset($_POST['horaencerramento'])){
    // Sendo setado, pega os dados do formulário e armazena em variáveis
    $dataAbert = $_POST['dataabertura'];
    $horaAbert = $_POST['horaabertura'];
    $dataEncer = $_POST['dataencerramento'];
    $horaEncer = $_POST['horaencerramento'];
    $condicao = $_POST['condicao'];

    // validando as datas
    $validDataHora = validarDataCoerencia($dataAbert, $dataEncer, $horaAbert, $horaEncer);
    if($validDataHora == 0){
      // Data coerente (correto!)
      $tabela = "edital";
      $elementos = "data_ini, data_fim, hora_ini, hora_fim, condicao";
      $conteudo = "'$dataAbert', '$dataEncer', '$horaAbert', '$horaEncer', '$condicao'";

      // Inseri na tabela "edital" do Banco de Dados
      $insert = inserirbd($tabela, $elementos, $conteudo, NULL);

    
      $campo = "idedital";
      $tabela = "edital";
      $condicao = "ORDER BY idedital DESC LIMIT 1";
      $select = selecionarbd($campo, $tabela, $condicao);
      $idEdital = mysqli_fetch_assoc($select);
      $id =  $idEdital['idedital'];
      
      $curso = $_POST['curso'];
      foreach($curso as $nome => $valor)
      {
          $interno = "interno_" . $valor;
          $externo = "externo_" . $valor;
          
          $tabela = "editalcurso";
          $elementos = "idedital, idcurso, vagainterna, vagaexterna";
          $conteudo = "'$id', '$curso[$nome]', '$_POST[$interno]','$_POST[$externo]'";
          $insert = inserirbd($tabela, $elementos, $conteudo, NULL);
      }
      
            
      
       // Verifica o insert...
      if($insert ){
        // Deu Certo. Inseriu!
        header('location: /admin/edital/registrado');
      }
      else{
        // Deu Errado. Não inseriu!
        header('location: /admin/edital/erro');
      }
   }
    else{
      // Data incoerente (incorreto!)
        header('location: /admin/edital/invalido');
        }
  }
  }
  else{
      header('location: /admin/edital/invalido');
  }
  

?>
