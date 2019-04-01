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
    	<title>Inscrição | CELi</title>
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
								session_start();
								if($query1->num_rows != 0){
								
						if(isset($_SESSION['erro'])||isset($_SESSION['voltar'])){
							$count = 1;
							if(isset($_SESSION['erro'])){
							?> <div class="error"> <ul><?php
							while($count<=16){
								if(isset($_SESSION['erro_'.$count])){
									?>
										<li> <img  src="../../arquivosfixos/midia/error.png" /> <?php echo $_SESSION['erro_'.$count]."<br>";?>  </li>

									 <?php
									
							} 
							$count++;
							}?></ul>
							</div>
						<?php } ?>
							

							
							<div class="main-form-box">
								<label class="main-form-label main-form-labelNome">Nome</label>
								<input value="<?php echo $_SESSION['name']; ?>" class="main-form-input main-form-inputNome
								<?php 
								if(isset($_SESSION['erro_1'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
								type="text" name="name" placeholder="Digite o seu nome completo" required>
							</div>
							<div class="main-form-box">
								<label  class="main-form-label main-form-labelEmail">E-mail</label>
								<input  value="<?php echo $_SESSION['email']; ?>" class="main-form-input main-form-inputEmail
								<?php 
								if(isset($_SESSION['erro_4'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
								type="email" name="email" placeholder="Digite seu e-mail" required>
							</div>
							<div class="main-form-box">
								<label class="main-form-label main-form-labelRG">RG</label>
								<input value="<?php echo $_SESSION['document1']; ?>" class="main-form-input main-form-inputRG
								<?php 
								if(isset($_SESSION['erro_6'])||isset($_SESSION['erro_9'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
								 type="text" name="document1" onkeyup="mascara('##.###.###-#',this,event,true)" placeholder="Digite seu RG" >
							</div>
							<div class="main-form-box">
								<label  class="main-form-label main-form-labelOrgEmiRg">Órgão Emissor do RG</label>
								<input  value="<?php echo $_SESSION['OrgEmiRg']; ?>" class="main-form-input main-form-inputOrgRG
								<?php 
								if(isset($_SESSION['erro_9'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
								type="text" name="OrgEmiRg" placeholder="Digite o órgão emissor ">
							</div>
							<div class="main-form-box">
								<label  class="main-form-label main-form-labelCPF">CPF</label>
								<input  value="<?php echo $_SESSION['document2']; ?>" class="main-form-input main-form-inputCPF
								<?php 
								if(isset($_SESSION['erro_7'])||isset($_SESSION['erro_6'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
								type="text" name="document2" placeholder="Digite seu CPF" onkeyup="mascara('###.###.###-##',this,event,true)" >
							</div>
							<div class="main-form-box">
								<label  class="main-form-label main-form-labelNacimento">Nascimento</label>
								<input  value="<?php echo $_SESSION['nascimento']; ?>" class="main-form-input main-form-inputNascimento
								<?php 
								if(isset($_SESSION['erro_8'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
								type="date" name="nascimento" placeholder="Digite sua data de nascimento"required>
							</div>
							<div class="main-form-box">
								<label  class="main-form-label main-form-labelTelefone1">Telefone 1</label>
								<input  value="<?php echo $_SESSION['phone1']; ?>" class="main-form-input main-form-inputTelefone1
								<?php 
								if(isset($_SESSION['erro_2'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
								type="text" name="phone1" placeholder="Digite seu telefone com DDD" onkeyup="mascara('(##) ####-#####',this,event,true)"required>
							</div>
							<div class="main-form-box">
								<label  class="main-form-label main-form-labelTelefone2">Telefone 2</label>
								<input  value="<?php echo $_SESSION['phone2']; ?>" class="main-form-input main-form-inputTelefone2
								<?php 
								if(isset($_SESSION['erro_3'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
								type="text" name="phone2" placeholder="Digite seu telefone com DDD" onkeyup="mascara('(##) ####-#####',this,event,true)"required>
							</div>
							<?php //Resolver o select! ?>
							<div class="main-form-box">
							<label  class="main-form-label main-form-labelUf">UF</label>
							<select id="uf" ="<?php echo $_SESSION['uf']; ?>" class="main-form-input main-form-inputUf
							<?php 
								if(isset($_SESSION['erro_10'])){
								echo 'teste1 "';}else{echo '"';}
								?> 	
							name="uf">
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
							<input  value="<?php echo $_SESSION['cidade']; ?>" class="main-form-input main-form-inputCidade
							<?php 
								if(isset($_SESSION['erro_11'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
							type="text" name="cidade" placeholder="Digite sua cidade" required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelBairro">Bairro</label>
							<input  value="<?php echo $_SESSION['bairro']; ?>" class="main-form-input main-form-inputBairro
							<?php 
								if(isset($_SESSION['erro_12'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
							 type="text" name="bairro" placeholder="Digite seu bairro "required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelLogradouro">Endereço</label>
							<input  value="<?php echo $_SESSION['logradouro']; ?>" class="main-form-input main-form-inputLogradouro
							<?php 
								if(isset($_SESSION['erro_13'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
							 type="text" name="logradouro" placeholder="Digite seu logradouro"required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelComplemento">Complemento de endereço</label>
							<input  value="<?php echo $_SESSION['complemento']; ?>" class="main-form-input main-form-inputComplemento
							<?php 
								if(isset($_SESSION['erro_16'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
							type="text" name="complemento" placeholder="Digite o complemento">
						</div>
						<div class="noticia-checkbox-personalizado main-form-box">
                            <label class="main-form-label main-form-situation-label">Comunidade</label>
                            <div class="cadastro">
                            <?php
                            if($_SESSION['radio']=="e"){ ?>
                            <input class="main-form-inputRadio" type="radio" name="radio" value="i" id=tipo-cadastro1">
                            <label for="tipo-cadastro1">Interno</label>
                            <input checked="checked" class="main-form-inputRadio" type="radio" value="e" name="radio" id="tipo-cadastro2">
                            <label for="tipo-cadastro2">Externo</label>
                           <?php }else{ ?>
                           	<input checked="checked" class="main-form-inputRadio" type="radio" name="radio" value="i" id=tipo-cadastro1">
                            <label for="tipo-cadastro1">Interno</label>
                            <input class="main-form-inputRadio" type="radio" value="e" name="radio" id="tipo-cadastro2">
                            <label for="tipo-cadastro2">Externo</label>
                            <?php } ?>
                            </div>
                        </div>
                        <div class="main-form-box">
							<label  class="main-form-label main-form-labelCurso">Cursos</label>
							<select class="main-form-input main-form-selectCurso 
							<?php 
								if(isset($_SESSION['erro_14'])){
								echo 'teste1 "';}else{echo '"';}
								?> 
							name="course">
							<?php
							    $idEdital = $idEdital['idedital'];
								$sql = "SELECT editalcurso.ideditalcurso, curso.nome FROM editalcurso JOIN curso ON editalcurso.idcurso=curso.idcurso JOIN edital ON editalcurso.idedital=edital.idedital WHERE editalcurso.idedital = $idEdital ";
								$query = mysqli_query($conexao, $sql);
								while($curso = mysqli_fetch_array($query)){?>	
							 <option <?php if($_SESSION['course']==$curso['ideditalcurso']){ echo "selected='selected'";}?> class="selectCurso-option" value="<?php echo $curso['ideditalcurso'];?>"><?php echo $curso['nome'];?></option> 
							<?php
								}
							
							?>
							</select>
						</div>
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
							<textarea disabled="disabled" style="background-color: rgb(204, 204, 204);" id="descricaoDeficiencia" name="descricaoDeficiencia" placeholder = "Conte-nos sobre a sua deficiência e eventuais necessidades específicas para atendimento."></textarea>
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



					
					<div class="main-form-box">
							<label class="main-form-label main-form-labelNome">Nome</label>
							<input  class="main-form-input main-form-inputNome" type="text" name="name" placeholder="Digite o seu nome completo" required>
						</div>
	
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelEmail">E-mail</label>
							<input  class="main-form-input main-form-inputEmail" type="email" name="email" placeholder="Digite o seu e-mail" required>
						</div>
						<div class="main-form-box">
							<label class="main-form-label main-form-labelRG">RG</label>
							<input class="main-form-input main-form-inputRG" type="text" name="document1" placeholder="Digite o seu RG" onkeyup="mascara('##.###.###-#',this,event,true)" >
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelOrgEmiRg">Órgão Emissor do RG</label>
							<input  class="main-form-input main-form-inputOrgRG" type="text" name="OrgEmiRg" placeholder="Digite o órgão emissor do seu RG ">
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelCPF">CPF</label>
							<input  class="main-form-input main-form-inputCPF" type="text" name="document2" placeholder="Digite o seu CPF" onkeyup="mascara('###.###.###-##',this,event,true)" >
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelNacimento">Nascimento</label>
							<input  class="main-form-input main-form-inputNascimento" type="date" name="nascimento" placeholder="Digite sua data de nascimento"required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelTelefone1">Telefone 1</label>
							<input class="main-form-input main-form-inputTelefone1" type="text" name="phone1" placeholder="Digite o seu DDD e telefone" onkeyup="mascara('(##) ####-#####',this,event,true)"required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelTelefone2">Telefone 2</label>
							<input  class="main-form-input main-form-inputTelefone2" type="text" name="phone2" placeholder="Digite o seu DDD e telefone" onkeyup="mascara('(##) ####-#####',this,event,true)"required>
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
							<input  class="main-form-input main-form-inputCidade" type="text" name="cidade" placeholder="Digite a sua cidade " required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelBairro">Bairro</label>
							<input  class="main-form-input main-form-inputBairro" type="text" name="bairro" placeholder="Digite o seu bairro "required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelLogradouro">Endereço</label>
							<input  class="main-form-input main-form-inputLogradouro" type="text" name="logradouro" placeholder="Digite o seu endereço"required>
						</div>
						<div class="main-form-box">
							<label  class="main-form-label main-form-labelComplemento">Complemento de endereço</label>
							<input  class="main-form-input main-form-inputComplemento" type="text" name="complemento" placeholder="Digite o complemento do seu endereço">
						</div>
						 <div class="noticia-checkbox-personalizado main-form-box">
                            <label class="main-form-label main-form-situation-label">Comunidade</label>

                            <div class="cadastro">
                            <input checked="checked" class="main-form-inputRadio" type="radio" name="radio" value="i" id="tipo-cadastro1">
                            <label for="tipo-cadastro1">Interno</label>
                            <input class="main-form-inputRadio" type="radio" value="e" name="radio" id="tipo-cadastro2">
                            <label for="tipo-cadastro2">Externo</label>
                            </div>
                        </div>
						

						<div class="main-form-box">
							<label  class="main-form-label main-form-labelCurso">Cursos disponíveis</label>
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
						<div class="checkbox main-form-box">
                            <label class="main-form-label main-form-dificiencia-label">Você possui algum tipo de deficiência?</label>
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
							<label class="main-form-label main-form-dificienciaTex-label">Informe-nos sobre sua deficiência</label>
							<textarea disabled="disabled" style="background-color: rgb(204, 204, 204);" id="descricaoDeficiencia" name="descricaoDeficiencia" placeholder = "Conte-nos sobre a sua deficiência e eventuais necessidades especiais para atendimento."></textarea>
						</div>
						
						<div class="main-form-submit">
							<button class="main-form-inputButton" type="submit">
								<p class="main-form-textButton">Inscrever-se</p>
								<img class="main-form-iconButton" src="../../arquivosfixos/midia/setaDireita-icon.png" />
							</button>
						</div>
					</form>
					<?php	}
					session_destroy();
					?>
					<?php
						}else{ ?>
        			<p class="main-form-legend">Não há editais ativos.</p>
	
   <?php }
				if(isset($_SESSION['voltar'])){
					session_destroy();
				}
				?>
				</div>
			</main>
			</body>
		</html>
			<?php
				require_once "../../arquivosfixos/headerFooter/footer.php";
			?>
