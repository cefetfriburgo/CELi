<?php
	ini_set('display_errors', 0);
	error_reporting(E_ALL);
	require "../control/listarEdital.php";
	$tagTitle = "Lista de Editais";
	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
	<div class="main-content">
		<h1 class="main-title">Lista de editais</h1>
		<?php 
			if($conta3->num_rows !=0) {
		?>
		<form class="form-buscar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
			<div class="form-buscar-ctt">
				<input type="text" name="busca">
				<button type="submit">Buscar</button>
			</div>
		</form>
		<div class="main-table table-edital">
			<div class="main-table-titles">
				<p class="main-table-title">Início</p>
				<p class="main-table-title">Término</p>
				<p class="main-table-title"></p>
			</div>
			<?php
        			while ($edital = mysqli_fetch_array($conta)) {
            	?>
            	<div class="main-table-itens">
				<p class="main-table-item"><?php echo $edital['inicio'] . " às " . $edital['hora_inicio']; ?></p>
				<p class="main-table-item"><?php echo $edital['fim'] . " às " . $edital['hora_final']; ?></p>
				<div class="main-table-item main-table-itemBTN">
					<a class="btn-alterar" href="/admin/edital/editar/<?php echo $edital['idedital']; ?>">alterar</a>
					<a class="btn-excluir" href="/admin/edital/excluir/<?php echo $edital['idedital']; ?>">excluir</a>
				</div>
            	</div>
			<?php 
				} 
			?>
		</div>

		<div class="main-content-buttons">
    			<?php
        			if ($pagina != 0) {
            	?>
    			<a class="main-form-inputButton button-anterior" href="?pagina=<?php echo $pagina-1; ?>&busca=<?php echo $_GET['busca']?>">Anterior</a>
    			<?php
        			}
        			if ($pagina < floor($div)) {
            	?>
        		<a class="main-form-inputButton button-proximo" href="?pagina=<?php echo $pagina+1; ?>&busca=<?php echo $_GET['busca']?>">Próximo</a>
        		<?php
        			}
        		?>
        	</div>
		
		<div class="main-registro">
			<p class="main-registro-text">
				<?php
					echo $conta->num_rows;
					
					if ($conta->num_rows == 0){
						echo " item registrado";
					}
					else{
						echo " itens registrados";
					}
				?>
			</p>
		</div>
		<?php
			}
			else{
		?>
		<p class="main-form-legend">Não há editais Registrados.</p>
		<a class="main-form-back" href="/admin/edital/adicionar">Registrar</a> 
		<?php 
			}
		?>
	</div> 
</main>

<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>