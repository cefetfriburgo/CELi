<?php

  if(isset($_GET['edital']) && isset($_GET['curso'])){

    // Pegando o id do edital e do curso selecionados
    $idEdital = $_GET['edital'];
    $idCurso = $_GET['curso'];

    // Pegando a quantidade de vagas interno e externo
    $selectEditalCurso = selectEditalCurso("ideditalcurso, vagainterna, vagaexterna", "WHERE idcurso = $idCurso and idedital = $idEdital");
    if ($row = mysqli_fetch_array($selectEditalCurso)) {
      $idEditalCurso = $row[0];
      $vagaInt = $row[1];
      $vagaExt = $row[2];
    }

    // Armazenando os dados sobre o edital e o curso recolhidos em um array
    $arrayEditalCurso = array(
      'idEditalCurso' => $idEditalCurso,
      'idEdital' => $idEdital,
      'idCurso' => $idCurso,
      'vagasInt' => $vagaInt,
      'vagasExt' => $vagaExt
    );

    // Pegando os candidatos cadastrados no curso selecionado, naquele edital e sua situacao
    $selectCandidatoCurso = selectCandidatoCurso("idcandidato", "WHERE ideditalcurso = $idEditalCurso") or die(mysqli_error($conexao));
    $arrayCandidatos = array();
    while ($row = mysqli_fetch_array($selectCandidatoCurso)) {

      $idCandidato = $row[0];

      $selectCandidatoSituacao = selectCandidato("situacao", "WHERE idcandidato = $idCandidato") or die(mysqli_error($conexao));

      while ($row2 = mysqli_fetch_array($selectCandidatoSituacao)) {
        $situacaoCandidato = $row2[0];

        $arrayInfoCandidato = array(
          'idCandidato' => $idCandidato,
          'situacaoCandidato' => $situacaoCandidato
        );
      }

      array_push($arrayCandidatos, $arrayInfoCandidato);

    }

    

  }

?>
