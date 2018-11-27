<?php
// Linkando o arquivo pdao
require "../../../arquivosfixos/pdao/pdaoscript.php";
    
    // Verifica se os dados do formulário foi setado
if(trim($_POST['nome'])!=NULL && $_POST['nivelamento']!=NULL && $_POST['ano']!=NULL &&$_POST['semestre']!=NULL && $_POST['curso']){
        // Sendo setado, pega os dados do formulário e armazena em variáveis
        $nome = $_POST['nome'];
        $nivelamento = $_POST['nivelamento'];
        $ano = $_POST['ano'];
        $semestre = $_POST['semestre'];
     
        $id = $_POST['curso'];
      
            $tabela = "turma";
            $elementos = "idcurso, semestre, ano, titulo, modulo";
            $conteudo = "'$id', '$semestre', '$ano', '$nome', '$nivelamento'";
            
            // Inseri na tabela "edital" do Banco de Dados
            $insert = inserirbd($tabela, $elementos, $conteudo, NULL);
                      
         // Verifica o insert...
            if($insert){
                // Deu Certo. Inseriu!
                header('location: /admin/turma/registrado');
            }
            else{
                // Deu Errado. Não inseriu!
                header('location: /admin/turma/erro');
            }
        }
        else{
          
            header('location: /admin/turma/invalido');
        }
    
?>
