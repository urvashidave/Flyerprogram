<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<title> Login</title>
<?php $msg=$_GET['msg'];
if($msg=='Password Changed Successfully..'){

?>


 <script type="text/JavaScript">
      setTimeout("location.href = 'index.php';",2500);
 </script>


<?php


}?>

<script>


function checkPassword(){
    var p1 = document.getElementById("password").value;
	var p2 = document.getElementById("confirmPassword").value;
	if (p1 === p2 && p1.length > 5) {
	    document.getElementById("passwordForm").submit();
     
		return true;
   
	} else {
	    p1.value = "";
		p2.value = "";
	    window.alert("Passwords do not match and/or password must be at least 7 characters, please try again");
		return false;
	}
}
</script>

<style type="text/css">

img {
    cursor: pointer;
	cursor: hand;
}
.row {
    margin-right: 8px !important;
    margin-left: 19px !important;
}
.totals{
background-color:grey;
}

.flyer-type-header{
	padding-top: 20px !important;
}


@media print {
  img {
    max-width: none !important;
  }
}
.style9 {font-size: 20px; padding-left: 20px; padding-right: 20px; border-sizing: border-box;}
table.table-bordered{
    border:1px solid black;
  }
table.table-bordered > thead > tr > th{
    border:1px solid black;
}
table.table-bordered > tbody > tr > td{
    border:1px solid black;
}
.style7 {font-family: Arial Narrow,Arial,sans-serif}
a,button {
 cursor: pointer !important;
}


</style>

<style type="text/css">
.circle {
 cursor: pointer !important;
}
body{
font-family: Arial Narrow,Arial,sans-serif;
}
.about {
  margin: 70px auto 40px;
  padding: 8px;
  width: 260px;
  font: 10px/18px 'Lucida Grande', Arial, sans-serif;
  color: #666;
  text-align: center;
  text-shadow: 0 1px rgba(255, 255, 255, 0.25);
  background: #eee;
  background: rgba(250, 250, 250, 0.8);
  border-radius: 4px;
  background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
  background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
  background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
  background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.1));
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 0 0 1px rgba(255, 255, 255, 0.1), 0 0 6px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.3), inset 0 0 0 1px rgba(255, 255, 255, 0.1), 0 0 6px rgba(0, 0, 0, 0.2);
}
.about a {
  color: #333;
  text-decoration: none;
  border-radius: 2px;
  -webkit-transition: background 0.1s;
  -moz-transition: background 0.1s;
  -o-transition: background 0.1s;
  transition: background 0.1s;
}
.about a:hover {
  text-decoration: none;
  background: #fafafa;
  background: rgba(255, 255, 255, 0.7);
}

.about-links {
  height: 30px;
}
.about-links > a {
  float: left;
  width: 50%;
  line-height: 30px;
  font-size: 12px;
}

.about-author {
  margin-top: 5px;
}
.about-author > a {
  padding: 1px 3px;
  margin: 0 -1px;
}

/*
 * Copyright (c) 2012-2013 Thibaut Courouble
 * http://www.cssflow.com
 *
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 */
.container {
  margin: 80px auto;
  width: 640px;
}

