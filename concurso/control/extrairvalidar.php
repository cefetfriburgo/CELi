<?php
require_once "./recaptchalib.php";
// Pegando os dados do form
if(isset($_POST['name']) && isset($_POST['course']) && isset($_POST['phone1']) && isset($_POST['nascimento']) && isset($_POST['uf']) && isset($_POST['cidade']) && isset($_POST['bairro']) && isset($_POST['logradouro']) && isset($_POST['radio']) && isset($_POST['phone2']) && isset($_POST['radioDeficiencia']) ){
        $nome=$_POST['name'];
        $RG=$_POST['document1'];
        $orgRG=$_POST['OrgEmiRg'];
        $CPF=$_POST['document2'];
        $nasc=$_POST['nascimento'];
        $curso= $_POST['course'];
        $telefone1=$_POST['phone1'];
        $telefone2=$_POST['phone2'];
        $uf=$_POST['uf'];
        $cidade=$_POST['cidade'];
        $bairro=$_POST['bairro'];
        $logradouro=$_POST['logradouro'];
        $complemento=$_POST['complemento'];
        $email=$_POST['email'];
        $situacao=$_POST['radio'];
        $deficiencia=$_POST['radioDeficiencia'];
        $obsDeficiencia=$_POST['descricaoDeficiencia'];
        session_start();
        $_SESSION['name'] = $nome;
        $_SESSION['phone1'] = $telefone1;
        $_SESSION['phone2'] = $telefone2;
        $_SESSION['document1'] = $RG;
        $_SESSION['OrgEmiRg'] = $orgRG;
        $_SESSION['document2'] = $CPF;
        $_SESSION['uf'] = $uf;
        $_SESSION['cidade'] = $cidade;
        $_SESSION['bairro'] = $bairro;
        $_SESSION['logradouro'] = $logradouro;
        $_SESSION['complemento'] = $complemento;
        $_SESSION['radio'] = $situacao;
        $_SESSION['course'] = $curso;
        $_SESSION['email'] = $email;
        $_SESSION['nascimento'] = $nasc;
        $_SESSION['deficiencia'] = $deficiencia;
        $_SESSION['obsDeficiencia'] = $obsDeficiencia;
        // Função que dispara todas as outras funções e, estando tudo certo, inseri no BD
        $validnome = validarnome($nome);
        if($validnome==1){
            $_SESSION['erro_1'] = "Verifique se seu nome foi preenchido corretamente!";
        }
        $validtelefone1 = validartelefone1($telefone1);
        if($validtelefone1==1){
            $_SESSION['erro_2'] = "Verifique se seu primeiro telefone foi preenchido corretamente!";
        }
        $validtelefone2 = validartelefone2($telefone2);
        if($validtelefone2==1){
            $_SESSION['erro_3'] = "Verifique se seu segundo telefone foi preenchido corretamente!";
        }
        $validemail = validaremail($email);
        if($validemail==1){
            $_SESSION['erro_4'] = "Verifique se seu email foi preenchidopreenchido corretamente!";
        }
        $validsituacao = validarie($situacao);
        if($validsituacao==1){
            $_SESSION['erro_5'] = "Verifique se sua situação foi selecionada!";
        }
        $validCpfRg = cpf_rg($CPF, $RG);
        if($validCpfRg==1){
            $_SESSION['erro_6'] = "Digite pelo menos um dos documentos! (CPF ou RG)";
        }
        $validCPF = validarCpf($CPF);
        if($validCPF==1){
            $_SESSION['erro_7'] = "Verifique se seu CPF foi preenchido corretamente!";
        }
        $validNascimento = validarNascimento($nasc);
        if($validNascimento==1){
            $_SESSION['erro_8'] = "Digite uma data de nascimento válida!";
        }
        $validOrgRG =  validarOrgRG($orgRG, $RG);
        if($validOrgRG ==1){
            $_SESSION['erro_9'] = "Verifique se o orgão e/ou rg foram preenchido corretamente!";    
        }
        $validUf = validarUF($uf);
        if($validUf ==1){
            $_SESSION['erro_10'] = "Verifique se sua UF foi selecionada!";
        }
        $validCidade =  validarCidade($cidade);
        if($validCidade ==1){
            $_SESSION['erro_11'] = "Verifique se sua cidade foi preenchida corretamente!";
        }
        $validBairro =  validarBairro($bairro);
        if($validBairro ==1){
            $_SESSION['erro_12'] = "Verifique se seu bairro foi preenchido corretamente!";
        }
        $validLogradouro = validarLogradouro($logradouro);
        if($validLogradouro ==1){
            $_SESSION['erro_13'] = "Verifique se seu logradouro foi preenchido corretamente!";
        }
        $validCurso = validarCurso($curso);
        if($validCurso ==1){
            $_SESSION['erro_14'] = "Verifique se o curso desejado foi selecionado!";
        }
        $validDeficiencia = validarDeficiencia($deficiencia, $obsDeficiencia);
        if($validDeficiencia ==1){
            $_SESSION['erro_15'] = "Verifique se o campo de descrição da deficiência foi preenchido corretamente!";
        }
        $validComplemento = validarComplemento($complemento);
        if($validComplemento ==1){
            $_SESSION['erro_16'] = "Verifique se o campo de complemento foi preenchido corretamente!";
        }
              
        if($validnome == 0 && $validtelefone1 == 0 && $validemail == 0 && $validsituacao == 0 && $validCpfRg == 0 && $validCPF == 0
            && $validNascimento==0 && $validOrgRG==0 && $validUf==0 && $validCidade==0 &&  $validBairro==0 && $validLogradouro==0 &&  $validCurso==0 && $validDeficiencia==0 && $validComplemento==0){
 
               header('location: /concursos/confirmar');
        }
        else{
            $_SESSION['erro']=2;
            header('location: /concursos');
        }
        
}else{
    $_SESSION['erro']=1;
    header('location: /concursos');
}
function validarComplemento($complemento){
    $errocomp = 0;
    
        $arrayComp= str_split($complemento);
        $lengthComp= strlen($complemento);
        $erroespecial=0;
        for($i=0;$i<$lengthComp;$i++){
            $caracasciicode=ord($arrayComp[$i]);
            if($caracasciicode==32 || ($caracasciicode>=45 && $caracasciicode<=47) || ($caracasciicode>=65 && $caracasciicode<=90) || ($caracasciicode>=97 && $caracasciicode<=122) || ($caracasciicode>=128 && $caracasciicode<=155) || $caracasciicode>=157 || ($caracasciicode>=160 && $caracasciicode<=165)){}
            else{
                $erroespecial=1;
            }
        }
        if($erroespecial==1){
            $errocomp = 1;
        }
    
    return $errocomp;
    }
