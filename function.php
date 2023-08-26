<?php
define("Mb" , 1048576);  //=const
function filtter($requst)
{
  return   htmlspecialchars(strip_tags($_POST[$requst]));

}
function imageUpload ($imageRequst)
{
  global $msgErrore;
  $imageName =rand(100,10000) . $_FILES[$imageRequst]["name"];
  $imageTemp =$_FILES[$imageRequst]["tmp_name"];  //المسار الموقت 
  $imageSize =$_FILES[$imageRequst]["size"];
  
  $allowEx   = array("jpg" ,"png" ,"gif" ,"mp3" );
  $strtoarr  = explode("." , $imageName);
  $ex        = end($strtoarr);
  $ex        = strtolower(end($strtoarr)); 
if(!empty($imageRequst) && !in_array($ex,$allowEx))
{
  
    $msgErrore[] ="Ext";
}
if($imageSize > 2 * Mb)
{
   $msgErrore[] ="Size";
}
if(empty($msgErrore)){
  
  move_uploaded_file($imageTemp, "../upload/" . $imageName);
  return $imageName;
}
else{
  echo "<pre>";
  print_r($msgErrore);
  echo "<pre>";
  return "fail";
}
}
function deleteFile ($dir,$imageNmae)
{
  if(file_exists($dir ."/". $imageNmae))
  {
    unlink($dir ."/". $imageNmae);
  }
}


function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {

        if ($_SERVER['PHP_AUTH_USER'] != "omar" ||  $_SERVER['PHP_AUTH_PW'] != "omar194004"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }
  }
?>