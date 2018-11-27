<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require "../control/listadecurso.php";

$tagTitle = 'Lista de cursos ';
require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
<div class="main-content">
	<h1 class="main-title">Listar curso</h1>
<?php
if ($conta->num_rows != 0) {
?>
	<form class="form-buscar" action="<?php echo $_SERVER['PHP_SELF']; ?>"method="get">
		<div class="form-buscar-ctt">
			<input type="text" name="busca" placeholder="Filtre os cursos">
			<button type="submit">Buscar</button>
		</div>
	</form>
	<div class="main-table table-edital">
		<div class="main-table-titles-aluno">
			<p class="main-table-title">Cursos</p>
			<p class="main-table-title">Ações</p>
		</div>
			<?php
    while ($curso = mysqli_fetch_array($result)) {
        ?>
		<div class="main-table-itens main-table-itens-aluno">
			<p class="main-table-item-nome"><?php echo $curso['nome']; ?></p>
			<div class="main-table-item main-table-itemBTN">
				<a class="btn-alterar"
					href="/admin/curso/editar/<?php echo $curso['idcurso']; ?>">alterar</a>
				<a class="btn-excluir"
					href="/admin/curso/excluir/<?php echo $curso['idcurso']; ?>">excluir</a>
				
			</div>
		</div>
			<?php
    }
    ?>
	</div>
	<div class="main-content-buttons">
			<?php
    if (isset($_GET['busca'])) {
        if ($pagina != 0) {
            ?>
			<a class="main-form-inputButton button-anterior"
			href="?pagina=<?php echo $pagina-1; ?>&busca=<?php echo $_GET['busca']; ?>">Anterior</a>
			<?php
        }
        if ($pagina < floor($div)) {
            ?>
			<a class="main-form-inputButton button-proximo"
			href="?pagina=<?php echo $pagina+1; ?>&busca=<?php echo $_GET['busca']; ?>">Próximo</a>
			<?php
        }
    } else {
        if ($pagina != 0) {
            ?>
			<a class="main-form-inputButton button-anterior"
			href="?pagina=<?php echo $pagina-1; ?>">Anterior</a>
			<?php
        }
        if ($pagina < floor($div)) {
            ?>
			<a class="main-form-inputButton button-proximo"
			href="?pagina=<?php echo $pagina+1; ?>">Próximo</a>
			<?php
        }
    }
    ?>
		</div>
	<div class="main-registro">
		<p class="main-registro-text">Total de registros: <?php echo $conta->num_rows; ?></p>
	</div>
</div> 
	<?php
} else {
    ?>
	<p class="main-form-legend">Não há cursos registrados.</p>
<a class="main-form-back" href="/admin/curso/adicionar">Registrar</a>
	<?php
}
?>
</main>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>