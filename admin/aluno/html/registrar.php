<?php
$tagTitle = "Registrar aluno";
require_once "../../../arquivosfixos/headerFooter/header.php";
?>
 <script type="text/javascript" src="admin/aluno/html/js/script.js"></script>
<div id="main">
    <div class="main-content">
        <h1 class="main-title">Registrar aluno</h1>
        <form class="main-form" method="post" action="/admin/aluno/control/controlRegistarAluno.php">
            <div class="main-form-box">
                <label class="main-form-label main-form-labelNome">Nome</label> <input
                    class="main-form-input main-form-inputNome" type="text"
                    name="nomealuno">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelEmail">Endereço de
                    email</label> <input class="main-form-input main-form-inputEmail"
                    type="text" name="emailaluno"> <input type="hidden" name="email">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelRGl">RG</label> <input
                    class="main-form-input main-form-inputRG" type="text"
                    name="rgaluno"> <input type="hidden" name="rg">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelOrgEmiRg">Órgão emissor</label>
                <input class="main-form-input main-form-inputOrgRG" type="text"
                    name="orgaoemissoraluno"> <input type="hidden" name="orgaoemissor">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelCPF">CPF</label> <input
                    class="main-form-input main-form-inputCPF" type="text"
                    name="cpfaluno"> <input type="hidden" name="cpf">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelNacimento">Data de
                    nascimento</label> <input
                    class="main-form-input main-form-inputNascimento" type="date"
                    name="nascimentoaluno"> <input type="hidden" name="nascimento">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelTelefone1">Telefone 1</label>
                <input class="main-form-input main-form-inputTelefone1" type="text"
                    name="telefone1aluno"> <input type="hidden" name="telefone1">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelTelefone2">Telefone 2</label>
                <input class="main-form-input main-form-inputTelefone2" type="text"
                    name="telefone2aluno"> <input type="hidden" name="telefone2">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelUf">UF</label> <select
                    class="main-form-input main-form-inputUf" name="ufaluno">
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
                </select> <input type="hidden" name="uf">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelCidade">Cidade</label>
                <input class="main-form-input main-form-inputCidade" type="text"
                    name="cidadealuno"> <input type="hidden" name="cidade">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelBairro">Bairro</label>
                <input class="main-form-input main-form-inputBairro" type="text"
                    name="bairroaluno"> <input type="hidden" name="bairro">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelLogradouro">Logradouro</label>
                <input class="main-form-input main-form-inputLogradouro" type="text"
                    name="logradouroaluno"> <input type="hidden" name="logradouro">
            </div>
            <div class="main-form-box">
                <label class="main-form-label main-form-labelComplemento">Complemento</label>
                <input class="main-form-input main-form-inputComplemento"
                    type="text" name="complementoaluno"> <input type="hidden"
                    name="complemento">
            </div>
            <div class="main-form-box">
                <label class="main-form-label">CEP</label> <input
                    class="main-form-input" type="text" name="cepaluno"> <input
                    type="hidden" name="cep">
            </div>
                        <div class="noticia-checkbox-personalizado main-form-box">
                            <label class="main-form-label main-form-situation-label">Situação</label>
                            <div class="cadastro">
                            <input checked="checked" class="main-form-inputRadio" type="radio" value="i"  name="radio" id="tipo-cadastro1">
                            <label for="tipo-cadastro1">Interno</label>
                            <input class="main-form-inputRadio" type="radio" value="e" name="radio" id="tipo-cadastro2">
                            <label for="tipo-cadastro2">Externo</label>
                            </div>
                        </div>

                        <div class="checkbox main-form-box">
                            <label class="main-form-label main-form-dificiencia-label">Deficiência?</label>
                            <div class="cadastro1">
                            <input checked="checked" type="radio" value="s" name="radioDeficiencia" id="tipo-cadastroo1">
                            <label for="tipo-cadastroo1">Sim</label>
                            <input type="radio" value="n" name="radioDeficiencia" id="tipo-cadastroo2">
                            <label for="tipo-cadastroo2">Não</label>
                            </div>
                        </div>


            <div class="form-btns">
                <button class="main-form-inputButton" type="submit">
                    <p class="main-form-textButton">Registrar</p>
                    <img class="main-form-iconButton"
                        src="../../../arquivosfixos/midia/setaDireita-icon.png" />
                </button>
                
            </div>
        </form>
    </div>
</div>
<?php
require_once "../../../arquivosfixos/headerFooter/footer.php";
?>
