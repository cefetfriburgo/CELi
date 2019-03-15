<?php
   session_start();
   $i=0;
    if(isset($_SESSION['alunos']))
    {
        $alunos = $_SESSION['alunos'];
        $turma = $_POST['idturma'];
        echo $alunos[$i][0];
        print_r($alunos);
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
                $a = $alunos[$i][0];
                $sql = "INSERT INTO matricula (idaluno, idturma) VALUES ($a, $turma);";
                $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
                $sql1 = "INSERT INTO nota(idturma, idaluno, medesc, medoral) VALUES ($turma, $a, 0, 0);";
                $query1= mysqli_query($conexao, $sql1) or die(mysqli_error($conexao));
            }
            else{
                echo "Conexão com o BD não estabelecida!";
            }
            $i++;
        }
        if($conexao && $query){
            unset($_SESSION['alunos']);
            header('location: ../html/inserido.php');
        }
    } else{
        header('location: ../html/error.php');
    }



