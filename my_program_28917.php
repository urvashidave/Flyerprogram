<?php //require_once('Connections/User_Information.php'); ?>
<?php
/*mysql_select_db($database_User_Information, $User_Information);
$query_Recordset2 = 
  "SELECT p.*, m.qty, m.store_qty, s.CITY AS CITY, s.CANADA_POST as CANADA_POST,
  	  p.PRINT_COST * (m.QTY + m.STORE_QTY)/1000 AS TOTAL_PRINT_COST,
	  (CASE
	      WHEN s.CANADA_POST = 1
		      THEN p.CPC_COST
		  ELSE p.DISTRIBUTION_COST
	  END) AS TRUE_DISTRIBUTION_COST,
	  (CASE
	      WHEN s.CANADA_POST = 1
		  	  THEN p.CPC_COST * m.QTY/1000
		  ELSE
		      p.DISTRIBUTION_COST * m.QTY/1000
	   END) AS TOTAL_DISTRIBUTION_COST,
	  (CASE
		  WHEN p.event_type = 'NF'
			  THEN 1
		  WHEN p.event_type = 'OF'
			  THEN 2
		  WHEN p.event_type = 'CA'
			  THEN 3
		  ELSE 4
	  END) _rank
			
  FROM ON_PROMOTIONS AS p, ON_MYPROGRAM m, ON_STORES s  
  WHERE p.EVENT_NUMBER = m.EVENT_NUMBER
  	AND s.STORE = m.STORE
    AND m.STORE = '".$_COOKIE["username"]."'
  ORDER BY _rank ASC, SALES_START DESC, FLYER_START DESC";
  //ORDER BY _rank DESC, RIGHT(DEALER_DEADLINE, 4),EVENT_NUMBER;
  
$Recordset2 = mysql_query($query_Recordset2, $User_Information) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

$totalRows_Recordset2 = mysql_num_rows($Recordset2);
*/
$connectionInfo = array( "Database" => "DEALER", "UID" => "hmsservice", "PWD" => "Retail@Marketing1", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);	
if( $conn === false )
{
	die('mssql not connecting : ' . sqlsrv_errors());
}
$values_to_call = "'".$_COOKIE['storename']."','".$_COOKIE['username']."'";

$params[] = "CLIENT_CODE";
$params[] = "STORE";
$tsql_callSP = "EXEC DEALER.DBO.p_Loading_My_Program	$values_to_call ";
	
