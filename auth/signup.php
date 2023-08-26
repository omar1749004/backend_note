<?php
include "../connect.php" ;

$username  = filtter("username") ;
$email     =filtter("email");
$password  =filtter("password");

$stmt =$connect->prepare("INSERT INTO `users`( `username`, `email`, `password`) VALUES (?,?,?)");
$stmt->execute(array($username,$email,$password));
$count = $stmt->rowCount();
if($count>0)
{
    echo json_encode(array("status" => "sucsses",  "data" => $data));
}
else{
    echo json_encode(array("status" => "fail"));
}
?>