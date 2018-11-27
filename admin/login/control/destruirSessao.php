<?php

session_start();

if(isset($_POST['exit'])){
    
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    session_destroy();
    header('location:/admin/login');
}
    