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
require_once('Connections/User_Information.php');?>
<?php
// Mssql Connection
 $connectionInfo2 = array(
            "Database" => "DEALER",
            "UID" => "hmsservice",
            "PWD" => "Retail@Marketing1",
            "CharacterSet" => "UTF-8"
        );
        $conn            = sqlsrv_connect("72.143.59.108,1494", $connectionInfo2);
        if ($conn === false) {
            die('mssql not connecting : ' . sqlsrv_errors());
        }
        
        
//echo "exec DEALER.dbo.p_Load_Store_Information '".$_COOKIE['storename_mk']."','".$_COOKIE['username_mk']."'";

$query_profile_dat = "exec DEALER.dbo.p_Load_Store_Information '".$_COOKIE['storename']."','".$_COOKIE['username']."'";

$profile_dat = sqlsrv_query($conn, $query_profile_dat) or die(mssql_error());


if (sqlsrv_has_rows($profile_dat)==false) {

    echo "No data found in MSSQL DEALER database for store '".$_COOKIE['username']."'";
   exit;
 }

$row_profile_dat = sqlsrv_fetch_array( $profile_dat, SQLSRV_FETCH_ASSOC);  
 
     // echo $row_profile_dat['STORE'];    


$col_names = array('STORE', 'STORE_NAME', 'STORE_TYPE', 'ADDRESS1', 'ADDRESS2', 'CITY', 'POSTAL', 'PROVINCE',
				   'CONTACT1', 'PHONE1', 'EMAIL1', 'CONTACT2', 'PHONE2', 'EMAIL2', 'FAX', 'WEBSITE', 'HOURS','CANADA_POST',
            
            
             'IMP1_STORE', 'IMP1_STORE_NAME', 'IMP1_STORE_TYPE', 'IMP1_ADDRESS1','IMP1_ADDRESS2','IMP1_CITY','IMP1_POSTAL','IMP1_PROVINCE','IMP1_CONTACT1','IMP1_PHONE1','IMP1_EMAIL1','IMP1_CONTACT2','IMP1_PHONE2','IMP1_EMAIL2','IMP1_FAX','IMP1_WEBSITE','IMP1_HOURS','IMP1_CANADA_POST',
             
             
             'IMP2_STORE', 'IMP2_STORE_NAME', 'IMP2_STORE_TYPE', 'IMP2_ADDRESS1','IMP2_ADDRESS2','IMP2_CITY','IMP2_POSTAL','IMP2_PROVINCE','IMP2_CONTACT1','IMP2_PHONE1','IMP2_EMAIL1','IMP2_CONTACT2','IMP2_PHONE2','IMP2_EMAIL2','IMP2_FAX','IMP2_WEBSITE','IMP2_HOURS','IMP2_CANADA_POST',
             
             
             'IMP3_STORE', 'IMP3_STORE_NAME', 'IMP3_STORE_TYPE', 'IMP3_ADDRESS1','IMP3_ADDRESS2','IMP3_CITY','IMP3_POSTAL','IMP3_PROVINCE','IMP3_CONTACT1','IMP3_PHONE1','IMP3_EMAIL1','IMP3_CONTACT2','IMP3_PHONE2','IMP3_EMAIL2','IMP3_FAX','IMP3_WEBSITE','IMP3_HOURS','IMP3_CANADA_POST',
             
             
             'IMP4_STORE', 'IMP4_STORE_NAME', 'IMP4_STORE_TYPE', 'IMP4_ADDRESS1','IMP4_ADDRESS2','IMP4_CITY','IMP4_POSTAL','IMP4_PROVINCE','IMP4_CONTACT1','IMP4_PHONE1','IMP4_EMAIL1','IMP4_CONTACT2','IMP4_PHONE2','IMP4_EMAIL2','IMP4_FAX','IMP4_WEBSITE','IMP4_HOURS','IMP4_CANADA_POST'); 
 ?>    
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<title>MY IMPRINT</title>
<style type="text/css">
td input {
    width: 54px;
}

