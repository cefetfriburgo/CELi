<?php
error_reporting(0);
ini_set(“display_errors”, 0 );

$turma = $_GET['turma'];

if(!isset($turma) || $turma==null){
    header('Location: ./listarturma.php');
}
require "../control/excluirturma.php";

$tagTitle='Excluir turma';

    		  require_once "../../../arquivosfixos/headerFooter/header.php";
        	?>
    		<main id="main">
				<div class="main-content">
          			<h1 class="main-title">Excluir turma</h1>
					<form class="main-form" method="post" action="">
           				<p class="main-form-legend"> Tem certeza que você deseja excluir definitivamente a turma <?php echo $nome['titulo']; ?>?</p>
						<input type="hidden" name="excluirCurso" value="<?php echo $turma; ?>">
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
		