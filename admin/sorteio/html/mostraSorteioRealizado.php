<style>
    @media print {
  body * {
    visibility: hidden;
  }
  #printable, #printable * {
    visibility: visible;
  }
  #printable {
    position: fixed;
    left: 0;
    top: 0;
  }
}
</style>
<?php
$tagTitle = "Sorteados";

// Linka o arquivo pdao para pegar os cursos a fim de exibi-los
require_once "../../../arquivosfixos/pdao/pdaoscript.php";
require_once "../control/pdaosorteio.php";

if (isset($_GET['edital'])) {
    $idEdital = $_GET['edital'];
}
if (! isset($_GET['edital']) or $_GET['edital'] == NULL) {
    header('location: ./sorteioedital.php');
}

if (isset($_GET['curso'])) {
    $idCurso = $_GET['curso'];
}

if (! isset($_GET['curso']) or $_GET['curso'] == NULL) {
    header('location: ./sorteioRealizadoedital.php');
}

function  listarSorteados(){
    $idCurso = $_GET['curso'];
    $idEdital = $_GET['edital'];
    $conexao = conexaobd();
    if ($conexao) {
        $sql = "SELECT c.idcandidato as 'idCandidato', c.nome as 'nomeCandidato', c.rg as 'rgCandidato', c.orgaoemissor as 'orgaoEmissorCandidato', c.cpf as 'cpfCandidato', c.nascimento as 'nascimentoCandidato', c.logradouro as 'logradouroCandidato', c.complemento as 'complementoCandidato', c.bairro as 'bairroCandidato', c.cep as 'cepCandidato', c.cidade as 'cidadeCandidato', c.uf as 'ufCandidato', c.email as 'emailCandidato', c.telefone1 as 'telefone1Candidato', c.telefone2 as 'telefone2Candidato', c.situacao as 'situacaoCandidato', s.editalcurso as 'idEditalCurso', cur.nome as 'nomeCurso' FROM sorteados s JOIN candidato c ON s.candidato=c.idcandidato JOIN editalcurso e ON s.editalcurso=e.ideditalcurso JOIN curso cur ON e.idcurso=cur.idcurso where cur.idcurso=$idCurso and e.idedital=$idEdital";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        return $query;
    } else {
        echo "Conexão com o BD não estabelecida!";
        return FALSE;
    }
}

$selectSorteados = listarSorteados();

require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
	<div id="printable" class="main-content">
		<h1 class="main-title">Listagem do sorteio</h1>
		<div class="main-table table-edital table-sorteio">
			<div class="main-table-itens main-table-itens-realizado">
				<p class="main-table-title">Posição</p>
				<p class="main-table-title">Nome</p>
				<p class="main-table-title">Situação</p>
				<p class="main-table-title">Curso</p>
				<p class="main-table-title">Ação</p>
			</div>
			<?php
                $arrayCandidatos = Array();
                $arrayCandidato = Array();
                $indice = 0;
                $posicao = 0;
                
                while ($row = mysqli_fetch_assoc($selectSorteados) ) {
                    $posicao++;
                    
                    $arrayCandidato = Array();
                    
                    $idCandidato = $row['idCandidato'];
                    $nome = $row['nomeCandidato'];
                    $rg = $row['rgCandidato'];
                    $orgaoemissor = $row['orgaoEmissorCandidato'];
                    $cpf = $row['cpfCandidato'];
                    $nascimento = $row['nascimentoCandidato'];
                    $logradouro = $row['logradouroCandidato'];
                    $complemento = $row['complementoCandidato'];
                    $bairro = $row['bairroCandidato'];
                    $cep = $row['cepCandidato'];
                    $cidade = $row['cidadeCandidato'];
                    $uf = $row['ufCandidato'];
                    $email = $row['emailCandidato'];
                    $telefone1 = $row['telefone1Candidato'];
                    $telefone2 = $row['telefone2Candidato'];
                    $situacao = $row['situacaoCandidato'];
                    $curso = $row['nomeCurso'];
                    
                    array_push($arrayCandidato, $idCandidato, $nome, $rg, $orgaoemissor, $cpf, $nascimento, $logradouro, $complemento, $bairro, $cep, $cidade, $uf, $email, $telefone1, $telefone2, $situacao, $curso, $idCurso);
                    array_push($arrayCandidatos, $arrayCandidato);

            ?>		
            <div class="main-table-itens main-table-itens-realizado">
                <p class="main-table-title "> <?php echo $posicao;?></p>
                <p class="main-table-title"> <?php echo $arrayCandidatos[$indice][1]?></p>
                <p class="main-table-title"> 
                    <?php
                    if ($arrayCandidatos[$indice][15] == "e") {
                            echo "Externo";
                        }
                        if ($arrayCandidatos[$indice][15] == "i") {
                            echo "Interno";
                        }
                    ?>
                </p>
                <p class="main-table-title"> <?php echo $arrayCandidatos[$indice][16];?> </p>
               
                    <?php
                    
                        $conexao = conexaobd();
                        $sql = "SELECT matriculaEfetuada FROM sorteados WHERE candidato = ".$arrayCandidatos[$indice][0];
                        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                        $matriculaEfetuada = mysqli_fetch_assoc($query);
                        if ($matriculaEfetuada["matriculaEfetuada"] == 0) {
                    ?>
                    <form method="POST" action="../control/matricula.php">
                    	<input type="hidden" name="idCandidato" value="<?php echo $arrayCandidatos[$indice][0];?>" /> 
                    	<input type="hidden" name="idcurso" value="<?php echo $arrayCandidatos[$indice][17];?>" />
                    	<input class="matricula" type="submit" value="Matricular" />
                    </form>
                	<?php
                        }
                        else {
                    ?>
    				<p class="main-table-title">Matriculado</p>
    				<?php
                        }
                    ?>
				
			</div>
			<?php
                $indice++;
                }
			?>
        <input id="imprimir" class="btn-save imp" type="button" onclick="window.print()" value="Imprimir" />
        <a class="btn-back imp" href="javascript:history.back();">Voltar</a>
    </div>
</main>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>