img {
    cursor: pointer;
	cursor: hand;
}
.btn{
margin-right: 13px;
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
table {
    border-spacing: 0;
    border-collapse: collapse;
}
.btn0,.btn4{
color: white;
background-color: #c9302c;
border-color: #ac2925;

}

.btn0:hover, .btn4:hover{
    color: #333;
    text-decoration: none;
    background-color:#c9302c;
}
.table{
width:50% !imporatnt;
}
.btn1,.btn5{
color:white;
background-color: #337ab7;
border-color: #2e6da4;
}
.btn1:hover,.btn5:hover {
    color: #333;
    text-decoration: none;
}

.btn2{
color: white;
background-color: #c9302c;
border-color: #ac2925;
}
.btn2:hover {
    color: #333;
    text-decoration: none;
}
.btn3{
color: #fff;
background-color: #337ab7;
border-color: #2e6da4;
}
.btn3:hover {
    color: #333;
    text-decoration: none;
}
.row {
    margin-right: 8px !important;
    margin-left: 10px !important;
}
@media print {
  img {
    max-width: none !important;
  }
}

.row {
    margin-right: 8px !important;
    margin-left: 19px !important;
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
.single-border th, .single-border td {
    border: none !important;
}
.style1 {color: #990000}
.style7 {font-family: Arial Narrow,Arial,sans-serif;}
.style8 {color: #990000; font-weight: bold; font-family: "Century Gothic"; }
.style9 {font-size: 20px; padding-left: 20px; padding-right: 20px; border-sizing: border-box;}
.style11 {font-family: "Century Gothic"; font-weight: bold;}
.style12 {font-size: 18px}
#map-canvas ,#map-canvas2,#map-canvas3,#map-canvas4,#map-canvas5{
  height: 512px;
  width: 50%;
  border:solid;
  border-width:1px;
}
.style13 {color: #000000}
a,button {
 cursor: pointer !important;
}
td {
    font-size: 20px;
    margin-left: 22px !important;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?&key=AIzaSyAZaahJJB1Chzkm9cNSWc3ZqrerMvKCWAE"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>
a,button {
 cursor: pointer !important;
}
</style>
<?php

	$address = $row_profile_dat['ADDRESS1'].$row_profile_dat['CITY'].$row_profile_dat['PROVINCE'];    
	$coordinates = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address));
	$coordinates = json_decode($coordinates);

	//echo 'Latitude:' . $coordinates->results[0]->geometry->location->lat;
	//echo 'Longitude:' . $coordinates->results[0]->geometry->location->lng;

	$lat = $coordinates->results[0]->geometry->location->lat;
	$lng = $coordinates->results[0]->geometry->location->lng;

?>

<script>

$("#table2").css("display", "none");
  $("#table3").css("display", "none");
  $("#table4").css("display", "none");
  $("#table5").css("display", "none");

$( document ).ready(function() {

  $("#table2").css("display", "none");
  $("#table3").css("display", "none");
  $("#table4").css("display", "none");
  $("#table5").css("display", "none");
  $("#table1").css("display", "-moz-grid");

    function initialize() {
         var uluru = {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>};
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          zoom: 18,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
        
        };
        
if(document.getElementById('map-canvas').style.display == 'block'){  
      document.getElementById('map-canvas').style.display = 'none';  
   }else{  
      document.getElementById('map-canvas').style.display = 'block';  
      initialize();  
   }  
  
 /* $("#map-canvas2").css("display", "none");
  $("#map-canvas3").css("display", "none");
  $("#map-canvas4").css("display", "none");
  $("#map-canvas5").css("display", "none");*/
  
$(".btn1").click(function() {
/*$("#map-canvas2").css("display", "-moz-grid");
 var uluru2 = {lat: 36.016066, lng:-114.737732 };
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          zoom: 10,
          center: uluru2
        });
        var marker = new google.maps.Marker({
          position: uluru2,
          map: map
        });
$("#map-canvas").css("display", "none");
/*  $("#map-canvas3").css("display", "none");
  $("#map-canvas5").css("display", "none");
  $("#map-canvas4").css("display", "none");
  $("#table2").css("display", "-moz-grid");
  */
  
  $("#table2").css("display", "-moz-grid");
  $("#table1").css("display", "none");
  $("#table3").css("display", "none");
  $("#table4").css("display", "none");
  $("#table5").css("display", "none");
});

$(".btn5").click(function() {
  $("#table2").css("display", "none");
  $("#table3").css("display", "none");
  $("#table4").css("display", "none");
  $("#table1").css("display", "-moz-grid");
  $("#table5").css("display", "none");
});
$(".btn2").click(function() {

 /* $("#map-canvas2").css("display", "none");
  $("#map-canvas").css("display", "none");
  $("#map-canvas4").css("display", "none");
  $("#map-canvas5").css("display", "none");
$("#map-canvas3").css("display", "-moz-grid");
 var uluru3 = {lat: 36.016066, lng:-114.737732 };
        var map = new google.maps.Map(document.getElementById('map-canvas3'), {
          zoom: 10,
          center: uluru3
        });
        var marker = new google.maps.Marker({
          position: uluru3,
          map: map
        });
        */
        
  $("#table3").css("display", "-moz-grid");
  $("#table1").css("display", "none");
  $("#table2").css("display", "none");
  $("#table4").css("display", "none");
  $("#table5").css("display", "none");
});

$(".btn3").click(function() {


/*$("#map-canvas2").css("display", "none");
  $("#map-canvas").css("display", "none");
$("#map-canvas3").css("display", "none");
$("#map-canvas5").css("display", "none");
$("#map-canvas4").css("display", "-moz-grid");
 var uluru4 = {lat: 54.283113, lng:-0.399752 };
        var map = new google.maps.Map(document.getElementById('map-canvas4'), {
          zoom: 10,
          center: uluru4
        });
        var marker = new google.maps.Marker({
          position: uluru4,
          map: map
        });
        
        */
        
        
  $("#table4").css("display", "-moz-grid");
  $("#table1").css("display", "none");
  $("#table2").css("display", "none");
  $("#table3").css("display", "none");
  $("#table5").css("display", "none");
  
  
});

$(".btn4").click(function() {

/*
$("#map-canvas2").css("display", "none");
$("#map-canvas").css("display", "none");
$("#map-canvas3").css("display", "none");
$("#map-canvas4").css("display", "none");

$("#map-canvas5").css("display", "-moz-grid");
 var uluru5 = {lat: 43.731548, lng:-79.762418 };
        var map = new google.maps.Map(document.getElementById('map-canvas5'), {
          zoom: 10,
          center: uluru5
        });
        var marker = new google.maps.Marker({
          position: uluru5,
          map: map
        });
    */    
        
  $("#table5").css("display", "-moz-grid");
  $("#table1").css("display", "none");
  $("#table2").css("display", "none");
  $("#table4").css("display", "none");
  $("#table3").css("display", "none");
});
});

</script>
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
					<p style="margin: 0; padding: 0;text-align:left;width:283px;font-size:20px;"><strong><?php echo $_COOKIE['name']; ?>, </strong>Store <?php echo $_COOKIE["username"]; ?></p>
				</td>
				<td style="border:3px solid black;"  width="25%">
					<div class="box" style="width:320px;"> 
						<div align="center" class="">MY <strong>IMPRINT </strong>Report</div>
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
			<br>
			<div style="clear:both"></div>
			<div style="position: relative; margin: 0 auto; padding:0; height: auto; overflow: auto;">
			<?php 
      
      echo '<button class="btn5" style="color:white;cursor:pointer;border: 1px solid black; padding: 10px; float:right;cursor" value="Refresh">Refresh</button>';
      echo '<button class="btn4" style="color:white;cursor:pointer;border: 1px solid black; padding: 10px; float:right;cursor" value="Imprint4">Imprint4</button>';
       echo '<button class="btn3" style="color:white;cursor:pointer;border: 1px solid black; padding: 10px; float:right;cursor" value="Imprint3">Imprint3</button>';
        echo '<button class="btn2" style="color:white;cursor:pointer;border: 1px solid black; padding: 10px; float:right;cursor" value="Imprint2">Imprint2</button>';
       
					echo '<button class="btn1" style="color:white;cursor:pointer;border: 1px solid black; padding: 10px; float:right;cursor" value="Imprint1">Imprint1</button>';
              
            

			?>
			</div>
   <div style="height:52%;float:left;width:50%;" id="map-canvas">map here </div>
   
   
   <div style="float:right;width:50%;height:51%">
			<table id="table1" class="table table-bordered table-inverse single-border"  style="height:51%" cellpadding="2" cellspacing="2">
  

<?php
          //echo count($col_names);   
          
           for ($j = 0; $j < count($col_names); $j++){
              
              
              if($j == 0){
             
             echo '<tr><td><center>'.$row_profile_dat[$col_names[0]].'</center></td></tr>';
             }
             elseif($j == 1){
					  echo '<tr><td><center>'.$row_profile_dat[$col_names[1]].'</center></td></tr>';
					}
                      elseif($j == 2){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[2]].'</c></center></td></tr>';
					}
            elseif($j == 3){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[3]].'</c></center></td></tr>';
					}
           elseif($j == 4){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[4]].'  '.$row_profile_dat[$col_names[5]].'  '.$row_profile_dat[$col_names[6]].' '.$row_profile_dat[$col_names[7]].'</c></center></td></tr>';
					}
            elseif($j == 8){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[8]].' </c></center></td></tr>';
					}
           elseif($j == 9){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[9]].' </c></center></td></tr>';
					}
           elseif($j == 10){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[10]].' </c></center></td></tr>';
					}
          elseif($j == 11){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[11]].' </c></center></td></tr>';
					}
           elseif($j == 12){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[12]].' </c></center></td></tr>';
					}
           elseif($j == 13){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[13]].' </c></center></td></tr>';
					}
           elseif($j == 14){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[14]].' </c></center></td></tr>';
					}
          
          elseif($j == 15){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[15]].' </c></center></td></tr>';
					} 
          
          elseif($j == 16){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[16]].' </c></center></td></tr>';
					}  
          elseif($j == 17){
					  echo '<tr><td><center>'.$row_profile_dat[$col_names[17]].' </center></td></tr>';
					} 
            
            
            
            

              }
        echo '<tr><td><img style="float:right;" src="images/facebook.jpg"/>';
            echo'<img style="float:right;" src="images/rental.jpg"/>';
            echo'<img style="float:right;" src="images/delivery.jpg"/>';
            echo '<img style="float:right;" src="images/gmap.png"/></td></tr>';
         ?>
			</table>
  
	<table id="table2" class="table table-bordered table-inverse single-border"  style="height:450px;display:none"  cellpadding="2" cellspacing="2">

