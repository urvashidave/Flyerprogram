<?php
require_once("Connections/User_Information.php");
$conn = new mysqli($hostname_User_Information, $username_User_Information,
      $password_User_Information, $database_User_Information);

$row_count = intval($_POST['row_count']);
$counter = 1;

$commandDelete = $conn->prepare("DELETE FROM ON_MYPROGRAM WHERE STORE = ? AND EVENT_NUMBER = ?");
$commandDelete->bind_param("ss", $store, $event_id);
$command = $conn->prepare("INSERT INTO ON_MYPROGRAM (STORE, EVENT_NUMBER, QTY, STORE_QTY) VALUES (?,?,?,?)");
$command->bind_param("ssii", $store, $event_id, $quantity, $store_quantity);
$store = $_POST['store_id'];

while ($counter <= $row_count) {
  if ($_POST['add_event_'.$counter] == 'Y'){
     $quantity = $_POST["quantity_".$counter];
     $store_quantity = $_POST['store_quantity_'.$counter];
     $event_id = $_POST["event_number_".$counter];
     $commandDelete->execute();
     $command->execute();
  } else if ($_POST['add_event_'.$counter] == 'N') {
  	$event_id = $_POST["event_number_".$counter];
  	$commandDelete->execute();	
  }
  $counter++;
}
header("Location: Flyer_Promotions.php?type=".$_POST['flyer-type']."&msg");
exit();