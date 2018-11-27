<?php 


// Linka o arquivo pdao para pegar os cursos a fim de exibi-los
require_once "../../../arquivosfixos/pdao/pdaoscript.php";

//require_once "./sorteiocurso.php";
include_once'../control/sorteio.php';

 function quadraJOIN() {
    $conexao = conexaobd();
    if($conexao){
            $sql = "SELECT c.nome, c.rg, c.orgaoemissor, c.cpf, c.nascimento, c.logradouro, c.complemento, c.bairro, c.cep, c.cidade, c.uf, c.email, c.telefone1, c.telefone2, c.situacao, s.editalcurso, cur.nome as cursonome, c.idcandidato FROM sorteados s JOIN candidato c ON s.candidato=c.idcandidato JOIN editalcurso e ON s.editalcurso=e.ideditalcurso JOIN curso cur ON e.idcurso=cur.idcurso";
            $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            
            return $query;
    }
    else{
        echo "Conexão com o BD não estabelecida!";
        return FALSE;
    }
}



$selectSorteados= quadraJOIN();

$tagTitle = "Sorteados";
	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
			<main id="main">
			<div class="main-content">
					<h1 class="main-title">Listagem dos sorteados</h1>
					<table class="main-table">
						<tr>
							<td class="main-table-title nome" >Posição</td>
							<td class="main-table-title nome" >Nome</td>
							<td class="main-table-title" >Situação</td>
							<td class="main-table-title" >Curso</td>
							<td class="main-table-title" >Ação</td>
							
						</tr>
	<?php 
	
	$arrayCandidatos = Array();
	$arrayCandidato = Array();
	$i=0;
	$j=1;
	while ($row = mysqli_fetch_array($selectSorteados)){
        
	
	$arrayCandidato = Array();
 
    
    
    $nome = $row['nome'];
    $rg = $row['rg'];
    $orgaoemissor= $row['orgaoemissor'];
    $cpf= $row['cpf'];
    $nascimento= $row['nascimento'];
    $logradouro=$row['logradouro'];
    $complemento=$row['complemento'];
    $bairro=$row['bairro'];
    $cep= $row['cep'];
    $cidade= $row['cidade'];
    $uf=$row['uf'];
    $email=$row['email'];
    $telefone1=$row['telefone1'];
    $telefone2=$row['telefone2'];
    $situacao=$row['situacao'];    
    $curso=$row['cursonome'];
    $idCandidato = $row['idcandidato'];
    
    array_push($arrayCandidato, $nome, $rg, $orgaoemissor, $cpf, $nascimento, $logradouro, $complemento, $bairro, $cep, $cidade, $uf, $email, $telefone1, $telefone2, $situacao, $curso, $idCandidato);
    array_push($arrayCandidatos, $arrayCandidato);
    
    unset($arrayCandidato);
    ?>						
    					<tr>
							<td class="main-table-title id" > <?php echo $j;?></td>
							<td class="main-table-title nome" > <?php echo $arrayCandidatos[$i][0];?></td>
							<td class="main-table-title situacao" > <?php if($arrayCandidatos[$i][14]=="e"){
							    echo "Externo";
							    }
							    else if($arrayCandidatos[$i][14]=="i"){
							        echo "Interno";
							    }?>
							</td>
							<td class="main-table-title curso" > <?php echo $arrayCandidatos[$i][15];?> </td>
							<td class="main-table-title acao"> 
								<?php 
								$idCandidato = $arrayCandidatos[$i][16];
								$campo="matriculaEfetuada";
								$tabela= "sorteados";
								$condicao= "WHERE candidato= $idCandidato";
								$matriculaAfetuada = selecionarbd ($campo, $tabela, $condicao);
								$matriculaAfetuadas=mysqli_fetch_array($matriculaAfetuada);
								if($matriculaAfetuadas["matriculaEfetuada"]==0){ ?>
								<form method="POST" action="../control/matricula.php">
									<input type="hidden" name="idAluno" value="<?php echo $arrayCandidatos[$i][16];?>"/>
									<input type="submit" value="Matricular"/>
								</form>
								</td>
								<?php } 
								else {?>
									<td class="main-table-title curso" > Matriculado </td>
								<?php }?>
						</tr>
	<?php $i++;
	      $j++;
	} 
	?>				</table>
					
				</div>
		</main>
		<?php
		  require_once "../../../arquivosfixos/headerFooter/footer.php";
	   ?>
		</div>
	</body>
</html>