<?php
          
           for ($j = 18; $j < count($col_names); $j++){
            
              
              if($j == 18){
             if($row_profile_dat[$col_names[18]]==1){
             echo '<tr><td><center>'.$row_profile_dat[$col_names[0]].'</center></td></tr>';
             }}
             elseif($j == 19){
             
             if($row_profile_dat[$col_names[19]]==1){
					  echo '<tr><td><center>'.$row_profile_dat[$col_names[1]].'</center></td></tr>';
					}
           }
                      elseif($j == 20){
                      if($row_profile_dat[$col_names[20]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[2]].'</c></center></td></tr>';
					}}
            elseif($j == 21){
            if($row_profile_dat[$col_names[21]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[3]].'</c></center></td></tr>';
					}}
           elseif($j == 22){
           if($row_profile_dat[$col_names[22]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[4]].'  '.$row_profile_dat[$col_names[5]].'  '.$row_profile_dat[$col_names[6]].' '.$row_profile_dat[$col_names[7]].'</c></center></td></tr>';
					}}
            elseif($j == 26){
            if($row_profile_dat[$col_names[26]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[8]].' </c></center></td></tr>';
					}}
           elseif($j == 27){
           if($row_profile_dat[$col_names[27]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[9]].' </c></center></td></tr>';
					}}
           elseif($j == 28){
           if($row_profile_dat[$col_names[28]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[10]].' </c></center></td></tr>';
					}}
          
          
          elseif($j == 29){
           if($row_profile_dat[$col_names[29]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[11]].' </c></center></td></tr>';
					} }
          
          elseif($j == 30){
           if($row_profile_dat[$col_names[30]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[12]].' </c></center></td></tr>';
					}  }
          elseif($j == 31){
           if($row_profile_dat[$col_names[31]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[13]].' </c></center></td></tr>';
					} }
            elseif($j == 32){
           if($row_profile_dat[$col_names[32]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[14]].'</c> </center></td></tr>';
					} }
            elseif($j == 33){
           if($row_profile_dat[$col_names[33]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[15]].'</c> </center></td></tr>';
					} }
             elseif($j == 34){
           if($row_profile_dat[$col_names[33]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[16]].'</c></center></td></tr>';
					} }
             elseif($j == 35){
           if($row_profile_dat[$col_names[34]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[17]].'</c> </center></td></tr>';
					} }
          
   

              }
    echo '<tr><td><img style="float:right;" src="images/facebook.jpg"/>';
            echo'<img style="float:right;" src="images/rental.jpg"/>';
            echo'<img style="float:right;" src="images/delivery.jpg"/>';
            echo '<img style="float:right;" src="images/gmap.png"/></td></tr>';
          
          ?>
			</table>
      
      <table id="table3" class="table table-bordered table-inverse single-border"  style="height:450px;display:none"  cellpadding="2" cellspacing="2">

