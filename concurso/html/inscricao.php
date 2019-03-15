<?php
//$tagTitle = ' Inscrição';
//requre_once "../../arquivosfixos/headerFooter/header.php";
//recaptcha

foreach ($_POST as $key => $value) {
    echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
}
?>

			
<html>
    <head>
    	<meta charset="utf-8">
    	<title>Inscrição</title>
    	<link rel="stylesheet" type="text/css" href="../../arquivosfixos/css/custom.css">
    	<script type="text/javascript" src="../../arquivosfixos/js/jquery.min.js"></script>
    	<script src="../../arquivosfixos/js/mascaraJS/mascara.min.js"></script>
          <script type="text/javascript" src="/concurso/html/js/script.js"></script>
          <script type="text/javascript" src="../../arquivosfixos/js/mascaraJS/mascara.js"></script>
    	
    </head>
    <body>
    
			
			<main id="main">
				<div class="main-content">
				
					<form class="main-form" name="formulario" method="POST" action="/concursos/enviar">
					<h1 class="main-title">Inscrição do CELi</h1>
					<?php
					$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
								mysqli_set_charset($conexao,"utf8");
								if (!$conexao){
									echo "ERROR! failure to connect to the database.";
									echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
									echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
									exit();
								}
								$sql1 = "SELECT idedital FROM edital WHERE data_ini < now() and data_fim > now() ORDER BY idedital DESC LIMIT 1";
								$query1 = mysqli_query($conexao, $sql1);

								$idEdital = mysqli_fetch_assoc($query1);

								if($query1->num_rows != 0){
					?>
						<div class="main-form-box">
							<label class="main-form-label main-form-labelNome">Nome</label>
							<input  class="main-form-input main-form-inputNome" type="text" name="name" placeholder="Digite seu nome completo" required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelEmail">E-mail</label>
							<input  class="main-form-input main-form-inputEmail" type="text" name="email" placeholder="Digite seu e-mail" required>
						</div>
						<div class="main-form-box">
							<label class="main-form-label main-form-labelRG">RG</label>
							<input class="main-form-input main-form-inputRG" type="text" name="document1" placeholder="Digite seu RG" >
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelOrgEmiRg">Órgão Emissor do RG</label>
							<input  class="main-form-input main-form-inputOrgRG" type="text" name="OrgEmiRg" placeholder="Digite o órgão emissor ">
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelCPF">CPF</label>
							<input  class="main-form-input main-form-inputCPF" type="text" name="document2" placeholder="Digite seu CPF" onkeyup="mascara('###.###.###-##',this,event,true)" >
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelNacimento">Nascimento</label>
							<input  class="main-form-input main-form-inputNascimento" type="date" name="nascimento" placeholder="Digite sua data de nascimento"required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelTelefone1">Telefone 1</label>
							<input class="main-form-input main-form-inputTelefone1" type="text" name="phone1" placeholder="Digite seu telefone com DDD" onkeyup="mascara('(##) ####-#####',this,event,true)"required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelTelefone2">Telefone 2</label>
							<input  class="main-form-input main-form-inputTelefone2" type="text" name="phone2" placeholder="Digite seu telefone com DDD" onkeyup="mascara('(##) ####-#####',this,event,true)"required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelUf">UF</label>
							<select class="main-form-input main-form-inputUf" name="uf">
								<option value="AC">AC</option>
								<option value="AL">AL</option>
								<option value="AM">AM</option>
								<option value="AP">AP</option>
								<option value="BA">BA</option>
								<option value="CE">CE</option>
								<option value="DF">DF</option>
								<option value="ES">ES</option>
								<option value="GO">GO</option>
								<option value="MA">MA</option>
								<option value="MG">MG</option>
								<option value="MS">MS</option>
								<option value="MT">MT</option>
								<option value="PA">PA</option>
								<option value="PB">PB</option>
								<option value="PE">PE</option>
								<option value="PI">PI</option>
								<option value="PR">PR</option>
								<option value="RJ">RJ</option>
								<option value="RN">RN</option>
								<option value="RO">RO</option>
								<option value="RR">RR</option>
								<option value="RS">RS</option>
								<option value="SC">SC</option>
								<option value="SE">SE</option>
								<option value="SP">SP</option>
								<option value="TO">TO</option>
							</select>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelCidade">Cidade</label>
							<input  class="main-form-input main-form-inputCidade" type="text" name="cidade" placeholder="Digite sua cidade " required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelBairro">Bairro</label>
							<input  class="main-form-input main-form-inputBairro" type="text" name="bairro" placeholder="Digite seu bairro "required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelLogradouro">Nome do logradouro</label>
							<input  class="main-form-input main-form-inputLogradouro" type="text" name="logradouro" placeholder="Digite seu logradouro"required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelComplemento">Complemento</label>
							<input  class="main-form-input main-form-inputComplemento" type="text" name="complemento" placeholder="Digite o complemento">
						</div>
						 <div class="noticia-checkbox-personalizado main-form-box">
                            <label class="main-form-label main-form-situation-label">Situação</label>

                            <div class="cadastro">
                            <input checked="checked" class="main-form-inputRadio" type="radio" name="radio" value="i" id="tipo-cadastro1">
                            <label for="tipo-cadastro1">Interno</label>
                            <input class="main-form-inputRadio" type="radio" value="e" name="radio" id="tipo-cadastro2">
                            <label for="tipo-cadastro2">Externo</label>
                            </div>
                        </div>
						
							<?php /*
							<div class="main-form-radioBox main-form-situacao-radioBox">
								<div class="main-form-radioBox-first situacao-interno">
									<p>interno</p>
									<input class="main-form-inputRadio inputButtonInterno" type="radio" name="radio" value="i">
								</div>
								<div class="main-form-radioBox-second situacao-externo">
									<input class="main-form-inputRadio inputButtonExterno" type="radio" name="radio" value="e">
									<p>externo</p>
								</div>
							</div>
						*/ ?>

						<div class="main-form-box">
							<label  class="main-form-label main-form-labelCurso">Cursos</label>
							<select class="main-form-input main-form-selectCurso" name="course">
							<?php
							    $idEdital = $idEdital['idedital'];
								$sql = "SELECT editalcurso.ideditalcurso, curso.nome FROM editalcurso JOIN curso ON editalcurso.idcurso=curso.idcurso JOIN edital ON editalcurso.idedital=edital.idedital WHERE editalcurso.idedital = $idEdital ";
								$query = mysqli_query($conexao, $sql);
								while($curso = mysqli_fetch_array($query)){
							?>
							 <option class="selectCurso-option" value="<?php echo $curso['ideditalcurso'];?>"><?php echo $curso['nome'];?></option> 
							<?php
								}
							?>
							</select>
						</div>

						<?php /*
						<div class="main-form-box">
							<label class="main-form-label main-form-dificiencia-label">Deficiência?</label>
							<div class="main-form-deficiencia-box">

								<div class="main-form-radioBox main-form-deficiencia-radioBox">
									<div class="main-form-radioBox-first deficiencia-sim">
										<p>sim</p>
										<input id="inputButtonSim" class="main-form-inputRadio main-form-inputRadioDef inputButtonSim" type="radio" name="radioDeficiencia" value="s">
									</div>
									<div class="main-form-radioBox-second deficiencia-nao">
										<input id="inputButtonNao" class="main-form-inputRadio main-form-inputRadioDef inputButtonNao" type="radio" name="radioDeficiencia" value="n">
										<p>não</p>
									</div>
								</div>
							</div>
						</div>
						*/ ?>
						
						  <div class="checkbox main-form-box">
                            <label class="main-form-label main-form-dificiencia-label">Deficiência?</label>
                            <div class="cadastro1 main-form-radioBoxx ">
							<div class="deficiencia-sim">
                            <input class="main-form-inputRadio" checked="checked" type="radio" value="s" name="radioDeficiencia" id="tipo-cadastroo1">
                            <label for="tipo-cadastroo1">Sim</label>
                            </div>
                            <div class="deficiencia-nao">
                            <input class="main-form-inputRadio" checked type="radio" value="n" name="radioDeficiencia" id="tipo-cadastroo2">
                            <label for="tipo-cadastroo2">Não</label>
                            </div>
                            </div>
                        </div>
                   		
						<div class="div-textareaDef">
							<label class="main-form-label main-form-dificienciaTex-label">Descrição</label>
							<textarea disabled="disabled" style="background-color: rgb(204, 204, 204);" id="descricaoDeficiencia" name="descricaoDeficiencia" placeholder = "Nos informe aqui a sua necessidade..."></textarea>
						</div>
						
						<div class="main-form-submit">
							<button class="main-form-inputButton" type="submit">
								<p class="main-form-textButton">Inscrever-se</p>
								<img class="main-form-iconButton" src="../../arquivosfixos/midia/setaDireita-icon.png" />
							</button>
						</div>
					</form>
					
					<?php
						}else{ ?>
        			<p class="main-form-legend">Não há editais ativos.</p>
	
   <?php }?>
					
				</div>
			</main>
			</body>



</html>
			<?php
				require_once "../../arquivosfixos/headerFooter/footer.php";
			?>