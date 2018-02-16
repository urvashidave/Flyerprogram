<?php
$connectionInfo = array( "Database" => "Dealer", "UID" => "hmsservice", "PWD" => "");
$conn = sqlsrv_connect("72.143.59.108, 1494", $connectionInfo);                                               
 if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
?>