<?php
          
           for ($j = 36; $j < count($col_names); $j++){
              
              
              if($j == 36){
             if($row_profile_dat[$col_names[36]]==1){
             echo '<tr><td><center>'.$row_profile_dat[$col_names[0]].'</center></td></tr>';
             }}
             elseif($j == 37){
             
             if($row_profile_dat[$col_names[37]]==1){
					  echo '<tr><td><center>'.$row_profile_dat[$col_names[1]].'</center></td></tr>';
					}
           }
                      elseif($j == 38){
                      if($row_profile_dat[$col_names[38]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[2]].'</c></center></td></tr>';
					}}
            elseif($j == 39){
            if($row_profile_dat[$col_names[39]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[3]].'</c></center></td></tr>';
					}}
           elseif($j == 40){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[4]].'  '.$row_profile_dat[$col_names[5]].'  '.$row_profile_dat[$col_names[6]].' '.$row_profile_dat[$col_names[7]].'</c></center></td></tr>';
					}
            elseif($j == 44){
            if($row_profile_dat[$col_names[44]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[8]].' </c></center></td></tr>';
					}}
           elseif($j == 45){
           if($row_profile_dat[$col_names[45]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[9]].' </c></center></td></tr>';
					}}
           elseif($j == 46){
           if($row_profile_dat[$col_names[46]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[10]].' </c></center></td></tr>';
					}}
          
          
          elseif($j == 47){
          if($row_profile_dat[$col_names[47]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[11]].' </c></center></td></tr>';
					} }
          
          elseif($j == 48){
          if($row_profile_dat[$col_names[48]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[12]].' </c></center></td></tr>';
					} } 
          elseif($j == 49){
          if($row_profile_dat[$col_names[49]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[13]].' </c></center></td></tr>';
					} }
          elseif($j == 50){
          if($row_profile_dat[$col_names[50]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[14]].'</c> </center></td></tr>';
					}   }
          elseif($j == 51){
          if($row_profile_dat[$col_names[51]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[15]].' </c></center></td></tr>';
					} }  
               elseif($j == 52){
               if($row_profile_dat[$col_names[52]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[16]].'</c> </center></td></tr>';
					}  }
             
              elseif($j == 53){
              if($row_profile_dat[$col_names[53]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[17]].'</c> </center></td></tr>';
					}  }

              }
  
           echo '<tr><td><img style="float:right;" src="images/facebook.jpg"/>';
            echo'<img style="float:right;" src="images/rental.jpg"/>';
            echo'<img style="float:right;" src="images/delivery.jpg"/>';
            echo '<img style="float:right;" src="images/gmap.png"/></td></tr>';
          ?>
			</table>
      
      
      <table id="table4" class="table table-bordered table-inverse single-border"  style="height:450px;display:none"  cellpadding="2" cellspacing="2">

