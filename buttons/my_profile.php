<?php require_once('Connections/User_Information.php'); ?>
<?php

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


if (isset($_POST["but_lang"])) $post_details[] = "'" . $_POST["but_lang"] . "'"; else $post_details[] = "'ENGLISH'";

// cpc - 4 FIELDS
if (isset($_POST["mycpc_0"])) $post_details[] = $_POST["mycpc_0"]; else $post_details[] = 0;
if (isset($_POST["mycpc_1"])) $post_details[] = $_POST["mycpc_1"]; else $post_details[] = 0;
if (isset($_POST["mycpc_2"])) $post_details[] = $_POST["mycpc_2"]; else $post_details[] = 0;
if (isset($_POST["mycpc_3"])) $post_details[] = $_POST["mycpc_3"]; else $post_details[] = 0;

// BACK TO POSTS 
if (isset($_POST["IMP1_STORE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_STORE_NAME"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_ADDRESS1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_ADDRESS2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_CITY"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_POSTAL"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_PROVINCE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_CONTACT1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_EMAIL1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_PHONE1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_CONTACT2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_EMAIL2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_PHONE2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_FAX"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_WEBSITE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP1_HOURS"])) $post_details[] = 1; else $post_details[] = 0;

if (isset($_POST["IMP2_STORE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_STORE_NAME"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_ADDRESS1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_ADDRESS2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_CITY"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_POSTAL"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_PROVINCE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_CONTACT1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_EMAIL1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_PHONE1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_CONTACT2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_EMAIL2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_PHONE2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_FAX"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_WEBSITE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP2_HOURS"])) $post_details[] = 1; else $post_details[] = 0;


if (isset($_POST["IMP3_STORE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_STORE_NAME"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_ADDRESS1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_ADDRESS2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_CITY"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_POSTAL"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_PROVINCE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_CONTACT1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_EMAIL1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_PHONE1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_CONTACT2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_EMAIL2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_PHONE2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_FAX"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_WEBSITE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP3_HOURS"])) $post_details[] = 1; else $post_details[] = 0;


if (isset($_POST["IMP4_STORE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_STORE_NAME"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_ADDRESS1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_ADDRESS2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_CITY"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_POSTAL"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_PROVINCE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_CONTACT1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_EMAIL1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_PHONE1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_CONTACT2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_EMAIL2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_PHONE2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_FAX"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_WEBSITE"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["IMP4_HOURS"])) $post_details[] = 1; else $post_details[] = 0;


$post_details[] = "'a'";

$post_detailsa = implode(",", $post_details);
$post_details_atring = $post_detailsa;
$post_details_array = explode(",", $post_details_atring);

}




$headers = array('STORE_NUMBER', 'STORE NAME', 'STORE TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL CODE', 'PROVINCE', 'FAX', 'CONTACT1', 'CONTACT2', 'EMAIL1', 'EMAIL2', 'PHONE1', 'PHONE2',   'WEBSITE', 'HOURS', 'LANGUAGE', 'DISTRIBUTION PREFERENCE'); //, 'COVERAGE');
$muheaders = array('STORE', 'STORE_NAME', 'STORE_TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL', 'PROVINCE', 'FAX', 'CONTACT1', 'CONTACT2', 'EMAIL1', 'EMAIL2', 'PHONE1', 'PHONE2', 'WEBSITE', 'HOURS', 'LANGUAGES', 'DISTRIBUTION_PREFERENCE');
		
 
		
$myimprint[] = "IMP1_STORE";
$myimprint[] = "IMP1_STORE_NAME";
$myimprint[] = "IMP1_ADDRESS1";
$myimprint[] = "IMP1_ADDRESS2";
$myimprint[] = "IMP1_CITY";
$myimprint[] = "IMP1_POSTAL";
$myimprint[] = "IMP1_PROVINCE";
$myimprint[] = "IMP1_CONTACT1";
$myimprint[] = "IMP1_EMAIL1";
$myimprint[] = "IMP1_PHONE1";
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2"; 
$myimprint[] = "IMP1_CONTACT2";                   
	
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
$mycpc[] = "CPC_HOMES"; 
$mycpc[] = "CPC_APTS"; 
$mycpc[] = "DIST_HOMES"; 
$mycpc[] = "DIST_APTS"; 	
	
mysql_select_db($database_User_Information, $User_Information);

$query_profile_dat = "SELECT * FROM ON_STORES WHERE STORE = '".$_COOKIE['username']."' LIMIT 1";
$profile_dat = mysql_query($query_profile_dat, $User_Information) or die(mysql_error());
$row_profile_dat = mysql_fetch_assoc($profile_dat);
$totalRows_profile_dat = mysql_num_rows($profile_dat);


 //$connectionInfo = array( "Database" => "DEALER", "UID" => "sa", "PWD" => "50nerfdarts", "CharacterSet" => "UTF-8");
//$conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);

			
$connectionInfo = array( "Database" => "DEALER", "UID" => "hmsservice", "PWD" => "MFD4You!", "CharacterSet" => "UTF-8");
            //$conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);
		$conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);	
			
			
            if( $conn === false )
           	 {
                        die('mssql not connecting : ' . sqlsrv_errors());
           	 }

// EDIT Store Proc
if (isset($_POST["edit_string"])) {
   $tsql_callSP = "EXEC DEALER.DBO.p_Update_Store_Information  $post_details_atring ";
   $stmt3 = sqlsrv_query( $conn, $tsql_callSP, $post_details_array);
    if( $stmt3 === false )
    {
        die(print_r( sqlsrv_errors(), true));
    }
}

 

