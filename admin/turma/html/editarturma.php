<?php
$turma = $_GET['idturma'];

if (! isset($turma) or $turma == NULL) {
    header('location: /admin/turma/lista');
}

require '../../../arquivosfixos/pdao/pdaoscript.php';
$conexao = conexaobd();
$selecionar = "SELECT titulo FROM turma WHERE idturma=" . $turma;
$query = mysqli_query($conexao, $selecionar);
$titulo = mysqli_fetch_assoc($query);

$selecionar = "SELECT modulo FROM turma WHERE idturma=" . $turma;
$query = mysqli_query($conexao, $selecionar);
$modulo = mysqli_fetch_assoc($query);

/*
 * $arrayModulos=Array();
 * while ($row = mysqli_fetch_assoc($query)) {
 * $arrayModulos[] = $row['modulo'];
 * }
 */

$selecionar = "SELECT ano FROM turma WHERE idturma=" . $turma;
$query = mysqli_query($conexao, $selecionar);
$ano = mysqli_fetch_assoc($query);

$selecionar = "SELECT semestre FROM turma WHERE idturma=" . $turma;
$query = mysqli_query($conexao, $selecionar);
$semestre = mysqli_fetch_assoc($query);

$tagTitle = 'Editar turma';
require_once "../../../arquivosfixos/headerFooter/header.php";
?>
<main id="main">
<div class="main-content">
	<h1 class="main-title">Editar Turma</h1>
	<?php if($turma!=NULL){ ?>
	<form class="main-form" method="post" action="../control/editar.php">
		<label class="main-form-label">Nome da turma </label>
		<input class="main-form-input" type="text" name="tituloturma"
			value="<?php echo $titulo['titulo']; ?>"> <input type="hidden"
			name="idturma" value="<?php echo $turma; ?>"> <label
			class="main-form-label">Módulo da turma </label>
		<input class="main-form-input" type="text" name="moduloturma"
			value="<?php echo $modulo['modulo']; ?>"> <input type="hidden"
			name="idturma" value="<?php echo $turma; ?>"> <label
			class="main-form-label">Ano da turma </label> <input
			class="main-form-input" type="text" name="anoturma"
			value="<?php echo $ano['ano']; ?>"> <input type="hidden"
			name="idturma" value="<?php echo $turma; ?>"> <label
			class="main-form-label">Semestre da turma </label>
		<input class="main-form-input" type="text" name="semestreturma"
			value="<?php echo $semestre['semestre']; ?>"> <input type="hidden"
			name="idturma" value="<?php echo $turma; ?>">
		
		<div>
		<?php 
		  $verifica= "SELECT idaluno FROM matricula WHERE idturma=$turma";
		  $query1=mysqli_query($conexao, $verifica);

		  $verifica2 = mysqli_num_rows($query1);

		  if($verifica2==0){
		?> 
			<p class="msg-defaut"> Não há alunos matriculados nessa turma.</p>
		<?php 
		  }else{
		?>
			<table class="main-table editarTurma-table">
				<tr class="editarTurma-table-titles">
					<td class="editarTurma-table-title">Nome do Aluno</td>
					<td class="editarTurma-table-title">Média escrita</td>
					<td class="editarTurma-table-title">Média oral</td>
				</tr>
				<?php 
			
				    $sql="SELECT aluno.idaluno, aluno.nome, nota.medesc, nota.medoral FROM matricula JOIN aluno ON matricula.idaluno=aluno.idaluno JOIN nota ON matricula.idaluno = nota.idaluno and matricula.idturma = nota.idturma WHERE matricula.idturma='$turma'";
                    $query = mysqli_query($conexao, $sql);
				    
                    $i = 0;
				    while($result = mysqli_fetch_assoc($query)){
				    
				    ?>
					<tr class="editarTurma-table-titles">
						<td class="editarTurma-table-title"> <?php echo $result['nome']?> </td>
    					<td class=""><input class="main-form-input main-form-cursoCTT" type="decimal" max=10 min=0 name="medesc<?php echo $i; ?>" value=<?php echo $result['medesc'] ?>></td> 
    					<td class=""><input class="main-form-input main-form-cursoCTT" type="decimal" max=10 min=0 name="medoral<?php echo $i; ?>" value=<?php echo $result['medoral'] ?>></td>
    					<input type="hidden" name="idaluno<?php echo $i; ?>" value=<?php echo $result['idaluno'] ?>>
					<?php 
					$i++;
				    }
					?>
				</tr>

			</table>
			<input name="repeticoes" type="hidden" value=<?php echo $i?>>
			<?php 
		  }
			?>
			
			<input name="turma" type="hidden" value=<?php echo $turma?>> 
		</div>
		<div class="form-btns">
			<button class="proximo" type="submit">
				<p class="main-form-textButton">Salvar alterações</p>
				<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
			</button>
			<a class="voltar" href="/admin/turma/lista">
				<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaEsquerda-icon.png" />
				<p style="margin-top: 15px;"class="main-form-textButton">Voltar</p>
				
			</a>
			<a class="registrar" href="../../matricula/html/matricular.php?turma=<?php echo $turma?>">
				<p class="main-form-textButton">Matricular alunos</p>
				<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
			</a>
		</div>
	</form>
	<?php }
	else{
	    header('location: /admin/edital/lista');
	}?>
</div>
</div>
			<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>
		
