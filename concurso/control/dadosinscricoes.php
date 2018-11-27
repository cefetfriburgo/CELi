<?php
$user = "";
$password = "";
$database = ""; 
$hostname = "localhost";

$conexao= mysqli_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' );

# Seleciona o banco de dados
mysqli_select_db( $conexao, $database ) or die( 'Erro na seleção do banco' );

# Executa a query desejada 
$result_query = mysqli_query( $conexao,'SELECT * FROM candidato ca join curso c on ca.idcurso= c.id order by idcandidato' );




/* $conexao = mysqli_connect("localhost", $user, $password,$database);
$consulta = mysqli_query($conexao,"SELECT * FROM candidato") or die("Erro ao listar alunos");
*/

//print_r($array);
?>
<html>
	<head>
		<title>Tabela Candidatos</title>
		<meta charset="utf-8"/>
	</head>
	<body>	
		<table>
			<tr>
				<th>ID </th>
				<th>Nome </th>
				<th>Documento </th>
				<th>Telefone </th>
				<th>E-mail </th>
				<th>Interno/externo </th>
				<th>Nome curso </th>
			</tr>
			<?php
				while($array = mysqli_fetch_array($result_query)){
					?><tr><td><?php echo $array['idcandidato'];?></td>
					<td><?php echo $array['nome'];?></td>
					<td><?php echo $array['documento'];?></td>
					<td><?php echo $array['telefone'];?></td>
					<td><?php echo $array['email'];?></td>
					<td><?php echo $array['ie'];?></td>
					<td><?php echo $array['curso'];?></td>
					</tr>
			<?php
				}
			?>
		</table>
				
	</body>
</html>