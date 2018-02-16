<?php
session_start();
if (!isset($_SESSION['MM_Username']) && $_SESSION['MM_storename'] == true) {
    header("Location: index.php");
    exit;
}
if (($_COOKIE['username']=='') && $_COOKIE['storename'] == '') {
    header("Location: index.php");
    exit;
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
	
  $logoutGoTo = "index.php";
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
	

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Successfull Login</title>
<style type="text/css">
.style1 {color: #0000FF}
.style11 {
	font-family: "Century Gothic";
	font-size: 17px;
	font-weight: bold;
}
.row {
    margin-right: 8px !important;
    margin-left: 19px !important;
}
.style12 {
	color: #000000;
	font-size: 18px;
}
.style13 {
	font-size: 18px;
	font-family: "Century Gothic";
}
.style16 {
	font-family: "Century Gothic";
	font-size: 20px;
}
.style17 {
	font-size: 18px;
	font-family: "Century Gothic";
}
.style7 {font-family: Arial, Helvetica, sans-serif; font-size: 24px; }
.style19 {
	color: #000000;
	font-size: 20px;
	font-family: "Century Gothic";
}
.hover:hover{
background-color:#D9EDF7;
text-decoration: none;
}

a:focus, a:hover{
text-decoration:none !important;

}
@media screen and (max-width: 700px) {
  #container, #header, #content, #footer {
    float: none;
    width: auto;
  }
 #subtitle, #share, #slider, #sidebar{
    display:none;
  }
  p{ font-size: 2em; }
}

@media screen and (min-width:10px) and (max-width:640px) {
.leftSideBar{display:none !important;}
.rightSideBar{display:none !important;}
}

@media print {
	a[href]:after {
		content: none !important;
	}
}


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
</style>
</head>

<body>
<?php include("banner.php");?>

<br/>
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<table width="100%" style="" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-right: 4%;" width="100%">
					<h3 style="margin: 0; padding: 0;text-align:left;">Welcome: <b><?php echo $_COOKIE["name"]; ?></b>, Store 
					<?php 
						echo $_COOKIE["username"];
					?>
					</h3>
				</td>
			</tr>
			</table>
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<table width="100%" style="" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td style="padding-right: 4%;" width="100%" align="center">
					<h3><span >Where would <b>you</b> like to go</span>:</h3> 
				</td>
			</tr>
			</table>
		</div>
	</div>
</div>
<div class="container">    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
				<table class="table table-bordered table-inverse" style="width:100%"  cellpadding="2" cellspacing="0">
				<tr>
					<td align="center" class="hover"><a href="Flyer_Promotions.php?type=NF" style="font-size:24px;color:black;"  class="style7 circle">2017 NATIONAL <b>FLYER</b> PROGRAM </a></td>
				</tr>
				<tr>
					<td align="center" class="hover"><a href="Flyer_Promotions.php?type=OF" style="font-size:24px;color:black;" class="style7">2017 OPTIONAL PROGRAM</a></td>
				</tr>
				<tr>
					<td align="center" class="hover"><a href="Flyer_Promotions.php?type=CA" style="font-size:24px;color:black;" class="style7">2017 CATALOGUE PROGRAM</a></td>
				</tr>
        
        <tr>
        <td align="center" class="hover"><a href="Flyer_Promotions.php?type=VE" style="font-size:24px;color:black;" class="style7">2017 VENDOR SPONSORED PROGRAM
        </a></td></tr>        
				<tr>
					<td align="center" class="hover"><a href="my_program.php" style="font-size:24px;color:black;" class="style7">MY PROGRAM</a></td>
				</tr>
        <tr>
					<td align="center" class="hover"><a href="my_dist.php" style="font-size:24px;color:black;" class="style7">MY DISTRIBUTION</a></td>
				</tr>
				<tr>
					<td align="center" class="hover"><a href="my_profile.php" style="font-size:24px;color:black;" class="style7">MY PROFILE</a></td>
				</tr>
				<tr>
					<td align="center" class="hover"><a href="my_imprint.php" style="font-size:24px;color:black;" class="style7">MY IMPRINT</a></td>
				</tr>
				<tr>
					<td align="center" class="hover"><a href="print_adv.php" style="font-size:24px;color:black;" class="style7">PRINT ADVERTISING PROGRAM</a></td>
				</tr>
				
			</table>
		</div>
	</div>
</div>	

<div align="center"> 
	<p align="center" class="style1">
		<a href="<?php echo $logoutAction ?>" class="btn btn-primary" style="">Log out</a> 
	</p>
</div>
</div>
</body>
</html>

