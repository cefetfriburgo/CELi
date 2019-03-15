$(function(){
	
	
	// Disabled/enabled dos inputs pelo checkbox ao carregar a página
	$(".main-form-deficiencia-radioBoxmain-form-deficiencia-radioBox > div").on("click", function(){

		alert("teste");

	});
	
	$(".main-form-radioBoxx > div").on("click", function(){
		// Pega o input do campo clickado
		var element = $(this).find(".main-form-inputRadio");

		var elementVal = element.val();
		
		
		if(elementVal == "n"){
			$("#descricaoDeficiencia").attr("disabled", "disabled");
			$("#descricaoDeficiencia").css({
				'background-color': '#ccc'
			});
		}
		if(elementVal == "s"){
			$("#descricaoDeficiencia").removeAttr("disabled");
			$("#descricaoDeficiencia").css({
				'background-color': '#fff'
			});
		}
	});
	
	$(".main-form").on("submit", function(){
		var vldNome = validarNome();
		var vldEmail = validarEmail();
		var vldRgEmissor= validarRGEmissor();
		var vldCpf = valida_cpf();
		var vldNascimento =  validarNascimento();
		var vldTel1 = validarTelefone1();
		var vldTel2 = validarTelefone2();
		var vldUf = validarUf();
		var vldCidade = validarCidade();
		var vldBairro = validarBairro();
		var vldLogradouro =validarLogradouro();
		var vldSituacao = validarSituacao();
		var vldCurso = validarCurso();
		var vldDeficiencia = validarDeficiencia();
		

		if(!vldNome || !vldCpf || !vldRgEmissor || !vldTel1 || !vldTel2 || !vldEmail|| !vldUf || !vldCidade || !vldBairro || !vldLogradouro  || !vldCurso || !vldSituacao  || !vldNascimento || !vldDeficiencia){
			return false;
		}
		else{
			return true;

		}
	});
});

function validarNome(){
	var nome = $(".main-form-inputNome").val() ;
	nome = nome.trim();
	var i = 0;
	if (nome == ""){
		alert("O nome está vazio!");
		return false;
	}
	for (i = 0; i < nome.length; i++) {
		var c = nome.charCodeAt(i);
		if(c < 32){
			alert("O nome está inválido!");
			return false;
		}
	}
	return true;
};


function validarRGEmissor(){
	var rgEmissor = $(".main-form-inputOrgRG").val() ;
	var rg = $(".main-form-inputRG").val() ;
	rgEmissor= rgEmissor.trim();
	if(rg != "" && rgEmissor == ""){
		alert("O RG e/ou o Orgão Emissor está(ão) inválido(s)!");
		return false;
	}
	for (i=0; i<rgEmissor.length; i++) {
		var c = rgEmissor.charCodeAt(i);
		if(c<32){
			alert("O Órgão Emissor está inválido!")
			return false;
		}
	}
	return true;
};


function validarTelefone1 (){
	var telefone1 = $(".main-form-inputTelefone1").val() ;
	telefone1 = telefone1.trim()
	if(telefone1 == ""){
		return false;
	}
	for (i=0; i<telefone1.length; i++) {
		var c = telefone1.charAt(i);
		if(isNaN(c)){
			return false;
		}
	}
	return true;
};

function validarTelefone2 (){
	var telefone2 =  $(".main-form-inputTelefone2").val() ;
	if(telefone2 == ""){
		return false;
	}
	for (i=0; i<telefone2.length; i++) {
		var c = telefone2.charAt(i);
		if(isNaN(c)){
			return false;
		}
	}
	return true;
};

function validarEmail(){
	var email =  $(".main-form-inputEmail").val() ;
	var usuario = email.substring(0, email.indexOf("@"));
	var dominio = email.substring(email.indexOf("@")+1, email.length);
	if(email == ""){
		return true;
	}
	if ((usuario.length<1) ||
	    (dominio.length < 3) ||
	    (usuario.search("@")!=-1) ||
	    (dominio.search("@")!=-1) ||
	    (usuario.search(" ")!=-1) ||
	    (dominio.search(" ")!=-1) ||
	    (dominio.search(".")==-1) ||
	    (dominio.indexOf(".")<1 ) ||
	    (dominio.lastIndexOf(".")==dominio.length-1)) {
			alert("O email está inválido!");
			return false;
	}
	return true;
};

