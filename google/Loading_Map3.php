
<link rel='STYLESHEET' type='text/css' href='master_style.css'>
<script type="text/javascript" 
	src="https://maps.googleapis.com/maps/api/js?&client=gme-marketfocus&key=AIzaSyCBeIvJweS4ZzyJRvBA7kZnryBH-SZzbFw&libraries=places,drawing,visualization" async defer></script>

<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>-->
<?php 
	$Client_Code = $_GET["Client_Code"];
	$Project = $_GET["Project"];
	$Store = $_GET["Store"];
?>
<?php 
	$Store_Logo = "Store_Icons"; 
	$Store_Logo .= "/"; 
	$Store_Logo .= $Client_Code; 
	$Store_Logo .= "_logo.jpg"; 
?>
<?php 
	$Red_sqr = "Store_Icons"; 
	$Red_sqr .= "/"; 
	$Red_sqr .= "Distribution_Red.jpg"; 
	
	$Green_sqr = "Store_Icons"; 
	$Green_sqr .= "/"; 
	$Green_sqr .= "Distribution_Green.jpg"; 
?>
<body  onLoad='initialize();'>
<?php include "Store_Info.php"; ?>
<?php include "sma.php"; ?>
<?php include "sma1.php"; ?>
<?php include "sma2.php"; ?>
<?php include "sma3.php"; ?>
<?php include "Distribution.php"; ?>


<SCRIPT language="JavaScript">

function initialize() 
{  
	var map = new google.maps.Map(document.getElementById('map'), {center: {lat: <?php echo $UStore_Lat; ?>, lng: <?php echo $UStore_Long; ?>},zoom: 13});
	
//--Boundary 0 -------------------------------------
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
		
//--Boundary 1 -------------------------------------
	var arr = new Array(); // making an array
    var polygons = [];  // making polygons empty
    var bounds = new google.maps.LatLngBounds();
	arr = [];
	var triangleCoords = <?php ECHO $STR1; ?>;
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
		
//--Boundary 2 -------------------------------------
	var arr = new Array(); // making an array
    var polygons = [];  // making polygons empty
    var bounds = new google.maps.LatLngBounds();
	arr = [];
	var triangleCoords = <?php ECHO $STR2; ?>;
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
		
//--Boundary 3 -------------------------------------
	var arr = new Array(); // making an array
    var polygons = [];  // making polygons empty
    var bounds = new google.maps.LatLngBounds();
	arr = [];
	var triangleCoords = <?php ECHO $STR3; ?>;
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
			
	
							
	
}




</SCRIPT>

<td width="66%" rowspan="2" align="center" valign="top">
	<table width="60%" class="STORE_MAP">
		<tr><div id="map" style="width: 60%; height: 90%"> </div> TEST </tr>
		
	</table>
</td>
 


