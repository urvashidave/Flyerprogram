<?php

session_start();
if (!isset($_SESSION['MM_Username']) && $_SESSION['MM_storename'] == true) {
    header("Location: login.php");
    exit;
    
}
if (($_COOKIE['username']=='') && $_COOKIE['storename'] == '') {
    header("Location: index.php");
    exit;
    }

require_once('Connections/User_Information.php'); ?>
<?php
$edit_string = 1;

/*
if (isset($_POST["edit_string"])) {	
$post_details[] = "'HH'";
$post_details[] = "'" . $_POST["edit_detail0"] . "'";
$post_details[] = "'" . $_POST["edit_detail1"] . "'";
$post_details[] = "'" . $_POST["edit_detail2"] . "'";
$post_details[] = "'" . $_POST["edit_detail3"] . "'";
$post_details[] = "'" . $_POST["edit_detail4"] . "'";
$post_details[] = "'" . $_POST["edit_detail5"] . "'";
$post_details[] = "'" . $_POST["edit_detail6"] . "'";
$post_details[] = "'" . $_POST["edit_detail7"] . "'";
$post_details[] = "'" . $_POST["edit_detail8"] . "'";
$post_details[] = "'" . $_POST["edit_detail9"] . "'";
$post_details[] = "'" . $_POST["edit_detail10"] . "'";
$post_details[] = "'" . $_POST["edit_detail11"] . "'";
$post_details[] = "'" . $_POST["edit_detail12"] . "'";
$post_details[] = "'" . $_POST["edit_detail13"] . "'";
$post_details[] = "'" . $_POST["edit_detail14"] . "'";
$post_details[] = "'" . $_POST["edit_detail15"] . "'";
$post_details[] = "'" . $_POST["edit_detail16"] . "'";
$post_details[] = "'" . $_POST["edit_detail17"] . "'";

$post_detailsa = implode(",", $post_details);
$post_detailsb = ",0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'a'";

$post_details_atring = $post_detailsa . $post_detailsb;
$post_details_array = explode(",", $post_details_atring);

}

*/


$headers = array('STORE_NUMBER', 'STORE NAME', 'STORE TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL CODE', 'PROVINCE', 'FAX', 'CONTACT1', 'CONTACT2', 'EMAIL1', 'EMAIL2', 'PHONE1', 'PHONE2',   'WEBSITE', 'HOURS', 'LANGUAGE', 'DISTRIBUTION PREFERENCE'); //, 'COVERAGE');
$muheaders = array('STORE', 'STORE_NAME', 'STORE_TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL', 'PROVINCE', 'FAX', 'CONTACT1', 'CONTACT2', 'EMAIL1', 'EMAIL2', 'PHONE1', 'PHONE2', 'WEBSITE', 'HOURS', 'LANGUAGES', 'DISTRIBUTION_PREFERENCE');
		
 
		
$myimprint1[] = "IMP1_STORE";
$myimprint1[] = "IMP1_STORE_NAME";
$myimprint1[] = "IMP1_ADDRESS1";
$myimprint1[] = "IMP1_ADDRESS2";
$myimprint1[] = "IMP1_CITY";
$myimprint1[] = "IMP1_POSTAL";
$myimprint1[] = "IMP1_PROVINCE";
$myimprint1[] = "IMP1_CONTACT1";
$myimprint1[] = "IMP1_EMAIL1";
$myimprint1[] = "IMP1_PHONE1";
$myimprint1[] = "IMP1_CONTACT2"; 
$myimprint1[] = "IMP1_EMAIL2"; 
$myimprint1[] = "IMP1_PHONE2"; 
$myimprint1[] = "IMP1_FAX"; 
$myimprint1[] = "IMP1_WEBSITE"; 
$myimprint1[] = "IMP1_HOURS"; 

