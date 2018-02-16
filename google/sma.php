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
           $STR	= '[';
	$ICOUNT	= 0;
          
?>


<?php require_once('User_Connection.php'); ?>	
<?php	
	$qmap_pc = "SELECT * FROM GOOGLE.DBO.STORE_BOUNDARY WHERE CLIENT_CODE = '$Client_Code' AND PROJECT = '$Project' AND STORE = '$Store' AND BOUND_ID1 = 0 ORDER BY BOUND_ID";
	$params = array($Client_Code, $Store);
	$stmt = sqlsrv_query( $conn, $qmap_pc, $params);
	if( $stmt === false ) 
	{
     		die( print_r( sqlsrv_errors(), true));
	}
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
	{ 	$STR .= " new google.maps.LatLng(" ;
		$STR .= $row['LAT'] ;
		$STR .= "," ;
		$STR .= $row['LONG'] ;
		$STR .= ")," ;
		$ICOUNT = 1;
	}
	IF ($ICOUNT === 1)
	{	$STR	= substr($STR, 0, -1) ;
	}
	$STR .= "]" ;
	
?>	

