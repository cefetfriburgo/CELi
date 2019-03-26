<?php


// Linka o arquivo pdao para pegar os cursos a fim de exibi-los
require_once "../../../arquivosfixos/pdao/pdaoscript.php";
require_once "../control/pdaosorteio.php";

// Instanciando as variáveis que serão utilizadas para executar a função
$campos = "idcurso, nome";
$tabela = "curso";
$sql =  selecionarbd($campos, $tabela, NULL);


if (isset($_POST['edital'])){
    $idEdital = $_POST['edital'];
}
if(!isset($idEdital) OR $idEdital == NULL){
    header('location: ./sorteioedital.php');
}

$tagTitle = "Sorteio Curso";
	require_once "../../../arquivosfixos/headerFooter/header.php";
?>
			<main id="main">
				<div class="main-content">
					<h1 class="main-title">Escolher Curso</h1>
        	<form method="POST" action="mostraSorteioRealizado.php" name="sorteio">
				<input type="hidden" name="edital" value="<?php echo $idEdital ?>">
				<center>
        		<select class="curso" name="curso">
        			<?php
          			$selectEditalCurso = selectEditalCurso("idedital, idcurso, vagainterna, vagaexterna", "WHERE idedital = $idEdital AND sorteioRealizado = 1");
          			while($row1 = mysqli_fetch_array($selectEditalCurso)){
                        $selectCurso = selectCurso("idcurso, nome", "WHERE idcurso = $row1[1];");
                      while($row2 = mysqli_fetch_array($selectCurso)){
            			?>
            			       <option value="<?php echo $row2[0] ?>"><?php echo " ".$row2[1] ?></option>
            			<?php
                      }
                    }
        			?>
				</select>
				</center>
            <button class="button-proximo-sort btn-alt"  type="submit" name="send" value="send" class="main-form-send">Próximo
			<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
			</button>
			</form>
			<a class="btn-back" href="javascript:history.back();">Voltar</a>
        </div>
      </main>
      <?php
		  require_once "../../../arquivosfixos/headerFooter/footer.php";
	   ?>
  </body>
</html>
