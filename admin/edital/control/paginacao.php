<?php
$con = mysqli_connect("localhost", "celi", "celi");
mysqli_select_db($con, "dbceli");
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

$cmd1 = "select * from candidato ca join curso c on ca.idcurso=c.id order by ca.idcandidato";
$inscritos = mysqli_query($con, $cmd1);

$total = mysqli_num_rows($inscritos);

$registros = 2;

$numPaginas = ceil($total / $registros);

$inicio = ($registros * $pagina) - $registros;

$cmd = "select * from candidato ca join curso c on ca.idcurso=c.id order by ca.idcandidato limit $inicio,$registros ";
$candidatos = mysqli_query($con, $cmd);
$total = mysqli_num_rows($candidatos);

while ($candidato = mysqli_fetch_array($candidatos)) {
    echo $candidato['idcandidato'] . " - ";
    echo $candidato['nome'] . " - ";
    echo $candidato['documento'] . " - ";
    echo $candidato['telefone'] . "-";
    echo $candidato['email'] . "-";
    echo $candidato['ie'] . "-";
    echo $candidato['curso'] . "<br/>";
}

for ($i = 1; $i < $numPaginas + 1; $i ++) {
    echo "<a href='paginacao.php?pagina=$i'>" . $i . "</a>  ";
}
?>