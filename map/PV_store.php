<?php
//$connectionInfo = array( "Database" => "DEALER", "UID" => "hmsservice", "PWD" => "MFD4You!", "CharacterSet" => "UTF-8");
$connectionInfo = array( "Database" => "TEST", "UID" => "webdev", "PWD" => "Two4One!");
$conn = sqlsrv_connect("72.143.59.108, 1494", $connectionInfo);                                               
 if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}else{
}
if ($conn != "") { 
// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);
header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
$values_to_call = "'HH','HH601','".$_SESSION['MM_Username']."'";

$params[] = "CLIENT_CODE";
$params[] = "PROJECT";
$params[] = "STORE";
$tsql_callSP = "EXEC TEST.DBO.p_Loading_Store_Market_Area  'HH','HH601','".$_COOKIE["username"]."'";
	
$stmt3 = sqlsrv_query($conn, $tsql_callSP, $params);
if ($stmt3 === false) {
	die(print_r(sqlsrv_error(), true));
}
$cnt=1;
while ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("CLIENT_CODE",$row['CLIENT_CODE']);
  $newnode->setAttribute("STORE",$row['STORE']);
  $newnode->setAttribute("STORE_NAME",'');//$row['STORE_NAME']
  $newnode->setAttribute("STORE_ADDRESS", '');//$row['STORE_ADDRESS']
  $newnode->setAttribute("STORE_LAT", $row['LATITUDE']);
  $newnode->setAttribute("STORE_LONG", $row['LONGITUDE']);
  $newnode->setAttribute("STORE_CITY", '');//$row['STORE_CITY']
}

/*foreach ($conn->query($mssql_query) as $row){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("CLIENT_CODE",$row['CLIENT_CODE']);
  $newnode->setAttribute("STORE",$row['STORE']);
  $newnode->setAttribute("STORE_NAME",$row['STORE_NAME']);
  $newnode->setAttribute("STORE_ADDRESS", $row['STORE_ADDRESS']);
  $newnode->setAttribute("STORE_LAT", $row['STORE_LAT']);
  $newnode->setAttribute("STORE_LONG", $row['STORE_LONG']);
  $newnode->setAttribute("STORE_CITY", $row['STORE_CITY']);
}*/
}
echo $dom->saveXML();
mssqlsrv_free_stmt($stmt3);
?>