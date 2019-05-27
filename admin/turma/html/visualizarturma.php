<?php 

$idturma=$_GET['turma'];

if(!isset($idturma) || $idturma==null){
    header('Location:/admin/turma/lista');
  
}
require_once'../../../arquivosfixos/pdao/pdaoscript.php';
$resulto = selecionaTurma($idturma);
function selecionaTurma($idturma){
    $conexao = conexaobd();
    if($conexao){
        
        $sql= "SELECT t.titulo, t.modulo, c.nome FROM turma t JOIN curso c ON t.idcurso=c.idcurso WHERE t.idturma=$idturma";
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
    }
    else{
        echo "Conexão com o BD não estabelecida!";
        return FALSE;
    }
    
}
$infoTurma = selecionaTurma($idturma);
$turma = mysqli_fetch_assoc($infoTurma);

$tagTitle='Visualizar turma';
    		  require_once "../../../arquivosfixos/headerFooter/header.php";
?>
        	
    		<main id="main">
				<div class="main-content">
					<h1 class="main-title">Visualizar Turma</h1>
					<?php ?>
					<table class="main-table">
						<tr>
							<th class="tabela-informacoes-celula" >Curso:</th>
							<td class="tabela-informacoes-celula"><?php echo $turma['nome'] ; ?></td>
						</tr>
						<tr>
							<th class="tabela-informacoes-celula">Turma:</th>
							<td class="tabela-informacoes-celula"><?php echo $turma['titulo']; ?></td>
						</tr>
						<tr>
							<th class="tabela-informacoes-celula">Módulo:</th>
							<td class="tabela-informacoes-celula"><?php echo $turma['modulo']; ?></td>
						</tr>
					</table>
					
					
					<button value="buscar" class="main-content-form-content-send"><a href="./buscaAluno.php">Buscar</button>

						<table class="main-table" style="border:solid 1px">
        					<tr class="table-title">
        						<th> Médias dos alunos </th>
        					</tr>
        					<?php 
        					if(isset($_SESSION['alunos'])){
        					 $sessao = $_SESSION['alunos'];
        					 
        					foreach($sessao as $alunoSelecionado){?>
        					    <tr>
        					    	<td><?php echo $alunoSelecionado[1];?></td>
        					    	<td>
        					    		<form action = "../control/excluiraluno.php" method="post">
        					    			<input type="hidden" name="idExcluir" value="<?php echo $alunoSelecionado[0];?>"/>
        					    			<button type="submit">Excluir</button>
        					    		</form>
        					    	</td>
        					    </tr> 
        					<?php     
        					}}
        					
        					?>
    					</table>
    				<form action="../control/enviarMatricula.php" method="post">
        				<input type="hidden" name="idturma" value="<?php echo $idturma;?>"/>
        				<button type="submit">Matricular</button>
    				</form>
    					
				</div>
			</div>
			</main>
			<?php
    		  require_once "../../../arquivosfixos/headerFooter/footer.php";
            ?>
		
