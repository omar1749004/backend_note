<?php
include "../connect.php" ;

$n_id    = filtter("n_id") ;
$n_title    =filtter("n_title");
$n_content  =filtter("n_content");
$imageName  =filtter("imageName");


if(isset($_FILES["file"]))
{
    deleteFile("../upload" ,$imageName);
    $imageName =imageUpload("file");   //overRide
    
}

$stmt =$connect->prepare(
    "UPDATE `notes` SET `n_title`=?,`n_content`=? , `imageName`= ?  WHERE n_id =?");
$stmt->execute(array($n_title,$n_content,$imageName ,$n_id));
$count = $stmt->rowCount();
if($count>0)
{
    echo json_encode(array("status" => "sucsses"));
}
else{
    echo json_encode(array("status" => "fail"));
}
?>