<?php
$tagTitle = 'Registrar turma';
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
?>

    		<?php
    require_once "../../../arquivosfixos/headerFooter/header.php";
    ?>
<main id="main">
<div class="main-content">
	<h1 class="main-title">Registrar Turma</h1>
					<?php if($total['total'] != 0){ ?>
					<form class="main-form" action="/admin/turma/control/registrarturma.php" method="post">
						<table class="main-form-content">
							<tr class="main-form-dataLabel">
								<td class="main-form-abertLabel-data" colspan="2"><label class="main-form-label">Nome</label></td>
								<td class="main-form-separador-horaData"></td>
								<td class="main-form-encerLabel-data" colspan="2"><label class="main-form-label">Nivel</label></td>
							</tr>
							<tr class="main-form-dataInput">
								<td class="main-form-abertInput-data" colspan="2"><input class="main-form-input" type="text" name="nome" placeholder="Nome da turma"></td>
								<td class="main-form-separador-horaData"></td>
								<td class="main-form-encerInput-data" colspan="2"><input class="main-form-input" type="text" name="nivelamento" placeholder="Nível da turma"></td>
							</tr>
							<tr class="main-form-dataLabel">
								<td class="main-form-abertLabel-data" colspan="2"><label class="main-form-label">Ano</label></td>
								<td class="main-form-separador-horaData"></td>
								<td class="main-form-encerLabel-data" colspan="2"><label class="main-form-label">Semestre</label></td>
							</tr>
							<tr class="main-form-dataInput">
								<td class="main-form-abertInput-data" colspan="2"><input class="main-form-input" type="text" name="ano" placeholder="Ano"></td>
								<td class="main-form-separador-horaData"></td>
								<td class="main-form-encerInput-data" colspan="2"><input class="main-form-input" type="text" name="semestre" placeholder="Semestre"></td>
							</tr>
						</table>

						<table class="main-form-content">
							<tr class="main-form-cursoTitle">
								<td class="main-form-checkLabel"><span class="main-form-checkLabel-ctt"> </span></td>
								<td class="main-form-cursosLabel"><p class="main-form-label">Cursos</p></td>

							</tr>
							<?php
        while ($curso = mysqli_fetch_array($sql)) {
            ?>
							<tr class="main-form-cursoLine">
								<td class="main-form-cursoLine-checkbox"><input class="main-form-cursoLine-checkbox-element" type="radio" name="curso" value="<?php echo $curso['idcurso']; ?>"></td>
								<td class="main-form-cursoLine-nome"><p class="main-form-cursoLine-nome-text"><?php echo $curso['nome']; ?></p></td>

							</tr>
							<?php
        }
        ?>
						</table>

		<div class="main-form-submit">
			<button class="main-form-inputButton" type="submit">
				<p class="main-form-textButton">Registrar</p>
				<img class="main-form-iconButton"
					src="../../../arquivosfixos/midia/setaDireita-icon.png" />
			</button>
		</div>
	</form> 
					<?php } else { ?>
					<div class="main-form-vazio">
		<div class="main-form-vazio-ctt">
			<p class="main-form-legend">Para registrar uma nova turma é
				necessário antes possuir pelo menos um curso cadastrado no sistema.</p>
			<p class="main-form-legend">Registre um curso e tente novamente.</p>
			<a class="main-form-back" href="/admin/curso/adicionar">Adicionar um curso</a>
		</div>
	</div>
					 
					<?php } ?>
				</div>
</main>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>