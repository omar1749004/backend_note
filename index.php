<?php
 include "connect.php";


 $stmt = $connect->prepare("DELETE FROM `users` WHERE id= ?");
 $stmt->execute(array(90));

 $count = $stmt->rowCount();
 if($count >0)
 {
    echo "succses";
 } else{
    echo "falire";
 }
//  $stmt = $connect->prepare("SELECT * FROM users");
//  $stmt->execute();
// $user =  $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode(array("message" => "how are you"));


?>