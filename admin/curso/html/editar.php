<?php
extract($_GET);
if(!isset($curso) || $curso==null){
    header('Location:./listarCurso.php');
}
$tagTitle="Editar curso";
require_once "../../../arquivosfixos/headerFooter/header.php";
require "../control/editar.php";
$selecionar = "SELECT nome FROM curso WHERE idcurso=" . $curso;
$query = mysqli_query($conexao, $selecionar);
$nome = mysqli_fetch_assoc($query);
 ?>
<div id="main">
	<div class="main-content">
		<h1 class="main-title">Editar curso</h1>
		<form class="main-form" method="post" action="/admin/curso/control/editar.php">
			<label class="main-form-label">Digite abaixo o novo nome do curso</label> 
				<input class="main-content-form-content-input main-form-input" type="text" name="nomecurso" value="<?php echo $nome['nome']; ?>"> 
				<input type="hidden" name="idcurso" value="<?php echo $curso; ?>">
				<div class="form-btns">
					<input class="main-content-form-content-send btn-save" type="submit" name="registro" value="Editar"> 
					<a class="main-content-form-content-back btn-back" href="javascript:history.back();">Voltar</a>
			</div>
		</form>
	</div>
</div>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>