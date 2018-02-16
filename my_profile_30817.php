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
if (isset($_POST["mycpc_0"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_1"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_2"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_3"])) $post_details[] = 1; else $post_details[] = 0;

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

if (isset($_POST["mycpc_4"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_5"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_6"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_7"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_8"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_9"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_10"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_11"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_12"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_13"])) $post_details[] = 1; else $post_details[] = 0;
if (isset($_POST["mycpc_14"])) $post_details[] = 1; else $post_details[] = 0;


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

// names - no longer used
/*
$mycpcn[] = "CPC HOMES"; 
$mycpcn[] = "CPC APTS"; 
$mycpcn[] = "DIST HOMES"; 
$mycpcn[] = "DIST APTS";
*/

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


mysql_select_db($database_User_Information, $User_Information);

$query_profile_dat = "SELECT * FROM ON_STORES WHERE STORE = '".$_COOKIE['username']."' LIMIT 1";
$profile_dat = mysql_query($query_profile_dat, $User_Information) or die(mysql_error());
$row_profile_dat = mysql_fetch_assoc($profile_dat);
$totalRows_profile_dat = mysql_num_rows($profile_dat);


 //$connectionInfo = array( "Database" => "DEALER", "UID" => "sa", "PWD" => "50nerfdarts", "CharacterSet" => "UTF-8");
//$conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);

			
$connectionInfo = array( "Database" => "DEALER", "UID" => "hmsservice", "PWD" => "Retail@Marketing1", "CharacterSet" => "UTF-8");
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
	input {
		border:0;
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
	 cursor: url("images/circle.png"), auto !important;
	}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	
 
</head>




<body>

<div class="container-fluid" align="left"> 
    <div class="row">
        <div class="">
			<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
			  <tr>
				<td width="95"><div align="right"><img src="Images/banner sice 2.png"  width="93" height="82" /></div></td>
				<td width="337"><img src="logos/HH.png" class="" width="333" height="95" /></td>
				<td width="100%"><img src="Images/BANNER5SLICE.jpg" width="967" height="76"></td>
			  </tr>
			</table>
		</div>
	</div>		
</div>

<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<table width="100%" style="" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="10%"></td>
				<td style="padding-right: 4%;" width="25%">
					<p style="margin: 0; padding: 0;text-align:left;width:250px;"><strong><?php echo $_COOKIE['name']; ?>,</strong></p>
					<p style="margin: 0; padding: 0;text-align:left;">Store <?php echo $_COOKIE["username"]; ?></p>
				</td>
				<td style="" width="25%">
					<div class="box" style="width:320px;"> 
						<div align="center" class="style9"><strong>MY PROFILE</strong> </div>
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
			<div width="100%;clear:both;">
				<a href="home.php" style="float:left;margin-left:0;">
				  <button class="btn btn-danger" style=""><b>RETURN</b></button>
				</a>
			</div>
			<div align="right">
				<a href="my_profile_edit.php">
					<button class="btn btn-primary " ><b>EDIT PROFILE</b></button>
				</a>	
				<a href="edit_password.php">
					<button class="btn btn-primary "  ><b>EDIT PASSWORD</b></button>
				</a>
			</div>
			<br>
			<div style="clear:both;"></div>
			<div id="tablearea">
			  
				<!-- main data table --> 
				<table class="table table-bordered table-inverse single-border" style="width:100%; float:left;" border="" align="center" cellpadding="0" cellspacing="0">
					<tr>
					  <th style="border:1px solid black;"> </th><th style="border:1px solid black;"></th>
					<th colspan="4" style="border:1px solid black;"><strong>IMPRINTS</strong></th>
					</tr>
					<tr style="border:1px solid black;">
					<th style="border:1px solid black;"></th>
					<th style="border:1px solid black;"><label for="edit_detail"></label></th>
					<th align='center' style="border:1px solid black;"><strong>Ver 1</strong></th>
					<th style="border:1px solid black;"><strong>Ver 2</strong></th>
					<th style="border:1px solid black;"><strong>Ver 3</strong></th>
					<th style="border:1px solid black;"><strong>Ver 4</strong></th>
					</tr>
					<tr>
					  <th colspan="6" style="border:1px solid black;"></th>
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
			?>
				<?php
				
					for ($i = 0; $i <= 1 ; $i++) {
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						if($bmyimprint1[$i]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmyimprint2[$i]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmyimprint3[$i]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmyimprint4[$i]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						echo '</tr>';
					}
					for ($i = 2; $i <= 2 ; $i++) {
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
					}
					$ii = 2;
					for ($i = 3; $i <= 7 ; $i++) {
						
						echo '<tr><td>'.$headers[$i].'</td>';
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
					
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
						
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = '" . $brow_profile_dat[$i] . "' /> </td>";
					
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
						echo "<td><input type='text' readonly name='edit_detail" . $i . "'  id='edit_detail" . $i . "' value = " . $brow_profile_dat[$i] . " /> </td>";

						echo "<td>&nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
					}
					
					echo '<tr>';
					echo "<td colspan='6'</td>";
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
						if($bmycpc[0]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[1]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[4]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
						
						echo '<tr><td>National Program</td>';
						echo "<td>Distributor</td>";
						if($bmycpc[2]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[3]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						echo "<td>N/A</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
						
						echo '<tr><td>Optional Program</td>';
						echo "<td>Canada Post</td>";
						if($bmycpc[5]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[6]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[9]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
						
						echo '<tr><td>Optional Program</td>';
						echo "<td>Distributor</td>";
						if($bmycpc[7]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[8]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						echo "<td>N/A</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';

						echo '<tr><td>Catalogue Program</td>';
						echo "<td>Canada Post</td>";
						if($bmycpc[10]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[11]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[14]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
					
						echo '<tr><td>Catalogue Program</td>';
						echo "<td>Distributor</td>";
						if($bmycpc[12]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						if($bmycpc[13]>0) echo "<td align='center'><img src='check.png' width='16' height='16' alt='check' /></td>"; else echo "<td> &nbsp;</td>";
						echo "<td>N/A</td>";
						echo "<td> &nbsp;</td>";
						echo '</tr>';
					

				?>
			  </table>
			</div>
		</div>
	</div>	
</div>		

</body>

</html>
<?php
mysql_free_result($profile_dat);
?>
</div>
