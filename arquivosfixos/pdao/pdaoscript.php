<?php 

	/*
			Conexao com o Banco De Dados
		Estabelece conexão como Banco de dados. Normalmente essa função já é chamada, automaticamente, quando chama-se uma
		dessas funções abaixo, não necessitando estabelecer conexao com o BD antes de utilizar-se delas.
	*/
	function conexaobd (){
		$conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
		mysqli_set_charset($conexao, "utf8");
		if (!$conexao){
			echo "ERROR! failure to connect to the database.";
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		}
		return $conexao;
	}

	/*
			Verificação do Banco de Dados
		Verificação a existência de determinado elemento no Banco De Dados. Em caso afirmativo, retorna a quantidade de vezes
		que é encontrada.
	*/
	function verificarbd ($campo, $tabela, $condicao){
		$conexao = conexaobd();
		if($conexao){
			$sql = "SELECT $campo FROM $tabela WHERE $condicao";
			$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
			$qtdelinha = mysqli_num_rows($query);

			return $qtdelinha;
		}
		else{
			echo "Conexão com o BD não estabelecida!";
			return FALSE;
		}

	}

	/*
				Inserir no Banco De Dados
			$tabela = a tabela na qual será realizada o insert;
			$elementos = os compos da tabela escolhida;
			$conteudo = os dados que serão inseridos na tabela;
			$condicao = caso você necessita de uma condição para realizar o insert coloque-a aqui, caso contrario passa NULL como parâmetro;
	*/
	function inserirbd ($tabela, $elementos, $conteudo, $condicao){
		$conexao = conexaobd();
		if($conexao){
			if($condicao == NULL){
				$sql = "INSERT INTO $tabela ($elementos) VALUES ($conteudo);";
				$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

				return TRUE;
			}
			else{
				$verificacao = verificarbd($tabela, $condicao);
				if($verificacao == 0){
					$sql = "INSERT INTO $tabela ($elementos) VALUES ($conteudo) $condicao;";
					$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

					return TRUE;
				}
				else{
					echo "Dado igual a este já inserido!";
					return FALSE;
				}
			}
		}
		else{
			echo "Conexão com o BD não estabelecida!";
			return FALSE;
		}
	}


	/*
			Realizar um select no Banco De Dados
	 	$campos = os campos da tabela que vc quer selecionar;
		$tabela = a tabela em que vc quer realizar o select;
		$condicao = caso você necessita de uma condição para realizar o select coloque-a aqui, caso contrario passa NULL como parâmetro;
	*/
	function selecionarbd ($campo, $tabela, $condicao){
		$conexao = conexaobd();
		if($conexao){
			if($condicao == NULL){
				$sql = "SELECT $campo FROM ".$tabela.";";
				$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

				return $query;
			}
			else{
				$sql = "SELECT $campo FROM $tabela $condicao";
				$query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

				return $query;
			}
		}
		else{
			echo "Conexão com o BD não estabelecida!";
			return FALSE;
		}

	}
	
	function selecionarbdJOIN ($campo, $tabela1, $tabela2, $condicao){
	    $conexao = conexaobd();
	    if($conexao){
	        if($condicao){
	            $sql = "SELECT $campo FROM $tabela1 JOIN $tabela2 $condicao;";
	            $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
	            
	            return $query;
	        }
	        else{
	             echo "Todos os parâmetros necessários não foram passados";
	             //FAZER A MENSAGEM DE ERRO EM HTML 
	        }
	    }
	    else{
	        echo "Conexão com o BD não estabelecida!";
	        return FALSE;
	    }
	}
	
	function triplejoin($campo, $tabela1, $tabela2, $tabela3, $condicao1, $condicao2){
	    $conexao = conexaobd();
	    if($conexao){
	        if($condicao1 && $condicao2){
	            $sql = "SELECT $campo FROM $tabela1 JOIN $tabela2 $condicao1 JOIN $tabela3 $condicao2 ;";
	            $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
	            
	            return $query;
	        }
	        else{
	            echo "Todos os parâmetros necessários não foram passados";
	            //FAZER A MENSAGEM DE ERRO EM HTML
	        }
	    }
	    else{
	        echo "Conexão com o BD não estabelecida!";
	        return FALSE;
	    }
	}
   ?>
