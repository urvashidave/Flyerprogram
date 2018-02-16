<?php
$connectionInfo2 = array(
    "Database" => "db1101621_marketfocus",
    "UID" => "u1101621_marketfocus",
    "PWD" => "550Alden@2211",
    "CharacterSet" => "UTF-8"
);
$conn2           = sqlsrv_connect('win-mssql04.hostmanagement.net', $connectionInfo2);
if ($conn2 === false) {
    die('mssql not connecting : ' . sqlsrv_errors());
}
$password = $_POST['password'];
$username = $_POST['username'];
  $stmt4 = sqlsrv_query($conn2, "UPDATE db1101621_marketfocus.dbo.HomeHardwareStores  SET PASSWORD = '$password' where LOCATION='$username'");
         //echo  "UPDATE db1101621_marketfocus.dbo.MCKESSONSTORES  SET PASSWORD = '$password' where LOCATION='$username'";
         
         $msg="Password Changed Successfully..";
header('Location:edit_password.php?msg='.$msg);
?>