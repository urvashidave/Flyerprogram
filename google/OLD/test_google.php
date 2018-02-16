<?php require_once('User_Connection.php'); ?>
<?php
	$sql = "SELECT DISTINCT CLIENT_CODE FROM STORE_BOUNDARY ORDER BY 1";
	$stmt = sqlsrv_query( $conn, $sql );
	if ( $stmt !== false) 
		{$client_data = array();
		while ( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
			{if ( !array_key_exists($row["CLIENT_CODE"], $client_data)) 
				{	array_push( $client_data, array( $row["CLIENT_CODE"] => array() ) );
					$client_data[$row["CLIENT_CODE"]] = array();
				};
			}
		} 
	else {	echo "Error with query: ". die(print_r( sqlsrv_errors(), true ));	}
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>
    <style>
        .main-form {
            position: relative;
            width: 60%;
            height: 30%;
            margin: 10% auto;
            border: 1px solid black;
			padding: 5% 0;
        }

        label, select {
			margin-top: 10px;
			display: inline-block;
			vertical-align: middle;
        }
		select {
			width: 25%;
			margin-left: 10px;
		}
		label {
			text-align: right;
		}
		.centered {
			width: 80%;
			height: auto;
			margin: 0 auto;
			text-align: center;
		}
		.logo-img {
			position: relative:
			margin: 2% auto;
			max-width: 100%;
			height: 25vh;
		}
		.BigTitle {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 16px;
			color: #000000;
			text-decoration: none;
			line-height: 16px;
			font-weight: bold;
		}
		.HugeTitle {
			font-family: Verdana, Arial, Helvetica, sans-serif;
			font-size: 24px;
			color: #000000;
			text-decoration: none;
			line-height: 26px;
			font-weight: bold;
		}
    </style>
</head>
<body>
	<div class="main-form">
		<div class="centered">
			<img class="img-logo" src="market.jpg"/>
		</div>
		<div class="centered">
			<p class="HugeTitle">Flyer Distribution Program</p>
		</div>
		<div class="centered">
		  <form action="display_store_info.php" method="get">
				<label>Client: </label><select id="CLIENT_CODE" name="CLIENT_CODE" onChange="updateDockets();"></select><br/>
			<label>Docket: </label><select id="PROJECT" name="PROJECT" onChange="updateStores();"></select><br/>
			<label>Store: </label><select id="STORE" name="STORE"></select><br/><br/>
			<input type="Submit" value="Enter"/>
		  </form>
		</div>
	</div>
    <script>

    	var clientData = <?php echo json_encode($client_data); ?>;

        function updateDockets() {
       var currentClient = document.getElementById("CLIENT_CODE");
            var currentClientValue = currentClient.options[currentClient.selectedIndex].value;

   
            var docketSelect = document.getElementById("PROJECT");
            docketSelect.length = 0;

            for (var docket in clientData[currentClientValue]) {
                var option = document.createElement("option");
                option.text = option.value = docket;
                docketSelect.add(option);
            }
            updateStores();
        }

        function updateStores() {
            
            var currentClient = document.getElementById("CLIENT_CODE");
            var clientValue = currentClient.options[currentClient.selectedIndex].value;

            
            var docketSelect = document.getElementById("PROJECT");
            var docket = docketSelect.options[docketSelect.selectedIndex].value;

            
            var storeSelect = document.getElementById("STORE");
            storeSelect.length = 0;

            
            for (var i = 0; i < clientData[clientValue][docket].length; i++) {
                var storeOption = document.createElement("option");
                storeOption.value = clientData[clientValue][docket][i]["id"];
                storeOption.text = clientData[clientValue][docket][i]["value"];
                storeSelect.add(storeOption);
            }
        }

        function populateInitialData() {
            var clientSelect = document.getElementById("CLIENT_CODE");
            for (var client in clientData) {
                var option = document.createElement("option");
                option.text = option.value = client;
                clientSelect.add(option);
            }
        }
        populateInitialData();
		updateDockets();
    </script>
</body>
</html>