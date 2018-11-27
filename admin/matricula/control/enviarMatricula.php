<?php
   session_start();
    if(isset($_SESSION['alunos']))
    {
        $alunos = $_SESSION['alunos'];
        $turma = $_POST['idturma'];
        
        function conexaobd (){
            $conexao = mysqli_connect("localhost", "root", "", "celi_sistema");
            mysqli_set_charset($conexao, "utf8");
            if (!$conexao){
                echo "ERROR! failure to connect to the database.";
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            }
            return $conexao;
        };
        $conexao = conexaobd();
        foreach($alunos as $id => $aluno){
            if($conexao){
                $sql = "INSERT INTO matricula (idaluno, idturma) VALUES ($id, $turma);";
                $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
            }
            else{
                echo "Conexão com o BD não estabelecida!";
            }
            
        }
        if($conexao && $query){
            unset($_SESSION['alunos']);
            header('location: ../html/inserido.php');
        }
    } else{
        header('location: ../html/error.php');
    }



