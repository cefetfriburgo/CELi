$(function(){
	$(".main-form-inputButton").on("submit", function(){
		var vldDataAbertura = sdsd;
		var vldDataEncerramento = ddsd;

	});
		
	$(document).ready(".main-form-cursoLine-checkbox-element", function(){
		if($(".main-form-cursoLine-checkbox-element").is(':checked')){
			var vagasInt = $(".main-form-cursoLine-checkbox-element").parent(".main-form-cursoLine-checkbox").next(".main-form-cursoLine-nome").next(".vagas-interno").find(".main-form-cursoLine-vagas-interno");
			var vagasExt = $(".main-form-cursoLine-checkbox-element").parent(".main-form-cursoLine-checkbox").next(".main-form-cursoLine-nome").next(".vagas-interno").next(".vagas-externo").find(".main-form-cursoLine-vagas-externo");
			// console.log(vagasInt);
			vagasInt.prop("disabled", false);
			vagasExt.prop("disabled", false);
		}
		else{
			var vagasInt = $(".main-form-cursoLine-checkbox-element").parent(".main-form-cursoLine-checkbox").next(".main-form-cursoLine-nome").next(".vagas-interno").find(".main-form-cursoLine-vagas-interno");
			var vagasExt = $(".main-form-cursoLine-checkbox-element").parent(".main-form-cursoLine-checkbox").next(".main-form-cursoLine-nome").next(".vagas-interno").next(".vagas-externo").find(".main-form-cursoLine-vagas-externo");
			vagasInt.prop("disabled", true);
			vagasExt.prop("disabled", true);
		}
		
	});

	$(".main-form-cursoLine-checkbox-element").click(function(){
		if($(this).is(':checked')){
			var vagasInt = $(this).parent(".main-form-cursoLine-checkbox").next(".main-form-cursoLine-nome").next(".vagas-interno").find(".main-form-cursoLine-vagas-interno");
			var vagasExt = $(this).parent(".main-form-cursoLine-checkbox").next(".main-form-cursoLine-nome").next(".vagas-interno").next(".vagas-externo").find(".main-form-cursoLine-vagas-externo");
			// console.log(vagasInt);
			vagasInt.prop("disabled", false);
			vagasExt.prop("disabled", false);
		}
		else{
			var vagasInt = $(this).parent(".main-form-cursoLine-checkbox").next(".main-form-cursoLine-nome").next(".vagas-interno").find(".main-form-cursoLine-vagas-interno");
			var vagasExt = $(this).parent(".main-form-cursoLine-checkbox").next(".main-form-cursoLine-nome").next(".vagas-interno").next(".vagas-externo").find(".main-form-cursoLine-vagas-externo");
			vagasInt.prop("disabled", true);
			vagasExt.prop("disabled", true);
		}
	});

});

	function validaDataAbertura(){
		var dataCompleta = $(".main-form-inputDataAbert").val();
		var arrayData = dataCompleta.split("-");
		var anoAbertura = arrayData[0];
		var mesAbertura = arrayData[1];
		var diaAbertura = arrayData[2];

		if(mesAbertura < 1|| mesAbertura > 12){
			var erro = 1;
		}

		else if (diaAbertura < 1|| diaAbertura > 31){
			var erro = 1;
		}
	};

	function validaDataEncerramento(){
		var dataCompleta = $(".main-form-inputDataEncer").val();
		var arrayData = dataCompleta.split("-");
		var anoEncerramento = arrayData[0];
		var mesEncerramento = arrayData[1];
		var diaEncerramento = arrayData[2];

		if(mesEncerramento < 1|| mesEncerramento > 12){
			var erro = 1;
		}

		else if (diaEncerramento < 1|| diaEncerramento > 31){
			var erro = 1;
		}
	};

	function validaHorarioAbertura(){
		var horarioCompleto = $(".main-form-inputHoraAbert").val();
		var arrayHorario = horaCompleta.split(":");
		var horaAbertura = arrayHorario[0];
		var minutosAbertura = arrayHorario[1];
		var segundosAbertura = arrayHorario[2];

		if (horaAbertura < 0|| horaAbertura > 24){
			var erro = 1;
		}
		else if (minutoAbertura < 0|| minutoAbertura > 59){
			var erro = 1;
		}
		else if (segundosAbertura < 0|| segundosAbertura > 59){
			var erro = 1;
		}
	};

	function validaHorarioEncerramento(){
		var horarioCompleto = $(".main-form-inputHoraEncer").val();
		var arrayHorario = horaCompleta.split(":");
		var horaEncerramento = arrayHorario[0];
		var minutosEncerramento= arrayHorario[1];
		var segundosEncerramento = arrayHorario[2];

		if (horaEncerramento < 0|| horaEncerramento > 24){
			var erro = 1;
		}
		else if (minutoEncerramento < 0|| minutoEncerramento > 59){
			var erro = 1;
		}
		else if (segundosEncerramento < 0|| segundosEncerramento > 59){
			var erro = 1;
		}
	};

	function validaRelacaoAberturaEncerramento(){
		var dataCompletaAbertura = $(".main-form-inputDataAbert").val();
		var arrayDataAbertura = dataCompletaAbertura.split("-");
		var anoAbertura = arrayDataAbertura[0];
		var mesAbertura = arrayDataAbertura[1];
		var diaAbertura = arrayDataAbertura[2];
		var dataCompletaEncerramento = $(".main-form-inputDataEncer").val();
		var arrayDataEncerramento = dataCompletaEncerramento.split("-");
		var anoEncerramento = arrayDataEncerramento[0];
		var mesEncerramento = arrayDataEncerramento[1];
		var diaEncerramento = arrayDataEncerramento[2];
		var horarioCompletoAbertura = $(".main-form-inputHoraAbert").val();
		var arrayHorarioAbertura = horarioCompletoAbertura.split(":");
		var horaAbertura = arrayHoraAbertura[0];
		var minutosAbertura = arrayHoraAbertura[1];
		var segundosAbertura = arrayHoraAbertura[2];
		var horarioCompletoEncerramento = $(".main-form-inputHoraEncer").val();
		var arrayHorarioEncerramento = horarioCompletoAbertura.split(":");
		var horaEncerramento = arrayHorarioEncerramento[0];
		var minutosEncerramento = arrayHorarioEncerramento[1];
		var segundosEncerramento = arrayHorarioEncerramento[2];

		  if(anoAbertura < anoEncerramento){
	        // Datas coerentes!
	        var erro = 0;
	      }
	      else if(anoAbertura  == anoEncerramento){
	        if(mesAbertura < mesEncerramento){
	          // Datas coerentes!
	        	var erro = 0;
	        }
	        else if(mesAbertura == mesEncerramento){
	          if(diaAbertura < diaEncerramento){
	            // Datas coerentes!
	        	  var erro = 0;
	          }
	          else if(diaAbertura == diaEncerramento){
	            if(horaAbertura < horaEncerramento){
	              // Datas coerentes!
	            	var erro = 0;
	            }
	            else if(horaAbertura == horaEncerramento){
	              if(minutosAbertura < minutosEncerramento){
	                // Datas coerentes!
	            	  var erro = 0;
	              }
	              else{
	                // Datas incoerentes!
	            	  var erro = 1;
	              }
	            }
	            else{
	              // Datas incoerentes!
	            	var erro = 1;
	            }
	          }
	          else{
	            // Datas incoerentes!
	        	  var erro = 1;
	          }
	        }
	        else{
	          // Datas incoerentes!
	        	var erro = 1;
	        }
	      }
	      else{
	        // Datas incoerentes!
	         var erro = 1;
	      }
	      return erro;
	    };
