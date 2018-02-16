<?php 
require_once('Connections/User_Information.php');
$type = $_REQUEST['type'];
mysql_select_db($database_User_Information, $User_Information);
$query = sprintf(
  "SELECT p.*, m.qty, m.store_qty,
  (CASE
	      WHEN EXISTS (SELECT 1 FROM ON_STORES WHERE STORE='%s' AND CANADA_POST = 1)
		      THEN p.CPC_COST
   		  WHEN EXISTS (SELECT 1 FROM ON_STORES WHERE STORE='%s' AND CANADA_POST = 2)
              THEN p.CPC_COST + p.DISTRIBUTION_COST 
		  ELSE p.DISTRIBUTION_COST 
	  END) AS TRUE_DISTRIBUTION_COST
  FROM ON_PROMOTIONS p 
  	LEFT JOIN ON_MYPROGRAM m ON p.event_number = m.event_number 
		AND m.STORE = '%s'
  WHERE
    CASE
      WHEN EXISTS (SELECT *
		  FROM ON_STORES 
		  WHERE store = '%s' 
		    and store_description = 'HH DEALERS')
	THEN p.dealer_type LIKE '%%H%%'
      WHEN EXISTS (SELECT *
		  FROM ON_STORES 
		  WHERE store = '%s' 
		    AND store_description = 'HBC DEALERS')
	THEN p.dealer_type LIKE '%%B%%'
      WHEN EXISTS (SELECT *
		  FROM ON_STORES 
		  WHERE store = '%s' 
		    and store_description = 'HHBC DEALERS')
	THEN p.dealer_type LIKE '%%D%%'
      ELSE
	p.client_code = '-1'
    END
    AND p.event_type = '%s'", 
  mysql_real_escape_string($_COOKIE['username']), 
  mysql_real_escape_string($_COOKIE['username']), 
  mysql_real_escape_string($_COOKIE['username']), 
  mysql_real_escape_string($_COOKIE['username']), 
  mysql_real_escape_string($_COOKIE['username']), 
  mysql_real_escape_string($_COOKIE['username']), 
  mysql_real_escape_string($type)
);
$promotion = mysql_query($query, $User_Information) or die(mysql_error());
$row_promotions = mysql_fetch_assoc($promotion);
$totalRows_promotions = mysql_num_rows($promotion);
$titles = array(
	'CA' => "2017 Catalogue Program",
	'NF' => "2017 National <b>Flyer</b> Program",
	'OF' => "2017 Optional <b>Flyer</b> Program"
);
$title = $titles[$type];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<!--<link rel="stylesheet" type="text/css" href="css/main.css" />-->
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<title><?php echo strip_tags($title); ?></title>
<style type="text/css">
td input {
	width: 100px;
}
img {
    cursor: pointer;
	cursor: hand;
}