// Função para validar o nome
function validarnome($nome){
    $erronome = 0;
    if( trim($nome)=="" ){
        $erronome = 1;
    }
    else{
        $arraynome= str_split($nome);
        $lengthnome= strlen($nome);
        $erroespecial=0;
        $erroletra=0;
        for($i=0;$i<$lengthnome;$i++){
            if(is_numeric ($arraynome[$i])){
                $erroletra=1;
            }
        }
        for($i=0;$i<$lengthnome;$i++){
            $caracasciicode=ord($arraynome[$i]);
            if($caracasciicode==32 || ($caracasciicode>=65 && $caracasciicode<=90) || ($caracasciicode>=97 && $caracasciicode<=122) || ($caracasciicode>=128 && $caracasciicode<=155) || $caracasciicode>=157 || ($caracasciicode>=160 && $caracasciicode<=165)){}
            else{
                $erroespecial=1;
            }
        }
        if($erroletra==1){
            $erronome = 1;
        }
        if($erroespecial==1){
            $erronome = 1;
        }
    }
    return $erronome;
};
// Função para validar o telefone
function validartelefone1($telefone){
    $errotelefone = 0;
    $caracteres = strlen($telefone);
    if(trim($telefone)==""||$caracteres<14|| $caracteres>15 ){
        $errotelefone = 1;
    }
    else{
        $arraytelefone= str_split($telefone);
        $lengthtelefone= strlen($telefone);
        $erroespecial=0;
        for($i=0;$i<$lengthtelefone;$i++){
            $caracasciicode=ord($arraytelefone[$i]);
            if($caracasciicode==45 || $caracasciicode==32 || $caracasciicode>=40 && $caracasciicode<=41 ||$caracasciicode>=48 && $caracasciicode<=57){}
            else{
                $erroespecial=1;
            }
        }
        if($erroespecial==1){
            $errotelefone = 1;
        }
    }
    return $errotelefone;
};
function validartelefone2($telefone){
    $errotelefone = 0;
    $caracteres = strlen($telefone);
    if(trim($telefone)==""||$caracteres<14|| $caracteres>15 ){
        $errotelefone = 1;
    }
    else{
        $arraytelefone= str_split($telefone);
        $lengthtelefone= strlen($telefone);
        $erroespecial=0;
        for($i=0;$i<$lengthtelefone;$i++){
            $caracasciicode=ord($arraytelefone[$i]);
            if($caracasciicode==45 || $caracasciicode==32 || $caracasciicode>=40 && $caracasciicode<=41 ||$caracasciicode>=48 && $caracasciicode<=57){}
            else{
                $erroespecial=1;
            }
        }
        if($erroespecial==1){
            $errotelefone = 1;
        }
    }
    return $errotelefone;
};

