<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require "../control/listaalunos.php";

$tagTitle = "Lista de alunos";
require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
<div class="main-content">
	<h1 class="main-title">Lista de alunos</h1>
 	<?php if($conta3->num_rows != 0){?>
		<form class="form-buscar" action="<?php echo $_SERVER['PHP_SELF']; ?>"
		method="get">
		<div class="form-buscar-ctt">
			<input type="text" name="busca" placeholder="Filtre os alunos">
			<button type="submit">Buscar</button>
		</div>
	</form>
	<div class="main-table table-edital">
		<div class="main-table-titles-aluno">
			<p class="main-table-title">Alunos</p>
			<p class="main-table-title">Ações</p>
		
		</div>	
		<?php
            while ($aluno = mysqli_fetch_array($conta)) {
        ?>
		<div class="main-table-itens main-table-itens-aluno">
			<p class="main-table-item-nome"><?php echo $aluno['nome'];?></p>
			
			<div class="main-table-item main-table-itemBTN">
				<a class="btn-alterar"
					href="/admin/aluno/editar/<?php echo $aluno['idaluno']; ?>">editar</a>
				<a class="btn-excluir"
					href="/admin/aluno/excluir/<?php echo $aluno['idaluno']; ?>">excluir</a>
			
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
    	<a class="main-form-inputButton button-anterior"
			href="?pagina=<?php echo $pagina-1?>&busca=<?php echo $_GET['busca'] ?>">Anterior</a>
		<?php
        }
        if ($pagina < floor($div)) {
        ?>        					
        <a class="main-form-inputButton button-proximo"
			href="?pagina=<?php echo $pagina+1?>&busca=<?php echo $_GET['busca']?>">Próximo</a>
		<?php
        }
        ?>
    	</div>
    	<div class="main-registro">
    		<p class="main-registro-text">Total de registros: <?php echo $conta3->num_rows; ?></p>
    	</div>
        <?php }else{ ?>
        <p class="main-form-legend">Você não possui alunos registrados.</p>
    	<a class="main-form-back btn-save" href="/admin/aluno/adicionar">Registrar
		<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
		</a>
        <?php }?>

        				
  
</div>

</main>
<?php

require_once "../../../arquivosfixos/headerFooter/footer.php";
?>
