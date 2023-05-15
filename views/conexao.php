<?php
 
$host="localhost";
$user="root";
$pass="";
$banco="hrm";
$msg1="Erro de conexão! Usuário ou senha inválida!";
$msg2="Erro de acesso ao banco de dados.";


$conexao = mysql_pconnect($host, $user, $pass) or die ($msg1);
mysql_select_db($banco) or die ($msg2);

 

