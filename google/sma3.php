<?php
	$Client_Code = "$Client_Code";
	$Project = "$Project";
	$Store = "$Store";
	$STR3	= '[';
	$ICOUNT	= 0;
?>
<?php require_once('User_Connection.php'); ?>	
<?php	
	$qmap_pc = "SELECT * FROM GOOGLE.DBO.STORE_BOUNDARY WHERE CLIENT_CODE = '$Client_Code' AND PROJECT = '$Project' AND STORE = '$Store' AND BOUND_ID1 = 3 ORDER BY BOUND_ID";
	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	$STR3 .= " new google.maps.LatLng(" ;
		$STR3 .= $row['LAT'] ;
		$STR3 .= "," ;
		$STR3 .= $row['LONG'] ;
		$STR3 .= ")," ;
		$ICOUNT = 1;
	}
	IF ($ICOUNT === 1)
	{	$STR3	= substr($STR3, 0, -1) ;
	}
	$STR3 .= "]" ;
	
?>	

