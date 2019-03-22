<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require "../control/listadeturmas.php";

$tagTitle = 'Listar turma';

require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
<div class="main-content">
	<h1 class="main-title">Lista de turmas</h1>
	<?php if($result2->num_rows != 0){?>
	<form class="form-buscar" action="<?php echo $_SERVER['PHP_SELF']; ?>"method="get">
		<div class="form-buscar-ctt">
			<input type="text" name="busca" placeholder="Filtre as turmas">
			<button type="hidden">Buscar</button>
		</div>
	</form>
	<div class="main-table table-edital">
		<div class="main-table-titles-turma">
			<p class="main-table-title">Nome</p>
			<p class="main-table-title">Curso</p>
			<p class="main-table-title">Módulo</p>
			<p class="main-table-title">Ações</p>
		</div>
		<?php
        while ($turma = mysqli_fetch_array($result)) {
            
            ?>
		<div class="main-table-itens main-table-itens-turma">	
			<p class="main-table-item"><?php echo $turma['titulo']; ?></td>
			<p class="main-table-item"><?php echo $turma['nome']; ?></td>
			<p class="main-table-item"><?php echo $turma['modulo']; ?></td>
			<div class="main-table-item main-table-itemBTN">
			<a class="btn-alterar"
				href="/admin/turma/editar/<?php echo $turma['idturma'];?>">editar</a>
			<a class="btn-excluir"
				href="/admin/turma/excluir/<?php echo $turma['idturma'];?>">excluir</a>
			</div>
		</div>
		<?php  }?>
	</div>
	
	<div class="main-content-buttons">
    						<?php
        if ($pagina != 0) {
            ?>
    						<a class="button-anterior"
			href="?pagina=<?php echo $pagina-1?>&busca=<?php echo $_GET['busca'] ?>">Anterior</a>
    						<?php
        }
        if ($pagina < floor($div)) {
            ?>
        					<a class="button-proximo"
			href="?pagina=<?php echo $pagina+1?>&busca=<?php echo $_GET['busca']?>">Próximo</a>
        					<?php
        }
        
        ?>
        				
        				</div>
	<div class="main-registro">
		<p class="main-registro-text">Total de registros: <?php echo $result2->num_rows; ?></p>
	</div>
        			<?php }else{ ?>
					<p class="main-form-legend">Não há turmas registradas.</p>
	<a class="main-form-back btn-save" href="/admin/turma/adicionar">Registrar 
		<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
	</a>
					<?php }?>
				</div>
</main>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";

?>
