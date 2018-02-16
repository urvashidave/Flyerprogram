<?php
    $connectionInfo = array( "Database" => "TEST", "UID" => "webdev", "PWD" => "Two4One!");
	$conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);	
	if( $conn === false )
	 {
				die('mssql not connecting : ' . sqlsrv_errors());
	 }
	//print_r($_POST);
	if(isset($_POST['rowcnt'])){
		$rowcntArr = $_POST['rowcnt'];
		foreach ($rowcntArr as $row) {
			$code = '';
			$route = '';
			$cpchomes = 0;
			$cpcapts = 0;
			$cpcfarms = 0;
			$cpcbus = 0;
			$tmchome = 0;
			$tmcapts = 0;
			$emchome = 0;
			$emcapts = 0;
			$subhome = 0;
			$subapts = 0;
			$aselected = '';
			$bselected = '';
			if(isset($_POST['code_'.$row]) && $_POST['code_'.$row] !=''){
				$code = $_POST['code_'.$row];
			}
			if(isset($_POST['route_'.$row]) && $_POST['route_'.$row] !=''){
				$route = $_POST['route_'.$row];
			}
			if(isset($_POST['cpchomes_'.$row]) && $_POST['cpchomes_'.$row] >0){
				$cpchomes = 1;
			}
			if(isset($_POST['cpcapts_'.$row]) && $_POST['cpcapts_'.$row] >0){
				$cpcapts = 1;
			}			
			if(isset($_POST['cpcfarms_'.$row]) && $_POST['cpcfarms_'.$row] >0){
				$cpcfarms = 1;
			}
			if(isset($_POST['cpcbus_'.$row]) && $_POST['cpcbus_'.$row] >0){
				$cpcbus = 1;
			}
			if(isset($_POST['tmchomes_'.$row]) && $_POST['tmchomes_'.$row] >0){
				$tmchome = 1;
			}
			if(isset($_POST['tmcapts_'.$row]) && $_POST['tmcapts_'.$row] >0){
				$tmcapts = 1;
			}			
			if(isset($_POST['emchomes_'.$row]) && $_POST['emchomes_'.$row] >0){
				$emchome = 1;
			}
			if(isset($_POST['emcapts'.$row]) && $_POST['emcapts'.$row] >0){
				$emcapts = 1;
			}			
			if(isset($_POST['subhomes_'.$row]) && $_POST['subhomes_'.$row] >0){
				$subhome = 1;
			}
			if(isset($_POST['subapts_'.$row]) && $_POST['subapts_'.$row] >0){
				$subapts = 1;
			}
			if(isset($_POST['aselected_'.$row]) && $_POST['aselected_'.$row]=="Y"){
				$aselected = 'Y';
			}
			//
			$values_to_call = "'PV','PV601','3201','".$code."','".$route."','".$aselected."','".$bselected."',".$cpchomes.",".$cpcapts.",".$cpcfarms.",".$cpcbus.",".$tmchome.",".$tmcapts.",".$emchome.",".$emcapts.",".$subhome.",".$subapts;
			$params[] = "CLIENT_CODE";
	        $params[] = "PROJECT";
	        $params[] = "STORE";
	        $params[] = "MFDCODE";
	        $params[] = "ROUTE";
	        $params[] = "A_SELECTED";
	        $params[] = "B_SELECTED";
	        $params[] = "S_HOMES";
	        $params[] = "S_APTS";
	        $params[] = "S_FARMS";
	        $params[] = "S_BUS";
	        $params[] = "S_TMCHOMES";
	        $params[] = "S_TMCAPTS";
	        $params[] = "S_EMCHOMES";
	        $params[] = "S_EMCAPTS";
	        $params[] = "S_SUBHOMES";
	        $params[] = "S_SUBAPTS";
	        $tsql_callSP = "EXEC TEST.DBO.p_Update_Analysis_Store_Selection  $values_to_call ";
	            
	        $stmt3 = sqlsrv_query($conn, $tsql_callSP, $params);	
		}
	}
	//mssqlsrv_free_stmt($stmt3);
?>