function validarUf(){
	var Uf =  ($('.main-form-inputUf').val()).trim();
	if( Uf ==""){
		return false;
		}
	else{
		var arrayUf = jQuery.makeArray( Uf );
		var contaArray = arrayUf.length;
			if(contaArray>1){
				return false;
			}
			else{
				return true;
			}
		}
};

function validarCidade(){
	var cidade =  $(".main-form-inputCidade").val() ;
	cidade= cidade.trim();
	var i=0;
	if (cidade == ""){
		return false;
	}
	for (i=0; i<cidade.length; i++) {
		var c = cidade.charCodeAt(i);
		if(c<32){
			alert("deu errado a cidade");
			return false;
		}
	}
	return true;
};

function validarBairro(){
	var bairro =  $(".main-form-inputBairro").val() ;
	bairro = bairro.trim();
	var i=0;
	console.log(bairro);
	if (bairro == ""){
		return false;
	}
	for (i=0; i<bairro.length; i++) {
		var c = bairro.charCodeAt(i);
		if(c<32){
			alert("deu errado o bairro");
			return false;
		}
	}
	return true;
	};

function validarLogradouro(){
	var logradouro =  $(".main-form-inputLogradouro").val() ;
	logradouro = logradouro.trim();
	if (logradouro == ""){
		return false;
	}
	for (i=0; i<logradouro.length; i++) {
		var c = logradouro.charCodeAt(i);
		if(c != 32 && (c<45 || c>57) && (c<65 || c>90) && (c<97 && c>122) && (c<128 && c>155) && c<157 && (c<160 || c>165)){
			alert("O logradouro está inválido!");
			return false;
		}
	}
	return true;
};


function validarSituacao(){
	var situacao = $('input[name=radio]:checked').val();
	if(situacao =="e" || situacao == "i"){
		return true;
	}
	else{
		alert("deu errado a situação")
	return false;
	}
};

function validarCurso(){
	var Curso =  ($('.main-form-selectCurso').val()).trim();
	if( Curso ==""){
		return false;
		}
	else{
		var arrayCurso = $.makeArray( Curso );
		var contaArray = arrayCurso.length;
			if(contaArray>1){
				return false;
			}
			else{
				return true;
			}
		}

};

function validarNascimento(){
	var nascimento= $('.main-form-inputNascimento').val();
	nascimento= nascimento.trim();
	if(nascimento == ""){
		return false;
	}

	var datanascimento = nascimento.split("-");
	var diaNasc = parseInt(datanascimento[2]);
	var mesNasc = parseInt(datanascimento[1]);
	var anoNasc = parseInt(datanascimento[0]);

	if(isNaN(diaNasc) || isNaN(mesNasc) || isNaN(anoNasc)){
		return false;
	}


	var hoje = new Date();
	var diaHoje = hoje.getDate();
	var mesHoje = hoje.getMonth() + 1;
	var anoHoje = hoje.getFullYear();

	var total= anoHoje-anoNasc;
	 if (mesHoje < mesNasc || mesHoje == mesNasc && diaHoje < diaNasc) {
	        total--;

	}
	if(total<15){
		return false;
	}
		return true;

};
function validarDeficiencia(){
	var deficiencia = $('input[name=radioDeficiencia]:checked').val();
    var complemento = ($('#descricaoDeficiencia').val()).trim();
    if(deficiencia == "s" || deficiencia == "n"){
    	if((deficiencia=="s") && complemento ==""){ //verificar se complemento esta vazio
    		return false;
   		 }else{
   			 return true;
   		 }
  	}else{
        return false;
    }

};
