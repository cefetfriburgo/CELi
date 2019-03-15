<?php
	// Linka o arquivo pdao para pegar os cursos a fim de exibi-los
	require "../../../arquivosfixos/pdao/pdaoscript.php";
	// Instanciando as variáveis que serão utilizadas para executar a função
	$campos = "count(*) as total";
	$tabela = "curso";
	$sql2 = selecionarbd($campos, $tabela, NULL);
	$total = mysqli_fetch_array($sql2);
	$campos = "idcurso, nome";
	$tabela = "curso";
	$sql = selecionarbd($campos, $tabela, NULL);
	$tagTitle = 'Registrar Edital';
	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
	<div class="main-content">
		<h1 class="main-title">Registrar edital</h1>
		<?php
			if($total['total'] != 0){
		?>
		<form class="main-form" action="/admin/edital/control/inserteditalbd.php" method="post">
			<div class="main-form-contentTable">
				<label class="main-form-label">Data de abertura</label>
				<label class="main-form-label">Data de encerramento</label>
				<input class="main-form-input" type="date" name="dataabertura">
				<input class="main-form-input" type="date" name="dataencerramento">
				<label class="main-form-label">Hora de abertura</label>
				<label class="main-form-label">Hora de encerramento</label>
				<input class="main-form-input" type="time" name="horaabertura">
				<input class="main-form-input" type="time" name="horaencerramento">
			</div>
			<div class="main-form-cursoTable">
				<label class="main-form-cursoLabel-ctt main-form-checkLabel-ctt"></label>
				<label class="main-form-cursoLabel-ctt main-form-textLabel-ctt">Cursos</label>
				<p class="main-form-cursoLabel-ctt main-form-vagasLabel-ctt">Vagas internas</p>
				<p class="main-form-cursoLabel-ctt main-form-vagasLabel-ctt">Vagas externas</p>
				<?php
				//---------------------------------------------------------------
    					while ($curso = mysqli_fetch_array($sql)) {
        			?>
				<input id="checkboxCurso-<?php echo $curso['idcurso']; ?>" class="main-form-cursoCTT cursoInput-checkbox" type="checkbox" name="curso[]" value="<?php echo $curso['idcurso']; ?>">
				<label class="main-form-cursoLine-checkbox-element" for="checkboxCurso-<?php echo $curso['idcurso']; ?>">
					<img class="main-form-cursoLine-checkbox-element-img" src="../../../arquivosfixos/midia/check-icon.png">
				</label>
				<label class="main-form-cursoCTT main-form-cursoLine-nome-text" for="checkboxCurso-<?php echo $curso['idcurso']; ?>"> <?php echo $curso['nome']; ?></label>
				<input class="interno-<?php echo $curso['idcurso']; ?> main-form-cursoCTT main-form-cursoLine-vagas-interno main-form-input" type="number" name="interno_<?php echo $curso['idcurso']; ?>" min="0" placeholder="Interno" disabled="disabled">
				<input class="externo-<?php echo $curso['idcurso']; ?> main-form-cursoCTT main-form-cursoLine-vagas-externo main-form-input" type="number" name="externo_<?php echo $curso['idcurso']; ?>" min="0" placeholder="Externo" disabled="disabled">
				<?php
    					}
    				?>
			</div>
			<div class="main-form-condicaoTable">
				<label class="main-form-label">Condições de participação</label>
				<textarea class="main-form-condicaoInput-ctt-element main-form-input" type="text" name="condicao"></textarea>
			</div>

			<button class="main-form-inputButton" type="submit">
				<p class="main-form-textButton">Registrar</p>
				<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
			</button>
		</form> 
		<?php 
			}
			else {
		?>
		<div class="main-form-vazio">
			<div class="main-form-vazio-ctt">
				<p class="main-form-legend">Para registrar um novo edital é necessário antes possuir pelo menos um curso cadastrado no sistema.</p>
				<p class="main-form-legend">Registre um curso e tente novamente.</p>
				<a class="main-form-button" href="/admin/curso/cadastrar">Registrar curso</a>
			</div>
		</div> 
		<?php 
			} 
		?>
	</div>
</main>
<?php
	require_once "../../../arquivosfixos/headerFooter/footer.php";
?>