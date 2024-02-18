<?php

include "../connect.php";
 
$password = sha1($_POST['password']);
$email = filterRequest("email"); 
getData("user_table" , "email = ? AND  password = ?" , array($email, $password)) ; 
?>