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
		<button class="main-form-inputButton" type="submit">
			<p class="main-form-textButton">Excluir</p>
			<img class="main-form-iconButton"
				src="../../../arquivosfixos/midia/setaDireita-icon.png" />
		</button>
		<a class="main-form-back" href="javascript:history.back();"> Voltar </a> 
	</form>
</div>
</main>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>