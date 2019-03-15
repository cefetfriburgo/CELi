<?php
extract($_GET);
if(!isset($curso) || $curso==null){
    header('Location:./listarCurso.php');
}
require "../control/excluir.php";
$tagTitle = 'Excluir curso';
require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
<div class="main-content">
	<h1 class="main-title">Excluir curso</h1>
	<form class="main-form" method="post" action="">
		<p class="main-form-legend"> Tem certeza que você deseja excluir definitivamente o curso de <?php echo $nome['nome']; ?>?</p>
		<input type="hidden" name="excluirCurso" value="<?php echo $curso; ?>">
		<div class="main-btn">
			<a class="main-form-back btn-back" href="javascript:history.back();">Voltar</a>
			<input class="main-form-send btn-ex" type="submit" value="Excluir">
		</div>
	</form>
</div>
</main>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>