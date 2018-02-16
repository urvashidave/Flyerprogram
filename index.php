<?php
require_once('Connections/User_Information.php');
?>
<?php
// Mysql Connection

//Go to host my site to check if credentials are OK 

$connectionInfo1 = array(
    "Database" => $database_User_Information2,
    "UID" => $username_User_Information2,
    "PWD" => $password_User_Information2,
    "CharacterSet" => "UTF-8"
);
$conn            = sqlsrv_connect($hostname_User_Information2, $connectionInfo1);
if ($conn === false) {
    die('mssql not connecting : ' . sqlsrv_errors());
}
//
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
    session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
    $loginStorename          = $_POST['storename'];
    $loginUsername           = $_POST['username'];
    $password                = $_POST['password'];
    $MM_fldUserAuthorization = "";
    $MM_redirectLoginSuccess = "home.php";
    $MM_redirectLoginFailed  = "access_denied.php";
    $MM_redirecttoReferrer   = false;
    
    $stmt           = sqlsrv_query($conn, "SELECT * FROM db1101621_marketfocus.dbo.HomeHardwareStores where LOCATION= '$loginUsername' AND PASSWORD='$password'");
    $loginFoundUser = sqlsrv_has_rows($stmt);
    //If Credentials are Ok come back to webbox Dealer Database and fetch data
    if ($loginFoundUser == true) {
        // Find name from ON_STORES
       // $stmt           = sqlsrv_query($conn, "SELECT * FROM DEALER.dbo.HomeHardwareStores where LOCATION='$loginUsername' AND PASSWORD='$password'");
        
      //  echo "SELECT * FROM DISTRIBUTION.dbo.CLIENT_STORES where CLIENT_CODE='$loginStorename' AND STORE LIKE '$loginUsername%'";
      //  exit;
        
        
        $stmt = sqlsrv_query($conn, "UPDATE db1101621_marketfocus.dbo.HomeHardwareStores  SET LOGINCOUNT = LOGINCOUNT+1 where LOCATION='$loginUsername' AND PASSWORD='$password'");
        
        
        $connectionInfo2 = array(
            "Database" => $database_User_Information,
            "UID" => $username_User_Information,
            "PWD" => $password_User_Information,
            "CharacterSet" => "UTF-8"
        );
        $conn            = sqlsrv_connect($hostname_User_Information, $connectionInfo2);
        if ($conn === false) {
            die('mssql not connecting : ' . sqlsrv_errors());
        }
        
        
        
        $values_to_call = "'" . $loginStorename . "','" . $loginUsername . "'";
        $params[]       = "CLIENT_CODE";
        $params[]       = "STORE";
        $tsql_callSP    = "EXEC DEALER.DBO.p_Load_Store_Information  $values_to_call ";
        $stmt3          = sqlsrv_query($conn, $tsql_callSP, $params);
        $contact        = sqlsrv_fetch_array($stmt3, SQLSRV_FETCH_ASSOC);
        
        //echo $contact['CONTACT1'];
        
        $loginStrGroup = "";
        //tempoary cookie until you get sessions working between this and the flyer view
        setcookie("username", $loginUsername, time() + (60 * 60), "/"); // good for 1 hour
        setcookie("storename", $loginStorename, time() + (60 * 60), "/"); // good for 1 hour
        //setcookie("name", ($contact['CONTACT1'] != '' || $contact['CONTACT1'] != null) ? $contact['CONTACT1'] : "   ");
        setcookie("name", ($contact['CONTACT1'] != '' || $contact['CONTACT1'] != null) ? $contact['CONTACT1'] : "   ");
        //declare two session variables and assign them
        $_SESSION['MM_Username']  = $loginUsername;
        $_SESSION['MM_storename'] = $loginStorename;
        $_SESSION['MM_UserGroup'] = $loginStrGroup;
        
        if (isset($_SESSION['PrevUrl']) && false) {
            $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
        }
        header("Location: " . $MM_redirectLoginSuccess);
    } else {
        header("Location: " . $MM_redirectLoginFailed);
    }
}


?>
<?php
include("banner.php");
?>
<style type="text/css">
.circle {
 cursor: pointer !important;
}
.row {
    margin-right: 8px !important;
    margin-left: 19px !important;
}
body{
font-family: Arial, Helvetica, sans-serif;
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
  margin: 8% 14% auto;
  width: 640px;
}

.login {
  position: relative;
  margin: 0 auto;
  padding: 20px 13px 20px;
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


</style>
<div class="container" align="left"> 
    <div class="row">
    <div style="color:red"><center>
    <?php
if (isset($_GET['msg'])) {
    print $_GET['msg'];
}
?>
</center>
</div>
<?php 
$parts = explode("/", $_SERVER[REQUEST_URI]);
//echo $parts[2];

//exit;
?>
        <div class="col-md-12">
            <section class="container">
    <div class="login">
      <h1>Login to Home Hardware</h1>
      <form method="post" action="<?php
echo $loginFormAction;
?>" METHOD="POST" name ="login_form">
        <p><input type="text" name="username" value="" placeholder="Store Number"></p>
        <p><input type="password" id="password" name="password" value="" placeholder="Password">
                    <input type="hidden" name ="storename" value="<?php echo $parts[2]; ?>" placeholder="Store Name">
          
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

  </section>
             <div align="center"><a href="register.php" class="style4"></a> </div>
        </div>
    </div>        
</div>
 
</body>
</html>