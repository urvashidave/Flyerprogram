<?php

session_start();
if (!isset($_SESSION['MM_Username']) && $_SESSION['MM_storename'] == true) {
    header("Location: login.php");
    exit;
    
}
require_once("Connections/User_Information.php");

$connection = new Connection();
$conn = $connection->connect_internal_mssql();

$IMPRINT_NUM = 4;

$stmt = mssql_init('p_Update_Store_Information', $conn);
$stored_procedure_vales = array(
				'@STORE_NAME',
				'@STORE_TYPE',
				'@ADDRESS1',
				'@ADDRESS2',
				'@CITY',
				'@POSTAL',
				'@FAX',
				'@PROVINCE',
				'@CONTACT1',
				'@CONTACT2',
				'@EMAIL1',
				'@EMAIL2',
				'@PHONE1',
				'@PHONE2',
				'@WEBSITE',
				'@HOURS',
				'@LANGUAGES',
				'@USERNAME',
);
$special_procedure_values = array(
				  '@CPC_HOMES' => $_POST['CPC_HOMES'] ? 1 : 0,
				  '@CPC_APTS' => $_POST['CPC_APTS'] ? 1 : 0,
				  '@DIST_HOMES' => $_POST['DIST_HOMES'] ? 1 : 0,
				  '@DIST_APTS' => $_POST['DIST_APTS'] ? 1 : 0
);
$stored_procedure_imprints = array(
				   'STORE_NAME',
				   'STORE_TYPE',
				   'ADDRESS1',
				   'ADDRESS2',
				   'CITY',
				   'POSTAL',
				   'PROVINCE',
				   'CONTACT1',
				   'EMAIL1',
				   'PHONE1',
				   'CONTACT2',
				   'EMAIL2',
				   'PHONE2',
				   'FAX',
				   'WEBSITE',
				   'HOURS',
				   'STORE',
);
// Bind standard post values for non imprint / shipping items
for ($i = 0; $i < count($stored_procedure_vales); $i++){
  mssql_bind($stmt, $stored_procedure_vales[$], $_POST[substr(1, strlen($stored_procedure_vales[$i]) - 2)], SQLVARCHAR, false, false, 255);
}

// Bind shipping dist