$myimprint2[] = "IMP2_STORE";
$myimprint2[] = "IMP2_STORE_NAME";
$myimprint2[] = "IMP2_ADDRESS1";
$myimprint2[] = "IMP2_ADDRESS2";
$myimprint2[] = "IMP2_CITY";
$myimprint2[] = "IMP2_POSTAL";
$myimprint2[] = "IMP2_PROVINCE";
$myimprint2[] = "IMP2_CONTACT1";
$myimprint2[] = "IMP2_EMAIL1";
$myimprint2[] = "IMP2_PHONE1";
$myimprint2[] = "IMP2_CONTACT2"; 
$myimprint2[] = "IMP2_EMAIL2"; 
$myimprint2[] = "IMP2_PHONE2"; 
$myimprint2[] = "IMP2_FAX"; 
$myimprint2[] = "IMP2_WEBSITE"; 
$myimprint2[] = "IMP2_HOURS";                  
	
	
$myimprint3[] = "IMP3_STORE";
$myimprint3[] = "IMP3_STORE_NAME";
$myimprint3[] = "IMP3_ADDRESS1";
$myimprint3[] = "IMP3_ADDRESS2";
$myimprint3[] = "IMP3_CITY";
$myimprint3[] = "IMP3_POSTAL";
$myimprint3[] = "IMP3_PROVINCE";
$myimprint3[] = "IMP3_CONTACT1";
$myimprint3[] = "IMP3_EMAIL1";
$myimprint3[] = "IMP3_PHONE1";
$myimprint3[] = "IMP3_CONTACT2"; 
$myimprint3[] = "IMP3_EMAIL2"; 
$myimprint3[] = "IMP3_PHONE2"; 
$myimprint3[] = "IMP3_FAX"; 
$myimprint3[] = "IMP3_WEBSITE"; 
$myimprint3[] = "IMP3_HOURS";  

$myimprint4[] = "IMP4_STORE";
$myimprint4[] = "IMP4_STORE_NAME";
$myimprint4[] = "IMP4_ADDRESS1";
$myimprint4[] = "IMP4_ADDRESS2";
$myimprint4[] = "IMP4_CITY";
$myimprint4[] = "IMP4_POSTAL";
$myimprint4[] = "IMP4_PROVINCE";
$myimprint4[] = "IMP4_CONTACT1";
$myimprint4[] = "IMP4_EMAIL1";
$myimprint4[] = "IMP4_PHONE1";
$myimprint4[] = "IMP4_CONTACT2"; 
$myimprint4[] = "IMP4_EMAIL2"; 
$myimprint4[] = "IMP4_PHONE2"; 
$myimprint4[] = "IMP4_FAX"; 
$myimprint4[] = "IMP4_WEBSITE"; 
$myimprint4[] = "IMP4_HOURS"; 

$mycpcn[] = "CPC HOMES"; 
$mycpcn[] = "CPC APTS"; 
$mycpcn[] = "DIST HOMES"; 
$mycpcn[] = "DIST APTS";

$mycpc[] = "NATCPC_HOMES"; 
$mycpc[] = "NATCPC_APTS"; 
$mycpc[] = "NATDIST_HOMES"; 
$mycpc[] = "NATDIST_APTS";
 
$mycpc[] = "NATCPC_BUS"; 
$mycpc[] = "OPTCPC_HOMES"; 
$mycpc[] = "OPTCPC_APTS"; 
$mycpc[] = "OPTDIST_HOMES"; 
$mycpc[] = "OPTDIST_APTS"; 
$mycpc[] = "OPTCPC_BUS"; 
$mycpc[] = "CATCPC_HOMES"; 
$mycpc[] = "CATCPC_APTS"; 
$mycpc[] = "CATDIST_HOMES"; 
$mycpc[] = "CATDIST_APTS"; 
$mycpc[] = "CATCPC_BUS"; 

		


// EDIT Store Proc
/*
if (isset($_POST["edit_string"])) {
   $tsql_callSP = "EXEC DEALER.DBO.p_Update_Store_Information  $post_details_atring ";
   $stmt3 = sqlsrv_query( $conn, $tsql_callSP, $post_details_array);
    if( $stmt3 === false )
    {
        die(print_r( sqlsrv_errors(), true));
    }
}

 */

