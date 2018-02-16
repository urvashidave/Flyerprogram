<?php 

session_start();
if (!isset($_SESSION['MM_Username']) && $_SESSION['MM_storename'] == true) {
    header("Location: index.php");
    exit;
}

require_once('Connections/User_Information.php'); 

$connectionInfo = array( "Database" => $database_User_Information, "UID" => $username_User_Information, "PWD" => $password_User_Information, "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($hostname_User_Information, $connectionInfo);	
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.2.5/css/tableexport.min.css">

 <script type="text/javascript">

$(document).ready(function() {
 function ExportTable(){
 $("#table1").tableExport({
 headings: true,                    // (Boolean), display table headings (th/td elements) in the <thead>
 footers: true,                     // (Boolean), display table footers (th/td elements) in the <tfoot>
 formats: ["xls", "csv", "txt"],    // (String[]), filetypes for the export
 fileName: "flyerPromotion",                    // (id, String), filename for the downloaded file
 bootstrap: true,                   // (Boolean), style buttons using bootstrap
 position: "well" ,                // (top, bottom), position of the caption element relative to table
 ignoreRows: 10,                  // (Number, Number[]), row indices to exclude from the exported file
 ignoreCols: 10,   
 trimWhitespace: true,              // (Number, Number[]), column indices to exclude from the exported file
 ignoreCSS: ".tableexport-ignore"   // (selector, selector[]), selector(s) to exclude from the exported file
 });
 }
 
   ExportTable();
});
</script>


<title>MY PROGRAM </title>


<style type="text/css">


/*
.table-scroll tbody {

    position: absolute;
    overflow-y: scroll;
    height: 500px;
    width:100%;
}*/

.row{
margin-right: 8px !important;
    margin-left: 19px !important;
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
.style7 {font-family: "Helvetica Neue",Helvetica,Arial,sans-serif}
a,button {
 cursor: pointer !important;
}
.totals{

background-color:#D9EDF7;

}
.center{

top: -7% !important;

}
/*td, th {
    width: 14%;
}*/

</style>
</head>
<body>

<?php include("banner.php");?>
<script src="https://cdn.rawgit.com/eligrey/FileSaver.js/e9d941381475b5df8b7d7691013401e171014e89/FileSaver.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.5/js/tableexport.min.js"></script>
<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<table width="100%" style="" border="0" align="centre" cellpadding="0" cellspacing="0">
			<tr>

				<td style="width:32%">
					<p style="text-align:left;font-size:20px;"><strong><?php echo $_COOKIE['name']; ?>,</strong>
					Store <?php echo $_COOKIE["username"]; ?></p>
				</td>
				<td style="border:2px solid black;margin-bottom:20px;width:40%;float:left;margin-left:25px">
					<div class="box" > 
						<div align="center" class="style9"><strong>My Program </strong>  </div>
					</div>
				</td>
	
			</tr>
			</table>
		</div>
	</div>
</div>	

<div width="100%;clear:both;">
				<a href="home.php" style="float:left;margin-left:50px;">
				  <button class="btn btn-danger" style=""><b>RETURN</b></button>
				</a>
			</div>
			<div align="right" style="margin-right:50px";>
				<button class="btn btn-primary " onclick="printDiv('tablearea','');" ><b>PRINT</b></button>
			</div>
			<br>
<div class="container-fluid">    
    <div class="row">
        <div class="col-md-12">
			<div id="tablearea">
			 <table width="100%" id="table1" class="display table table-scroll table-striped responsive-table" border="1">
        <thead>
			  <tr class="">
				<th  class="bg-info" style="border:1px solid black;">Promotion</th>
				<th class="bg-info" style="border:1px solid black;">Description</th>
				<th class="bg-primary" style="border:1px solid black;">Market</th>
				<th class="bg-primary" style="border:1px solid black;">Quantity</th>
				<th class="bg-success" style="border:1px solid black;">Store Copy</th>
				<th class="bg-success" style="border:1px solid black;">Print Cost </th>
				<th class="bg-warning" style="border:1px solid black;">Distribution Cost</th>
				<th class="bg-warning" style="border:1px solid black;">Total Cost</th>
				
				
			  </tr>
               </thead>
               <tbody>
              
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
										'CA'=>'Catalogue Program',
                    'VE'=>'Vendor Sponsored Flyer'
										);
//echo count(stmt3);
//$count=0;
			  while ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
//	$count++;
				  //echo $row['EVENT_DESCRIPTION'];
				  if ($row['STORE_TYPE'] != $current_flyer){
					if ($total_cost != null) {
						echo '<tr class="totals"><td></td>
							<td style="border:1px solid black;">Total '.$flyer_types[$current_flyer].'</th><td></td><td class="center">'.number_format($tmp_qty).'</td>
							<td>'.number_format($tmp_store, 0).'</td>
							<td>'.as_dollars($tmp_print_cost).'</td>
							<td>'.as_dollars($tmp_distribution_cost).'</td>
							<td>'.as_dollars($tmp_cost).'</td><td colspan="1000"></td></tr>';
					} else {
						$total_cost = 0;
					}
					echo '<tr><th class="flyer-type-header text-center" colspan="8" style="border:1px solid black;">'.$flyer_types[$row['STORE_TYPE']].'</th></tr>';
					$current_flyer = $row['STORE_TYPE'];
					$tmp_cost = 0;
					$tmp_store = 0;
					$tmp_qty = 0;
					$tmp_print_cost = 0;
					$tmp_distribution_cost = 0;
				  }
				  $trstyle= '';
				  if($row['EVENT_DESCRIPTION']=="TOTAL NATIONAL FLYER" || $row['EVENT_DESCRIPTION']=="TOTAL VENDOR FLYER" || $row['EVENT_DESCRIPTION']=="TOTAL OPTIONAL FLYER" || $row['EVENT_DESCRIPTION']=="TOTAL CATALOG FLYER"){
					  $trstyle= 'font-weight:bold;background-color:#E5E9ED';
				  }
			  ?>
					<tr style="<?=$trstyle?>">
						  <td><?php echo $row['EVENT_NUMBER']; ?></td>
						  <td><?php echo $row['EVENT_DESCRIPTION']; ?></td>
						  <td><?php echo $row['MARKET']; ?></td>
						  <td><?php echo number_format($row['QTY'], 0);?></td>
			        <td><?php echo number_format($row['STORE_COPY'], 0); ?></td>
						  <td><?php echo as_dollars($row['PRINT_COST'], 2); ?></td>
							<td><?php echo as_dollars($row['DISTRIBUTION_COST']); ?></td>
						  <td><?php echo as_dollars($row['PRINT_COST'] + $row['DISTRIBUTION_COST']); ?></td>
						   <?php 
								//$total_cost = $row['PRINT_COST'] + $row['DISTRIBUTION_COST'];
								$tmp_cost = $row['PRINT_COST'] + $row['DISTRIBUTION_COST'];
								$tmp_print_cost = $row['PRINT_COST'];
								//$total_print_cost = $row['PRINT_COST'];
								$tmp_distribution_cost = $row['DISTRIBUTION_COST'];
								//$total_distribution_cost = $row['DISTRIBUTION_COST'];
								$tmp_store =  $row['STORE_COPY'];
								//$total_store = $row['STORE_QTY'];
								$tmp_qty = $row['QTY'];
								$total2+=$tmp_qty;
								$total=$total2/2;

								$t_st_cpy2+= $tmp_store;
								$t_st_cpy = $t_st_cpy2/2;

								$t_p_cost2+= $tmp_print_cost;
								$t_p_cost = $t_p_cost2/2;

								$d_cost2+= $tmp_distribution_cost;
								$d_cost = $d_cost2/2;

								$t_cost2+= $tmp_cost;
								$t_cost = $t_cost2/2;
							?>
					 
					</tr>
			  <?php	
			  }

echo $count;
			  ?>
					<tr class="totals">
					<?php 

						echo '<td></td>
							<th style="border:1px solid black;">TOTAL PROGRAM</th><td></td><td style="font-weight:bold"> '.number_format($total).'</td>

							<td style="font-weight:bold">'.number_format($t_st_cpy, 2, '.', ',').'</td>
							<td style="font-weight:bold"> $'.number_format($t_p_cost, 2, '.', ',').'</td>
							<td style="font-weight:bold"> $'.number_format($d_cost, 2, '.', ',').'</td>
							<td style="font-weight:bold"> $'.number_format($t_cost, 2, '.', ',').'</td>
              ';
						echo '</tr>';
					
					?>
				</tr>
				
			</table>
      
      
        <script type="text/javascript" src="paginathing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){

		$('.table tbody').paginathing({
	    perPage: 20,
	    insertAfter: '.table'
		});
	});
</script>
      </tbody>
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
