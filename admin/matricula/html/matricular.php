<?php
session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
    header('location: /admin');
}

require '../control/matricula.php';

if(!isset($_GET['turma']) || $_GET['turma']==null){
    header('location: /admin/turma/lista');
}
$idturma = $_GET['turma'];

$infoTurma = selecionaTurma($idturma);
$turma = mysqli_fetch_assoc($infoTurma);


$aluno=array();
if(isset($_POST['alunoid']) && isset($_POST['alunonome'])){
    $idAluno = $_POST['alunoid'];
    $nomeAluno = $_POST['alunonome'];
    array_push($aluno, $idAluno, $nomeAluno);
    $alunos=array();
    if(isset($_SESSION['alunos'])){
        $alunos = $_SESSION['alunos'];
    }
    $alunos[]= $aluno;
    $_SESSION['alunos'] = $alunos;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Matricular aluno | CELi</title>
		<link rel="stylesheet" type="text/css" href="../../../arquivosfixos/css/custom.css">
		<script src="../../../arquivosfixos/js/jquery.min.js"></script>	
    <!-- SCRIPT do submenu -->
		<script src="../../../arquivosfixos/js/headersubmenu.js"></script>
	</head>
	<body class="fadeIn">
		<div class="content">
             <?php
        		require_once "../../../arquivosfixos/headerFooter/header.php";
        	?>
			<div id="main">
				<div class="main-content">
					<h1 class="main-title">Matricular aluno</h1>
					<table class="main-table">
						<tr>
							<th class="tabela-informacoes-celula" >Curso:</th>
							<td class="tabela-informacoes-celula"><?php echo $turma['nome']; ?></td>
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
					
					<h2>Selecionar Aluno</h2>
					<button value="buscar" class="main-content-form-content-send"><a href="./buscaAluno.php?turma=<?php echo $idturma;?>">Buscar</button>

						<table class="main-table" style="border:solid 1px">
        					<tr class="table-title">
        						<th>Alunos Selecionados </th>
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
        					    			<input type="hidden" name="idturma" value = "<?php echo $idturma;?>"/>
         					    			<button type="submit">Excluir</button>
        					    		</form>
        					    	</td>        					    </tr> 
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
			<?php
		  require_once "../../../arquivosfixos/headerFooter/footer.php";
	   ?>
		</div>
	</body>
</html>
