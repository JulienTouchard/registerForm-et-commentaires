<?php
include_once("./inc/fonctions.php");
$error = [];
if (isset($_POST['submited']) && !empty($_POST['submited'])) {
    
    // traitement des failles XSS
    foreach ($_POST as $key => $value) {
        $_POST[$key] = checkXSSPostValue($value);
        if($key !== "firstname"){
           $error = checkEmptyValue($value,$key,$error); 
        }
    }

    $error = checkEmail($_POST['email'],'email',$error); 
    $error = checkPwdValid($_POST['pwd'],'pwd',$error);
    $error = checkPwdConfirm($_POST['pwd'],$_POST['pwdConfirm'],'pwdConfirm',$error);
    if (count($error) === 0){
        echo "YOUPI!!!!";
    }
    var_dump($error);
}
