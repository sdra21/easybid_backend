<?php

include "../connect.php";

$firstname = filterRequest("firstname");
$lastname = filterRequest("lastname");
$email = filterRequest("email");
$phone = filterRequest("PhoneNumber");
$password = sha1($_POST['password']);
$image=filterRequest("image");
$image = imageUpload('../upload/users' , 'files');
$stmt = $con->prepare("SELECT * FROM user_table WHERE email = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("email Already Exists");
} else {
    $data = array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "password" =>  $password,
        "email" => $email,
        "PhoneNumber" => $phone,
        "Image"=>$image,
    );
    insertData("user_table" , $data) ; 

}
?>