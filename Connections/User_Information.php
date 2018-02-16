<?php

$hostname_User_Information = "72.143.59.108,1494";
$database_User_Information = "DEALER";
$username_User_Information = "hmsservice";
$password_User_Information = "Retail@Marketing1";

$hostname_User_Information2 = "win-mssql04.hostmanagement.net";
$database_User_Information2 = "db1101621_marketfocus";
$username_User_Information2 = "u1101621_marketfocus";
$password_User_Information2 = "550Alden@2211";



$connectionInfo = array( "Database" => $database_User_Information, "UID" => $username_User_Information, "PWD" => $password_User_Information, "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($hostname_User_Information, $connectionInfo);	
if( $conn === false )
{
	die('mssql is not connecting : ' . sqlsrv_errors());
}
?>



