<?php
    
    function register_user($register_data){
        array_walk($register_data, 'array_sanitize');
        $register_data['password'] = md5($register_data['password']);
        $register_data['username'] = strtolower($register_data['username']);
        //print_r($register_data);
        
        $fields = '`'.implode('`, `', array_keys($register_data)).'`';
        $data = '\''.implode('\', \'', $register_data).'\'';
        
        mysql_query("INSERT INTO users ($fields) VALUES ($data)");
        
        //echo $fields;
    }

    function user_count($user_type){
        if($user_type == "all"){
            return mysql_result(mysql_query("SELECT COUNT(user_id) FROM users"), 0);
        }else if($user_type == "active"){
            return mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE active = 1"), 0);
        }else if($user_type == "inactive"){
            return mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE active = 0"), 0);
        }
    }

    function get_user_data($user_id){
        $data = array();
        $user_id = (int)$user_id;
        
        $func_num_args = func_num_args();
        $func_get_args = func_get_args();
        
        if($func_num_args > 1){
            unset($func_get_args[0]);
            
            $fields = '`' . implode('`, `', $func_get_args) . '`';
            $sql = "SELECT $fields FROM `users` WHERE `user_id` = $user_id";
            $data = mysql_fetch_assoc(mysql_query($sql));
            
            return $data;
        }
        
    }

    function user_data($user_id){
		$data = array();
        $user_id = (int)$user_id;
        
		$sql = "SELECT * FROM users WHERE user_id = '$user_id'";

		$result = mysql_query($sql);
		$data = mysql_fetch_assoc($result);
        
        return $data;
        
        mysql_free_result($result);
	}
	
	function loged_in(){
		return (isset($_SESSION['user_id'])) ? true : false;
	}

    function user_exists($username){
		$username = sanitize($username);
		$sql = "SELECT user_id FROM users WHERE username = '$username'";

		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return ($row)? true : false;

		mysql_free_result($result);
	}

    function email_exists($email){
        $email = sanitize($email);
        return (mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE email = '$email'"), 0) == 1) ? true : false;
		mysql_free_result($result);
	}

	function user_active($username){
		$username = sanitize($username);
		$sql = "SELECT user_id FROM users WHERE username = '$username' AND active = '1'";

		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return ($row)? true : false;
	}

	function user_id_from_username($username){
		$username = sanitize($username);
		$sql = mysql_query("SELECT user_id FROM users WHERE username='$username'");
		return mysql_result($sql, 0, 'user_id');
	}

	function login($username, $password){
		$user_id = user_id_from_username($username);
		$username = sanitize($username);
		$password = md5($password);

		$sql = "SELECT user_id FROM users WHERE username='$username' AND password='$password'";

		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return ($row)? $user_id : false;
	}
?>