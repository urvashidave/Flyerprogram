<?php require_once('Connections/User_Information.php'); ?>
<?php
$headers = array('STORE_NUMBER', 'STORE NAME', 'STORE TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL CODE', 'PROVINCE', 'CONTACT1',
					'PHONE1', 'EMAIL1', 'CONTACT2', 'PHONE2', 'EMAIL2', 'FAX', 'WEBSITE', 'HOURS', 'LANGUAGE', 
					'DISTRIBUTION PREFERENCE'); //, 'COVERAGE');
$muheaders = array('STORE', 'STORE_NAME', 'STORE_TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL', 'PROVINCE', 'CONTACT1', 'PHONE1', 'EMAIL1', 'CONTACT2', 'PHONE2', 'EMAIL2', 'FAX', 'WEBSITE', 'HOURS', 'LANGUAGES', 'DISTRIBUTION_PREFERENCE');
		
		
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
	
		
mysql_select_db($database_User_Information, $User_Information);

$query_profile_dat = "SELECT * FROM ON_STORES WHERE STORE = '".$_COOKIE['username']."' LIMIT 1";
$profile_dat = mysql_query($query_profile_dat, $User_Information) or die(mysql_error());
$row_profile_dat = mysql_fetch_assoc($profile_dat);
$totalRows_profile_dat = mysql_num_rows($profile_dat);

 $connectionInfo = array( "Database" => "DEALER", "UID" => "sa", "PWD" => "50nerfdarts", "CharacterSet" => "UTF-8");
            $conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);
            if( $conn === false )
           	 {
                        die('Connection fail : ' . sqlsrv_errors());
           	 }
 
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
	  $testmyimprint = $myimprint[$ii];
	  $bmyimprint[] = $row[$testmyimprint];

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
<table style="margin-left:95px;" border="0" align="center" cellpadding="0" cellspacing="0">

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

</head>

<body>
<div class="container row col-md-12 print_pages align="left""> 
<div style="width:100%;">

      <td style="border:3px solid black;" width="295" ><div class="box"> 
        <div align="center" class="style9"><span class="style18"><strong>My</strong> Profile</span></div>
      </div></td>
</tr>
</table>
<br/>
<div width=100%;clear:both;"></div><br/>

<br/>

<div style="postition:relative;" align="center" class="style7 style9 style11">
	<a href="home.php">
      <button style="border:0; background:transparent; float:left;"></button>
	</a>
</div>
	    <div align="right">
  <a href="edit_password.php">
    <button style="border:0; background:transparent; float:right;"></button>
  </a>
  <a href="my_profile_edit.php">
    <button style="border:0; background:transparent; float:right;"><img src="buttons/Edit Profile.png" width="209" height="45"/></button>
  </a><a href="edit_password.php"><span style="border:0; background:transparent; float:right;"><img src="buttons/Save Password.png" width="185" height="43"/></span></a>
 
</div>
</tr>

</table>

 	<a href="home.php" style="float:left;margin-left:0;">
      <button style="border:0; background:transparent; float:left; margin-left:-24px;"><img src="buttons/Return.png"/></button>
	</a>
  
	<!-- main data table --> 
	<table style="width:100%; float:left;" border="" align="center" cellpadding="0" cellspacing="0">
		<tr><th></th><th></th>
		<th colspan="4">IMPRINTS</th>
		</tr>
		<tr><th></th><th></th><th>Ver 1</th><th>Ver 2</th><th>Ver 3</th><th>Ver 4</th></tr>
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
	$col_names = array('STORE', 'STORE_NAME', 'STORE_TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL', 'PROVINCE',
					  'CONTACT1', 'PHONE1', 'EMAIL1', 'CONTACT2', 'PHONE2', 'EMAIL2', 'FAX', 'WEBSITE', 'HOURS',
					  'LANGUAGES', 'CANADA_POST'); //, 'COVERAGE');
	$imprint_data = ($row_profile_dat['IMPRINT'] == null) ? make_null_array() : json_decode($row_profile_dat['IMPRINT'], true);
	$images = array(
				'FACEBOOK' => 'images/facebook.jpg',
				'RENTAL' => 'images/rental.png',
				'DELIVERY' => 'images/delivery.png',
				'MAPS' => 'images/gmap.png'
				);
