<?php require_once('Connections/User_Information.php'); ?>
<?php
/*
mysql_select_db($database_User_Information, $User_Information);
$query_profile_dat = "SELECT * FROM ON_STORES WHERE STORE = '".$_COOKIE['username']."' LIMIT 1";
$profile_dat = mysql_query($query_profile_dat, $User_Information) or die(mysql_error());
$row_profile_dat = mysql_fetch_assoc($profile_dat);
$totalRows_profile_dat = mysql_num_rows($profile_dat);
*/

$connection = new Connection();
$conn = $connection->connect_internal_mssql();

$IMPRINT_NUM = 4;

$stmt = mssql_init('p_Update_Store_Information', $conn);
mssql_bind($stmt, '@STORE', $_COOKIE['username'], SQLVARCHAR, false, false, 255);
$result = mssql_execute($stmt);
$row_profile_data = mssql_fetch_assoc($result);
echo '<h1>Stored procedure error: </h1>';
var_dump(mssql_error())
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<title>MY PROFILE</title>
<style type="text/css">
body {font-family: "Century Gothic" !important;}
td {position: relative;}
td input {position: relative; width: 100%;font-family: "Century Gothic" !important;}
td input[type="radio"]{display: inline-block; float: left; width:50%; }
td label {float: left; display: inline-block;}
.style1 {color: #990000}
.style7 {font-family: "Century Gothic"}
.style9 {font-size: 20px}
.style11 {font-family: "Century Gothic"; font-weight: bold;}
.style12 {font-size: 18px}
.style13 {font-weight: bold}
.style14 {color: #990000; font-weight: bold; }
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
<table style="float:left;margin-left:95px" border="0" align="center" cellpadding="0" cellspacing="0">

<tr>
<td width="325" style="padding-right: 4%;"><span class="style9 style13"><strong><?php echo $_COOKIE['name']; ?></strong> , Store </span><span class="style9"></span> 
         
      <?php 
echo $_COOKIE["username"];
?>
     
      </span>    </td>
      <td width="200px" ><div class="style9" style="border: 3px solid black">
        <div align="center">Edit MY <strong>Profile</strong></div>
      </div></td>
</tr>
</table>
<br/>
<div width=100%;clear:both;"></div><br/>

<br/>

	<a href="home.php" style="float:left;margin-left:0;">
      <button style="border:0; background:transparent; float:left; margin-left:-12px;"><img src="buttons/Return.png"/></button>
	</a>
<form action="update_store.php" method="POST">
    <a href="">
    <button style="border:1px solid black; background:transparent; float:right; onclick="documents.forms[0].submit();"><img src="buttons/Save.png" width="80" height="40"/></button>
  </a>
  <a href="">
    <button style="border:1px solid black; background:transparent; float:right; onclick="window.print();"><img src="buttons/Print.png" width="80" height="40"/></button>
  </a>

  
  <!--<a href=""><button onclick="window.print();"><span style="border:0; background:transparent; float:right;"><img src="buttons/Print.png" width="185" height="43"/></span></button></a>
  
    <!--<button style="float: right;" onclick="document.forms[0].submit();"><img src="buttons/Save.png"/></button>
  <!--<input type="submit" value="Save" style="float:right;"/>
  <button style="float:right;" onclick="window.print()"><img src="buttons/Print.png"/></button>-->

    <div style="clear:both;"></div>
	<!--
	 main data table --> 
		<table width="96%" border="" align="center" cellpadding="0" cellspacing="0" style="width:100%; float:left;">
			<tr><th></th><th></th>
			<th colspan="4">IMPRINTS</th>
			</tr>
			<tr><th></th><th></th><th>Ver 1</th><th>Ver 2</th><th>Ver 3</th><th>Ver 4</th></tr>
<?php
	function make_null_array($num){
		$null_array = array('imprint' => array());
		for ($i = 0; $i < $num; $i++){
			array_push($null_array['imprint'], array());
		}
		return $null_array;
	}
	$IMPRINT_NUM = 4;
	$headers = array('STORE_NUMBER', 'STORE NAME', 'STORE TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL CODE', 'PROVINCE', 'CONTACT1',
					'PHONE1', 'EMAIL1', 'CONTACT2', 'PHONE2', 'EMAIL2', 'FAX', 'WEBSITE', 'HOURS', 'LANGUAGE', 
					'DISTRIBUTION PREFERENCE'); //, 'COVERAGE');
	$col_names = array('STORE', 'STORE_NAME', 'STORE_TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL', 'PROVINCE',
					  'CONTACT1', 'PHONE1', 'EMAIL1', 'CONTACT2', 'PHONE2', 'EMAIL2', 'FAX', 'WEBSITE', 'HOURS',
					  'LANGUAGES', 'CANADA_POST'); //, 'COVERAGE');
	$imprint_data = ($row_profile_dat['IMPRINT'] == null) ? make_null_array($IMPRINT_NUM) : json_decode($row_profile_dat['IMPRINT'], true);
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
						  <label>French<input type="radio" name="LANGUAGES" value="french"/></label>
						  <label>Bilingual<input type="radio" name="LANGUAGES" value="bilingual"/></label></td>';
				} elseif ($row_profile_dat['LANGUAGES'] == 'french') {
					echo '<label>English<input type="radio" name="LANGUAGES" value="english"/></label>
						  <label>French<input type="radio" name="LANGUAGES" value="french" checked/></label>
						  <label>Bilingual<input type="radio" name="LANGUAGES" value="bilingual"/></label></td>';
				} elseif ($row_profile_dat['LANGUAGES'] == 'bilingual') {
					echo '<label>English<input type="radio" name="LANGUAGES" value="english"/></label>
						  <label>French<input type="radio" name="LANGUAGES" value="french"/></label>
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
					   <label>Newspaper<input type="radio" name="CANADA_POST" value="0"/></label>
					   <label>Both<input type="radio" name="CANADA_POST" value="2"/></td>';
				} elseif ($row_profile_dat["CANADA_POST"] == 0) { 
				    echo 
					  '<label>Canada Post<input type="radio" name="CANADA_POST" value="1"/></label>
					   <label>Newspaper<input type="radio" name="CANADA_POST" value="0" checked/></label>
					   <label>Both<input type="radio" name="CANADA_POST" value="2"/></td>';
				} else {
					echo
						'<label>Canada Post<input type="radio" name="CANADA_POST" value="1"/></label>
						<label>Newspaper<input type="radio" name="CANADA_POST" value="0"/></label>
						<label>Both<input type="radio" name="CANADA_POST" value="2" checked/></td>';
				}
			} else {
				if ($col_names[$i] == 'STORE_NUMBER'){
					echo '<td><input name="'.$col_names[$i].'" value="'.$row_profile_dat[$col_names[$i]].'" readonly></td>';
				} else {
					echo '<td><input name="'.$col_names[$i].'" value="'.$row_profile_dat[$col_names[$i]].'"></td>';
				}
				for ($j = 0; $j < $IMPRINT_NUM; $j++)
				{
					if (in_array($col_names[$i], $imprint_data['imprints'][$j])){
						echo '<td><input type="checkbox" name="'.$col_names[$i].'_imprint_'.$j.'" checked="checked"></td>'; 
					} else {
						echo '<td><input type="checkbox" name="'.$col_names[$i].'_imprint_'.$j.'"></td>';
					}
				}
			}
			echo '</tr>';
		}
		foreach ($images as $key => $value) {
			echo '<tr><td>'.ucwords(strtolower($key)).'</td><td></td>';
			for ($j = 0; $j < $IMPRINT_NUM; $j++){
				if (in_array($key, $imprint_data['imprints'][$j])){
					echo '<td><input type="checkbox" name="'.$key.'_imprint_'.$j.'" checked="checked"></td>'; 
				} else {
					echo '<td><input type="checkbox" name="'.$key.'_imprint_'.$j.'"></td>';
				}
			}
			echo '</tr>';
		}
	?>
  </table>
</form>

</body>
<br/><br/>

</html>
<?php
mysql_free_result($profile_dat);
?>
</div>