$stmt3 = sqlsrv_query($conn, $tsql_callSP, $params);
if ($stmt3 === false) {
	die(print_r(sqlsrv_error(), true));
}
setlocale(LC_MONETARY, 'en_US');
function as_dollars($number) {
	return "$" . number_format((double)$number, 2);
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!--<link rel="stylesheet" type="text/css" href="css/main.css" />-->
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	
 	

<title>MY PROGRAM </title>


<style type="text/css">

img {
    cursor: pointer;
	cursor: hand;
}

.flyer-type-header{
	padding-top: 20px !important;
}

td {text-align: center;}
.totals{
    background-color: #E8E8E8;
	font-weight: bold;
}
@media print {
  img {
    max-width: none !important;
  }
}
.style9 {font-size: 20px; padding-left: 20px; padding-right: 20px; border-sizing: border-box;}
table.table-bordered{
    border:1px solid black;
  }
table.table-bordered > thead > tr > th{
    border:1px solid black;
}
table.table-bordered > tbody > tr > td{
    border:1px solid black;
}
.style7 {font-family: Arial Narrow,Arial,sans-serif}
a,button {
 cursor: pointer !important;
}
</style>
<script>
function myFunction() {
	window.print();
}
function printDiv(x,y)
{

  var divToPrint=document.getElementById(x);
  newWin= window.open("");
   newWin.document.write('<style type="text/css"> .noprint { display: none; } td { text-align:center} #'+x+' { border:thin black solid; border-collapse:collapse } #'+x+' tr { border:thin black solid } #'+x+' tr td  { border:thin black solid ; } #'+x+' tr th  { border:thin black solid } a { text-decoration:none;color:black } </style>');
   newWin.document.write("<h3 style='text-align:center'>"+y+"</h3>");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
}
</script>
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
				<td style="border:3px solid black;" width="25%">
					<div class="box" style="width:320px;"> 
						<div align="center" class="style9"><strong>MY </strong> Program</div>
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
				<button class="btn btn-primary " onclick="printDiv('tablearea','');" ><b>PRINT</b></button>
			</div>
			<br>
			<div style="clear:both;"></div>
			<div id="tablearea">
			 <table class="table table-bordered table-inverse single-border" style="width:100%"  height="129" cellpadding="2" cellspacing="1">
			  <tr>
				<th  class="bg-info" style="border:1px solid black;"><div align="center" class="style11">
				  <div align="center"><span class="style5">Promotion</span></div>
				</div></th>
				<th  class="bg-info" style="border:1px solid black;"><div align="center" class="style11">
				  <div align="center"><span class="style5">Description</span></div>
				</div></th>
				<th  class="bg-primary" style="border:1px solid black;"><div align="center" class="style11">
				  <div align="center"><span class="style5">Market</span></div>
				</div></th>
				<th  class="bg-primary" style="border:1px solid black;"><div align="center" class="style11">
				  <div align="center">Quantity</div>
				</div></th>
				<th  class="bg-success" style="border:1px solid black;"><div align="center" class="style11">
				  <div align="center"><span class="style5">Store Copy </span></div>
				</div></th>
				<th  class="bg-success" style="border:1px solid black;"><div align="center" class="style11">
				  <div align="center"><span class="style5">Print Cost </span></div>
				</div></th>
				<th  class="bg-warning" style="border:1px solid black;"><div align="center" class="style11">
				  <div align="center"><span class="style5">Distribution Cost </span></div>
				</div></th>
				<th  class="bg-warning" style="border:1px solid black;"><div align="center" class="style11">
				  <div align="center">Total Cost </div>
				</div></th>
				<th  class="bg-danger" style="border:1px solid black;"><div align="center" class="style7 style10 ">
					  <div align="center"><strong>Comments</strong></div>
				</div></th>
			  </tr>
			  <?php  /* loop to populate programs, and flyer types are separated by single th row */
			  $current_flyer = '';
			  $total_cost = null;
			  $total_qty = 0;
			  $total_store = 0;
			  $total_print_cost = 0;
			  $total_distribution_cost = 0;
			  $tmp_cost = 0;
			  $tmp_store = 0;
			  $tmp_qty = 0;
			  $tmp_print_cost = 0;
			  $tmp_distribution_cost = 0;
			  
			  $flyer_types = array(
										'NF'=>'National Flyer',
										'OF'=>'Optional Flyer',
										'CA'=>'Catalogue Program'
										);
			  while ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
				  //echo $row['EVENT_TYPE'];
				  if ($row['EVENT_TYPE'] != $current_flyer){
					if ($total_cost != null) {
						echo '<tr class="totals"><td></td>
							<th style="border:1px solid black;">Total '.$flyer_types[$current_flyer].'</th><td></td><td class="center">'.number_format($tmp_qty).'</td>
							<td>'.number_format($tmp_store, 0).'</td>
							<td>'.as_dollars($tmp_print_cost).'</td>
							<td>'.as_dollars($tmp_distribution_cost).'</td>
							<td>'.as_dollars($tmp_cost).'</td><td colspan="1000"></td></tr>';
					} else {
						$total_cost = 0;
					}
					echo '<tr><th class="flyer-type-header text-center" colspan="1000" style="border:1px solid black;">'.$flyer_types[$row['EVENT_TYPE']].'</th></tr>';
					$current_flyer = $row['EVENT_TYPE'];
					$tmp_cost = 0;
					$tmp_store = 0;
					$tmp_qty = 0;
					$tmp_print_cost = 0;
					$tmp_distribution_cost = 0;
				  }
			  ?>
					<tr>
						<td class="style7" >
						 <span class="style7"><?php echo $row['EVENT_NUMBER']; ?></span></td>
						  <td class="style7"><div align="center" class=" style12">
							<div align="left"><?php echo $row['EVENT_DESCRIPTION']; ?></div>
						  </div>
						  <td class="style7"><div align="center" class=" style12"><?php echo $row['MARKET']; ?></div></td>
						<td class="style7"><div align="center" class=" style12"><?php echo number_format($row['QTY'], 0); ?></div></td>
						 <td class="style7"><div align="center" class=" style12"><?php echo number_format($row['store_qty'], 0); ?></div></td>
						  <td class="style7"><div align="center" class=" style12"><?php echo as_dollars($row['PRINT_COST'], 2); ?></div></td>
							<td class="style7"><div align="center" class=" style12"><?php echo as_dollars($row['DISTRIBUTION_COST']); ?></div></td>
						  <td class="style7"><div align="center" class=" style12">
							<?php echo as_dollars($row['PRINT_COST'] + $row['DISTRIBUTION_COST']); ?>
						   </div></td>
						   <?php 
								//$total_cost = $row['PRINT_COST'] + $row['DISTRIBUTION_COST'];
								$tmp_cost = $row['PRINT_COST'] + $row['DISTRIBUTION_COST'];
								$tmp_print_cost = $row['PRINT_COST'];
								//$total_print_cost = $row['PRINT_COST'];
								$tmp_distribution_cost = $row['DISTRIBUTION_COST'];
								//$total_distribution_cost = $row['DISTRIBUTION_COST'];
								$tmp_store =  $row['store_qty'];
								//$total_store = $row['STORE_QTY'];
								$tmp_qty = $row['QTY'];
								//$total_qty = $row['QTY'];
							?>
					  <td class="style7"><div align="center" class=" style12"></div></td>
					</tr>
			  <?php	
			  }
			  ?>
					<tr class="totals">
					<?php 
						echo '<td></td>
							<th style="border:1px solid black;">Total '.$flyer_types[$current_flyer].'</th><td></td><td>'.number_format($tmp_qty, 0).'</td>
							<td>'.number_format($tmp_store, 0).'</td>
							<td>'.as_dollars($tmp_print_cost).'</td>
							<td>'.as_dollars($tmp_distribution_cost).'</td>
							<td>'.as_dollars($tmp_cost).'</td><td colspan="1000"></td>';
						echo '</tr>';
					
					?>
				</tr>
				
			</table>
			</div>
		</div>
	</div>
</div>	
</body>

</html>

<?php
mssqlsrv_free_stmt($stmt3);
//mysql_free_result($Recordset2);
?>
