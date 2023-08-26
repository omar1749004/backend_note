<?php
include "../connect.php" ;

$n_id   = filtter("id") ;
$imageNmae =filtter("imageName");

$stmt =$connect->prepare("DELETE FROM`notes` WHERE n_id =?");
$stmt->execute(array($n_id));
$count = $stmt->rowCount();
if($count>0)
{
    deleteFile("../upload" ,$imageNmae);
    echo json_encode(array("status" => "sucsses"));
}
else{
    echo json_encode(array("status" => "fail"));
}
?>