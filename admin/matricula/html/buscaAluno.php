<?php
session_start();

if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
    header('location: ../../login/html/loginAdmin.php');
}
if(!isset($_GET['turma']) || $_GET['turma']==null){
    header('location:../../Turma/html/listarturma.php');
}
$idturma = $_GET['turma'];

include_once'../control/buscaralunoDAO.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Matricular aluno | CELi</title>
		<link rel="stylesheet" type="text/css" href="../../../arquivosfixos/css/custom.css">
		<script src="../../../arquivosfixos/js/jquery.min.js"></script>
		<script src="./js/script.js"></script>
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
					<h1 class="main-title">Buscar aluno</h1>
					<form class="main-form" action="./buscaAluno.php?turma=<?php echo $idturma;?>" method="post">
						<label>Busque pelo nome do aluno:</label>
						<input type="text" name="nome">
						<button type="submit" class="main-content-form-content-send">Buscar</button>
					</form>
					
						<table class="main-table">
        					<tr class="table-title">
        						<th colspan="2">Alunos Buscados </th>
        					</tr>
        					<?php 
        			
        					if(isset($_POST['nome'])){
        					    $nome = $_POST['nome'];
        					    $alunos=selecionaAluno($nome);
        					foreach($alunos as $aluno){
        					?> 
        					<tr>
            					<td>
            						<?php echo $aluno[1];?>
            					</td>
            					<td>
            						<form action ="./matricular.php?turma=<?php echo $idturma;?>" method="post">
            						<input type="hidden" name="alunoid" value="<?php echo $aluno[0]; ?>">
            						<input type="hidden" name="alunonome" value="<?php echo $aluno[1]; ?>">
            						<button type="submit">Adicionar</button>
            						</form>
            						
            					</td>
        					</tr>
        					
        					<?php    
        					}}
        					
        					?>
    					</table>
					</div>
					</div>
					
				</div>
			</div>
			<?php
		  require_once "../../../arquivosfixos/headerFooter/footer.php";
	   ?>
		</div>
	</body>
</html>
