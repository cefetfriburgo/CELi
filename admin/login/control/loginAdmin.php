<?php
  session_start();

  require_once "../../../arquivosfixos/pdao/pdaoscript.php";
  require_once "./cripAdmin.php";

  $usuarioDigitado = $_POST['username'];
  $senhaDigitado = $_POST['password'];

  criptografar($senhaDigitado);

  $select = selecionarbd("username, password", "admin", null);
  $array = mysqli_fetch_array($select);

  $usuarioBd = $array['username'];
  $senhaBd = $array['password'];

  if($senhaBd == $senhaDigitado && $usuarioBd == $usuarioDigitado){
    $_SESSION['usuario'] = $usuarioBd;
    $_SESSION['senha'] = $senhaBd;

    header('Location: /admin/');
  }
  else{
    unset ($_SESSION['usuario']);
    unset ($_SESSION['senha']);

    header('location: /admin/login');
  }
?>
