<?php

	$idEdital = $_GET['idEdital'];
	if(!isset($idEdital) OR $idEdital == NULL){
		header('location: ./listaDeEditais.php');
	}
	
	// conexão com o Banco de Dados.
	$conexao = mysqli_connect("localhost", "root", "", "celi");
	mysqli_set_charset($conexao, "utf8");
	if (!$conexao){
		echo "ERROR! failure to connect to the database.";
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	}

	else{
		$sql = "SELECT * FROM edital WHERE idedital=" . $idEdital . ";";
		$sql2 = "SELECT c.nome, e.vagaexterna, e.vagainterna FROM editalcurso e join curso c WHERE  idedital = $idEdital AND e.idcurso=c.idcurso;";
		$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
		$query2 = mysqli_query($conexao, $sql2) or die(mysqli_error($conexao));

		$arrayDaConsulta = mysqli_fetch_array($query);
		$arrayDaConsulta2Nome = array();
		$arrayDaConsulta2VagasExt = array();
		$arrayDaConsulta2VagasInt = array();

		while ($row = mysqli_fetch_array($query2)) {
			array_push($arrayDaConsulta2Nome, $row[0]);
			array_push($arrayDaConsulta2VagasExt, $row[1]);
			array_push($arrayDaConsulta2VagasInt, $row[2]);
		}

		$linhasAfetadas = mysqli_num_rows($query2);
	}

	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
	<div class="main-content">
		<h1 class="main-title">Informações do edital</h1>
		<table class="tabela-informacoes">
			<tr>
				<th class="tabela-informacoes-celula" > ID deste Edital: </th>
				<td class="tabela-informacoes-celula"> <?php echo $arrayDaConsulta[0]; ?> </td>
			</tr>
			<tr>
				<th class="tabela-informacoes-celula"> Data de início: </th>
				<td class="tabela-informacoes-celula">  <?php echo $arrayDaConsulta[1]; ?></td>
			</tr>
			<tr>
				<th class="tabela-informacoes-celula"> Horário de abertura: </th>
				<td class="tabela-informacoes-celula"> <?php echo $arrayDaConsulta[2]; ?> </td>
			</tr>
			<tr>
				<th class="tabela-informacoes-celula"> Data de encerramento:</th>
				<td class="tabela-informacoes-celula"> <?php echo $arrayDaConsulta[3]; ?> </td>
			</tr>
			<tr>
				<th class="tabela-informacoes-celula"> Horário de encerramento: </th>
				<td class="tabela-informacoes-celula"> <?php echo $arrayDaConsulta[4]; ?> </td>
			</tr>
			<tr>
				<th class="tabela-informacoes-celula"> Cursos presentes neste Edital: </th>
				<?php
					for($i = 0; $i< $linhasAfetadas; $i++){
				?>
					<td class="tabela-informacoes-celula"><br> Curso: <?php echo $arrayDaConsulta2Nome[$i] ?> --- <br> Vagas internas: <?php echo $arrayDaConsulta2VagasInt[$i] ?> --- <br> Vagas externas: <?php echo $arrayDaConsulta2VagasInt[$i] ?></td>
				<?php
					}
				?>
			</tr>
			<tr>
				<th class="tabela-informacoes-celula"> Condições de participação: </th>
				<td class="tabela-informacoes-celula"> <?php echo $arrayDaConsulta[5]?> </td>
			</tr>
		</table>
		<div class="botoes">
			<a class="btn-edit" href="editarEdital.php?idEdital=<?php echo $idEdital;?>"> Editar </a>
			<a class="btn-back" href="./listaDeEditais.php"> Voltar </a>
		</div>
	</div>
</main>
<?php
	require_once "../../../arquivosfixos/headerFooter/footer.php";
?>