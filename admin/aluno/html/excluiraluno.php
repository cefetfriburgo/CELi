<?php

if(!isset($_GET['aluno']) || $_GET['aluno']== null){
    header('location:./listadealunos.php');
}
$_GET['aluno'];
$idaluno = $_GET['aluno'];


require "../control/excluiraluno.php";
    
    $tagTitle = "Excluir aluno";
	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
			<main id="main">
				<div class="main-content">
          			<h1 class="main-title">Excluir aluno</h1>
					<form class="main-form" method="post" action="">
                    	<p class="main-form-legend"> Tem certeza que você deseja excluir definitivamente o aluno <?php echo $aluno['nome'] ; ?>?</p>
        				<input type="hidden" name="excluirAluno" value="<?php echo $idaluno; ?>">
                    	<a class="main-form-back" href="javascript:history.back();">Voltar</a>
                    	<button class="main-form-inputButton" type="submit" >
        					<p class="main-form-textButton">Excluir</p>
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
