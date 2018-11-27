<?php
  // Linka o arquivo pdao para pegar os cursos a fim de exibi-los
  require_once "../../../arquivosfixos/pdao/pdaoscript.php";

  function selectEdital ($campo, $condicao){
    $conexao = conexaobd();
    if($conexao){
      if($condicao == NULL){
        $sql = "SELECT $campo FROM edital;";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
      else{
        $sql = "SELECT $campo FROM Edital $condicao";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
    }
    else{
      echo "Conexao com o BD nao estabelecida!";
      return FALSE;
    }
  };

  function selectEditalCurso ($campo, $condicao){
    $conexao = conexaobd();
    if($conexao){
      if($condicao == NULL){
        $sql = "SELECT $campo FROM editalcurso;";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
      else{
        $sql = "SELECT $campo FROM editalcurso $condicao";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
    }
    else{
      echo "Conexao com o BD nao estabelecida!";
      return FALSE;
    }
  };

  function selectCurso ($campo, $condicao){
    $conexao = conexaobd();
    if($conexao){
      if($condicao == NULL){
        $sql = "SELECT $campo FROM curso;";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
      else{
        $sql = "SELECT $campo FROM curso $condicao";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
    }
    else{
      echo "Conexao com o BD nao estabelecida!";
      return FALSE;
    }
  };

  function selectCandidatoCurso ($campo, $condicao){
    $conexao = conexaobd();
    if($conexao){
      if($condicao == NULL){
        $sql = "SELECT $campo FROM candidatocurso;";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
      else{
        $sql = "SELECT $campo FROM candidatocurso $condicao";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
    }
    else{
      echo "Conexao com o BD nao estabelecida!";
      return FALSE;
    }
  };

  function selectCandidato ($campo, $condicao){
    $conexao = conexaobd();
    if($conexao){
      if($condicao == NULL){
        $sql = "SELECT $campo FROM candidato;";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
      else{
        $sql = "SELECT $campo FROM candidato $condicao";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
      }
    }
    else{
      echo "Conexao com o BD nao estabelecida!";
      return FALSE;
    }
  };

  if(isset($_GET['edital'])){
    $idEdital = $_GET['edital'];
  }
  if(isset($_GET['curso'])){
    $idCurso = $_GET['curso'];
  }
function sorteiorealizado($edital,$curso) {
    $conexao = conexaobd();
    if($conexao){
        $sql="UPDATE editalcurso SET sorteioRealizado=1 WHERE idedital= $edital AND idcurso= $curso";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
       
    }
    else{
        echo "Conexao com o BD nao estabelecida!";
        
    }
}
?>
