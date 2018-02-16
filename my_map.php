<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Distribution</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/main.css">
<style type="text/css">
.style7 {font-family: Arial Narrow,Arial,sans-serif}
a,button {
 cursor: pointer !important;
}
#map {
	height: 100%;
}
html, body {
	height: 100%;
}
</style>





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
			<div class="row">
				<div class="col-md-2">
					<a href="my_dist.php" style="">
					  <button class="btn btn-danger" style=""><b>RETURN</b></button>
					</a>
				</div>	
				
				<div class="">
					<a href="national_map.php" style="">
						<button class="btn btn-warning" id="national"><b>National Program</b></button>
					</a>
          <a href="my_map.php" style="">
						<button class="btn btn-info" id="optional"><b>Optional Program</b></button>
					</a>
          <a href="my_map.php" style="">
						<button class="btn btn-primary" id="catalogue"><b>Catalogue Program</b></button>
					</a>	
               
               
               
 
                </div>
			</div>
			<br><br>
		</div> <!-- wrapper div -->
	</div>
</div>
<div class="container-fluid" style="height:100%">    
	<div class="row" style="height:100%">
		<div class="col-md-12" style="height:100%">
			<div width="20%" height="20%" id="map"></div>
		</div>
	</div>	
</div>	
   
</body>
<?php
mssqlsrv_free_stmt($stmt3);
?>
</html>