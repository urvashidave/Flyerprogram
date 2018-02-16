<?php 


$serverName = "72.143.59.108, 1494";     // Your database server
$dbuser = "hmsservice";      // Your db username
$dbpass = "Retail@Marketing1";      // Your db password
$dbname = "GOOGLE";      // Your database name
//
$connectioninfo = array( "UID" => $dbuser, "PWD" => $dbpass, "Database" => $dbname);
$conn = sqlsrv_connect ($serverName, $connectioninfo);


if($conn)
{ //echo "connected" ;
}
else
{
echo "not established";
die(print_r(sqlsrv_errors(), true));
}

?>
