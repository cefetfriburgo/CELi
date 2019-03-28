<?php
     // Inicia a sessão
     session_start();
     
     // Verificando se já tem sessão estabelecida
     if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
         header('location: /admin/login');
     }
?>
<!DOCTYPE html>

<html lang="pt">
     <head>
          <meta charset="utf-8">
          <title><?php echo $tagTitle; ?> | CELi</title>
          <link rel="stylesheet" type="text/css" href="../../../arquivosfixos/css/custom.css">
          <script type="text/javascript" src="../../../arquivosfixos/js/jquery.min.js"></script>
          <script type="text/javascript" src="../../../arquivosfixos/js/script.js"></script>
          <script type="text/javascript" src="../../../arquivosfixos/js/mascaraJS/mascara.js"></script>
          <script src="../../../arquivosfixos/js/headersubmenu.js"></script>
     </head>
     <body>
          <div class="content">
               <header id="header">
                    <div class="header-content">
                         <div class="header-logotipo">
                              <img class="header-logotipo-img" src="../../../arquivosfixos/midia/logo-white.png" alt="logotipo">
                         </div>
                         <div class="header-menu">
                              <nav class="header-nav">
                                   <ul class="header-list">
                                        <li class="header-menuItem">
                                             <a class="header-menuItem-content" href="/">Início</a>
                                        </li>
                                        <li class="header-menuItem menuItem-edital">
                                             <p class="header-menuItem-content menuItem-edital-title">Editais</p>
                                             <div class="header-subMenu header-subMenu-edital">
                                                  <ul class="header-subList">
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/edital/adicionar">Registrar edital</a>
                                                       </li>
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/edital/lista">Listar edital</a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </li>
                                        <li class="header-menuItem menuItem-curso">
                                             <p class="header-menuItem-content menuItem-curso-title">Cursos</p>
                                             <div class="header-subMenu header-subMenu-curso">
                                                  <ul class="header-subList">
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/curso">Registrar curso</a>
                                                       </li>
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/curso/lista">Listar curso</a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </li>
                                        <li class="header-menuItem menuItem-turma">
                                             <p class="header-menuItem-content menuItem-turma-title">Turmas </p>
                                             <div class="header-subMenu header-subMenu-turma">
                                                  <ul class="header-subList">
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/turma/adicionar">Registrar turma</a>
                                                       </li>
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/turma/lista">Listar turma</a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </li>
                                        <li class="header-menuItem menuItem-aluno">
                                             <p class="header-menuItem-content menuItem-aluno-title">Alunos</p>
                                             <div class="header-subMenu header-subMenu-aluno">
                                                  <ul class="header-subList">
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/aluno/adicionar">Registrar aluno</a>
                                                       </li>
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/aluno/lista">Listar aluno</a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </li>
                                        <li class="header-menuItem menuItem-sorteio">
                                             <p class="header-menuItem-content menuItem-sorteio-title">Sorteio </p>
                                             <div class="header-subMenu header-subMenu-sorteio">
                                                  <ul class="header-subList">
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/sorteio/edital">Novo sorteio</a>
                                                       </li>
                                                       <li class="header-subItem">
                                                            <a class="header-subItem-content" href="/admin/sorteio/html/sorteioRealizadoEdital.php">Sorteios anteriores</a>
                                                       </li>
                                                  </ul>
                                             </div>
                                        </li>
                                        <li class="header-menuItem menuItem-logoff">
                                             <form class="menuContent-logoff" action="/admin/sair" method="post">
                                                  <input type="hidden" name="logoff" value="logoff"/>
                                                  <button class="logoff-btn" type="submit">
                                                       <img class="logoff-icon" src="../../../arquivosfixos/midia/logout-icon.png" alt="Icone de Logoff" />
                                                       <p class="logoff-text">Sair</p>
                                                  </button>
                                             </form>
                                        </li>
                                   </ul>
                              </nav>
                         </div>
                    </div>
               </header>