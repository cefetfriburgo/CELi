<?php

if(!isset($_GET['aluno']) || $_GET['aluno']== null){
    header('location: /admin/aluno/lista');
}
$_GET['aluno'];
$idaluno = $_GET['aluno'];


require "../control/excluir.php";
    
    $tagTitle = "Excluir aluno";
	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
			<main id="main">
				<div class="main-content">
          			<h1 class="main-title">Excluir aluno</h1>
					<form class="main-form" method="post" action="">
                    	<p class="main-form-legend"> Tem certeza que você deseja excluir definitivamente o aluno <?php echo $aluno['nome'] ; ?>?</p>
        				<input type="hidden" name="excluirAluno" value="<?php echo $idaluno; ?>">
                    	<a class="btn-back" href="javascript:history.back();">Voltar</a>
                    	<button class="btn-ex" type="submit" >
        					<p class="main-form-textButton">Excluir</p>
        					
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
