<?php if (!isset($_SESSION)) {
  session_start()   ;
}

if (!isset($_SESSION['MM_Username']) && $_SESSION['MM_storename'] == true) {
    header("Location: index.php");
    exit;
    }
if (($_COOKIE['username']=='') && $_COOKIE['storename'] == '') {
    header("Location: index.php");
    exit;
    }

?>
<link rel='STYLESHEET' type='text/css' href='google/master_style.css'>
<script type="text/javascript" 
	src="https://maps.googleapis.com/maps/api/js?&client=gme-marketfocus&key=AIzaSyCBeIvJweS4ZzyJRvBA7kZnryBH-SZzbFw&libraries=places,drawing,visualization" async defer></script>
 <style type="text/css">
td input {
    width: 54px;
}
#map {
    border: solid;
    margin-left: 60px;
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
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <body>
<?php include("Connections/User_Information.php");?>
<?php include("banner.php");?>
<br/>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<table width="100%" style="" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td width="10%"></td>
				<td style="padding-right: 4%;" width="25%">
					<p style="margin: 0; padding: 0;text-align:left;width:250px;"><strong>Client code: </strong><?php echo $_COOKIE['storename']; ?></p>
					<p style="margin: 0; padding: 0;text-align:left;"><strong>Store: </strong> <?php echo $_COOKIE["username"]; ?></p>
           <p style="margin: 0; padding: 0;text-align:left;"><strong>Project :</strong> <?php 
           if($_COOKIE['storename']=='HH'){ 
               echo $prj = "HH601";
           }
           else if($_COOKIE['storename']=='PV'){ 
               echo $prj = "PV745";
           }
           ?>
           
           
           </p>  
            
				</td>
				<td style="border:3px solid black;"  width="25%">
					<div class="box" style="width:320px;"> 
						<div align="center" class="style9"> <strong>Program Distribution</strong></div>
					</div>
				</td>
				<td width="40%"></td>
			</tr>
			</table>
		</div>
	</div>
</div>
<br/><br/>
<style>

#map {
    border: solid;
}

</style>
<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
<?php 
	$Client_Code = $_COOKIE["username"];
	$Project = $prj;
	$Store = $_COOKIE["username"];
?>
<?php 
	$Store_Logo = "logos/HH_map.png";  
?>
<?php 
	$Red_sqr = "google/Store_Icons"; 
	$Red_sqr .= "/"; 
	$Red_sqr .= "Distribution_blue.jpeg"; 
	
	$Green_sqr = "google/Store_Icons"; 
	$Green_sqr .= "/"; 
	$Green_sqr .= "Distribution_Green.jpg"; 
?>
<body  onLoad='initialize();'>
<?php include "google/Store_Info.php"; ?>
<?php include "google/sma.php"; ?>
<?php include "google/Distribution.php"; ?>


	
<SCRIPT language="JavaScript">

function initialize() 
{  
	var map = new google.maps.Map(document.getElementById('map'), {center: {lat: <?php echo $UStore_Lat; ?>, lng: <?php echo $UStore_Long; ?>},zoom: 15});
 
 

	
//--Boundary -------------------------------------
	var arr = new Array(); // making an array
    var polygons = [];  // making polygons empty
    var bounds = new google.maps.LatLngBounds();
	arr = [];
	var triangleCoords = <?php ECHO $STR; ?>;
		// extend bounds to contain each coordinate
		for (var i = 0, i_end = triangleCoords.length; i < i_end; i++) {
			bounds.extend(triangleCoords[i]);
		}
		var areaCovered = new google.maps.Polygon({
			paths: triangleCoords,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 4,
			fillColor: '#FF0000',
			fillOpacity: 0.01
		});
		areaCovered.setMap(map);
	
//--Store Information -------------------------------------	
	var latlng = new google.maps.LatLng(<?php echo $UStore_Lat; ?>, <?php echo $UStore_Long; ?>);  
	var image   = ("<?php echo $Store_Logo;?>")
	var markerSMA = new google.maps.Marker(
		{position: latlng
		,map: map
		,icon: image
		,title: 'STORE  <?php  echo $Store ;  ?>  \n Store Name: <?php echo $UStore_Name; ?> \n Address: <?php echo $UStore_Address; ?> \n City: <?php echo $UStore_City; ?>  \n Postal Code: <?php echo $UStore_FSALDU; ?> ' 
		});		
			
//--Distribution  -------------------------------------		
		
	var Green_Distribution 	= ("<?php echo $Green_sqr;?>");
	var Red_Distribution 	= ("<?php echo $Red_sqr;?>");
 	var locations 			= (<?php ECHO $DISTRIBUTION; ?>);
	
	for (i = 0; i < locations.length; i++) 
	{	
		marker = new google.maps.Marker({	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
											map: map,
											icon: Red_Distribution,
											title: 'Postal Code: ' +locations[i][0] + ' - Route: ' + locations[i][3] + ' (Distribution Qty:' + locations[i][4] + ')'
		 								});
                                                   

		//if (locations[i][5] == '1') { marker.setIcon("<?php echo $Green_sqr;?>");} else{  marker.setIcon("<?php echo $Red_sqr;?>"); }	
		//AttachSecretMessage(marker, locations[i][5]);
		//Route_Color(marker, locations[i][5]);
   var loc = '<b>PostalCode:</b>'+locations[i][0]+'  <b>Route:</b>'+locations[i][3];
		Mark_Color_Message(marker, loc);
	}
		



//--Function AttachSecretMessage  -------------------------------------	
	function AttachSecretMessage(marker, secretMessage) 
	{	var infowindow = new google.maps.InfoWindow({content: secretMessage});
		marker.addListener('click', function() {infowindow.open(marker.get('map'), marker);});
	}


//--Function Mark_Color_Message  -------------------------------------	
	function Mark_Color_Message(marker, Var1) 
	{	var infowindow = new google.maps.InfoWindow({content: Var1});
		marker.addListener('click', function() {infowindow.open(marker.get('map'), marker); 
												marker.setIcon("<?php echo $Green_sqr;?>");
												});
	}

google.maps.event.addDomListener(window, 'load', initialize)
}




</SCRIPT>
<div style="margin-left:30%;" >
<a href="home.php" style="">
<button class="btn btn-danger" style=""><b>RETURN</b></button>
</a>
	<button class="btn btn-warning" onclick="national();"><b>National Program</b></button>
                
		
        
					<button class="btn btn-info" onclick="optional();"><b>Optional Program</b></button>
       
       
					<button class="btn btn-primary" onclick="catalogue();"><b>Catalogue Program</b></button>
                  </div>
            <br>   
<table style="margin-left:10%;" width="90%" class="STORE_MAP">
		<tr><div id="map" style="width: 90%; height: 60%"></div>
		</tr>
	</table>
 
        
				
             
