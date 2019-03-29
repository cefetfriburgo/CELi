<?php
include("../control/candidatopdao.php");
include("../control/candidatocursopdao.php");
session_start();
if((!isset ($_SESSION['nascimento']) == true) && (!isset ($_SESSION['course']) == true) && (!isset ($_SESSION['radio']) == true) && (!isset ($_SESSION['logradouro']) == true) && (!isset ($_SESSION['bairro']) == true) && (!isset ($_SESSION['cidade']) == true) && (!isset ($_SESSION['uf']) == true) && (!isset ($_SESSION['phone1']) == true) && (!isset ($_SESSION['name']) == true))
{
    unset($_SESSION['name']);
    unset($_SESSION['phone1']);
    unset($_SESSION['phone2']);
    unset($_SESSION['email']);
    unset($_SESSION['document1']);
    unset($_SESSION['OrgEmiRg']);
    unset($_SESSION['document2']);
    unset($_SESSION['nascimento']);
    unset($_SESSION['uf']);
    unset($_SESSION['cidade']);
    unset($_SESSION['bairro']);
    unset($_SESSION['logradouro']);
    unset($_SESSION['complemento']);
    unset($_SESSION['radio']);
    unset($_SESSION['course']);
    header('location:/concursos');
}
$nome = $_SESSION['name'];
$telefone1 = $_SESSION['phone1'];
$telefone2 = $_SESSION['phone2'];
$email = $_SESSION['email'];
$rg = $_SESSION['document1'];
$orgaoEmissor = $_SESSION['OrgEmiRg'];
$cpf = $_SESSION['document2'];
$datNascimento = $_SESSION['nascimento'];
$uf = $_SESSION['uf'];
$cidade = $_SESSION['cidade'];
$bairro = $_SESSION['bairro'];
$logradouro = $_SESSION['logradouro'];
$complemento = $_SESSION['complemento'];
$situacao = $_SESSION['radio'];
$curso = $_SESSION['course'];
//session_destroy();
error_reporting(0);
$conexao = conexao(); /*mysqli_connect("localhost", "root", "", "celi");
if (!$conexao){
    echo "ERROR! failure to connect to the database.";
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}
$sql = "SELECT curso.nome FROM editalcurso JOIN curso ON editalcurso.idcurso=curso.idcurso WHERE editalcurso.ideditalcurso = $curso ";
$query = mysqli_query($conexao, $sql);
*/
$nomeCurso= $_SESSION['nomeCurso'];
//inserir no bd
insert ($nome,$rg,$orgaoEmissor,$cpf,$datNascimento,$logradouro,$complemento,$bairro,$cidade,$uf,$email,$telefone1,$telefone2,$situacao);
inserirCandidatocurso($curso);
?>

