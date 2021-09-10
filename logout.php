<?php

//Arquivo logout=> Terminar sessao iniciada
 
session_start();// Recupero a sessao do login

unset($_SESSION['login']);
unset($_SESSION['password']);

header('location:index.php');