// display Store Proc
 
 
$values_to_call = "'".$_COOKIE['storename']."','" . $_COOKIE['username'] . "'";

$params[] = "CLIENT_CODE";
$params[] = "STORE"; 

    $tsql_callSP = "EXEC DEALER.DBO.p_Load_Store_Information $values_to_call ";

    $stmt3 = sqlsrv_query( $conn, $tsql_callSP, $params);
    if( $stmt3 === false )
    {
        die(print_r( sqlsrv_errors(), true));
    }

 while( $row = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_ASSOC) ) {
	
	  for ( $ii = 0; $ii <= 17; $ii ++) {	
	  $bheaders = $muheaders[$ii];
	  $brow_profile_dat[] = $row[$bheaders];
	  }

	  for ( $ii = 0; $ii <= 14; $ii ++) {	
	  $temp_mycpc = $mycpc[$ii];
	  $bmycpc[] = $row[$temp_mycpc];
     
	  }

	   for ( $ii = 0; $ii < sizeof($myimprint1); $ii ++) {	
	  $temp_bane = $myimprint1[$ii];
	  $bmyimprint1[] = $row[$temp_bane];
	  $temp_bane = $myimprint2[$ii];
	  $bmyimprint2[] = $row[$temp_bane];
	  $temp_bane = $myimprint3[$ii];
	  $bmyimprint3[] = $row[$temp_bane];
	  $temp_bane = $myimprint4[$ii];
	  $bmyimprint4[] = $row[$temp_bane];
	  }
}