// display Store Proc
 
 
$values_to_call = "'HH','" . $_COOKIE['username'] . "'";

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
	  for ( $ii = 0; $ii <= 3; $ii ++) {	
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
<!--
body {font-family: "Century Gothic" !important;}
.style1 {color: #990000}
.style7 {font-family: "Century Gothic"}
.style9 {font-size: 20px}
.style11 {font-family: "Century Gothic"; font-weight: bold;}
.style14 {color: #990000; font-weight: bold; }
.style15 {
	color: #000000;
	font-weight: bold;
	font-family: "Century Gothic";
}
.style16 {font-size: 20px; font-family: "Century Gothic"; }
.style18 {font-family: "Century Gothic"; font-size: 18px; }
-->

</style>
</head>




<body>



<div style="width:100%;">
<div style="width:90%; margin:0 auto;"; postition:relative;">

<table width="1478" border="0" align="left" cellpadding="2" cellspacing="2">
  <tr>
    <td width="95"><div align="right"><img src="Images/banner sice 2.png" width="93" height="82" /></div></td>
    <td width="337"><img src="logos/HH.png" width="333" height="95" /></td>
    <td width="1026"><img src="Images/BANNER5SLICE.jpg" width="967" height="76" /></td>
  </tr>
</table>
<div style="clear:both;"></div>
<br/>
<table width="85%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:95px;">

<tr>
<td width="325" style="padding-right: 4%;"><span class="style9 style11"><strong><?php echo $_COOKIE['name']; ?></strong>, </span><span class="style16">Store</span>  
         
      <span class="style7">
      <span class="style18">
      <?php 
echo $_COOKIE["username"];
?>
      </span></span>    <span class="style18"></span></span></td></style>
<script>
function myFunction() {
	window.print();
}
</script>




<link rel="stylesheet" type="text/css" href="css/main.css" />

  
  <div style="width:100%;">

      <td  width="295" align="right" class="style9 style11">MY PROFILE</td>
</tr>
</table>
<br/>
<div width=100%;clear:both;"></div>

  <br/>

<br/>

<div style="postition:relative;" align="center" class="style7 style9 style11">
	<a href="edit_password.php"><span style="border:0; background:transparent; float:right;"><img src="buttons/Save Password.png" width="185" height="43"/></span></a>
  <a href="my_profile_edit.php">
    <button style="border:0; background:transparent; float:right;"><img src="buttons/Edit Profile.png" width="209" height="45"/></button>
  </a></div>
</tr>

</table>

 	<a href="home.php" style="float:left;margin-left:0;">
      <button style="border:0; background:transparent; float:left; margin-left:-24px;"><img src="buttons/Return.png"/></button>
	</a>
  
	<!-- main data table --> 
	<table style="width:100%; float:left;" border="" align="center" cellpadding="0" cellspacing="0">
		<tr>
		  <th> </th><th></th>
		<th colspan="4">IMPRINTS</th>
		</tr>
		<tr><th></th><th><label for="edit_detail"></label>
      </th><th align='center'>Ver 1</th><th>Ver 2</th><th>Ver 3</th><th>Ver 4</th></tr>
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
?>
	<?php
	
		for ($i = 0; $i <= 1 ; $i++) {
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			if($bmyimprint1[$i]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$i]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$i]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$i]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
		}
		for ($i = 2; $i <= 2 ; $i++) {
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			echo "<td> &nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo '</tr>';
		}
		$ii = 2;
		for ($i = 3; $i <= 7 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
		
		$ii = 13;
		for ($i = 8; $i <= 8 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
$ii = 7;
		for ($i = 9; $i <= 9 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
		$ii = 10;
		for ($i = 10; $i <= 10 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
		$ii = 8;
		for ($i = 11; $i <= 11 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
		
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
		$ii = 11;
		for ($i = 12; $i <= 12 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
		
		$ii = 9;
		for ($i = 13; $i <= 13 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
		$ii = 12;
		for ($i = 14; $i <= 14 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
		$ii = 14;
		for ($i = 15; $i <= 16 ; $i++) {
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
		
			if($bmyimprint1[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint2[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint3[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			if($bmyimprint4[$ii]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
			echo '</tr>';
			$ii = $ii +1;
		}
		for ($i = 17; $i <= 17 ; $i++) {
			$temp_eng = "checked='checked'";
			$temp_fr = ""; if($brow_profile_dat[$i] =="FRENCH") {$temp_fr = "checked='checked'"; $temp_eng = ""; }
			$temp_bi = ""; if($brow_profile_dat[$i] =="BILINGUAL") {$temp_bi = "checked='checked'"; $temp_eng = ""; }
			
			
			echo '<tr><td>'.$headers[$i].'</td>';
			echo "<td><input type='text' disabled name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";
			
			
			
			echo "<td>&nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo '</tr>';
		}
		for ($i = 0; $i <= 3 ; $i++) {
			echo '<tr><td>'.$mycpcn[$i].'</td>';
			echo "<td><input type='text' disabled name='mycpc_" . $i . "'  id='mycpc_" . $i . "' value = " . $bmycpc[$i] . " /> </td>";
			echo "<td> &nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo "<td> &nbsp;</td>";
			echo '</tr>';
		}
		
		

	?>
  </table>


</body>

</html>
<?php
mysql_free_result($profile_dat);
?>
</div>
