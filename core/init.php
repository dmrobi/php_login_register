<?php
	session_start();
	require 'database/connect.php';
	require 'functions/general.php';
	require 'functions/users.php';
    
    if(loged_in() === true){
        $session_user_id = $_SESSION['user_id'];
        $get_user_data = get_user_data($session_user_id, 'user-id', 'username', 'first_name', 'last_name', 'email');
        $user_data = user_data($session_user_id);
        
        //echo $user_data['username'];
    }

	$errors = array();
?>