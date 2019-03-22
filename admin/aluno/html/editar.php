<?php

if(!isset($_GET['aluno']) || $_GET['aluno']== null){
    header('location: /admin/aluno/lista');
}

$idaluno= $_GET['aluno'];

require "../control/editar.php";
$selecionar = "SELECT nome FROM aluno WHERE idaluno=" . $idaluno;
$query = mysqli_query($conexao, $selecionar);
$nome = mysqli_fetch_assoc($query);

$sql = "SELECT rg, orgaoemissor, cpf, nascimento, logradouro, complemento, bairro, cep, cidade, uf, email, telefone1, telefone2, situacao, deficiencia FROM aluno WHERE idaluno=" . $idaluno;
$query1 = mysqli_query($conexao, $sql);
$aluno = mysqli_fetch_assoc($query1);


?>
		<script>
		$(function(){
			$(document).ready(function(){
				
				<?php 
				    if($aluno['situacao']=="i"){
				?>
				$(".inputButtonExterno").removeAttr('checked');
				$(".situacao-externo").siblings('div').css({
					'background-color': '#fff',
					'color': '#555'
				});
				$(".inputButtonInterno").attr('checked', 'checked');
				$(".situacao-interno").css({
					'background-color': '#ccc',
					'color': '#333'
				});
				<?php 
                    }
                    else{
				?>
				$(".inputButtonInterno").removeAttr('checked');
				$(".situacao-interno").siblings('div').css({
					'background-color': '#fff',
					'color': '#555'
				});
				$(".inputButtonExterno").attr('checked', 'checked');
				$(".situacao-externo").css({
					'background-color': '#ccc',
					'color': '#333'
				});
				<?php 
                    }
				?>		

				<?php 
					    if($aluno['deficiencia']=="s"){
					?>
					$(".inputButtonNao").removeAttr('checked');
					$(".deficiencia-nao").siblings('div').css({
						'background-color': '#fff',
						'color': '#555'
					});
					$(".inputButtonSim").attr('checked', 'checked');
					$(".deficiencia-sim").css({
						'background-color': '#ccc',
						'color': '#333'
					});
					<?php 
	                    }
	                    else{
					?>
					$(".inputButtonSim").removeAttr('checked');
					$(".deficiencia-sim").siblings('div').css({
						'background-color': '#fff',
						'color': '#555'
					});
					$(".inputButtonNao").attr('checked', 'checked');
					$(".deficiencia-nao").css({
						'background-color': '#ccc',
						'color': '#333'
					});
					<?php 
	                    }
					?>				
				
			});
		});
		</script>
    
      		<?php
      		$tagTitle = "Editar aluno";
        		require_once "../../../arquivosfixos/headerFooter/header.php";
        	?>
			<div id="main">
				<div class="main-content">
					<h1 class="main-title">Alterar aluno</h1>
					<form class="main-form" method="post" action="../control/editar.php">						
						<input type="hidden" name="idaluno" value="<?php echo $idaluno; ?>">
						<div class="main-form-box">
							<label class="main-form-label main-form-labelNome">Nome</label>
							<input class="main-form-input main-form-inputNome" type="text" name="nomealuno" value="<?php echo $nome['nome']; ?>">
						</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelEmail">Endereço de mail</label>
    						<input class="main-form-input main-form-inputEmail" type="text" name="emailaluno" value="<?php echo $aluno['email']; ?>">
    						<input type="hidden" name="email" value="<?php echo $email; ?>">
    					</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelRGl">RG </label>
    						<input class="main-form-input main-form-inputRG" type="text" name="rgaluno" value="<?php echo $aluno['rg']; ?>">
    						 <input type="hidden" name="rg" value="<?php echo $rg; ?>">
						</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelOrgEmiRg">Órgão emissor</label>
    						<input class="main-form-input main-form-inputOrgRG" type="text" name="orgaoemissoraluno" value="<?php echo $aluno['orgaoemissor']; ?>">
    						<input type="hidden" name="orgaoemissor" value="<?php echo $orgaoemissor; ?>">
						</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelCPF">CPF</label>
    						<input class="main-form-input main-form-inputCPF" type="text" name="cpfaluno" value="<?php echo $aluno['cpf']; ?>">
    						<input type="hidden" name="cpf" value="<?php echo $cpf; ?>">
    					</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelNacimento">Data de nascimento</label>
    						<input class="main-form-input main-form-inputNascimento" type="date" name="nascimentoaluno" value="<?php echo $aluno['nascimento']; ?>">
    						<input type="hidden" name="nascimento" value="<?php echo $nascimento; ?>">
						</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelTelefone1">Telefone 1</label>
    						<input class="main-form-input main-form-inputTelefone1" type="text" name="telefone1aluno" value="<?php echo $aluno['telefone1']; ?>">
    						<input type="hidden" name="telefone1" value="<?php echo $telefone1; ?>">
    					</div>	
    					<div class="main-form-box">
    						<label class="main-form-label main-form-labelTelefone2">Telefone 2</label>
    						<input class="main-form-input main-form-inputTelefone2" type="text" name="telefone2aluno" value="<?php echo $aluno['telefone2']; ?>">
    						<input type="hidden" name="telefone2" value="<?php echo $telefone2; ?>">
    					</div>	
    					<div class="main-form-box">
    						<label class="main-form-label main-form-labelUf">UF</label>
    						<select class="main-form-input main-form-inputUf" name="ufaluno" value="<?php echo $aluno['uf']; ?>">
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
							<input type="hidden" name="uf" value="<?php echo $uf; ?>">
						</div>
						<div class="main-form-box">
    						<label  class="main-form-label main-form-labelCidade">Cidade</label>
    						<input  class="main-form-input main-form-inputCidade" type="text" name="cidadealuno" value="<?php echo $aluno['cidade']; ?>">
    						<input type="hidden" name="cidade" value="<?php echo $cidade; ?>">
						</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelBairro">Bairro</label>
    						<input class="main-form-input main-form-inputBairro" type="text" name="bairroaluno" value="<?php echo $aluno['bairro']; ?>">
    						<input type="hidden" name="bairro" value="<?php echo $bairro; ?>">
						</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelLogradouro">Logradouro</label>
    						<input class="main-form-input main-form-inputLogradouro" type="text" name="logradouroaluno" value="<?php echo $aluno['logradouro']; ?>">
    						<input type="hidden" name="logradouro" value="<?php echo $logradouro; ?>">
						</div>
						<div class="main-form-box">
    						<label class="main-form-label main-form-labelComplemento">Complemento</label>
    						<input class="main-form-input main-form-inputComplemento" type="text" name="complementoaluno" value="<?php echo $aluno['complemento']; ?>">
    						<input type="hidden" name="complemento" value="<?php echo $complemento; ?>">
						</div>
						<div class="main-form-box">
    						<label class="main-form-label">CEP</label>
    						<input class="main-form-input" type="text" name="cepaluno" value="<?php echo $aluno['cep']; ?>">
    						<input type="hidden" name="cep" value="<?php echo $cep; ?>">
						</div>
						<?php if($aluno['situacao']=='i'){
						?>
						<div class="noticia-checkbox-personalizado main-form-box">
							<label class="main-form-label main-form-situation-label">Situação</label>
							<div class="cadastro">
							<input checked="checked" class="main-form-inputRadio" type="radio" value="i"  name="radio" id="tipo-cadastro1">
							<label for="tipo-cadastro1">Interno</label>
							<input class="main-form-inputRadio" type="radio" value="e" name="radio" id="tipo-cadastro2">
							<label for="tipo-cadastro2">Externo</label>
							</div>
						</div>
					<?php }else{
					?>
						<div class="noticia-checkbox-personalizado main-form-box">
							<label class="main-form-label main-form-situation-label">Situação</label>
							<div class="cadastro">
							<input class="main-form-inputRadio" type="radio" value="i"  name="radio" id="tipo-cadastro1">
							<label for="tipo-cadastro1">Interno</label>
							<input checked="checked"class="main-form-inputRadio" type="radio" value="e" name="radio" id="tipo-cadastro2">
							<label for="tipo-cadastro2">Externo</label>
							</div>
						</div><?php
					}?>
					<?php
						if($aluno['deficiencia']=='s'){
							?>
						<div class="checkbox main-form-box">
							<label class="main-form-label main-form-dificiencia-label">Deficiência?</label>
							<div class="cadastro1">
							<input checked="checked" type="radio" value="s" name="radioDeficiencia" id="tipo-cadastroo1">
							<label for="tipo-cadastroo1">Sim</label>
							<input type="radio" value="n" name="radioDeficiencia" id="tipo-cadastroo2">
							<label for="tipo-cadastroo2">Não</label>
							</div>
						</div>
					<?php }else{
						?>
						<div class="checkbox main-form-box">
							<label class="main-form-label main-form-dificiencia-label">Deficiência?</label>
							<div class="cadastro1">
							<input type="radio" value="s" name="radioDeficiencia" id="tipo-cadastroo1">
							<label for="tipo-cadastroo1">Sim</label>
							<input checked="checked" type="radio" value="n" name="radioDeficiencia" id="tipo-cadastroo2">
							<label for="tipo-cadastroo2">Não</label>
							</div>
						</div>
						<?php
					}?>
                        <div class="form-btns">
    						<button class="btn-alt" type="submit">
    							<p class="main-form-textButton">Alterar</p>
    							<img class="main-form-iconButton"
    								src="../../../arquivosfixos/midia/setaDireita-icon.png" />
    						</button>
							<a class="btn-back" href="/admin/aluno/lista">Voltar</a>
                        </div>
					</form>
				</div>
			</div>
			<?php
		  require_once "../../../arquivosfixos/headerFooter/footer.php";
	   ?>
		</div>
	</body>
</html>
