<?php require_once('Connections/User_Information.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "home.php";
  $MM_redirectLoginFailed = "access_denied.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_User_Information, $User_Information);
  
  $LoginRS__query=sprintf("SELECT USERNAME, PASSWORD FROM ON_LOGIN1 WHERE USERNAME='%s' AND PASSWORD='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $User_Information) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     // Find name from ON_STORES
	 mysql_select_db($database_User_Information, $User_Information);
	 $query = "SELECT CONTACT1 FROM ON_STORES WHERE store = '".$loginUsername."'";
	 $contact = mysql_query($query, $User_Information) or die(mysql_error());
     $contact = mysql_fetch_assoc($contact);
     $loginStrGroup = "";
    //tempoary cookie until you get sessions working between this and the flyer view
    setcookie("username", $loginUsername, time() + (60*60), "/"); // good for 1 hour
	setcookie("name", ($contact['CONTACT1'] != '' || $contact['CONTACT1'] != null) ? $contact['CONTACT1'] : "   ");
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="favicon.ico.ico" type="image/x-icon" />
<title> Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">	

<style type="text/css">
.circle {
 cursor: url("images/circle.png"), auto !important;
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
				<td width="337"><img src="logos/HH.png" class="img-responsive" width="333" height="95" /></td>
				<td><img src="Images/BANNER5SLICE.jpg" class="img-responsive" height="76" /></td>
			  </tr>
			</table>
		</div>
	</div>		
</div>
<div class="container" align="left"> 
    <div class="row">
        <div class="col-md-12">
			<h1 align="center" class="style3 style4">Please Sign in   </h1>
			<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" name ="login_form">
			<div align="center">
			  <div align="center">
				<div align="center">
				<div align="center">
				  <div align="center">
				  <div align="center">
				  <div align="center">
				  <div align="center">
					<div align="center">
					  <div align="center">
						<div align="center">
						  <div align="center">
							<div align="center">
							  <div align="center">
								<input type="text" name ="username" placeholder="Store Number">
								<label>
							  </div>
							  <div align="center"><span class="style8"><b>Store Number</b></span><br/> 
							  <br/>
			</div>
			</label>
				  
					<span class="style1">
				  
					<div align="center">
					  <div align="center">
					  <div align="center">
					  <div align="center">
					  <div align="center">
						<input type="password" name="password"placeholder="Password" />
						<br/>
						<span class="style7">
						<label>
						<span class="style8">Password</span><br/>
						<br/>
						<label>
						<input type="submit" class="btn btn-success circle" value="Login">
			  </div>
			</form>
			 <div align="center"><a href="register.php" class="style4"></a> </div>
		</div>
	</div>		
</div>
 
</body>
</html>
