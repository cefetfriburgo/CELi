<?php
	
	$idEdital = $_POST['idEdital'];
	

	$tagTitle = "Editar Edital";
	if(!isset($idEdital) OR $idEdital == NULL){
	    //header('location: ./listaDeEditais.php');
	}

	$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
	mysqli_set_charset($conexao, "utf8");
	
	if (!$conexao){
		echo "ERROR! failure to connect to the database.";
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	}
	else{
	    $sql = "SELECT * FROM edital WHERE idedital=" . $idEdital;
	    $sql2 = "SELECT e.idcurso, e.vagaexterna, e.vagainterna FROM editalcurso e JOIN curso c WHERE  idedital = $idEdital AND e.idcurso=c.idcurso;";
	    $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
	    $query2 = mysqli_query($conexao, $sql2) or die(mysqli_error($conexao));
	    
	    $arrayDaConsulta = array();
	    
	    while ($row = mysqli_fetch_array($query)) {
	        array_push($arrayDaConsulta, $row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
	    }
	    
	    $arrayDaConsulta2IdCurso = array();
	    $arrayDaConsulta2VagasExt = array();
	    $arrayDaConsulta2VagasInt = array();
	    
	    while ($row = mysqli_fetch_array($query2)) {
	        array_push($arrayDaConsulta2IdCurso, $row[0]);
	        array_push($arrayDaConsulta2VagasExt, $row[1]);
	        array_push($arrayDaConsulta2VagasInt, $row[2]);
	    }
	}


	// Linka o arquivo pdao para pegar os cursos a fim de exibi-los
	require "../../../arquivosfixos/pdao/pdaoscript.php";

	// Instanciando as variáveis que serão utilizadas para executar a função
	$campos = "idcurso, nome";
	$tabela = "curso";
	$sql =  selecionarbd($campos, $tabela, NULL);


	require_once "../../../arquivosfixos/headerFooter/header.php";
	
?>
<main id="main">
	<div class="main-content">
		<h1 class="main-title">Editar edital</h1>
		<form class="main-form" action="../control/updateeditalbd.php" method="post">
			<table class="main-form-content-dataHora">
				<tr class="main-form-dataLabel">
					<td class="main-form-abertLabel-data" colspan="2">
						<label class="main-form-label">Data de abertura</label>
					</td>
					<td class="main-form-separador-horaData"></td>
					<td class="main-form-encerLabel-data" colspan="2">
						<label class="main-form-label">Data de encerramento</label>
					</td>
				</tr> 
				<tr class="main-form-dataInput">
					<td class="main-form-abertInput-data"colspan="2">
						<input class="main-form-input" type="text" value="<?php  echo $arrayDaConsulta[1]; ?>"  onfocus="(this.type='date')" name="dataabertura">
					</td>
					<td class="main-form-separador-horaData"></td>
					<td class="main-form-encerInput-data" colspan="2">
						<input class="main-form-input" type="text" value="<?php  echo $arrayDaConsulta[3]; ?>"  onfocus="(this.type='date')" name="dataencerramento">
					</td>
				</tr>
				<tr class="main-form-horaLabel">
					<td class="main-form-abertLabel-hora" colspan="2">
						<label class="main-form-label">Hora de abertura</label>
					</td>
					<td class="main-form-separador-horaData"></td>
					<td class="main-form-encerLabel-hora" colspan="2">
						<label class="main-form-label">Hora de encerramento</label>
					</td>
				</tr>
				<tr class="main-form-horaInput">
					<td class="main-form-abertInput-hora" colspan="2">
						<input class="main-form-input" type="text" value="<?php  echo $arrayDaConsulta[2]; ?>"  onfocus="(this.type='time')" name="horaabertura">
					</td>
					<td class="main-form-separador-horaData"></td>
					<td class="main-form-encerInput-hora" colspan="2">
						<input class="main-form-input" type="text" value="<?php  echo $arrayDaConsulta[4]; ?>"  onfocus="(this.type='time')" name="horaencerramento">
					</td>
				</tr>
			</table>
			<div class="main-form-cursoTable">
				<label class="main-form-cursoLabel-ctt main-form-checkLabel-ctt"></label>
				<label class="main-form-cursoLabel-ctt main-form-textLabel-ctt">Cursos</label>
				<p class="main-form-cursoLabel-ctt main-form-vagasLabel-ctt">Vagas internas</p>
				<p class="main-form-cursoLabel-ctt main-form-vagasLabel-ctt">Vagas externas</p>
				
					</div>
				<?php
					$j = 0;
				     while ($curso = mysqli_fetch_array($sql)) { ?>
				<div class="main-form-cursoTable">
					<?php 
						$query = "SELECT COUNT(idcurso) FROM curso";
						$query = mysqli_query($conexao, $query) or die(mysqli_error($conexao));
						for($i=0; $i < mysqli_fetch_assoc($query); $i++){
						    if(isset($arrayDaConsulta2IdCurso[$j])){
						        if($curso['idcurso'] == $arrayDaConsulta2IdCurso[$j]){
					?>	

					
							<td class="main-form-cursoLine-checkbox">
								<input class="main-form-cursoLine-checkbox-element" type="checkbox" name="idCurso[]" value="<?php echo $curso['idcurso']; ?>" checked>
							</td>
							<td class="main-form-cursoLine-nome">
								<p class="main-form-cursoLine-nome-text"><?php echo $curso['nome']; ?></p>
							</td>
							<td class="main-form-cursoLine-vagas vagas-interno">
							<?php // Continuar daqui! ?>
								<input id="interno-1" class="main-form-cursoCTT main-form-cursoLine-vagas-interno main-form-input" type="number" name="intCurso[]" min="0" placeholder="Interno" value=<?php echo $arrayDaConsulta2VagasInt[$j]?>>
							</td>
							<td class="main-form-cursoLine-vagas vagas-externo">
								
								<input id="externo-1" class="main-form-cursoCTT main-form-cursoLine-vagas-externo main-form-input" type="number" name="extCurso[]" placeholder="Externo" min="0" value=<?php echo $arrayDaConsulta2VagasExt[$j]?>>
							</td>
					<?php 
					         $j++;
					    }
					     
					    }
					    else{
				   ?>
					 		<td class="main-form-cursoLine-checkbox">
								<input class="main-form-cursoLine-checkbox-element" type="checkbox" name="idCurso[]" value="<?php echo $curso['idcurso']; ?>">
							</td>
							<td class="main-form-cursoLine-nome">
								<p class="main-form-cursoLine-nome-text"><?php echo $curso['nome']; ?></p>
							</td>
							<td class="main-form-cursoLine-vagas vagas-interno">
								<input class="main-form-cursoLine-vagas-interno" type="number" name="intCurso[]" min="0" placeholder="Interno" disabled>
							</td>
							<td class="main-form-cursoLine-vagas vagas-externo">
								<input class="main-form-cursoLine-vagas-externo" type="number" name="extCurso[]" min="0" placeholder="Externo" disabled>
							</td>
					<?php    
					    }
					}
					?>
				</div>
				<?php
				}
				?>	
			</table>
			<table class="main-form-content-condicao">
				<tr class="main-form-condicaoLabel">
					<td class="main-form-condicaoLabel-ctt" colspan="4">
						<label class="main-form-label">Condições de participação</label>
					</td>
				</tr>
				<tr class="main-form-condicaoInput">
					<td class="main-form-condicaoInput-ctt" colspan="4">
						<textarea class="main-form-condicaoInput-ctt-element main-form-input" type="text"
						name="condicao"><?php echo $arrayDaConsulta[5]; ?></textarea>
					</td>
				</tr>
			</table>
			
			<input type="hidden" name="idEdital" value="<?php echo $idEdital ?>"/>

			<button class="main-form-inputButton" type="submit" >
						<p class="main-form-textButton">Editar</p>
						<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
			</button>
		</form>
	</div>
</main>
<?php
	require_once "../../../arquivosfixos/headerFooter/footer.php";
?>
		</div>
	</body>
</html>