// Função para validar o email
function validaremail($email){
    $erroemail = 0;
    if(trim($email)!=""){
        if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
            $erroemail = 1;
        }
    }
    return $erroemail;
};
// Função para validar a situação
function validarie($ie){
    $errosituacao = 0;
    if($ie!="i" && $ie!="e"){
        $errosituacao = 1;
    }
    return $errosituacao;
};
//Verifica se algum dos dois foram preenchidos
function cpf_rg ($cpf, $rg){
    $erroCpfRg = 0;
    if(trim($cpf)=="" && trim($rg)==""){
        $erroCpfRg = 1;
    }
    
    return $erroCpfRg;
    
};
// Função para validar o CPF
function validarCpf($cpf){
    $erroCpf = 0;
    if( trim($cpf)!="" ){
        
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return $erroCpf = 1;
        }
        
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return $erroCpf = 1;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return $erroCpf = 1;
            }
        }
    }
    return $erroCpf;
};
// Função para validar o orgão emissor do RG
function validarOrgRG($orgRG,$rg){
    $erroOrgRG= 0;
    if( (trim($rg)!= "" && trim($orgRG) == "") || (trim($rg)== "" && trim($orgRG) != "")){
        $erroOrgRG = 1;
    }
    else{
        $arrayOrgRG= str_split($orgRG);
        $lengthOrgRG= strlen($orgRG);
        for($i=0;$i<$lengthOrgRG;$i++){
            $caracasciicode=ord($arrayOrgRG[$i]);
            if($caracasciicode==32 || ($caracasciicode>=45 && $caracasciicode<=47) ||  ($caracasciicode>=65 && $caracasciicode<=90) || ($caracasciicode>=97 && $caracasciicode<=122) || ($caracasciicode>=128 && $caracasciicode<=155) || $caracasciicode>=157 || ($caracasciicode>=160 && $caracasciicode<=165)){
                $erroOrgRG = 0;
            }
            else{
                $erroOrgRG = 1;
            }
        }
    }
    return $erroOrgRG;
};
// Função para validar a data de nascimento
function validarNascimento($nascimento){
    $erroNascimento = 0;
    if((trim($nascimento)== "")){
        $erroNascimento=1;
    }else{
        $arrayNascimento = explode("-","$nascimento");
        $y = $arrayNascimento[0];
        $m = $arrayNascimento[1];
        $d = $arrayNascimento[2];
        
        $res = checkdate($m,$d,$y);
        if ($res){
            
            // Descobre que dia é hoje e retorna a unix timestamp
            $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            // Descobre a unix timestamp da data de nascimento do fulano
            $data = mktime( 0, 0, 0, $m, $d, $y);
            
            // Depois apenas fazemos o cálculo já citado :)
            $idade = floor((((($hoje - $data) / 60) / 60) / 24) / 365.25);
            if($idade<15){
                $erroNascimento=1;
            }
        } else {
            $erroNascimento = 1;
        }
    }
    return $erroNascimento;
    
};
// Função para validar o UF
function validarUF($UF){
    $erroUF=0;
    if( trim($UF)=="" ){
        $erroUF = 1;
    }
    return $erroUF;
};
// Função para validar a Cidade
function validarCidade($cidade){
    $erroCidade = 0;
    if( trim($cidade)=="" ){
        $erroCidade = 1;
    }
    else{
        $arrayCidade= str_split($cidade);
        $lengthcidade= strlen($cidade);
        $erroespecial=0;
        $erroletra=0;
        for($i=0;$i<$lengthcidade;$i++){
            if(is_numeric ($arrayCidade[$i])){
                $erroletra=1;
            }
        }
        for($i=0;$i<$lengthcidade;$i++){
            $caracasciicode=ord($arrayCidade[$i]);
            if($caracasciicode==32 || ($caracasciicode>=65 && $caracasciicode<=90) || ($caracasciicode>=97 && $caracasciicode<=122) || ($caracasciicode>=128 && $caracasciicode<=155) || $caracasciicode>=157 || ($caracasciicode>=160 && $caracasciicode<=165)){}
            else{
                $erroespecial=1;
            }
        }
        if($erroletra==1){
            $erroCidade = 1;
        }
        if($erroespecial==1){
            $erroCidade = 1;
        }
    }
    return $erroCidade;
};
// Função para validar o Bairro
function validarBairro($bairro){
    $erroBairro = 0;
    if( trim($bairro)=="" ){
        $erroBairro = 1;
    }
    else{
        $arrayBairro= str_split($bairro);
        $lengthBairro= strlen($bairro);
        $erroespecial=0;
        $erroletra=0;
        for($i=0;$i<$lengthBairro;$i++){
            if(is_numeric ($arrayBairro[$i])){
                $erroletra=1;
            }
        }
        for($i=0;$i<$lengthBairro;$i++){
            $caracasciicode=ord($arrayBairro[$i]);
            if($caracasciicode==32 || ($caracasciicode>=45 && $caracasciicode<=47) || ($caracasciicode>=65 && $caracasciicode<=90) || ($caracasciicode>=97 && $caracasciicode<=122) || ($caracasciicode>=128 && $caracasciicode<=155) || $caracasciicode>=157 || ($caracasciicode>=160 && $caracasciicode<=165)){}
            else{
                $erroespecial=1;
            }
        }
        if($erroletra==1){
            $erroBairro = 1;
        }
        if($erroespecial==1){
            $erroBairro = 1;
        }
    }
    return $erroBairro;
};
// Função para validar o Logradouro
function validarLogradouro($logradouro){
    $erroLogradouro = 0;
    if( trim($logradouro)=="" ){
        $erroLogradouro = 1;
    }
    else{
        $arrayLogradouro= str_split($logradouro);
        $lengthLogradouro= strlen($logradouro);
        $erroespecial=0;
        $erroletra=0;
        for($i=0;$i<$lengthLogradouro;$i++){
            $caracasciicode=ord($arrayLogradouro[$i]);
            if($caracasciicode != 32 && ($caracasciicode<45 || $caracasciicode>57) && ($caracasciicode<65 || $caracasciicode>90) && ($caracasciicode<97 || $caracasciicode>122) && ($caracasciicode<128 || $caracasciicode>155) && $caracasciicode<157 && ($caracasciicode<160 || $caracasciicode>165)){
                $erroespecial=1;
            }
        }
         if($erroletra==1){
            $erroLogradouro = 1;
        }
        if($erroespecial==1){
            $erroLogradouro = 1;
        }
    }
    return $erroLogradouro;
};
// Função para validar o Curso
function validarCurso($curso){
    $erroCurso=0;
    if( trim($curso)=="" ){
        $erroCurso = 1;
    }
    return $erroCurso;
    
}
//Função para validar Deficiência
function validarDeficiencia ($deficiencia, $complemento){
    $erroDeficiencia = 0;
    $complemento = trim($complemento);
    if($deficiencia!= "s" && $deficiencia!="n"){
        $erroDeficiencia = 1;
    }elseif($deficiencia=="s" && $complemento==""){
        $erroDeficiencia = 1;
        
    }
    return $erroDeficiencia;
}
// definir a chave secreta
$secret = "6LeG-2wUAAAAAOnWQOIgvLQncP3rNM2w7hZQrDkc";
// verificar a chave secreta
$response = null;
$reCaptcha = new ReCaptcha($secret);
if (isset($_POST["g-recaptcha-response"])) {
    $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
}
// deu tudo certo?
if ($response != null && $response->success) {
    // processar o formulario
}
?>
