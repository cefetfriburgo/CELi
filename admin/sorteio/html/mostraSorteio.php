
<?php
// Linka o arquivo pdao para pegar os cursos a fim de exibi-los
require_once "../../../arquivosfixos/pdao/pdaoscript.php";
require_once "../control/pdaosorteio.php";
// require_once "./sorteiocurso.php";
include_once '../control/sorteio.php';

// Impedir usuário acessar página sem definir parâmetros
if (! isset($_GET['edital']) or ! isset($_GET['curso']) or ($_GET['edital'] or $_GET['curso']) == NULL) {
    header('location: ./sorteioedital.php');
}
$idEdital = $_GET['edital'];
$idCurso = $_GET['curso'];

// Instanciando as variáveis que serão utilizadas para executar a função
$campos = "idcurso, nome";
$tabela = "curso";
$sql = selecionarbd($campos, $tabela, NULL);

$conexao = conexaobd();

$campos1 = "ideditalcurso, sorteioRealizado";
$tabela1 = "editalcurso";
$condicao1 = "WHERE idedital = $idEdital  AND idcurso = $idCurso";

$selecionaEditalCurso = selecionarbd($campos1, $tabela1, $condicao1);
$row = mysqli_fetch_array($selecionaEditalCurso);
$row1 = $row['ideditalcurso'];

function selecionarqtd($row1)
{
    $conexao = conexaobd();

    $campos1 = "ideditalcurso, sorteioRealizado";
    $tabela1 = "editalcurso";
    $condicao1 = "WHERE idedital = $idEdital  AND idcurso = $idCurso";
    
    $selecionaEditalCurso = selecionarbd($campos1, $tabela1, $condicao1);
    $row = mysqli_fetch_array($selecionaEditalCurso);
    $row1 = $row['ideditalcurso'] ;
    
    function selecionarqtd ($row1){
        $conexao = conexaobd();
        if($conexao){
            $sql = "SELECT idcandidatocurso FROM candidatocurso WHERE ideditalcurso = $row1";
              $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
              $query1= mysqli_num_rows($query);
              return $query1;
        }
        else{
            echo "Conexão com o BD não estabelecida!";
            return FALSE;
        }
        
}
$selectQtdAluno = selecionarqtd($row1);

$sorteioRealizado = $row['sorteioRealizado'];
if ($sorteioRealizado == 0) {
    // Função atualizar editalcurso
    sorteiorealizado($_GET['edital'], $_GET['curso']);
    
    $tagTitle = "Sorteio";
    require_once "../../../arquivosfixos/headerFooter/header.php";
    ?>

    <script src="./js/script.js"></script>
<main id="main">
<div class="main-content">
	<h1 class="main-title">Listagem do sorteio</h1>
	<div class="main-table table-edital">
		<div class="main-table-titles-sorteio">

    			<td class="main-table-title nome">Posição</td>
    			<td class="main-table-title nome">Nome</td>
    			<td class="main-table-title">Situação</td>
    
    		</tr>
	        <!-- chamar as informaçoes do banco de dados de acordo com o id sorteados --> 
			<?php
        $max = count($arrayCandidatos);
        $ordenado = array();
        
        for ($i = 0; $i < $max; $i ++) {
            $sorteio = array_rand($arrayCandidatos);
            // var_dump($id[$sorteio]).'<br />' ;
            $k = 1;
            
            for ($j = 0; $j < $max; $j ++) {
                if (! empty($ordenado[$j])) {
                    if ($arrayCandidatos[$sorteio] == $ordenado[$j]) { // se ele ja estiver armazenado, da um erro
                        $k = 0;
                        break;
                    } else {
                        $k = 1;
                    }
                }
            }
            
            if ($k == 0) {
                // echo "Ja esta no array".'<br />';
                $i --;
            } elseif ($k == 1) {
                // echo "gravo no array".'<br />';
                $ordenado[$i] = $arrayCandidatos[$sorteio];
            }
        }
        
        for ($i = 0; $i < count($ordenado); $i ++) {
            $cand = $ordenado[$i];
            $id = $cand['idCandidato'];
            $sql = "SELECT idcandidato, nome, situacao from candidato WHERE idcandidato = $id";
            $result = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            
            $id = mysqli_fetch_array($result);
            ?>	 
			 <div class="main-table-itens main-table-itens-sorteio">
			<p class="main-table-item"><?php echo $i+1; ?></p>
			<p class="main-table-item"><?php echo $id['nome']; ?></p>
			<p class="main-table-item">
			<?php 
                    if ($id['situacao'] == 'i') {
                        echo "Interno";
                    } elseif ($id['situacao'] == 'e') {
                        echo "Externo";
                    }
                ?>
    			</p></td>
    			</tr>
			</div> 
			<?php
                    $idCandidato = $id['idcandidato'];
                    $idEditalCurso = $row['ideditalcurso'];
                    $tabela = "sorteados";
                    $elementos = " ordem, editalcurso, candidato, matriculaEfetuada";
                    $conteudo = " $i+1 , $idEditalCurso, $idCandidato, 0";
                    
                    $insereSorteados = inserirbd($tabela, $elementos, $conteudo, NULL);
                    ?>
            </div>
      
                  <?php
                }
       
    } else {
        ?>
        <p>Não há alunos inscritos nesse Curso</p>
        <?php
      }
       
} else {
    header("location: ./sorteiojarealizado.php");
}
?>
    <input id="imprimir" class="main-form-inputButton" type="button"
		value="Imprimir" />
    <a class="main-form-back" href="javascript:history.back();">Voltar</a>
    
     </div>
     
</div>

</main>

<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>