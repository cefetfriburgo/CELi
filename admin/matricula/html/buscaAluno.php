<?php

session_start();
error_reporting(0);
if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
    header('location: ../../login/html/loginAdmin.php');
}
if(!isset($_GET['turma']) || $_GET['turma']==null){
    header('location:../../Turma/html/listarturma.php');
}
$idturma = $_GET['turma'];

$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
	mysqli_set_charset($conexao, "utf8");
	if (!$conexao){
		echo "ERROR! failure to connect to the database.";
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	}
	else{
	    $sql = "SELECT matricula.idaluno, aluno.nome FROM matricula JOIN aluno ON matricula.idaluno=aluno.idaluno WHERE matricula.idturma=$idturma;";
	    $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
	    
	    $matriculados = array();
	    $i=0;
	    while ($row = mysqli_fetch_array($query)) {
			$matriculados[] = array('0' => $row['idaluno'], "1" => $row['nome']);
			$i++;
			
		}
	}
include_once '../control/buscaralunoDAO.php';


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
					<form class="form-buscar" action="./buscaAluno.php?turma=<?php echo $idturma;?>" method="post">
						<div class="form-buscar-ctt">
							
							<input type="text" name="nome" placeholder="Busque pelo nome do aluno">
							<button type="submit" class="main-content-form-content-send">Buscar</button>
						</div>
					</form>
					
						<table class="custom-table">
        					<tr class="table-title">
        						<th colspan="2">Alunos Buscados </th>
        					</tr>
							<?php 
							$selecionados = $_SESSION['alunos'];
        					if(isset($_POST['nome'])){
        					    $nome = $_POST['nome'];
								$alunos=selecionaAluno($nome);
								
        					foreach($alunos as $aluno){
								$erro=0;
								for($i=0; $i<count($selecionados);$i++){	
									
									if($aluno[1]==$selecionados[$i][1]){
										$erro=1;
									}
									
								}
								for($j=0;$j<count($matriculados);$j++){
									
										
									if($aluno[1]==$matriculados[$j][1]){
										
										$erro=1;
									}
								}
							if($erro==0){
        					?> 
        					<tr>
            					<td>
            						<?php echo $aluno[1];?>
            					</td>
            					<td class="td-select">
            						<form action ="./matricular.php?turma=<?php echo $idturma;?>" method="post">
										<center>
											<input type="hidden" name="alunoid" value="<?php echo $aluno[0]; ?>">
											<input type="hidden" name="alunonome" value="<?php echo $aluno[1]; ?>">
											<input type="hidden" name="idturma" value="<?php echo $idturma; ?>">
											<button class="hide" type="submit"> <img class="img-plus" src="../../../arquivosfixos/midia/plus.png"/></button>
										</center>
            						</form>
            						
            					</td>
        					</tr>
        					
        					<?php    
							}else{?>
								<tr>
            					<td>
            						<?php echo $aluno[1];?>
            					</td>
            					<td>
            						<p>Adicionado</p>
            						</form>
            						
            					</td>
        					</tr>	
							<?php
							}
						}}
        					
        					?>
    					</table>
						<a class="main-form-back btn-back" href="javascript:history.back();">Voltar</a>
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
