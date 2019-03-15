<?php

	$_POST['idEdital'];
	$edital = $_POST['idEdital'];
	
	$tagTitle="Excluir edital";

	if(!isset($edital) OR $edital == NULL){
	    header('location: ./listaDeEditais.php');
	}

	require "../control/excluir.php";

	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
	<div class="main-content">
	<h1 class="main-title">Excluir edital</h1>
		<form class="main-form" method="post" action="/admin/edital/control/excluir.php/">
			<p class="main-form-legend"> Tem certeza que você deseja excluir definitivamente o edital <?php echo $edital . " que se iniciou em " . $id['inicio'] ." às ". $id['hora_inicio'] . " e terminará em " . $id['fim']  ." às ". $id['hora_final'] ; ?>?</p>
			<input type="hidden" name="excluirCurso" value="<?php echo $edital; ?>">

		<div class="main-btn">
			<a class="btn-back" href="javascript:history.back();">Voltar</a>
			<input class="btn-ex" type="submit" value="Excluir">
			
		</div>
		</form>
	
	</div>
</main>
<?php
	require_once "../../../arquivosfixos/headerFooter/footer.php";
?>
