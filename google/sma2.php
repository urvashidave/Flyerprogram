<?php
	$Client_Code = "$Client_Code";
	$Project = "$Project";
	$Store = "$Store";
	$STR2	= '[';
	$ICOUNT	= 0;
?>
<?php require_once('User_Connection.php'); ?>	
<?php	
	$qmap_pc = "SELECT * FROM GOOGLE.DBO.STORE_BOUNDARY WHERE CLIENT_CODE = '$Client_Code' AND PROJECT = '$Project' AND STORE = '$Store' AND BOUND_ID1 = 2 ORDER BY BOUND_ID";
	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	$STR2 .= " new google.maps.LatLng(" ;
		$STR2 .= $row['LAT'] ;
		$STR2 .= "," ;
		$STR2 .= $row['LONG'] ;
		$STR2 .= ")," ;
		$ICOUNT = 1;
	}
	IF ($ICOUNT === 1)
	{	$STR2	= substr($STR2, 0, -1) ;
	}
	$STR2 .= "]" ;
	
?>	