<!DOCTYPE HTML>
<html>
  <head>
  <title>Inscrição Confirmada | CELi</title>
  <script type="text/javascript" src="../../arquivosfixos/js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/styleConfirmacao.css">
  <link rel="stylesheet" type="text/css" href="../../arquivosfixos/css/reset.css">
  <link rel="stylesheet" type="text/css" href="../../arquivosfixos/css/custom.css">
  <link rel="stylesheet" type="text/css" href="../../arquivosfixos/css/header/style.css">
  <link rel="stylesheet" type="text/css" href="../../arquivosfixos/css/footer/style.css">
  </head>
  <body>
    <div class="content">
        <?php
        //require_once "../../arquivosfixos/headerFooter/header.php";
      ?>
        <main id="main">
          <div id="main-content" class="main-content">
              <h1 class="main-title">Confirmação dos Dados</h1>
              <table class="custom-table">
                <tr class="main-table-lineNome">
                  <td class="main-table-line-title">Nome</td>
                  <td class="main-table-line-ctt"><?php echo $nome; ?></td>
                </tr>
                <tr class="main-table-lineTel">
                  <td class="main-table-line-title">Telefone 1</td>
                  <td class="main-table-line-ctt"><?php echo$telefone1; ?></td>
                </tr>
                <tr class="main-table-lineTel">
                  <td class="main-table-line-title">Telefone 2</td>
                  <td class="main-table-line-ctt">
                    <?php
                      if($telefone2 == null){
                          echo'-';
                      }
                      else{
                        echo$telefone2;
                      }
                    ?>
                  </td>
                </tr>
                <tr class="main-table-lineEmail">
                  <td class="main-table-line-title">Email</td>
                  <td class="main-table-line-ctt">
                    <?php
                      if($email == null){
                        echo "-";
                      }
                      else{
                        echo $email;
                      }
                    ?>
                  </td>
                </tr>
                <tr class="main-table-lineRg">
                  <td class="main-table-line-title">Registro geral</td>
                  <td class="main-table-line-ctt">
                    <?php
                      if($rg == null){
                        echo '-';
                      }
                      else{
                        echo $rg;
                      }
                    ?>
                  </td>
                </tr>
                <tr class="main-table-lineOrgao">
                  <td class="main-table-line-title">Órgão emissor</td>
                  <td class="main-table-line-ctt">
                    <?php
                      if($orgaoEmissor == null){
                        echo '-';
                      }
                      else{
                        echo $orgaoEmissor;
                      }
                    ?>
                  </td>
                </tr>
                <tr class="main-table-lineCpf">
                  <td class="main-table-line-title">CPF</td>
                  <td class="main-table-line-ctt">
                    <?php
                      if($cpf == null){
                        echo '-';
                      }
                      else{
                        echo $cpf;
                      }
                    ?>
                  </td>
                </tr>
                <tr class="main-table-lineNasc">
                  <td class="main-table-line-title">Data de nascimento</td>
                  <td class="main-table-line-ctt">
                    <?php
                      $arrayNascimento = explode("-","$datNascimento");
                      $y = $arrayNascimento[0];
                      $m = $arrayNascimento[1];
                      $d = $arrayNascimento[2];
                      echo "$d/$m/$y";
                    ?>
                  </td>
                </tr>
                <tr class="main-table-lineEndereco">
                  <td class="main-table-line-title">Endereco</td>
                  <td class="main-table-line-ctt"><?php echo $logradouro; ?></td>
                </tr>
                <tr class="main-table-lineComplemento">
                  <td class="main-table-line-title">Complemento</td>
                  <td class="main-table-line-ctt"><?php echo $complemento; ?></td>
                </tr>
                <tr class="main-table-lineBairro">
                  <td class="main-table-line-title">Bairro</td>
                  <td class="main-table-line-ctt"><?php echo $bairro; ?></td>
                </tr>
                <tr class="main-table-lineCidade">
                  <td class="main-table-line-title">Cidade</td>
                  <td class="main-table-line-ctt"><?php echo $cidade; ?></td>
                </tr>
                <tr class="main-table-lineUf">
                  <td class="main-table-line-title">UF</td>
                  <td class="main-table-line-ctt"><?php echo $uf; ?></td>
                </tr>
                <tr class="main-table-lineSituacao">
                  <td class="main-table-line-title">Situação</td>
                  <td class="main-table-line-ctt">
                    <?php
                      if($situacao == "i"){
                        echo "Interno";
                      }
                      elseif($situacao == "e"){
                        echo "Externo";
                      }
                      else{
                        echo "indeterminado";
                      }
                    ?>
                  </td>
                </tr>
                <tr class="main-table-lineCurso">
                  <td class="main-table-line-title">Curso</td>
                  <td class="main-table-line-ctt"><?php echo $nomeCurso['nome']; ?></td>
                </tr>
              </table>
              <a class="btn-back" href="/concursos" >Página Inicial</a>
              <button id="imprimir" class="btn-save">Imprimir</button>
              <script>
               document.getElementById('imprimir').onclick = function() {
                window.print();
                  };  
            </script>
              <form action="../" method="GET">
                  
                   <form action="../contro/email.php" method="POST">
                      <input class="main-form-enviar" type="hidden" name="email" value="Enviar por email" />
                  </form>
            </form>
           </div> 
        </div>
      </main>
      <?php
        require_once "../../arquivosfixos/headerFooter/footer.php";
        session_destroy();
      ?>
      </div>
  </body>
</html>
