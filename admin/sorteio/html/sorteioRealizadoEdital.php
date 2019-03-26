<?php

// Linka o arquivo pdao para pegar os cursos a fim de exibi-los
require_once "../../../arquivosfixos/pdao/pdaoscript.php";
require_once "../control/pdaosorteio.php";

// Instanciando as variáveis que serão utilizadas para executar a função
$campos = "idcurso, nome";
$tabela = "curso";
$sql =  selecionarbd($campos, $tabela, NULL);

$tagTitle = "Sorteio Edital";
require_once "../../../arquivosfixos/headerFooter/header.php";
?>
			<main id="main">
				<div class="main-content">
					<h1 class="main-title">Escolher Edital</h1>
        	<form method="POST" action="sorteioRealizadocurso.php" name="sorteio">
					
        		<select class="sorteio-edital" name="edital">
        			<?php
          			$selectEdital = selectEdital("idedital, data_ini, hora_ini, data_fim, hora_fim", NULL);
          			while($row = mysqli_fetch_array($selectEdital)){
        			?>
        			   <option value="<?php echo $row[0] ?>"><?php echo "Edital ".$row[0]." | inicio: ".$row[1].", ".$row[2]." Fim: ".$row[3].", ".$row[4] ?></option>
        			<?php
                }
        			?>
        		</select>
            <button class="btn-save" type="submit" name="send" value="send" class="main-form-send">Próximo
						<img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
						</button>
        	</form>
        </div>
      </main>
		<?php
		  require_once "../../../arquivosfixos/headerFooter/footer.php";
	   ?>
  </body>
</html>