?>
	<?php
		for ($i = 0; $i < count($headers); $i++) {
			echo '<tr><td>'.$headers[$i].'</td>';
			if ($col_names[$i] == 'LANGUAGES') {
				echo '<td>';
				if ($row_profile_dat['LANGUAGES'] == 'english') {
					echo '<label>English<input type="radio" name="LANGUAGES" value="english" checked/></label>
						  <label>French<input type="radio" name="LANGUAGES" value="french" disabled/></label>
						  <label>Bilingual<input type="radio" name="LANGUAGES" value="bilingual" disabled/></label></td>';
				} elseif ($row_profile_dat['LANGUAGES'] == 'french') {
					echo '<label>English<input type="radio" name="LANGUAGES" value="english" disabled/></label>
						  <label>French<input type="radio" name="LANGUAGES" value="french" checked/></label>
						  <label>Bilingual<input type="radio" name="LANGUAGES" value="bilingual" disabled/></label></td>';
				} elseif ($row_profile_dat['LANGUAGES'] == 'bilingual') {
					echo '<label>English<input type="radio" name="LANGUAGES" value="english" disabled/></label>
						  <label>French<input type="radio" name="LANGUAGES" value="french" disabled/></label>
						  <label>Bilingual<input type="radio" name="LANGUAGES" value="bilingual" checked/></label></td>';
				} else {
					echo '<label>English<input type="radio" name="LANGUAGES" value="english"/></label>
						  <label>French<input type="radio" name="LANGUAGES" value="french"/></label>
						  <label>Bilingual<input type="radio" name="LANGUAGES" value="bilingual"/></label></td>';
				}
			} elseif ($col_names[$i] ==  'CANADA_POST') {
				echo '<td>';
				if ($row_profile_dat["CANADA_POST"] == 1){
				    echo 
					  '<label>Canada Post<input type="radio" name="CANADA_POST" value="1" checked/></label>
					   <label>Newspaper<input type="radio" name="CANADA_POST" value="0" disabled/></label>
					   <label>Both<input type="radio" name="CANADA_POST" value="2" disabled/></td>';
				} elseif ($row_profile_dat["CANADA_POST"] == 0) { 
				    echo 
					  '<label>Canada Post<input type="radio" name="CANADA_POST" value="1" disabled/></label>
					   <label>Newspaper<input type="radio" name="CANADA_POST" value="0" checked/></label>
					   <label>Both<input type="radio" name="CANADA_POST" value="2"/disabled></td>';
				} else {
					echo
						'<label>Canada Post<input type="radio" name="CANADA_POST" value="1" disabled/></label>
						<label>Newspaper<input type="radio" name="CANADA_POST" value="0" disabled/></label>
						<label>Both<input type="radio" name="CANADA_POST" value="2" checked/></td>';
				}
			} else {
				echo '<td>'.$brow_profile_dat[$i].'</td>';
				for ($j = 0; $j < $IMPRINT_NUM; $j++){
					if (in_array($col_names[$i], $imprint_data['imprints'][$j])){
						echo '<td><input disabled="disabled" type="checkbox" name="'.$col_names[$i].'_imprint" checked="checked"></td>'; 
					} else {
						echo '<td><input disabled="disabled" type="checkbox" name="'.$col_names[$i].'_imprint"></td>';
					}
				}
			}
			echo '</tr>';
		}
		foreach ($images as $key => $value) {
			echo '<tr><td>'.ucwords(strtolower($key)).'</td><td></td>';
			for ($j = 0; $j < $IMPRINT_NUM; $j++){
				if (in_array($key, $imprint_data['imprints'][$j])){
					echo '<td><input disabled="disabled" type="checkbox" name="'.$key.'_imprint" checked="checked"></td>'; 
				} else {
					echo '<td><input disabled="disabled" type="checkbox" name="'.$key.'_imprint"></td>';
				}
			}
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
