<?php

if (!isset($_SESSION)) {
  session_start();
}


$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){

  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";


function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 

  $isValid = False; 

  if (!empty($UserName)) { 

    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 

    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "access_denied.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" type="text/css" media="only screen and (max-device-width: 480px)" href="dev.css" />
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<style type="text/css">
<!--
.style1 {font-family: Geneva, Arial, Helvetica, sans-serif}
-->
</style>
<link href="*" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style6 {font-family: Arial, Helvetica, sans-serif}
.style7 {font-family: Arial, Helvetica, sans-serif; font-size: 24px; }
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Successfull Login</title>
<style type="text/css">
<!--
.style1 {color: #0000FF}
-->
</style>
</head>

<body>
<table width="1348" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="479"><div align="right"><img src="Images/banner sice 2.png" width="374" height="82" /></div></td>
    <td width="397"><img src="logos/HH.png" width="397" height="107" /></td>
    <td width="2183"><img src="Images/banner sice 2.png" width="564" height="84"82" /></td>
  </tr>
</table>

  <br />  <br />
  <table width="50" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  <div>
    <div align="center"><span class="style7">Where would <strong>you</strong> like to go</span>:</div>
  </div>
  
  </tr>
</table><br/>



  <table  width="419" height="116" border="1" align="center" cellpadding="3" cellspacing="0">
<tr class="">
    <td><div align="center"><a href="Flyer_Promotions.php" class="style7" >2017 National FLYER Calendar</a></div></td>
  </tr>
<tr class="">
    <td><div align="center"><a href="my_program.php" class="style7" >MY PROGRAM</a></div></td>
  </tr>
<tr class="">
    <td><div align="center"><a href="my_profile.php" class="style7" >MY PROFILE</a></div></td>
  </tr>
</table>
<div align="center"> 

  <p align="center" class="style1"><br/>
  <a href="<?php echo $logoutAction ?>" class="style6">Logout</a> </p>
 
</div>
</body>
</html>

