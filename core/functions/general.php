<?php

function email_verification($to, $subject, $body){
    mail($to, $subject, $body, 'From: Verification@logicpen.com');
}

function loged_in_redirect(){
    if(loged_in() === true){
        header("Location: index.php");
        exit();
    }
}

function protect_page(){
    if(loged_in() === false){
        header("Location: protected.php");
        exit();
    }
}

function array_sanitize(&$item){
    $item = mysql_real_escape_string($item);
}

function sanitize($data){
	return mysql_real_escape_string($data);
}

function output_err($errors){
	return implode($errors);
}

?>