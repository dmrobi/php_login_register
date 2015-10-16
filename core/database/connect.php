<?php
$db_host = "199.48.164.149"; 
$db_user = "ferrywoa_dmrobi";
$db_pass = "mamTech1989";
$db_name = "ferrywoa_login_register";
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