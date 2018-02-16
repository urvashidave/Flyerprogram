<?php
	$Client_Code = "$Client_Code";
	$Project = "$Project";
	$Store = "$Store";
	$BOUND	= '';
	$ICOUNT = 0;
?>
<?php require_once('User_Connection.php'); ?>	
<?php	
	$qmap_pc = "SELECT DISTINCT BOUND_ID1 FROM GOOGLE.DBO.STORE_BOUNDARY WHERE CLIENT_CODE = '$Client_Code' AND PROJECT = '$Project' AND STORE = '$Store' ORDER BY BOUND_ID1";
	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	$BOUND .= $row['BOUND_ID1'] ;
		$ICOUNT = 1;
	}
	
?>	

