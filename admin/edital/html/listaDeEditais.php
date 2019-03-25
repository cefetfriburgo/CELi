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
		<form class="form-buscar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
			<div class="form-buscar-ctt">
				<input type="text" name="busca">
				<button type="submit">Buscar</button>
			</div>
		</form>
		<div class="main-table table-edital">
			<div class="main-table-itens">
				<p class="main-table-item">Início</p>
				<p class="main-table-item">Término</p>
				<p class="main-table-item">Ação</p>
			</div>
			<?php
        			while ($edital = mysqli_fetch_array($conta)) {
            	?>
            	<div class="main-table-itens">
				<p class="main-table-item"><?php echo $edital['inicio'] . " às " . $edital['hora_inicio']; ?></p>
				<p class="main-table-item"><?php echo $edital['fim'] . " às " . $edital['hora_final']; ?></p>
				<div class="main-table-item main-table-itemBTN">
					<form action="/admin/edital/editar/" class="main-table-itemBTN" method="POST"> 
						<input type="hidden" name=idEdital value="<?php echo $edital['idedital'];?>"/>
						<button type="submit" class="btn-alterar" >Editar</button>
					</form>

					<form action="/admin/edital/excluir/" class="main-table-itemBTN "method="POST"> 
						<input type="hidden"  name=idEdital value="<?php echo $edital['idedital'];?>"/>
						<button type="submit" class="btn-excluir">Excluir</button>
					</form>
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
    			<a class="button-anterior" href="?pagina=<?php echo $pagina-1; ?>&busca=<?php echo $_GET['busca']?>">
    				<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaEsquerda-icon.png" />Anterior
    			</a>
    			<?php
        			}
        			if ($pagina < floor($div)) {
            	?>
        		<a class="button-proximo" href="?pagina=<?php echo $pagina+1; ?>&busca=<?php echo $_GET['busca']?>">Próximo
        			<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
        		</a>
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
		<p class="main-form-legend">Não há editais registrados.</p>
		<a class="btn-save" href="/admin/edital/adicionar">Registrar
		<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
		</a> 
		<?php 
			}
		?>
	</div> 
</main>

<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>