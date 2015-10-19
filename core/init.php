<?php
	session_start();
	require 'database/connect.php';
	require 'functions/general.php';
	require 'functions/users.php';
    
    if(loged_in() === true){
        $session_user_id = $_SESSION['user_id'];
        //$get_user_data = get_user_data($session_user_id, 'user-id', 'username', 'first_name', 'last_name', 'email');
        $user_data = user_data($session_user_id);
        
        if(user_active($user_data['username']) === false){
            session_destroy();
            header('Locatoin: index.php');
            exit();
        }
        //echo $user_data['username'];
    }

	$errors = array();
?>