.login {
  position: relative;
  margin: 0 auto;
  padding: 20px 20px 20px;
  width: 310px;
  background: white;
  border-radius: 3px;
  -webkit-box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
  box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
}
.login:before {
  content: '';
  position: absolute;
  top: -8px;
  right: -8px;
  bottom: -8px;
  left: -8px;
  z-index: -1;
  background: rgba(0, 0, 0, 0.08);
  border-radius: 4px;
}
.login h1 {
  margin: -20px -20px 21px;
  line-height: 40px;
  font-size: 15px;
  font-weight: bold;
  color: #555;
  text-align: center;
  text-shadow: 0 1px white;
  background: #f3f3f3;
  border-bottom: 1px solid #cfcfcf;
  border-radius: 3px 3px 0 0;
  background-image: -webkit-linear-gradient(top, whiteffd, #eef2f5);
  background-image: -moz-linear-gradient(top, whiteffd, #eef2f5);
  background-image: -o-linear-gradient(top, whiteffd, #eef2f5);
  background-image: linear-gradient(to bottom, whiteffd, #eef2f5);
  -webkit-box-shadow: 0 1px whitesmoke;
  box-shadow: 0 1px whitesmoke;
}
.login p {
  margin: 20px 0 0;
}
.login p:first-child {
  margin-top: 0;
}
.login input[type=text], .login input[type=password] {
  width: 278px;
}
.login p.remember_me {
  float: left;
  line-height: 31px;
}
.login p.remember_me label {
  font-size: 12px;
  color: #777;
  cursor: pointer;
}
.login p.remember_me input {
  position: relative;
  bottom: 1px;
  margin-right: 4px;
  vertical-align: middle;
}
.login p.submit {
  text-align: right;
}

.login-help {
  margin: 20px 0;
  font-size: 11px;
  color: white;
  text-align: center;
  text-shadow: 0 1px #2a85a1;
}
.login-help a {
  color: #cce7fa;
  text-decoration: none;
}
.login-help a:hover {
  text-decoration: underline;
}

:-moz-placeholder {
  color: #c9c9c9 !important;
  font-size: 13px;
}

::-webkit-input-placeholder {
  color: #ccc;
  font-size: 13px;
}

input {
  font-family: 'Lucida Grande', Tahoma, Verdana, sans-serif;
  font-size: 14px;
}

input[type=text], input[type=password] {
  margin: 5px;
  padding: 0 10px;
  width: 200px;
  height: 34px;
  color: #404040;
  background: white;
  border: 1px solid;
  border-color: #c4c4c4 #d1d1d1 #d4d4d4;
  border-radius: 2px;
  outline: 5px solid #eff4f7;
  -moz-outline-radius: 3px;
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.12);
}
input[type=text]:focus, input[type=password]:focus {
  border-color: #7dc9e2;
  outline-color: #dceefc;
  outline-offset: 0;
}

input[type=submit] {
  padding: 0 18px;
  height: 29px;
  font-size: 12px;
  font-weight: bold;
  color: #527881;
  cursor:pointer;
  text-shadow: 0 1px #e3f1f1;
  background: #cde5ef;
  border: 1px solid;
  border-color: #b4ccce #b3c0c8 #9eb9c2;
  border-radius: 16px;
  outline: 0;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
  background-image: -webkit-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: -moz-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: -o-linear-gradient(top, #edf5f8, #cde5ef);
  background-image: linear-gradient(to bottom, #edf5f8, #cde5ef);
  -webkit-box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
  box-shadow: inset 0 1px white, 0 1px 2px rgba(0, 0, 0, 0.15);
}
input[type=submit]:active {
  background: #cde5ef;
  border-color: #9eb9c2 #b3c0c8 #b4ccce;
  -webkit-box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.2);
}

.lt-ie9 input[type=text], .lt-ie9 input[type=password] {
  line-height: 34px;

  .hideShowPassword-toggle {
    background-image: url(logos/HH.png);
    background-position: 0 center;
    background-repeat: no-repeat;
    cursor: pointer;
    height: 100%;
    overflow: hidden;
    text-indent: -9999em;
    width: 44px;
  }
  .hideShowPassword-toggle-hide {
    background-position: -44px center;
  }
  /*
   * Because our input elements have a z-index so that
   * their borders will overlap on focus, we'll give ours
   * a higher one to make sure they're always visible.
   */
  .hideShowPassword-toggle,
  .my-toggle-class {
    z-index: 3;
  }
</style>
<style>
a,button {
 cursor: pointer !important;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
					<p style="margin: 0; padding: 0;text-align:left;font-size:20px;">Store <?php echo $_COOKIE["username"]; ?></p>
				</td>
				<td style="" width="25%">
					<div class="box" style="width:320px;"> 
						<div align="center" class="style9"><strong>EDIT PASSWORD</strong> </div>
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
			
			<input name="edit_string" type="hidden" id="edit_string" value="<?php echo $edit_string; ?>" size="100" />
			<div width="100%;clear:both;">
				<a href="home.php" style="float:left;margin-left:0;">
				  <button class="btn btn-danger" style=""><b>RETURN</b></button>
				</a>
			</div>
			<br/><br/>
			<div style="clear:both;"></div>
			 <div class="col-md-12">
         <div><center style="color:green"><?php echo $_GET['msg'];?><center></div>
			<section class="container">
          <div class="login">
    
   
				<form action="change_password.php" method="POST" name="passwordForm" id="passwordForm">
        
				  <p>		  <input type="password" placeholder="Password" class="form-control" name="password" id="password" /></p>
					  <p>
						  <input type="password" class="form-control" placeholder="Connfirm Password" name="confirmPassword" id="confirmPassword"/></p>
						  <input type="hidden" name="username" value="<?php echo $_COOKIE['username']; ?>"/>
            <p><button onclick="return checkPassword();" class="btn btn-primary ">Change Password</button></p>
					  </div>
					 
							
					  </div>
				  </div>  
				</form>
			</div>	 
		</div>
	</div>
</div>	
</body>
</html>
