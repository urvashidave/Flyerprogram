<?php 
session_start();
if (!isset($_SESSION['MM_Username']) && $_SESSION['MM_storename'] == true) {
    header("Location: login.php");
    exit;
}
require_once('Connections/User_Information.php');
$type = $_REQUEST['type'];

$titles = array(
	'CA' => "<b>2017 Catalogue Program</b>",
	'NF' => "<b>2017 National Flyer Program</b>",
	'OF' => "<b>2017 Optional Program</b>"
);
$title = $titles[$type];
$connectionInfo = array( "Database" => $database_User_Information, "UID" => $username_User_Information, "PWD" => $password_User_Information, "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($hostname_User_Information, $connectionInfo);	
if( $conn === false )
{
	die('mssql not connecting : ' . sqlsrv_errors());
}
$values_to_call = "'".$_COOKIE['storename']."','".$_COOKIE['username']."','".$type."'";

$params[] = "CLIENT_CODE";
$params[] = "STORE";
$params[] = "EVENT";
$tsql_callSP = "EXEC DEALER.DBO.p_Loading_Flyer_Program  $values_to_call ";
	
$stmt3 = sqlsrv_query($conn, $tsql_callSP, $params);

if ($stmt3 === false) {
	die(print_r(sqlsrv_error(), true));
}


 


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
    width: 54px;
}

img {
    cursor: pointer;
	cursor: hand;
}
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    padding: 3px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
#update {
    background-color: #31B0D5;
}
.row {
    margin-right: 8px !important;
    margin-left: 19px !important;
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
.style7 {font-family: Arial Narrow,Arial,sans-serif;}
.style8 {color: #990000; font-weight: bold; font-family: "Century Gothic"; }
.style9 {font-size: 20px; padding-left: 20px; padding-right: 20px; border-sizing: border-box;}
.style11 {font-family: "Century Gothic"; font-weight: bold;}
.style12 {font-size: 18px}

.style13 {color: #000000}
a,button {
 cursor: pointer !important;
}
</style>
<script type="text/javascript">

$(document).ready(function() {

     var getQtyval = $("#qty_hidden").val();
  
     $("#inputUpdate").val(getQtyval);
    $("#update").click(function(){
      $("#loading-excel").show();
        var countries = [];

        $.each($("select option:selected"), function(){            

            var gandu = $(this).val();
            var getVal = $("#inputUpdate").val();
            if(gandu == 'Y'){
            var pn = $(this).closest('td').next('td').find("input").val(getVal);
           
            }
            else{
            gandu = $(this).val('');
            var pn = $(this).closest('td').next('td').find("input").val(0);
            }
            countries.push($(this).val());
            
            //alert(gandu);
            

        });

    });

});

</script>

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
			<table class="responsive-table" width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
			  <tr>
				<td width="95"><div align="right"><img src="Images/banner sice 2.png"  width="93" height="82" /></div></td>
				<td width="337"><img src="logos/HH.png" class="img-responsive1" width="333" height="95" /></td>
				<td width="100%"><img src="Images/BANNER5SLICE.jpg" width="98%" height="76"></td>
			  </tr>
			</table>
		</div>
	</div>		
</div>
<!--banner wrapper end-->
</body>