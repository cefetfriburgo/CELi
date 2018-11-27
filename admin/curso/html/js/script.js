$(function(){
	$(".form-header").on("click",function(){
		$(this).submit();
	});
	$(".main-content-form-content").submit(function(){
		var nomecurso = $(".main-content-form-content-input").val();
		var validacaocurso = validarnomecurso(nomecurso);
		alert(validacaocurso);
		if(validacaocurso == 1){
			return true;
		}
		else{
			return false;
		}
	})
});

function validarnomecurso(curso){
	nomecurso = trim(curso);
	var arraycurso = curso.split('');
	// $.each(arraycurso, function(index, el) {
	// 	console.log(index+" = "+el);
	// });
	alert("teste");
	return 1;
}
$(function(){
	$(".main-content-form-content").submit(function(){
		var nomecurso = $(".main-content-form-content-input").val();
		var validacaocurso = validarnomecurso(nomecurso);
		if(validacaocurso == 0){
			return true;
		}
		else{
			return false;
		}
	})
});

function validarnomecurso(curso){
	curso = curso.trim();
	var erro = 0;
	for(var i = 0; i <= curso.length - 1; i++) {
		var caractere = curso.charCodeAt(i);
		if((caractere > 32 && caractere < 47 && caractere != 45 && caractere != 41 && caractere != 40) || (caractere > 57 && caractere < 65) || (caractere > 90 && caractere < 97) || (caractere > 122 && caractere < 128)){
			erro++;
		}
	}
	return erro;
}