?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<title>MY PROFILE</title>
<style type="text/css">
td input{

width:100%;
}
.col-md-12 {
    margin-left: 105px !important;
    width: 81% !important;
}
.checkbox {
  padding-left: 20px; }
  .checkbox label {
    display: inline-block;
    position: relative;
    padding-left: 5px; }
    .checkbox label::before {
      content: "";
      display: inline-block;
      position: absolute;
      width: 17px;
      height: 17px;
      left: 0;
      margin-left: -20px;
      border: 1px solid #cccccc;
      border-radius: 3px;
      background-color: #fff;
      -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
    .checkbox label::after {
      display: inline-block;
      position: absolute;
      width: 16px;
      height: 16px;
      left: 0;
      top: 0;
      margin-left: -20px;
      padding-left: 3px;
      padding-top: 1px;
      font-size: 11px;
      color: #555555; }
  .checkbox input[type="checkbox"] {
    opacity: 0; }
    .checkbox input[type="checkbox"]:focus + label::before {
      outline: thin dotted;
      outline: 5px auto -webkit-focus-ring-color;
      outline-offset: -2px; }
    .checkbox input[type="checkbox"]:checked + label::after {
      font-family: 'FontAwesome';
      content: "\f00c"; }
    .checkbox input[type="checkbox"]:disabled + label {
      opacity: 0.65; }
      .checkbox input[type="checkbox"]:disabled + label::before {
        background-color: #eeeeee;
        cursor: not-allowed; }
  .checkbox.checkbox-circle label::before {
    border-radius: 50%; }
  .checkbox.checkbox-inline {
    margin-top: 0; }
.row {
    margin-right: 8px !important;
    margin-left: 19px !important;
}
.checkbox-primary input[type="checkbox"]:checked + label::before {
  background-color: #428bca;
  border-color: #428bca; }
.checkbox-primary input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-danger input[type="checkbox"]:checked + label::before {
  background-color: #d9534f;
  border-color: #d9534f; }
.checkbox-danger input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-info input[type="checkbox"]:checked + label::before {
  background-color: #5bc0de;
  border-color: #5bc0de; }
.checkbox-info input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-warning input[type="checkbox"]:checked + label::before {
  background-color: #f0ad4e;
  border-color: #f0ad4e; }
.checkbox-warning input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-success input[type="checkbox"]:checked + label::before {
  background-color: #5cb85c;
  border-color: #5cb85c; }
.checkbox-success input[type="checkbox"]:checked + label::after {
  color: #fff; }
	table.table-bordered{
    border:1px solid black;
	  }
	table.table-bordered > thead > tr > th{
		border:1px solid black;
	}
	table.table-bordered > tbody > tr > td{
		border:1px solid black;
	}
	a,button {
 cursor: pointer !important;
}


.style1 {color: #990000}
.style7 {font-family: Arial Narrow,Arial,sans-serif;}
.style8 {color: #990000; font-weight: bold; font-family: "Century Gothic"; }
.style9 {font-size: 20px; padding-left: 20px; padding-right: 20px; border-sizing: border-box;}
.style11 {font-family: "Century Gothic"; font-weight: bold;}
.style12 {font-size: 18px}

.style13 {color: #000000}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	

<script>
$(document).ready(function() {


$('.group1').on('click',function(){
      //any one is checked
     // alert("hi");
     $('.group1').bind('click',true);
      var len = jQuery('#form1 input[class=group2]:checked').length;
if (len > 0) {
      //alert("checkbox selected");   
      jQuery('#form1 input[class=group1]').removeAttr('checked');
      $('.group1').bind('click',false);
     }  
     else{
     $('.group1').bind('click',true);
     }  
});



$('.group2').on('click',function(){
      //any one is checked
     // alert("hi");
     $('.group2').bind('click',true);
      var len = jQuery('#form1 input[class=group1]:checked').length;
if (len > 0) {
      //alert("checkbox selected");   
      jQuery('#form1 input[class=group2]').removeAttr('checked');
      $('.group2').bind('click',false);
     }  
     else{
     $('.group2').bind('click',true);
     }  
});



$('.group3').on('click',function(){
      //any one is checked
     // alert("hi");
     $('.group3').bind('click',true);
      var len = jQuery('#form1 input[class=group4]:checked').length;
if (len > 0) {
      //alert("checkbox selected");   
      jQuery('#form1 input[class=group3]').removeAttr('checked');
      $('.group3').bind('click',false);
     }  
     else{
     $('.group3').bind('click',true);
     }  
});



$('.group4').on('click',function(){
      //any one is checked
     // alert("hi");
     $('.group4').bind('click',true);
      var len = jQuery('#form1 input[class=group3]:checked').length;
if (len > 0) {
      //alert("checkbox selected");   
      jQuery('#form1 input[class=group4]').removeAttr('checked');
      $('.group4').bind('click',false);
     }  
     else{
     $('.group4').bind('click',true);
     }  
});



$('.group5').on('click',function(){
      //any one is checked
     // alert("hi");
     $('.group5').bind('click',true);
      var len = jQuery('#form1 input[class=group6]:checked').length;
if (len > 0) {
      //alert("checkbox selected");   
      jQuery('#form1 input[class=group5]').removeAttr('checked');
      $('.group5').bind('click',false);
     }  
     else{
     $('.group5').bind('click',true);
     }  
});



$('.group6').on('click',function(){
      //any one is checked
     // alert("hi");
     $('.group6').bind('click',true);
      var len = jQuery('#form1 input[class=group5]:checked').length;
if (len > 0) {
      //alert("checkbox selected");   
      jQuery('#form1 input[class=group6]').removeAttr('checked');
      $('.group6').bind('click',false);
     }  
     else{
     $('.group6').bind('click',true);
     }  
});



});

</script>
</head>

<body>
<?php include("banner.php");?>

<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<table width="100%" style="" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="10%"></td>
				<td style="padding-right: 4%;" width="25%">
					<p style="margin: 0; padding: 0;text-align:left;width:283px;font-size:20px;"><strong><?php echo $_COOKIE['name']; ?>,</strong></p>
					<p style="margin: 0; padding: 0;text-align:left;font-size:20px;">Store <?php echo $_COOKIE["username"]; ?></p>
				</td>
				<td style="border:3px solid black;" width="25%">
					<div class="box" style="width:320px;"> 
						<div align="center" class="style9"><strong>EDIT </strong>PROFILE </div>
					</div>
				</td>
				<td width="40%"></td>
			</tr>
			</table>
		</div>
	</div>
</div>	
<br/><br/>
<div class="container-fluid">    
    <div class="row">
        <div class="col-md-12">
			<form id="form1" name="form1" method="post" action="my_profile.php">
			<input name="edit_string" type="hidden" id="edit_string" value="<?php echo $edit_string; ?>" size="100" />
			<div width="100%;clear:both;">
				<a href="home.php" style="float:left;margin-left:0;">
				  <button class="btn btn-danger" style=""><b>RETURN</b></button>
				</a>
			</div>
			<div align="right">
			  <input type="submit" class="btn btn-primary " name="edit_post" id="edit_post" value="Save and Return" />
			</div>
			<br/><br/>
			<div style="clear:both;"></div>
				<!-- main data table --> 
				<table class="table table-bordered table-inverse single-border" style="width:100%; float:left;" border="" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <th style="border:1px solid black;"> </th>
					  <th style="border:1px solid black;"></th>
					  <th colspan="4" style="border:1px solid black;">IMPRINTS</th>
					</tr>
					<tr>
						<th style="border:1px solid black;"></th>
						<th style="border:1px solid black;"><label for="edit_detail"></label></th>
						<th style="border:1px solid black;">Ver 1</th>
						<th style="border:1px solid black;">Ver 2</th>
						<th style="border:1px solid black;">Ver 3</th>
						<th style="border:1px solid black;">Ver 4</th>
					</tr>
					<tr>
					  <th style="border:1px solid black;"></th>
					  <th style="border:1px solid black;">&nbsp;</th>
					  <th style="border:1px solid black;">&nbsp;</th>
					  <th style="border:1px solid black;">&nbsp;</th>
					  <th style="border:1px solid black;">&nbsp;</th>
					  <th style="border:1px solid black;">&nbsp;</th>
				  </tr>
			<?php
				$IMPRINT_NUM = 4;
				function make_null_array($num){
					$null_array = array('imprint' => array());
					for ($i = 0; $i < $num; $i++){
						array_push($null_array['imprint'], array());
					}
					return $null_array;
				}
				 //, 'COVERAGE');
				$col_names = array('STORE', 'STORE_NAME', 'STORE_TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL', 'PROVINCE', 'FAX', 'CONTACT1', 'CONTACT2', 'EMAIL1', 'EMAIL2', 'PHONE1', 'PHONE2', 'WEBSITE', 'HOURS', 'LANGUAGES', 'CANADA_POST'); //, 'COVERAGE');
				$imprint_data = ($row_profile_dat['IMPRINT'] == null) ? make_null_array() : json_decode($row_profile_dat['IMPRINT'], true);
				$images = array(
							'FACEBOOK' => 'images/facebook.jpg',
							'RENTAL' => 'images/rental.png',
							'DELIVERY' => 'images/delivery.png',
							'MAPS' => 'images/gmap.png'
							);

					for ($i = 0; $i <= 1 ; $i++) {
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$i]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$i]."' id='".$myimprint1[$i]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$i]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$i]."' id='".$myimprint2[$i]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$i]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$i]."' id='".$myimprint3[$i]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$i]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$i]."' id='".$myimprint4[$i]."' " . $temp_check . " ></td>";
						echo '</tr>';
					}
					for ($i = 2; $i <= 2 ; $i++) {
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
					}
					$ii = 2;
					for ($i = 3; $i <= 7 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
					
					$ii = 13;
					for ($i = 8; $i <= 8 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
			$ii = 7;
					for ($i = 9; $i <= 9 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
					$ii = 10;
					for ($i = 10; $i <= 10 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
					$ii = 8;
					for ($i = 11; $i <= 11 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input   type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
					$ii = 11;
					for ($i = 12; $i <= 12 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
					
					$ii = 9;
					for ($i = 13; $i <= 13 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
					$ii = 12;
					for ($i = 14; $i <= 14 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
					$ii = 14;
					for ($i = 15; $i <= 16 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='text' name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						$temp_check = ""; if($bmyimprint1[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint1[$ii]."' id='".$myimprint1[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint2[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint2[$ii]."' id='".$myimprint2[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint3[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint3[$ii]."' id='".$myimprint3[$ii]."' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmyimprint4[$ii]>0) $temp_check = "checked='checked'";
						echo "<td><input  type='checkbox' name='".$myimprint4[$ii]."' id='".$myimprint4[$ii]."' " . $temp_check . " ></td>";
						echo '</tr>';
						$ii = $ii +1;
					}
					for ($i = 17; $i <= 17 ; $i++) {
						$temp_eng = "checked='checked'";
						$temp_fr = ""; if($brow_profile_dat[$i] =="FRENCH") {$temp_fr = "checked='checked'"; $temp_eng = ""; }
						$temp_bi = ""; if($brow_profile_dat[$i] =="BILINGUAL") {$temp_bi = "checked='checked'"; $temp_eng = ""; }
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input  type='radio' name='but_lang' id='but_lang' value='ENGLISH' " . $temp_eng . "/>english<input  type='radio' name='but_lang' id='but_lang' value='FRENCH' " . $temp_fr . " />french<input type='radio' name='but_lang' id='but_lang' value='BILINGUAL' " . $temp_bi . " />bilingual</td>";
						
						echo "<td>&nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
					}
					
					
				echo '<tr>';
					echo "<td colspan='6'>&nbsp;</td>";
					echo '</tr>';
					
					echo '<tr><td><strong>DISTRIBUTION</strong></td>';
						echo "<td>Method</td>";
						echo "<td><strong>Homes</strong> </td>";
						echo "<td><strong>Apt.</strong> </td>";
						echo "<td><strong>Business</strong> </td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
					
					echo '<tr><td>National Program</td>';
						echo "<td>Canada Post</td>";
						$temp_check = ""; if($bmycpc[0]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_0' class='group1' id='mycpc_0' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[1]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_1' class='group1' id='mycpc_1' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[4]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_4' class='group1' id='mycpc_4' " . $temp_check . " ></td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
						
						echo '<tr><td>National Program</td>';
						echo "<td>Distributor</td>";			
						$temp_check = ""; if($bmycpc[2]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_2' class='group2' id='mycpc_2' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[3]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_3' class='group2' id='mycpc_3' " . $temp_check . " ></td>";
						echo "<td>N/A</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
						
						echo '<tr><td>Optional Program</td>';
						echo "<td>Canada Post</td>";
						$temp_check = ""; if($bmycpc[5]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_5' class='group3' id='mycpc_5' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[6]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_6' class='group3' id='mycpc_6' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[9]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_9' class='group3' id='mycpc_9' " . $temp_check . " ></td>";			
						echo "<td> &nbsp;</td>";
						echo '</tr>';
						
						echo '<tr><td>Optional Program</td>';
						echo "<td>Distributor</td>";
						$temp_check = ""; if($bmycpc[7]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_7'class='group4' id='mycpc_7' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[8]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_8' class='group4' id='mycpc_8' " . $temp_check . " ></td>";			
						echo "<td>N/A</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';

						echo '<tr><td>Catalogue Program</td>';
						echo "<td>Canada Post</td>";
						$temp_check = ""; if($bmycpc[10]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_10' class='group5' id='mycpc_10' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[11]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_11' class='group5' id='mycpc_11' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[14]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_14' class='group5' id='mycpc_14' " . $temp_check . " ></td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
					
						echo '<tr><td>Catalogue Program</td>';
						echo "<td>Distributor</td>";
						$temp_check = ""; if($bmycpc[12]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_12' class='group6' id='mycpc_12' " . $temp_check . " ></td>";
						$temp_check = ""; if($bmycpc[13]>0) $temp_check = "checked='checked'";
						echo "<td><input type='checkbox' name='mycpc_13' class='group6' id='mycpc_13' " . $temp_check . " ></td>";
						echo "<td>N/A</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
						
					
				?>
			  </table>
				<br/><br/>
			</form>
		</div>
	</div>
</div>	
</body>

</html>

</div>
