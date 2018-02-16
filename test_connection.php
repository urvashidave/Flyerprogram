<?php
$connectionInfo = array( "Database" => "ORCA", "UID" => "hmsservice", "PWD" => "MFD4You!");
$conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);                                              
 if( $conn === false ) 
{   echo "bad connection hmsservice";
}
 else 
{   echo "good connection!";
}
?>