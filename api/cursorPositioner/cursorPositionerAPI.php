<?php

require_once 'inc/include.php';
date_default_timezone_set('Asia/Tokyo');
try{

  $arrParm = array();
  if(empty($_POST)){
    echo FAIL;
    exit;
  }
  $arrParm = $_POST;
  $res = cursorPositionerAPI_Utils::RunAPI($arrParm);

  if($res){
    echo DONE;
  }else{
    echo FAIL;
  }

} catch(ErrorException $e){

  echo FAIL;

}
?>
