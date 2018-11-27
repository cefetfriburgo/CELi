<?php
// Inicia a sessão
session_start();

if (! isset($_SESSION['usuario']) && ! isset($_SESSION['senha'])) {
    ?>
<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title>Sistema de Gerenciamento | CELi</title>
          <link rel="stylesheet" type="text/css" href="../../../arquivosfixos/css/custom.css">
          <script type="text/javascript" src="../../../arquivosfixos/js/jquery.min.js"></script>
          <script type="text/javascript" src="../../../arquivosfixos/js/jquerymask/dist/jquery.mask.min.js"></script>
          <script src="../../../arquivosfixos/js/headersubmenu.js"></script>
     </head>
     <body class="fadeIn">
          <?php
               // require_once "../../../arquivosfixos/headerFooter/header.php";
          ?>
          <main id="main">
               <div class="main-content">
                    <h1 class="main-title">Painel de controle</h1>
                    <form class="main-form" action="/admin/autenticar" method="post">
                         <label class="main-form-label">Nome de usuário</label>
                         <input class="main-form-input" type="text" name="username">
                         <label class="main-form-label" >Senha</label>
                         <input class="main-form-input" type="password" name="password">
                         
                         <button class="main-form-inputButton main-form-button" type="submit" >
                              <p class="main-form-textButton">Login</p>
                              <img class="main-form-iconButton" src="../../../arquivosfixos/midia/setaDireita-icon.png" />
                         </button>
                    </form>
               </div>
          </main>
     </body>
</html>
<?php
} else {
    header('location: /admin');
}
?>
