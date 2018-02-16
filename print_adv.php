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
    ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<title>PRINT ADVERTISING PROGRAM</title>
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<style type="text/css">
a,button {
 cursor: pointer !important;
}

.row {
    margin-right: 8px !important;
    margin-left: 19px !important;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	
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
					<p style="margin: 0; padding: 0;text-align:left;width:283px;font-size:20px;"><strong><?php echo $_COOKIE['name']; ?>,</strong></p>
					<p style="margin: 0; padding: 0;text-align:left;">Store <?php echo $_COOKIE["username"]; ?></p>
				</td>
				<td style="border:3px solid black;"  width="25%">
					<div class="box" style="width:320px;"> 
						<div align="center" class="style9">Print <strong>Advertising</strong> Program</div>
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
			<br><br>
			<table class="table table-bordered table-inverse single-border" width="100%"  border="1" border-spacing="2px" style="float:left;" cellpadding="0" cellspacing="0">
			  <tr>
			  
				<td width="100%" height="290">
					<div style="clear:both;"></div>
				  <div>
					<table width="100%" border="0" cellspacing="2" cellpadding="2">
						<tr>
							<td width="209" class="style1"><div align="center" class="style8 style9"><span class="style5"> 2017 Print Advt Program </span></div></td>
							<td width="157" class="style1"><div align="center" class="style8 style9"><span class="style5">2017 Calendar </span></div></td>
							<td width="177" class="style1"><div align="center" class="style8 style9"><span class="style5">2017 Advt Schedule </span></div></td>
							<td width="198" class="style1"><div align="center" class="style8 style9"><span class="style5">Advertising Contract </span></div></td>
						</tr>
						<tr>
							<td align="center">
								<a href="pdf/2017 advertising all.pdf">
									<img src="Images/2017ic.jpg" alt="advert" width="184" height="186" border="0" />
								</a> 
							</td>
							<td align="center">
								<a href="pdf/2017 Calendar.pdf"> 
									<img src="Images/calendar.jpg" alt="calendar" width="184" height="186" border="0" />
								</a> 
							</td>
							<td align="center">
								<a href="pdf/2017 advertising schedule.pdf"> 
									<img src="Images/2017 advertising schedule ico.jpg" width="184" height="186" border="0" />
								</a> 
							</td>
							<td align="center">
								<a href="pdf/Understanding Key Reports.pdf"> 
									<img src="Images/Advertising contract.jpg" alt="advertising contract" width="184" height="186" border="0" />
								</a>
							</td>
						</tr>
					</table>
				  </div>	  
				</td>
			  </tr>
			</table>
		</div> <!-- wrapper div -->
	</div>
</div>	
</body>


</html>