<?php
          
           for ($j = 54; $j < count($col_names); $j++){
              
              
              if($j == 54){
             if($row_profile_dat[$col_names[54]]==1){
             echo '<tr><td><center>'.$row_profile_dat[$col_names[0]].'</center></td></tr>';
             }}
             elseif($j == 55){
             
             if($row_profile_dat[$col_names[55]]==1){
					  echo '<tr><td><center>'.$row_profile_dat[$col_names[1]].'</center></td></tr>';
					}
           }
                      elseif($j == 56){
                      if($row_profile_dat[$col_names[56]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[2]].'</c></center></td></tr>';
					}}
            elseif($j == 57){
            if($row_profile_dat[$col_names[57]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[3]].'</c></center></td></tr>';
					}}
           elseif($j == 58){
           if($row_profile_dat[$col_names[58]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[4]].'  '.$row_profile_dat[$col_names[5]].'  '.$row_profile_dat[$col_names[6]].' '.$row_profile_dat[$col_names[7]].'</c></center></td></tr>';
					}}
            elseif($j == 62){
            if($row_profile_dat[$col_names[59]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[8]].' </c></center></td></tr>';
					}}
           elseif($j == 63){
           if($row_profile_dat[$col_names[60]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[9]].' </c></center></td></tr>';
					}}
           elseif($j == 64){
           if($row_profile_dat[$col_names[61]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[10]].' </c></center></td></tr>';
					}}
          
          
          elseif($j == 65){
          if($row_profile_dat[$col_names[62]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[11]].' </c></center></td></tr>';
					} }
          
          elseif($j == 66){
          if($row_profile_dat[$col_names[63]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[12]].' </c></center></td></tr>';
					} }
          elseif($j == 67){
          if($row_profile_dat[$col_names[64]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[13]].' </c></center></td></tr>';
					} }
          elseif($j == 68){
          if($row_profile_dat[$col_names[65]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[14]].' </c></center></td></tr>';
					}}    
          elseif($j == 69){
          if($row_profile_dat[$col_names[66]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[15]].' </c></center></td></tr>';
					} }
           elseif($j == 70){
           if($row_profile_dat[$col_names[67]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[16]].' </c></center></td></tr>';
					} }
           elseif($j == 71){
           if($row_profile_dat[$col_names[68]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[17]].' </c></center></td></tr>';
					} }
       }
        echo '<tr><td><img style="float:right;" src="images/facebook.jpg"/>';
            echo'<img style="float:right;" src="images/rental.jpg"/>';
            echo'<img style="float:right;" src="images/delivery.jpg"/>';
            echo '<img style="float:right;" src="images/gmap.png"/></td></tr>';
          
          ?>
			</table>
       <table id="table5" class="table table-bordered table-inverse single-border"  style="height:450px;display:none" cellpadding="2" cellspacing="2">

