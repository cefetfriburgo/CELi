$(function(){
	
	
	
	$(".main-form-radioBox > div").on("click", function(){
		// Pega o input do campo clickado
		var element = $(this).find(".main-form-inputRadio");
		// Remove o atributo 'checked' desse elemento
		
		element.removeAttr('checked');
		// Remove o backgorund da outa opção
		$(this).siblings('div').css({
			'background-color': '#fff',
			'color': '#555'
		});
		// Adiciona o atributo 'checked' nesse elemento
		element.attr('checked', 'checked');
		// Adicionando o background nessa opção
		$(this).css({
			'background-color': '#ccc',
			'color': '#333'
		});
		
		
	});
});