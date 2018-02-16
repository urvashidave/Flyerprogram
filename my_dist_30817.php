<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<title>Distribution</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.2/css/select.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.2/js/dataTables.select.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<style type="text/css">
.checkbox {
  padding-left: 20px; }
  .checkbox label {
    display: inline-block;
    position: relative;
    padding-left: 5px; }
    .checkbox label::before {
      content: "";
      display: inline-block;
      position: absolute;
      width: 17px;
      height: 17px;
      left: 0;
      margin-left: -20px;
      border: 1px solid #cccccc;
      border-radius: 3px;
      background-color: #fff;
      -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
      transition: border 0.15s ease-in-out, color 0.15s ease-in-out; }
    .checkbox label::after {
      display: inline-block;
      position: absolute;
      width: 16px;
      height: 16px;
      left: 0;
      top: 0;
      margin-left: -20px;
      padding-left: 3px;
      padding-top: 1px;
      font-size: 11px;
      color: #555555; }
  .checkbox input[type="checkbox"] {
    opacity: 0; }
    .checkbox input[type="checkbox"]:focus + label::before {
      outline: thin dotted;
      outline: 5px auto -webkit-focus-ring-color;
      outline-offset: -2px; }
    .checkbox input[type="checkbox"]:checked + label::after {
      font-family: 'FontAwesome';
      content: "\f00c"; }
    .checkbox input[type="checkbox"]:disabled + label {
      opacity: 0.65; }
      .checkbox input[type="checkbox"]:disabled + label::before {
        background-color: #eeeeee;
        cursor: not-allowed; }
  .checkbox.checkbox-circle label::before {
    border-radius: 50%; }
  .checkbox.checkbox-inline {
    margin-top: 0; }

.checkbox-primary input[type="checkbox"]:checked + label::before {
  background-color: #428bca;
  border-color: #428bca; }
.checkbox-primary input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-danger input[type="checkbox"]:checked + label::before {
  background-color: #d9534f;
  border-color: #d9534f; }
.checkbox-danger input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-info input[type="checkbox"]:checked + label::before {
  background-color: #5bc0de;
  border-color: #5bc0de; }
.checkbox-info input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-warning input[type="checkbox"]:checked + label::before {
  background-color: #f0ad4e;
  border-color: #f0ad4e; }
.checkbox-warning input[type="checkbox"]:checked + label::after {
  color: #fff; }

.checkbox-success input[type="checkbox"]:checked + label::before {
  background-color: #5cb85c;
  border-color: #5cb85c; }
.checkbox-success input[type="checkbox"]:checked + label::after {
  color: #fff; }
.style7 {font-family: Arial Narrow,Arial,sans-serif}
a,button {
 cursor: pointer !important;
}
</style>
<script type="text/javascript">
    function updatetotal(){
        var nettotal  = 0;
        $(".linetotal").each(function() {
            // ...
            var total = $( this ).val();
            nettotal = +nettotal + +total;
        });
        //alert(nettotal);
        $(".nettotalarea").val(nettotal);
        $(".nettotallabelarea").html(nettotal);
    }
    $(document).ready(function () {
        var sumQty = 0;
        //$("#p_Loading_Analysis_Store > tbody").find('td:eq(5)').addClass("checkbox");
        //var table = $('#example').DataTable();
        var table = $('#p_Loading_Analysis_Store').DataTable({
            "fnPreDrawCallback": function (settings, json) {
                //alert( 'DataTables has finished its initialisation.' );
                $("input[type='checkbox']").click(function (e) {


                    if ($(this).prop('checked') === true)
                    {
                        var row = jQuery(this).closest('tr');
                        var rowid = $(this).data('id');
                        $('td:eq(15)', row).html("<input type='hidden' name='aselected_"+rowid+"' value='Y'/> Y ");

                        var rowIndex = $('td:eq(17)', row).text();
                        //alert(rowIndex);
                        var col = $('td:eq(17)');
                        //var $columns=0;
                        var colTxt = col.text();
                        //var totalQtyparsed = '';
                        var colVal = parseInt(rowIndex);

                        var checked_td = ($(this).val());
                        //alert(checked_td);
                        var checked_td_conv = parseInt(checked_td);
                        //alert(checked_td_conv);
                        colVal = colVal + checked_td_conv;
                        //alert(sumQty);
                        $('td:eq(17)', row).html("<input type='hidden' name='linetotal' class='linetotal' value='"+colVal+"' /> "+colVal);

                    } 
                    else if ($(this).prop('checked') === false)
                    {
                        //chky = chky - 1;
                        //alert(chky);
                        var row = jQuery(this).closest('tr');
                        
                        var rowIndex = $('td:eq(17)', row).text();
                        // alert(rowIndex);
                        
                        var colVal = parseInt(rowIndex);
                        //alert(colVal);
                        //var values = "";

                        var checked_td = ($(this).val());
                        //alert(checked_td);
                        var checked_td_conv = parseInt(checked_td);
                        //alert(checked_td_conv);
                        colVal = colVal - checked_td_conv;
                        //alert(colVal);
                        $('td:eq(17)', row).text(colVal);
                        if(colVal === 0)
                            $('td:eq(15)', row).text('');
                    }
                    updatetotal();
                });
                // updateTable();
            },

            /*dom: 'Bfrtip',
                "scrollY": 400,
                "scrollX": true,
                "fixedColumns": true,
                "columnDefs": [
                    { "width": "20%", "targets": 0 }
                  ],*/    

            "fnCreatedRow": function (nRow, aData, iDataIndex) {
            },
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
     
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
     
                // Total over all pages
                total = api
                    .column( 17 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
     
                // Total over this page
                pageTotal = api
                    .column( 17, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
     
                // Update footer
                /*$( api.column( 17 ).footer() ).html(
                    ''+pageTotal +''
                );*/
            },
            "bPaginate": false, //hide pagination
            "bFilter": false, //hide Search bar
            "bInfo": false, // hide showing entries
            "bSort": false, // hide shorting
        });
        updatetotal();    
        $('.save').click( function() {
            var data = table.$('input').serialize();
            $.ajax({
                beforeSend:function() { 
                    $("#loading-excel").show();
                },
                complete:function() {
                    $("#loading-excel").hide();
                },
                type:"POST",
                url:"ajax.php",
                data:data,//only input
                success: function(response){
                    //alert("Data update successfully!!");  
                    $("#successarea").show();
                    //location.reload();
                    setTimeout(location.reload.bind(location), 5000);
                }
            });
            return false;
        } );
    });
	
	function showmap(){
		$("#p_Loading_Analysis_Store").hide();
		$("#maparea").show();
	}
	function showtable(){
		$("#p_Loading_Analysis_Store").show();
		$("#maparea").hide();
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
				<td style="border:3px solid black;"  width="25%">
					<div class="box" style="width:320px;"> 
						<div align="center" class="style9"> <strong>MY </strong> Distribution</div>
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
			<div id='loading-excel' style="text-align: center;display: none;">
                <img src='loading.gif'  style='position:relative;height:100px;z-index:2000' />
            </div>
            <div id="successarea" style="display: none;">
                   <div class="alert alert-success">
                      Data update successfully.
                    </div> 
            </div>
			<div class="row">
				<div class="col-md-2">
					<a href="home.php" style="">
					  <button class="btn btn-danger" style=""><b>RETURN</b></button>
					</a>
				</div>	
				<div class="col-md-2">
					<button class="btn btn-warning" onclick="showtable();"><b>National Program</b></button>
				</div>	
				<div class="col-md-2">
					<button class="btn btn-info" onclick="showtable();"><b>Optional Program</b></button>
				</div>	
				<div class="col-md-2">
					<button class="btn btn-primary" onclick="showtable();"><b>Catalogue Program</b></button>
                </div>
				<div class="col-md-2"></div>
				<div class="col-md-1">
					<button type="submit" class="save btn btn-success"><b>SAVE</b></button>
				</div>	
				<div class="col-md-1 text-right">
					<a class="btn btn-danger" href="my_map.php"><b>Map</b></a>
                </div>
			</div>
			<br><br>
			<table id="p_Loading_Analysis_Store" class="table table-bordered table-inverse style7" cellspacing="0">
                <thead>
                    <tr>
                        <th rowspan="2" class="bg-info">Code</th>
                        <th rowspan="2" class="bg-info">Market</th>
                        <th rowspan="2" class="bg-info">FSA</th>
                        <th rowspan="2" class="bg-info">Route</th>
                        <th rowspan="2" class="bg-info">Drive Dist.</th>
                        <th colspan="4" class="bg-primary">CPC</th>
                        <th colspan="2" class="bg-success">TMC</th>
                        <th colspan="2" class="bg-warning">EMC</th>
                        <th colspan="2" class="bg-info">SUB</th>
                        <th colspan="2" class="bg-danger">Select</th>
                        <th rowspan="2" class="bg-success">Total Qty</th>
                    </tr>
                    <tr>
                       <th class="bg-primary">Homes</th>
                       <th class="bg-primary">Apts</th>    
                       <th class="bg-primary">Farms</th>
                       <th class="bg-primary">Bus</th> 
                       <th class="bg-success">Homes</th>
                       <th class="bg-success">Apts</th>
                       <th class="bg-warning">Homes</th>
                       <th class="bg-warning">Apts</th>
                       <th class="bg-info">Homes</th>
                       <th class="bg-info">Apts</th>
                       <th class="bg-danger">A</th>
                       <th class="bg-danger">B</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total Qty</th>
                        <th><input type="hidden" name="nettotal" class="nettotalarea" value="0" /> <span class="nettotallabelarea">0</span></th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php
                    //include("dbcon.php");
					$connectionInfo = array( "Database" => "DEALER", "UID" => "hmsservice", "PWD" => "Retail@Marketing1", "CharacterSet" => "UTF-8");
  

//$connectionInfo = array( "Database" => "TEST", "UID" => "webdev", "PWD" => "Two4One!");
					$conn = sqlsrv_connect("72.143.59.108,1494", $connectionInfo);	
					if( $conn === false )
					 {
								die('mssql not connecting : ' . sqlsrv_errors());
					 }
                    $bheaders = array('CODE', 'MARKET', 'FSA', 'ROUTE', 'DRIVEDISTANCE','S_HOMES', 'DEL_CPCHOMES', 'S_APTS',  'DEL_CPCAPTS','S_FARMS',  'DEL_CPCFARMS', 'S_BUS', 'DEL_CPCBUS', 'S_TMCHOMES', 'DEL_TMCHOMES', 'S_TMCAPTS', 'DEL_TMCAPTS','S_EMCHOMES', 'DEL_EMCHOMES','S_EMCAPTS', 'DEL_EMCAPTS', 'S_SUBHOMES',  'DEL_SUBHOMES', 'S_SUBAPTS',  'DEL_SUBAPTS', '', '', '');
                    $muheaders = array('CODE', 'MARKET', 'FSA', 'ROUTE', 'DRIVEDISTANCE','S_HOMES', 'DEL_CPCHOMES', 'S_APTS',  'DEL_CPCAPTS','S_FARMS',  'DEL_CPCFARMS', 'S_BUS', 'DEL_CPCBUS', 'S_TMCHOMES', 'DEL_TMCHOMES', 'S_TMCAPTS', 'DEL_TMCAPTS','S_EMCHOMES', 'DEL_EMCHOMES','S_EMCAPTS', 'DEL_EMCAPTS', 'S_SUBHOMES',  'DEL_SUBHOMES', 'S_SUBAPTS',  'DEL_SUBAPTS', '', '');

                    $values_to_call = "'HH','HH601','1286-1'";

                    $params[] = "CLIENT_CODE";
                    $params[] = "PROJECT";
                    $params[] = "STORE";
                    $tsql_callSP = "EXEC DEALER.DBO.p_Loading_Analysis_Store  $values_to_call ";
                        
                    $stmt3 = sqlsrv_query($conn, $tsql_callSP, $params);
                    if ($stmt3 === false) {
                        die(print_r(sqlsrv_error(), true));
                    }
                    $cnt=1;
                    while ($row = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC)) {
                        $total = 0;
                        if($row['S_HOMES']==1){
                           $total =  $total + $row['DEL_CPCHOMES'];
                        }
                        if($row['S_APTS']==1){
                           $total =  $total + $row['DEL_CPCAPTS'];
                        }
                        if($row['S_FARMS']==1){
                           $total =  $total + $row['DEL_CPCFARMS'];
                        }
                        if($row['S_BUS']==1){
                           $total =  $total + $row['DEL_CPCBUS'];
                        }
                        if($row['S_TMCHOMES']==1){
                           $total =  $total + $row['DEL_TMCHOMES'];
                        }
                        if($row['S_TMCAPTS']==1){
                           $total =  $total + $row['DEL_TMCAPTS'];
                        }
                        if($row['S_EMCHOMES']==1){
                           $total =  $total + $row['DEL_EMCHOMES'];
                        }
                        if($row['S_EMCAPTS']==1){
                           $total =  $total + $row['DEL_EMCAPTS'];
                        }
                        if($row['S_SUBHOMES']==1){
                           $total =  $total + $row['DEL_SUBHOMES'];
                        }
                        if($row['S_SUBAPTS']==1){
                           $total =  $total + $row['DEL_SUBAPTS'];
                        }
                        echo "<tr>"; 
                            echo "<td><input type='hidden' name='code_".$cnt."' value='".$row['CODE']."'/>".$row['CODE']."</td>";
                            echo "<td>".$row['MARKET']."</td>";
                            echo "<td>".$row['FSA']."</td>";
                            echo "<td><input type='hidden' name='route_".$cnt."' value='".$row['ROUTE']."'/>".$row['ROUTE']."</td>";
                            echo "<td>".$row['DRIVEDISTANCE']."</td>";
                    ?>      
                            <td>
                                <input type="hidden" name="rowcnt[]" value="<?=$cnt?>">
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='cpchomes_<?=$cnt?>' id='cpchomes_<?=$cnt?>' <?=$row['S_HOMES']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_CPCHOMES']?>'/>
                                    <label for="cpchomes_<?=$cnt?>">
                                        <?=$row['DEL_CPCHOMES']?>
                                    </label>
                                </div>
                            </td>  
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='cpcapts_<?=$cnt?>' id='cpcapts_<?=$cnt?>' <?=$row['S_APTS']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_CPCAPTS']?>'/>
                                    <label for="cpcapts_<?=$cnt?>">
                                        <?=$row['DEL_CPCAPTS']?>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='cpcfarms_<?=$cnt?>' id='cpcfarms_<?=$cnt?>' <?=$row['S_FARMS']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_CPCFARMS']?>'/>
                                    <label for="cpcfarms_<?=$cnt?>">
                                        <?=$row['DEL_CPCFARMS']?>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='cpcbus_<?=$cnt?>' id='cpcbus_<?=$cnt?>' <?=$row['S_BUS']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_CPCBUS']?>'/>
                                    <label for="cpcbus_<?=$cnt?>">
                                        <?=$row['DEL_CPCBUS']?>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='tmchomes_<?=$cnt?>' id='tmchomes_<?=$cnt?>' <?=$row['S_TMCHOMES']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_TMCHOMES']?>'/>
                                    <label for="tmchomes_<?=$cnt?>">
                                        <?=$row['DEL_TMCHOMES']?>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='tmcapts_<?=$cnt?>' id='tmcapts_<?=$cnt?>' <?=$row['S_TMCAPTS']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_TMCAPTS']?>'/>
                                    <label for="tmcapts_<?=$cnt?>">
                                        <?=$row['DEL_TMCAPTS']?>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='emchomes_<?=$cnt?>' id='emchomes_<?=$cnt?>' <?=$row['S_EMCHOMES']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_EMCHOMES']?>'/>
                                    <label for="emchomes_<?=$cnt?>">
                                        <?=$row['DEL_EMCHOMES']?>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='emcapts_<?=$cnt?>' id='emcapts_<?=$cnt?>' <?=$row['S_EMCAPTS']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_EMCAPTS']?>'/>
                                    <label for="emcapts_<?=$cnt?>">
                                        <?=$row['DEL_EMCAPTS']?>
                                    </label>
                                </div>
                            </td> 
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='subhomes_<?=$cnt?>' id='subhomes_<?=$cnt?>' <?=$row['S_SUBHOMES']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_SUBHOMES']?>'/>
                                    <label for="subhomes_<?=$cnt?>">
                                        <?=$row['DEL_SUBHOMES']?>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox checkbox-success">
                                    <input type='checkbox' data-id="<?=$cnt?>" name='subapts_<?=$cnt?>' id='subapts_<?=$cnt?>' <?=$row['S_SUBAPTS']==1?"checked":""?> class='checkbox' value='<?=$row['DEL_SUBAPTS']?>'/>
                                    <label for="subapts_<?=$cnt?>">
                                        <?=$row['DEL_SUBAPTS']?>
                                    </label>
                                </div>
                            </td>       
                        <?        
                            echo "<td><input type='hidden' name='aselected_".$cnt."' value='".$row['A_SELECTED']."'/>".$row['A_SELECTED']."</td>";
                            echo "<td>".$row['B_SELECTED']."</td>";
                            echo "<td><input type='hidden' name='linetotal_".$cnt."' class='linetotal' value='".$total."'/>".$total."</td>";
                        echo "</tr>";   
                        //print_r($row);
                        /*
                        for ($ii = 0; $ii <= 26; $ii ++) {
                            $bheaders = $muheaders[$ii];
                            $brow_profile_dat[] = $row[$bheaders];
                            if($ii>=6 && $ii<=25){
                                echo "<td> <input type='checkbox' name='checkbox' class='checkbox' value='".$row[$bheaders]."'/> " . $row[$bheaders] . "</td>";
                            }else{
                                echo "<td>" . $row[$bheaders] . "</td>";
                            }
                        }
                       */
                        $cnt++;
                    }
                    ?>
                </tbody>
            </table>
			<div class="row">
				<div class="col-md-12">
					<div id="maparea">
						<div id="map"></div>
					</div>
				</div>
			</div>		
		</div> <!-- wrapper div -->
	</div>
</div>	
    <script>
      var customLabel = {
        2020: {
          label: 'STORE LOCATION'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
			var map = new google.maps.Map(document.getElementById('map'), {
			  center: new google.maps.LatLng(44.2786461,-78.36303),
			  zoom: 5
			});
			var infoWindow = new google.maps.InfoWindow;

			  // Change this depending on the name of your PHP or XML file

			downloadUrl('PV_store.php', function(data) {
				var xml = data.responseXML;
				var markers2 = xml.documentElement.getElementsByTagName('marker');
				Array.prototype.forEach.call(markers2, function(markerElem) {
				  var STORE2 = markerElem.getAttribute('STORE');
				  var ADDRESS2 = markerElem.getAttribute('STORE_ADDRESS');
				  var point2 = new google.maps.LatLng(
					  parseFloat(markerElem.getAttribute('STORE_LAT')),
					  parseFloat(markerElem.getAttribute('STORE_LONG')));

				  var infowincontent = document.createElement('div');
				  var strong = document.createElement('strong');
				  strong.textContent = ADDRESS2
				  infowincontent.appendChild(strong);
				  infowincontent.appendChild(document.createElement('br'));

				  var text = document.createElement('text');
				  text.textContent = STORE2
				  infowincontent.appendChild(text);
				  var image = 'mapicon.png'
				  var marker = new google.maps.Marker({
					map: map,
					icon: image,
					position: point2,
				  });
				  marker.addListener('click', function() {
					infoWindow.setContent(infowincontent);
					infoWindow.open(map, marker);
				  });
				});
			});

          /*downloadUrl('PV_distribution.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var STORE = markerElem.getAttribute('STORE');
              var CITY = markerElem.getAttribute('CITY');
              var ROUTE = markerElem.getAttribute('ROUTE');
              var MFDCODE = markerElem.getAttribute('MFDCODE');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('MI_SQL_Y')),
                  parseFloat(markerElem.getAttribute('MI_SQL_X')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = STORE
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = CITY
              infowincontent.appendChild(text);
              var icon = customLabel[MFDCODE] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });*/
		  
		  
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBeIvJweS4ZzyJRvBA7kZnryBH-SZzbFw&callback=initMap">
    </script>
</body>
<?php
mssqlsrv_free_stmt($stmt3);
?>
</html>