<?php
          
           for ($j = 72; $j < count($col_names); $j++){
              
              
              if($j == 72){
             if($row_profile_dat[$col_names[72]]==1){
             echo '<tr><td><center>'.$row_profile_dat[$col_names[0]].'</center></td></tr>';
             }}
             elseif($j == 73){
             
             if($row_profile_dat[$col_names[73]]==1){
					  echo '<tr><td><center>'.$row_profile_dat[$col_names[1]].'</center></td></tr>';
					}
           }
                      elseif($j == 74){
                      if($row_profile_dat[$col_names[74]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[2]].'</c></center></td></tr>';
					}}
            elseif($j == 75){
            if($row_profile_dat[$col_names[75]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[3]].'</c></center></td></tr>';
					}}
           elseif($j == 76){
           if($row_profile_dat[$col_names[76]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[4]].'  '.$row_profile_dat[$col_names[5]].'  '.$row_profile_dat[$col_names[6]].' '.$row_profile_dat[$col_names[7]].'</c></center></td></tr>';
					}}
            elseif($j == 80){
            if($row_profile_dat[$col_names[80]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[8]].' </c></center></td></tr>';
					}}
           elseif($j == 81){
           if($row_profile_dat[$col_names[81]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[9]].' </c></center></td></tr>';
					}}
           elseif($j == 82){
           if($row_profile_dat[$col_names[82]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[10]].' </c></center></td></tr>';
					}}
          
          
          elseif($j == 83){
          if($row_profile_dat[$col_names[83]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[11]].' </c></center></td></tr>';
					} }
          
          elseif($j == 84){
          if($row_profile_dat[$col_names[84]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[12]].' </c></center></td></tr>';
					} }
          elseif($j == 85){
          if($row_profile_dat[$col_names[85]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[13]].' </c></center></td></tr>';
					} }
          elseif($j == 86){
          if($row_profile_dat[$col_names[86]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[14]].' </c></center></td></tr>';
					}}    
          elseif($j == 87){
          if($row_profile_dat[$col_names[87]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[15]].' </c></center></td></tr>';
					} }
           elseif($j == 88){
           if($row_profile_dat[$col_names[88]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[16]].' </c></center></td></tr>';
					} }
           elseif($j == 89){
           if($row_profile_dat[$col_names[89]]==1){
					  echo '<tr><td><center><c style="margin-top:30px;font-size:12px;">'.$row_profile_dat[$col_names[17]].' </c></center></td></tr>';
					} }
    
  }
           echo '<tr><td><img style="float:right;" src="images/facebook.jpg"/>';
            echo'<img style="float:right;" src="images/rental.jpg"/>';
            echo'<img style="float:right;" src="images/delivery.jpg"/>';
            echo '<img style="float:right;" src="images/gmap.png"/></td></tr>';
          ?>
			</table>
       

</div>