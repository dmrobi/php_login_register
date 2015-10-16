<?php
$db_host = "localhost"; 
$db_user = "root";
$db_pass = "";
$db_name = "login_register";
$conn = mysql_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db($db_name)) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}
?>