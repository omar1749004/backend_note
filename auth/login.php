<?php
include "../connect.php" ;

$email     = filtter("email");
$password  = filtter("password");

$stmt =$connect->prepare("SELECT * FROM `users` WHERE `email` = ? && `password` = ? ");
$stmt->execute(array($email,$password));
$data =$stmt->fetch(PDO::FETCH_ASSOC);
 $count = $stmt->rowCount();
if($count>0)
{
    echo json_encode(array("status" => "sucsses" , "data" => $data));
}
else{
    echo json_encode(array("status" => "fail"));
}
?>