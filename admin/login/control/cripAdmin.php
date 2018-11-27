<?php
    function  criptografar(&$senha){
        $senha = md5($senha);
        $senha = $senha."celi";
        $senha = md5($senha);
    };
?>
