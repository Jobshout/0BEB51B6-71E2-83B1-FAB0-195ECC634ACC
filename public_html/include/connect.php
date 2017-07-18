<?php
// Include ezSQL core
include_once "ez_sql_core.php";
// Include ezSQL database specific component
include_once "ez_sql_mysql.php";
	
include_once "../../config/0BEB51B6-71E2-83B1-FAB0-195ECC634ACC.php";

$db = new ezSQL_mysql(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);
?>
