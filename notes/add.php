<?php
include "../connect.php" ;

$user_id  = filtter("id") ;
$n_title    =filtter("n_title");
$n_content  =filtter("n_content");
$imageName =imageUpload("file");

if($imageName =="fail")
{
    echo json_encode(array("status" => "fail"));
}else{
$stmt =$connect->prepare("INSERT INTO `notes`( `n_userId`, `n_title`, `n_content`,`imageName`) VALUES (?,?,?,?)");
$stmt->execute(array($user_id,$n_title,$n_content,$imageName));
 
 $count = $stmt->rowCount();
if($count>0)
{
    echo json_encode(array("status" => "sucsses"));
}
else{
    echo json_encode(array("status" => "fail"));
}
}
?>