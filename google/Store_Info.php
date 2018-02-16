<?php if (!isset($_SESSION)) {
  session_start()   ;
}

?>


<?php
	$Client_Code = $_COOKIE['storename'];
	$Store = $_COOKIE["username"];
	$UStore = $_COOKIE["username"];
?>

 
<?php require_once('User_Connection.php'); ?>	
<?php


$qmap_pc = "EXEC GOOGLE.DBO.p_Loading_Store_Info @CLIENT_CODE = '$Client_Code' ,@STORE = '$Store'";
	//$qmap_pc = "EXEC GOOGLE.DBO.p_Loading_Store_Info @CLIENT_CODE = '$Client_Code' ,@STORE = '$Store'";
	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	
  
  
    $UStore_Lat = $row['LAT'];
		$UStore_Long = $row['LONG'];
		$UStore_Address = $row['ADDRESS'];
		$UStore_Name = $row['STORE_NAME'];
		$UStore_City = $row['CITY'];
		$UStore_FSALDU = $row['FSALDU'];
	}
	
?>	

		
	