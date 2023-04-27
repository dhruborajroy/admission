<?php
$database_host="localhost";
// $database_username="thewebdi_Dhrubo";
// $database_password="Dhrubo123Dhrubo";
// $database_name="thewebdi_get_admitted_online";
//local
$database_username="root";
$database_password="";
$database_name="admission";

$con=mysqli_connect($database_host,$database_username,$database_password,$database_name);
date_default_timezone_set("Asia/Dhaka");
?>