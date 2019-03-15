<?php
$tagTitle = 'Registrar curso';
require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<div id="main">
	<div class="main-content">
		<h1 class="main-title">Registrar curso</h1>
		<form class="main-form" action="/admin/curso/control/insertcursobd.php"
			method="get">
			<label class="main-form-label">Nome</label>
				<input class="main-form-input" type="text" name="nomecurso" placeholder="Digite o nome do curso novo aqui..."> 
				<button class="main-form-inputButton" name="registro" type="submit">
				<p class="main-form-textButton">Registrar</p>
				<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
			</button>
		</form>
	</div>
</div>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>