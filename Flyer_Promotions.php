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
require_once('Connections/User_Information.php');
$type = $_REQUEST['type'];

$titles = array(
	'CA' => "2017 <b>Catalogue</b> Program",
	'NF' => "2017 <b>National</b> Flyer Program",
	'OF' => "2017 <b>Optional</b> Program",
  'VE' => "2017 <b>Vendor</b> Sponsored Flyers"
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
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.2.5/css/tableexport.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

 
<title><?php echo strip_tags($title); ?></title>
<style type="text/css">


/*.table-scroll tbody {

    position: absolute;
    overflow-y: scroll;
    height: 500px;
    width:100%;
}*/

.img-responsive1 {

    border: solid aliceblue;
}
img {
    cursor: pointer;
	cursor: hand;
}
.center{

top: -5% !important;

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
.style7 {font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;}
.style8 {color: #990000; font-weight: bold; font-family: "Century Gothic"; }
.style9 {font-size: 20px; padding-left: padding-left: 32% !important; border-sizing: border-box;}
.style11 {"Helvetica Neue",Helvetica,Arial,sans-serif; font-weight: bold;}
.style12 {font-size: 18px}

.style13 {color: #000000}
a,button {
 cursor: pointer !important;
}
#table1 { table-layout: fixed; }
#table1 th, #table1 td { overflow: hidden; }

.message {
    padding: 5px;
    border: 1px solid transparent;
    border-radius: 4px;
    width: 98%;
    margin-left: 16px;
    margin-right: 24px;
}
.exportExcel{
  padding: 5px;
  border: 1px solid grey;
  margin: 5px;
  cursor: pointer;
}
</style>
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

 
             
              
 $.noConflict();
 
 /* var Table = $('#table1').DataTable({
   
   stateSave: true,
    dom: 'Bfrtip',
   buttons: [
   
   {
                text: 'My button',
                action: function ( e, dt, node, config ) {
                    alert( 'Button activated' );
                }
            },
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
  });
  
   $('#save').click( function() {
        var data = Table.$('input, select').serialize();

         console.log('Submitting data', data);

        // Submit form data via ajax
        $.ajax({
           type: "POST",
           url: 'update_event_data.php',
           contentType: "application/json; charset=utf-8",
           data: data,
           success: function(data){
               console.log('Server response', data);
           }
        });

        // Prevent form submission
        return false;
    } );

   */
   
       ExportTable();
 $("#loading-excel").hide();
$("#selectall").html("<b>SELECT ALL</b>");

     var getQtyval = $("#qty_hidden").val();
  
     $("#inputUpdate").val(getQtyval);
     
     
     $("#selectall").click(function(){

     $.each($("select"),function(){
     
     $(this).val('Y');
     
     });
     
});
     var getQtyval = $("#qty_hidden").val();
  
     $("#inputUpdate").val(getQtyval);
    $("#update").click(function(){
    $(".alert-success").hide();
    
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

 var divToPrint=document.getElementById('table1');
  newWin= window.open("");
   newWin.document.write('<style type="text/css"> .noprint { display: none; } td { text-align:center} #'+x+' { border:thin black solid; border-collapse:collapse } #'+x+' tr { border:thin black solid } #'+x+' tr td  { border:thin black solid ; } #'+x+' tr th  { border:thin black solid } a { text-decoration:none;color:black } </style>');
   newWin.document.write("<h3 style='text-align:center'>"+y+"</h3>");
  newWin.document.write(divToPrint.outerHTML);
  newWin.print();
  newWin.close();
}
</script>

<script src="https://cdn.rawgit.com/eligrey/FileSaver.js/e9d941381475b5df8b7d7691013401e171014e89/FileSaver.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.5/js/tableexport.min.js"></script>
</head>

<body>
<?php include("banner.php");?>

<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<table width="100%" style="" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="10%"></td>
				<td style="padding-right: 4%;" width="25%">
					<p style="margin: 0; padding: 0;text-align:left;width:283px;font-size:20px;"><strong><?php echo $_COOKIE['name']; ?>,</strong>
					Store <?php echo $_COOKIE["username"]; ?></p>
				</td>
				<td style="border:2px solid black;margin-bottom:20px;" width="25%">
					<div class="box" style="width:104%;"> 
						<div align="center" class="style9"><?php echo $title; ?> </div>
					</div>
				</td>
				<td width="40%"></td>
			</tr>
			</table>
		</div>
	</div>
</div>	
<br>

        
        
        <div style="postition:relative;" class="style7  style11">
					<a href="home.php" style="float:left;margin-left:27px;margin-top: 2px;">
					  <button class="btn btn-danger" style="margin-bottom:5px; margin-left: 8px;"><b>RETURN</b></button>
					</a>
				</div>
        
        <div align="right">
               
              <div style="float:right;margin-bottom:5px; margin-left: 12px;"><button class="btn btn-primary " onclick="printDiv('tablearea','')"><b>PRINT</b></button></div>
						<div style="float:right;margin-bottom:5px; margin-left: 12px;"><button id="save" class="btn btn-primary " onclick="document.forms[0].submit();"><b>SAVE</b></button></div>
                                                       
  
<button type="button" onClick ="$('#table1').tableExport({type:'pdf',escape:'false'});">abc</button>                                                     
 <div style="float:right;margin-bottom:5px; margin-left: 12px;"><div id="update" class="btn btn-primary" ><b>UPDATE</b></div></div> 
 <div style="float:right;margin-bottom:5px; margin-left: 12px;"><div id="selectall" class="btn btn-primary" ><b>SELECT ALL</b></div></div> 
 
 
     <b>Quantity:</b> <div style="float:right;margin-bottom:5px; margin-left: 12px;"><input type="text" id="inputUpdate" name="quantity" value="">
             </div> 		
    

<div class="message">
 <div id="loading-excel" class="alert alert alert-warning" role="alert">
      
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Data Updated successfully Click on <strong>SAVE</strong> to store changes.
        
			</div>
      
      
			<?
			if(isset($_GET['msg'])){
			?>
      
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				Data Saved successfully.
        
			</div>
      
     
     
			<?
			}
			?>
      
      </div>
<?php

   $row = sqlsrv_fetch_array( $stmt3, SQLSRV_FETCH_ASSOC);
      $val_qty = $row['QUANTITY']; 
 
 
 
?>                                                   
  

<div class="container-fluid">    
    <div class="row">
        <div class="col-md-12">
        

				
			<form action="update_event_data.php" method="POST" id="frm">
    <table width="100%" id="table1" class="table responsive-table" border="1">
<thead>
            <tr>
							<th class="bg-info" width="7.69%"><div align="left" class="style7"><strong><span class="">Event #</span></strong></div></th>
							<th class="bg-info" width="12%"><div align="left" class="style7"><strong><span class=""> Description</span></strong></div></th>
							<th class="bg-info" width="7.69%"><div align="left" class="style7"><strong><span class="">Event Type</span></strong></div></th>
							<th class="bg-info" width="7.69%"><div align="left" class="style7"><strong><span class="">Pages</span></strong></div></th>
							<th class="bg-primary" width="7.69%"><div align="left" class="style7"><strong><span class="">Dealer Order Deadline</span></strong></div></th>
						
							<th class="bg-primary" width="7.69%"><div align="left" class="style7"><strong><span class="">Sales Start</span></strong></div></th>
							<th class="bg-primary" width="7.69%"><div align="left" class="style7"><strong><span class="">Sales End</span></strong></div></th>
							<th class="bg-success" width="7.69%"><div align="left" class="style7"><strong><span class="">Flyer Release Date </span></strong></div></th>
						
							<th class="bg-warning" width="7.69%"><div align="left" class="style7"><strong><span class="">Print Cost</span></strong></div></th>
							<th class="bg-warning" width="7.69%"><div align="left" class="style7"><strong><span class="">Disribution Cost</span></strong></div></th>
							<th class="bg-danger" width="7.69%"><div align="left" class="style7"><strong>Select</strong></div></th>
							<th class="bg-danger" width="7.69%"><div align="left" class="style7"><strong>Quantity</strong></div></th>
							<th  class="bg-danger" width="7.69%"><div align="left" class="  style7"><strong>Store Copies</strong></div>	</th> 
						</tr>	
                    </thead>
          <tbody>
                    
                  <?php $counter = 1;?>
				  <?php
					while ($data = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
				  ?>
					<?php $counter++; ?>
                 <input type="hidden" name="event_number_<?php echo $counter?>" value="<?php echo $data['EVENT_NUMBER'];?>" />	
                
                <input type="hidden" id="qty_hidden" value="<?php echo $data['QUANTITY'];?>">
	    	<tr style="margin-top:50px">
              <td width="7.69%"><?php echo $data['EVENT_NUMBER']; ?></td>             				  
						  <td width="12%"><?php echo $data['EVENT_DESCRIPTION']; ?></td>
						  <td width="7.69%"><?php echo $data['STORE_TYPE'];?></td>
						  <td width="7.69%"><?php echo $data['PAGE_COUNT']; ?></td>
						  <td width="7.69%"><?php echo $data['DEALER_DEADLINE']; ?></td>
					  
						  <td width="7.69%"><?php echo $data['SALES_START']; ?></td>
						  <td width="7.69%"><?php echo $data['SALES_END']; ?></td>
						  <td width="7.69%"><?php echo $data['SALES_START']; ?></td>
			 			
						 <td width="7.69%"><?php echo number_format($data['PRINT_COST'], 2); ?></td>
						  <td width="7.69%"><?php echo number_format($data['DISTRIBUTION_COST'],2); ?></td>
						  <td width="7.69%">
							                       
						<select  style class="style7"  name="add_event_<?php echo $counter;?>">
                           
                           
							<?php
								if ($data['SELECTED'] == 'Y') {
									echo ' 
										   <option value="Y" selected>Yes</option>
										   <option value="N">No</option>
										 </select>';
								} else {
									echo '  
											<option value="Y">Yes</option>
											<option value="N" selected>No</option>
										  </select>';
								}	
								
							?>
                  </td>
           <td width="7.69%">
                     
							<span class="style7">
								<input readonly name="quantity_<?php echo $counter;?>"   value= "<?php  echo $qty_v = $data['DISTRIBUTION_QTY'];?>" class="style7" id="value" size="5">
							</span>
						  </td>
						  <td width="7.69%">
						  <div align="left" class="">
							<span class="style7">
								<input name="store_quantity_<?php echo $counter;?>" type="text" value="<?php echo $data['STORE_QTY'];?>" class="style7" id="value" size="5">
							</span>
						  </div>	
						  </td>
						</tr>
					<?php } ?>
                
                </tbody>
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


 <input type="hidden" name="store_type" id="store_type" value="<?php echo $_GET['type'];?>">
					<input type="hidden" name="row_qty" id="row_qty" value="<?php echo $val;?>">
                 <input type="hidden" name="row_count" value="<?php echo $counter;?>">
					<input type="hidden" name="store_id" value="<?php echo $_COOKIE['username']?>">
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
//mysql_free_result($promotion);
mssqlsrv_free_stmt($stmt3);
?>
