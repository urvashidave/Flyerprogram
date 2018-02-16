<?php require_once('Connections/User_Information.php'); ?>
<?php
mysql_select_db($database_User_Information, $User_Information);
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
 	

<title>National Flyer Calendar</title>

<style type="text/css">
<!--
.style1 {color: #990000}
.style7 {font-family: "Century Gothic"}
.style9 {font-size: 20px}
.style11 {font-family: "Century Gothic"; font-weight: bold;}
.style12 {
	font-size: 18px;
	border-color: black;
}
body,td,th {
	font-family: Century Gothic;
	font-size: 18px;
	border-color: black;
}
#box{
width:auto;
}
.style13 {font-weight: bold}
-->
</style>
<script>
function myFunction() {
	window.print();
}
</script>



<link rel="stylesheet" type="text/css" href="css/main.css" />


</head>

<body>
<div class="container row col-md-12 print_pages align="left""> 

<div class="container row col-md-12 print_pages align="left""> 
<div style="width:100%;">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="95"><div align="right"><img src="Images/banner sice 2.png" width="93" height="82" /></div></td>
    <td width="337"><img src="logos/HH.png" width="333" height="95" /></td>
    <td width="100%"><img src="Images/BANNER5SLICE.jpg" width="967" height="76" /></td>
  </tr>
</table>
</div>

<table width="332" cellspacing="2" cellpadding="2">
  <tr>
  </tr>
</table>
<br/>

<table style="float:left;margin-left:95px" border="0" align="center" cellpadding="0" cellspacing="0">

<tr>
<td width="325" style="padding-right: 4%;"><span class="style9 style13"><strong><?php echo $_COOKIE['name']; ?></strong> , Store </span><span class="style9"></span> 
         
      <?php 
echo $_COOKIE["username"];
?>
     
      </span>    </td>
      <td width="200px" ><div class="style9" style="border: 3px solid black">
        <div align="center">MY <strong>Program</strong></div>
      </div></td>
</tr>
</table>
<br/><br/>
<div width=100%;clear:both;"></div><br/>


 	<a href="home.php" style="float:left;margin-left:0;">
      <button style="border:0; background:transparent; float:left; margin-left:-12px;"><img src="buttons/Return.png"/></button>
	</a>
	    <div align="right">
   
    <button style="border:0; " onclick="window.print()" background:transparent; float:right; margin-right:0px;"><img src="buttons/Print.png"/></button>
 
</div>
</tr>
</table>

       <script>
   function printTable(){
   }
   </script>

