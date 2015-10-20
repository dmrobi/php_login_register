<?php
$db_host = "logicpen.com"; 
$db_user = "logicpen_databas";
$db_pass = "logicpen_databas";
$db_name = "logicpen_databas";
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