@media print {
  img {
    max-width: none !important;
  }
}
.borderless{
	border: 0;
	text-align: center;
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
.style1 {color: #990000}
.style7 {font-family: Arial Narrow,Arial,sans-serif}
.style8 {color: #990000; font-weight: bold; font-family: "Century Gothic"; }
.style9 {font-size: 20px; padding-left: 20px; padding-right: 20px; border-sizing: border-box;}
.style11 {font-family: "Century Gothic"; font-weight: bold;}
.style12 {font-size: 18px}

.style13 {color: #000000}
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
				<td width="337"><img src="logos/HH.png" class="img-responsive1" width="333" height="95" /></td>
				<td width="100%"><img src="Images/BANNER5SLICE.jpg" width="967" height="76"></td>
			  </tr>
			</table>
		</div>
	</div>		
</div>
<!--banner wrapper end-->

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
						<div align="center" class="style9"><?php echo $title; ?> </div>
					</div>
				</td>
				<td width="40%"></td>
			</tr>
			</table>
		</div>
	</div>
</div>	
<br/>
<br/>

<div class="container-fluid">    
    <div class="row">
        <div class="col-md-12">
			<?
			if(isset($_GET['msg'])){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Data update successfully.
			</div>
			<?
			}
			?>
            <div class="table-responsive1">
				<div style="postition:relative;" class="style7  style11">
					<a href="home.php" style="float:left;margin-left:0;">
					  <button class="btn btn-danger" style=""><b>RETURN</b></button>
					</a>
				</div>
				<form action="update_event_data.php" method="POST">
					<div align="right">
						<div style="float:right;margin-bottom:5px; margin-left: 8px;"><button class="btn btn-success " onclick="document.forms[0].submit();"><b>SAVE</b></button></div>
						<div style="float:right;margin-bottom:5px; margin-left: 8px;"><button class="btn btn-primary " onclick="printDiv('tablearea','')"><b>PRINT</b></button></div>
					</div>
					<div id="tablearea">
					<table class="table table-bordered table-inverse single-border" cellspacing="0">
						<tr>
							<td class="bg-info" style="max-width:100px; width:100px;"><div align="center" style="max-width:100px;" class="style7"><strong><span class="">Event # </span></strong></div></td>
							<td class="bg-info"><div align="center" class="style7"><strong><span class=""> Description</span></strong></div></td>
							<td  class="bg-info"><div align="center" class="style7"><strong><span class="">Event Type</span></strong></div></td>
							<td  class="bg-info"><div align="center" class="style7"><strong><span class="">Pages</span></strong></div></td>
							<td  class="bg-primary"><div align="center" class="style7"><strong><span class="">Dealer Order Deadline</span></strong></div></td>
							<td  class="bg-primary"><div align="center" class="style7"><strong><span class="">Dealer Re-Order Start Date </span></strong></div></td>
							<td  class="bg-primary"><div align="center" class="style7"><strong><span class="">Re-Order End Date </span></strong></div></td>
							<td  class="bg-primary"><div align="center" class="style7"><strong><span class="">Sales Start</span></strong></div></td>
							<td  class="bg-primary"><div align="center" class="style7"><strong><span class="">Sales End</span></strong></div></td>
							<td  class="bg-success"><div align="center" class="style7"><strong><span class="">1st Flyer Release Date </span></strong></div></td>
							<td  class="bg-success"><div align="center" class="style7"><strong><span class="">Last Flyer Release Date </span></strong></div></td>
							<td  class="bg-success"><div align="center" class="style7"><strong><span class="">Flyer Payment Week </span></strong></div></td>
							<td  class="bg-warning"><div align="center" class="style7"><strong><span class="">Print Cost</span></strong></div></td>
							<td  class="bg-warning"><div align="center" class="style7"><strong><span class="">Disribution Cost</span></strong></div></td>
							<td  class="bg-danger">
								<div align="center" class="style7"><strong>Select </strong> 	        </div>
							<td  class="bg-danger">
								<div align="center" class="style7"><strong>Quantity</strong>      </div>
							</td>
							<td width="55" class="bg-danger">
								<div align="center" class="  style7"><strong>Store Copies</strong>     </div>
							</td> 
						</tr>	
				  <?php $counter = 0;?>
				  <?php do { ?>
					<?php $counter++; ?>
						<tr>
						  <td><input class="borderless" type="text" name="event_number_<?php echo $counter?>" value="<?php echo $row_promotions['EVENT_NUMBER'];?>"readonly /></td>
						
						  <td>
							<div align="center" class="style7">
								<div align="left"><?php echo $row_promotions['EVENT_DESCRIPTION']; ?></div>
							</div>
						  </td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['EVENT_TYPE'];?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['PAGE_COUNT']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['DEALER_DEADLINE']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['ORDER_START']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['ORDER_END']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['SALES_START']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['SALES_END']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['FLYER_START']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['FLYER_END']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['PAYMENT']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['PRINT_COST']; ?></div></td>
						  <td><div align="center" class="style7"><?php echo $row_promotions['TRUE_DISTRIBUTION_COST']; ?></div></td>
						  <td><div align="center" class="">
							<span class="style7">
							<select  style class="style7" name="add_event_<?php echo $counter;?>">
							<?php
								if ($row_promotions['qty'] != null) {
									echo ' <option value="Select">Select</option>
										   <option value="Y" selected>Yes</option>
										   <option value="N">No</option>
										 </select>';
								} else {
									echo '  <option value="Select" selected>Select</option>
											<option value="Y">Yes</option>
											<option value="N">No</option>
										  </select>';
								}	
								
							?>
							</span>
							</div>
						  <td>
							<span class="style7">
								<input name="quantity_<?php echo $counter;?>" type="text" value="<?php echo $row_promotions['qty'];?>" class="style7" id="value" size="5">
							</span>
						  </td>
						  <td>
						  <div align="center" class="">
							<span class="style7">
								<input name="store_quantity_<?php echo $counter;?>" type="text" value="<?php echo $row_promotions['store_qty'];?>" class="style7" id="value" size="5">
							</span>
						  </div>	
						  </td>
						</tr>
					<?php } while ($row_promotions = mysql_fetch_assoc($promotion)); ?>
					</table>
					</div>
					<input type="hidden" name="row_count" value=<?php echo $counter;?>>
					<input type="hidden" name="store_id" value="<?php echo $_COOKIE["username"]?>">
					<input type="hidden" name="flyer-type" value="<?php echo $type; ?>">
			</form>
			<br />
		</div>
	</div>
	</div>
</div>
</body>
</html>
<?php
mysql_free_result($promotion);
?>
