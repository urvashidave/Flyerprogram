<?php
	$Client_Code = "$Client_Code";
	$Project = "$Project";
	$Store = "$Store";
?>
<?php require_once('User_Connection.php'); ?>
<?php 
	$pc_to_find =$pc_zoom;
	$pc_to_find = str_replace("[^A-Za-z0-9]", "", $pc_to_find);
	$pc_to_find = str_replace(" ", "", $pc_to_find);
	
	$rp_mapdetails_array = explode(",", $rp_mapdetails);
	$pc_to_find_value = "";
	
	if(strlen($pc_to_find)  == 6) 
	{
	//connection to the database
			$qmap_pc = "SELECT * FROM STORE_BOUNDARY where CLIENT_CODE = '$Client_Code' AND PROJECT = '$Project' AND STORE = '$Store'";
			$params = array($User_Client_Code, $User_Project, $User_Store);
			$qmap_pc_results = sqlsrv_query( $conn, $mssql_query, $params);
				while( $row = sqlsrv_fetch_array( $qmap_pc_results, SQLSRV_FETCH_ASSOC) ) 
				{			
					$clat = $row['lat'];
					$clon = $row['long'];
					$rp_mapdetails_array[0] = 15;
					$rp_mapdetails_array[1] = $clat;
					$rp_mapdetails_array[2] = $clon;
					$rp_mapdetails_array[3] = $clat;
					$rp_mapdetails_array[4] = $clat;
					$rp_mapdetails_array[5] = $clon;
					$rp_mapdetails_array[6] = $clon;
					$file_name = $pc_to_find . " ";
				}
	}	
	$start_zoom = $rp_mapdetails_array[0];
	$start_lat = $rp_mapdetails_array[1];
	$start_lon = $rp_mapdetails_array[2];
	$v_biglat = $rp_mapdetails_array[3];
	$v_smalllat = $rp_mapdetails_array[4];
	$v_biglong = $rp_mapdetails_array[5];
	$v_smalllong = $rp_mapdetails_array[6];

	$pc_zoom = "";
	$rp_mapdetails = implode(",", $rp_mapdetails_array);

?>