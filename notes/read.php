<?php
include "../connect.php" ;

$id     = filtter("id");


$stmt =$connect->prepare("SELECT * FROM `notes` WHERE `n_userId` = ?");
$stmt->execute(array($id));
$data =$stmt->fetchAll(PDO::FETCH_ASSOC);
 $count = $stmt->rowCount();
if($count>0)
{
    echo json_encode( $data);
}
else{
    echo json_encode(array("status" => "fail"));
}
?>