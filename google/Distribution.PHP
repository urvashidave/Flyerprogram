


<?php if (!isset($_SESSION)) {
  session_start()   ;
}

?>


<?php
	$Client_Code = $_COOKIE['storename'];
	$Store = $_COOKIE["username"];
	$UStore = $_COOKIE["username"];
 
           if($_COOKIE['storename']=='HH'){ 
               $project = "HH601";
           }
           else if($_COOKIE['storename']=='PV'){ 
               $project = "PV745";
           }

	$DISTRIBUTION	= '[';
	$STORE_TARGET = 0;
	$TOTAL_DISTRIBUTION = 0;
	$IDIST = 0;
?>
<?php require_once('User_Connection.php'); ?>	
<?php	
	$qmap_pc = "EXEC GOOGLE.DBO.p_Loading_Distribution @CLIENT_CODE = '$Client_Code' ,@PROJECT = '$Project' ,@STORE = '$Store' ";
	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	$STORE_TARGET = $row['STORE_TARGET'];
		$TOTAL_DISTRIBUTION = $row['TOTAL_DISTRIBUTION'];
		$DISTRIBUTION .= "['" ;
		$DISTRIBUTION .= $row['FSALDU'] ;
		$DISTRIBUTION .= "','" ;
		$DISTRIBUTION .= $row['LAT'] ;
		$DISTRIBUTION .= "','" ;
		$DISTRIBUTION .= $row['LONG'] ;
		$DISTRIBUTION .= "','" ;
		$DISTRIBUTION .= $row['ROUTE'] ;
		$DISTRIBUTION .= "','" ;
		$DISTRIBUTION .= $row['DISTRIB_QTY'] ;
		$DISTRIBUTION .= "','" ;
		$DISTRIBUTION .= $row['ROUTE_ID'] ;
		$DISTRIBUTION .= "','" ;
		$DISTRIBUTION .= $row['MFDCODE'] ;
		$DISTRIBUTION .= "']," ;
		$IDIST = 1;
	}
	IF ($IDIST === 1)
		{$DISTRIBUTION	= substr($DISTRIBUTION, 0, -1) ;}
	$DISTRIBUTION .= "]" ;
?>	

