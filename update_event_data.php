
<?php
session_start();
if (!isset($_SESSION['MM_Username']) && $_SESSION['MM_storename'] == true) {
    header("Location: index.php");
    exit;
    
}
require_once("Connections/User_Information.php");
/*$conn = new mysqli($hostname_User_Information, $username_User_Information,
      $password_User_Information, $database_User_Information);
*/
$connectionInfo = array( "Database" => $database_User_Information, "UID" => $username_User_Information, "PWD" => $password_User_Information, "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($hostname_User_Information, $connectionInfo);	
if( $conn === false )
{
	die('mssql not connecting : ' . sqlsrv_errors());
}
$row_count = intval($_POST['row_count']);
$counter = 0;

//$commandDelete = $conn->prepare("DELETE FROM ON_MYPROGRAM WHERE STORE = ? AND EVENT_NUMBER = ?");
//$commandDelete->bind_param("ss", $store, $event_id);
//$command = $conn->prepare("INSERT INTO ON_MYPROGRAM (STORE, EVENT_NUMBER, QTY, STORE_QTY) VALUES (?,?,?,?)");
//$command->bind_param("ssii", $store, $event_id, $quantity, $store_quantity);
$store = $_POST['store_id'];
$store_type=$_POST['store_type'];

while ($counter <= $row_count) {

	if ($_POST['add_event_'.$counter] == 'Y'){
		$quantity = $_POST["quantity_".$counter];
		$store_quantity = $_POST['store_quantity_'.$counter];
		$event_id = $_POST["event_number_".$counter];
		$selected = 'Y';
		//$commandDelete->execute();
		//$command->execute();

	} else if ($_POST['add_event_'.$counter] == 'N') {
     $selected = 'N';
		$event_id = $_POST["event_number_".$counter];
		$quantity= 0;
		$store_quantity= $_POST['store_quantity_'.$counter];
		//$selected = 'N';
		//$commandDelete->execute();	
	}



	 $values_to_call = "'".$_COOKIE['storename']."','".$_COOKIE['username']."','".$event_id."','".$store_type."','".$quantity."','".$store_quantity."','".$selected."','".$_COOKIE['name']."'";

	//echo "<br>";

 

	$params[] = "@CLIENT_CODE";
	$params[] = "@USERNAME";
	$params[] = "@EVENT_NUMBER";
  $params[] = "@STORE_TYPE";
	$params[] = "@QTY";
	$params[] = "@ST_COPIES";
	$params[] = "@SELECTED";
	$params[] = "@USERNAME";

	$tsql_callSP = "EXEC DEALER.DBO.p_Update_Flyer_Program  $values_to_call";
	$stmt3 = sqlsrv_query($conn, $tsql_callSP, $params);
	
	$counter++;

}

header("Location: Flyer_Promotions.php?type=".$_POST['flyer-type']."&msg");
exit();