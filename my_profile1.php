<?php
	//$connectionInfo = array( "Database" => "dbname", "UID" => "username", "PWD" => "password", "CharacterSet" => "UTF-8");
	$connectionInfo = array( "Database" => "DEALER", "UID" => "sa", "PWD" => "50nerfdarts", "CharacterSet" => "UTF-8");
	//$con = sqlsrv_connect("ipaddress", $connectionInfo);
	$con = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);
	if( $con === false )
	{
  		die('Not working ABL: ' . sqlsrv_errors());
	}
	echo'Successful connection';
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
