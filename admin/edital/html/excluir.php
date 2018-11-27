<?php

	$_GET['edital'];
	$edital = $_GET['edital'];

	if(!isset($edital) OR $edital == NULL){
	    header('location: ./listaDeEditais.php');
	}

	require "../control/excluir.php";

	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
	<div class="main-content">
	<h1 class="main-title">Excluir edital</h1>
		<form class="main-form" method="post" action="">
			<p class="main-form-legend"> Tem certeza que você deseja excluir definitivamente o edital <?php echo $edital . " que se iniciou em " . $id['inicio'] ." às ". $id['hora_inicio'] . " e terminará em " . $id['fim']  ." às ". $id['hora_final'] ; ?>?</p>
			<input type="hidden" name="excluirCurso" value="<?php echo $edital; ?>">
			<a class="main-form-back" href="javascript:history.back();">Voltar</a>
			<input class="main-form-send" type="submit" value="Excluir">
		</form>
	</div>
</main>
<?php
	require_once "../../../arquivosfixos/headerFooter/footer.php";
?>
