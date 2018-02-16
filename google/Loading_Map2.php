
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
			
//--Distribution  -------------------------------------		
		
	var Green_Distribution 	= ("<?php echo $Green_sqr;?>");
	var Red_Distribution 	= ("<?php echo $Red_sqr;?>");
 	var locations 			= (<?php ECHO $DISTRIBUTION; ?>);
	
	for (i = 0; i < locations.length; i++) 
	{	
		marker = new google.maps.Marker({	position: new google.maps.LatLng(locations[i][1], locations[i][2]),
											map: map,
											icon: Red_Distribution,
											title: locations[i][0] + ' - Route: ' + locations[i][3] + ' (Distribution Qty:' + locations[i][4] + ')'
		 								});
		//if (locations[i][5] == '1') { marker.setIcon("<?php echo $Green_sqr;?>");} else{  marker.setIcon("<?php echo $Red_sqr;?>"); }	
		//AttachSecretMessage(marker, locations[i][5]);
		//Route_Color(marker, locations[i][5]);
		//Mark_Color_Message1(marker, locations[i][3]);
		var currentMark;
		var infoWindow = new google.maps.InfoWindow({content: locations[i][0] });
		google.maps.event.addListener(marker, 'click', function () { 	infoWindow.open(map, this);
          																currentMark = this;
																		currentMark.setIcon("<?php echo $Green_sqr;?>");
																		
																	});
		google.maps.event.addListener(infoWindow,'closeclick',function(){ 	currentMark.setMap(null); 
																			currentMark.setIcon(null); 
																		});
	}
		



//--Function AttachSecretMessage  -------------------------------------	
	function AttachSecretMessage(marker, secretMessage) 
	{	var infowindow = new google.maps.InfoWindow({content: secretMessage});
		marker.addListener('click', function() {infowindow.open(marker.get('map'), marker);});
	}

//--Function Mark_Color_Message  -------------------------------------	
	function Mark_Color_Message(marker, Var1) 
	{	var infowindow = new google.maps.InfoWindow({content: Var1});
		marker.addListener('click', function() {lastOpenedInfoWindow = infowindow;
												closeLastOpenedInfoWindow();
												infowindow.open(marker.get('map'), marker); 
												marker.setIcon("<?php echo $Green_sqr;?>");
												});
	}

//--Function Mark_Color_Message1  -------------------------------------	
	function Mark_Color_Message1(marker, Var1) 
	{	var infowindow = new google.maps.InfoWindow({content: Var1});
		marker.addListener('click', function() 
										{infowindow.open(marker.get('map'), marker); 
										lastOpenedInfoWindow = infowindow;
										if (lastOpenedInfoWindow) 	{marker.setIcon("<?php echo $Red_sqr;?>"); 
																	lastOpenedInfoWindow.close();  
																	}
										marker.setIcon("<?php echo $Green_sqr;?>");															
										});																							
	}
	
	
							
	
}




</SCRIPT>

<td width="66%" rowspan="2" align="center" valign="top"><table width="95%" class="STORE_MAP">
		<tr><div id="map" style="width: 90%; height: 90%"></div>
		</tr>
	</table>
</td>
 