<div style="clear:both;"></div>
   <table class="single-border" style="width:100%"  height="129" cellpadding="2" cellspacing="1">
  <tr>
    <td width="255" class="style1"><div align="center" class="style11">
      <div align="center"><span class="style5">Promotion</span></div>
    </div></td>
    <td width="303" class="style1"><div align="center" class="style11">
      <div align="center"><span class="style5">DESCRIPTION</span></div>
    </div></td>
    <td width="100" class="style1"><div align="center" class="style11">
      <div align="center"><span class="style5">Market</span></div>
    </div></td>
    <td width="123" class="style1"><div align="center" class="style11">
      <div align="center">QUANTITY</div>
    </div></td>
    <td width="110" class="style1"><div align="center" class="style11">
      <div align="center"><span class="style5">STORE COPY </span></div>
    </div></td>
    <td width="95" class="style1"><div align="center" class="style11">
      <div align="center"><span class="style5">PRINT COST </span></div>
    </div></td>
    <td width="145" class="style1"><div align="center" class="style11">
      <div align="center"><span class="style5">DISTRIBUTION COST </span></div>
    </div></td>
    <td width="100" class="style1"><div align="center" class="style11">
      <div align="center">TOTAL COST </div>
    </div></td>
    <td width="129" class="style1"><div align="center" class="style7 style10 ">
	      <div align="center"><strong>COMMENTS</strong></div>
    </div></td>
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
  
  do {
	  if ($row_Recordset2['EVENT_TYPE'] != $current_flyer){
	    if ($total_cost != null) {
			echo '<tr><td colspan="2"></td>
				<th>Total</th><td>'.$tmp_qty.'</td>
				<td>'.$tmp_store.'</td>
				<td>'.$tmp_print_cost.'</td>
				<td>'.$tmp_distribution_cost.'</td>
				<td>'.$tmp_cost.'</td><td colspan="1000"></td></tr>';
		} else {
			$total_cost = 0;
		}
		echo '<tr><th colspan="1000">'.$flyer_types[$row_Recordset2['EVENT_TYPE']].'</th></tr>';
		$current_flyer = $row_Recordset2['EVENT_TYPE'];
		$tmp_cost = 0;
		$tmp_store = 0;
		$tmp_qty = 0;
		$tmp_print_cost = 0;
		$tmp_distribution_cost = 0;
	  } 
  ?>
    <tr>
        <td class="style7" >
	 <span class="style7"><?php echo $row_Recordset2['EVENT_NUMBER']; ?></span></td>
      <td class="style7"><div align="center" class="style9 style12">
        <div align="left"><?php echo $row_Recordset2['EVENT_DESCRIPTION']; ?></div>
      </div>
      <td class="style7"><div align="center" class="style9 style12"><?php echo $row_Recordset2['CITY']; ?></div></td>
    <td class="style7"><div align="center" class="style9 style12"><?php echo $row_Recordset2['qty']; ?></div></td>
     <td class="style7"><div align="center" class="style9 style12"><?php echo $row_Recordset2['store_qty']; ?></div></td>
      <td class="style7"><div align="center" class="style9 style12"><?php echo $row_Recordset2['TOTAL_PRINT_COST']; ?></div></td>
        <td class="style7"><div align="center" class="style9 style12"><?php echo $row_Recordset2['TOTAL_DISTRIBUTION_COST']; ?></div></td>
      <td class="style7"><div align="center" class="style9 style12">
	    <?php echo $row_Recordset2['TOTAL_PRINT_COST'] + $row_Recordset2['TOTAL_DISTRIBUTION_COST']; ?>
	   </div></td>
	   <?php 
	   		$total_cost += $row_Recordset2['TOTAL_PRINT_COST'] + $row_Recordset2['TOTAL_DISTRIBUTION_COST'];
			$tmp_cost += $row_Recordset2['TOTAL_PRINT_COST'] + $row_Recordset2['TOTAL_DISTRIBUTION_COST'];
			$tmp_print_cost += $row_Recordset2['TOTAL_PRINT_COST'];
			$total_print_cost += $row_Recordset2['TOTAL_PRINT_COST'];
			$tmp_distribution_cost += $row_Recordset2['TOTAL_DISTRIBUTION_COST'];
			$total_distribution_cost += $row_Recordset2['TOTAL_DISTRIBUTION_COST'];
			$tmp_store +=  $row_Recordset2['store_qty'];
			$total_store += $row_Recordset2['store_qty'];
			$tmp_qty += $row_Recordset2['qty'];
			$total_qty += $row_Recordset2['qty'];
		?>
      <td class="style7"><div align="center" class="style9 style12"></div></td>
    </tr>
    <?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
		<tr>
		<?php 
			echo '<td colspan="2"></td>
				<th>Total</th><td>'.$tmp_qty.'</td>
				<td>'.$tmp_store.'</td>
				<td>'.$tmp_print_cost.'</td>
				<td>'.$tmp_distribution_cost.'</td>
				<td>'.$tmp_cost.'</td><td colspan="1000"></td>';
			echo '<tr><td colspan="2"></td>
				<th>Total</th><td>'.$total_qty.'</td>
				<td>'.$total_store.'</td>
				<td>'.$total_print_cost.'</td>
				<td>'.$total_distribution_cost.'</td>
				<td>'.$total_cost.'</td><td colspan="1000"></td></tr>';
		
		?>
	</tr>
	
</table>

</div>
</body>

</html>

<?php
mysql_free_result($Recordset2);
?>
