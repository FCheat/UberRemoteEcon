<?php
  #CSS & FURTHER DATA REDACTED FOR SECURITY PURPOSES
  #INFORMATION NEEDS TO BE MANUALLY ADDED IN <> SPACES

  $conn = new mysqli("<ip>", "<username>", "<password>", "<database>", "<port>");
  if ($conn->connect_error)
  {
    die("*ConError");
  }
  
  if ($_REQUEST['forwardCommand'])
  {
    if ($_REQUEST['forwardCommand'] == 'true')
    {
      $UpdateTable = $_REQUEST['updateTable'];
			$UpdateFindColumnName = $_REQUEST['FCol'];
			$UpdateFindColumnInfo = $_REQUEST['FInfo'];
			$UpdateSetColumnName1 = $_REQUEST['SCol1'];
			$UpdateSetColumnInfo1 = $_REQUEST['SInfo1'];
			$UpdateSetColumnName2 = $_REQUEST['SCol2'];
			$UpdateSetColumnInfo2 = $_REQUEST['SInfo2'];
			$CommandSet;
      
      if ($_REQUEST['Sets'] == '2')
			  $CommandSet = "UPDATE " . $UpdateTable . " SET " . $UpdateSetColumnName1 . " = '" . $UpdateSetColumnInfo1 . "', " . $UpdateSetColumnName2 . " = '" . $UpdateSetColumnInfo2 . "' WHERE " . $UpdateFindColumnName . " = '" . $UpdateFindColumnInfo . "'";
			else
				$CommandSet = "UPDATE " . $UpdateTable . " SET " . $UpdateSetColumnName1 . " = '" . $UpdateSetColumnInfo1 . "' WHERE " . $UpdateFindColumnName . " = '" . $UpdateFindColumnInfo . "'";
			
			$conn->query($CommandSet);
			header("Location: admin_panel.php", true, 301);
			exit();
    }
  }
?>

<html>
<head>
<meta charset='UTF-8'>
<meta name="robots" content="noindex">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Cardo' rel='stylesheet' type='text/css'>
<title>Unturned - Database Management</title>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	font-size:85%; color:#24c089;
}
th, td {
    padding: 5px;
    text-align: left;
}
div.container {
    width: 400px;
    border: 1px solid gray;
	display:inline-block;
	line-height: 0.10;
}
input {
	color: #24c089;
	background-color: #505050;
	font-size:105%;
}
button {
	color: #fff;
	background-color: #787878;
	font-size:105%;
}
</style>
</head>
<body style="color:#24c089; background-color:#505050;">
	
	<h1 style="color:#fff;">Uber PVP Remote Econ | Basic</h1>
	
	<?php
		$sql = "SELECT steamId, balance FROM uconomy";
		$result = $conn->query($sql);
		echo ('<div class="container"><table style="width: 400px; height: 413.6px; overflow-y: scroll; display:block; font-size:115%;">');
		echo ('<tr style="border-bottom: 1px solid #000;">');
		echo ('<th style="width:200px;">SteamID<br>(' . mysqli_num_rows($result) . ')</th>');
		echo ('<th style="width:200px;">Balance</th>');
		echo ('</tr>');
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo ('<tr>');
				echo ('<th>' . $row['steamId'] . '</th>');
				echo ('<th>' . $row['balance'] . '</th>');
				echo ('</tr>');
			}
		}
		echo ('</table>');
		echo ('<form name="SetBal" id="SetBal" action="http://<websiteLink>/basic.php">');
		echo ('<input type="hidden" name="idip" value="20"><br>');
		echo ('<input type="hidden" name="Sets" value="1"><br>');
		echo ('<input type="hidden" name="forwardCommand" value="true"><br>');
		echo ('<input type="hidden" name="updateTable" value="uconomy"><br>');
		echo ('<input type="hidden" name="FCol" value="steamId"><br>');
		echo ('<input type="hidden" name="SCol1" value="balance"><br>');
		echo ('<input type="text" name="FInfo" value="steamId"><br>');
		echo ('<input type="text" name="SInfo1" value="balance"><br>');
		echo ('</form>');
		echo ('<button type="submit" form="SetBal" value="Submit">Update Balance</button></div>');
		
		
		
		
		
		
		
		
		
		$sql = "SELECT id, itemname, cost, buyback FROM uconomyitemshop";
		$result = $conn->query($sql);
		echo ('<div class="container"><table style="width: 400px; height: 385px; overflow-y: scroll; display:block; font-size:115%;">');
		echo ('<tr style="border-bottom: 1px solid #000;">');
		echo ('<th style="width:70px;">ID<br>(' . mysqli_num_rows($result) . ')</th>');
		echo ('<th style="width:180px;">Name</th>');
		echo ('<th style="width:130px;">Cost</th>');
		echo ('<th style="width:150px;">Sell $</th>');
		echo ('</tr>');
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo ('<tr>');
				echo ('<th>' . $row['id'] . '</th>');
				echo ('<th>' . $row['itemname'] . '</th>');
				echo ('<th>' . $row['cost'] . '</th>');
				echo ('<th>' . $row['buyback'] . '</th>');
				echo ('</tr>');
			}
		}
		echo ('</table>');
		echo ('<form name="SetItemCost" id="SetItemCost" action="http://<websiteLink>/basic.php">');
		echo ('<input type="hidden" name="idip" value="20"><br>');
		echo ('<input type="hidden" name="Sets" value="2"><br>');
		echo ('<input type="hidden" name="forwardCommand" value="true"><br>');
		echo ('<input type="hidden" name="updateTable" value="uconomyitemshop"><br>');
		echo ('<input type="hidden" name="FCol" value="id"><br>');
		echo ('<input type="hidden" name="SCol1" value="cost"><br>');
		echo ('<input type="hidden" name="SCol2" value="buyback"><br>');
		echo ('<input type="text" name="FInfo" value="id"><br>');
		echo ('<input type="text" name="SInfo1" value="cost"><br>');
		echo ('<input type="text" name="SInfo2" value="sellprice"><br>');
		echo ('</form>');
		echo ('<button type="submit" form="SetItemCost" value="Submit">Update Price</button></div>');
		
		
		
		$sql = "SELECT id, vehiclename, cost FROM uconomyvehicleshop";
		$result = $conn->query($sql);
		echo ('<div class="container"><table style="width: 400px; height: 413.6px; overflow-y: scroll; display:block; font-size:115%;">');
		echo ('<tr style="border-bottom: 1px solid #000;">');
		echo ('<th style="width:90px;">ID<br>(' . mysqli_num_rows($result) . ') </th>');
		echo ('<th style="width:180px;">Name</th>');
		echo ('<th style="width:150px;">Cost</th>');
		echo ('</tr>');
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
				echo ('<tr>');
				echo ('<th>' . $row['id'] . '</th>');
				echo ('<th>' . $row['vehiclename'] . '</th>');
				echo ('<th>' . $row['cost'] . '</th>');
				echo ('</tr>');
			}
		}
		echo ('</table>');
		echo ('<form name="SetVehCost" id="SetVehCost" action="http://<websiteLink>/basic.php">');
		echo ('<input type="hidden" name="idip" value="20"><br>');
		echo ('<input type="hidden" name="Sets" value="1"><br>');
		echo ('<input type="hidden" name="forwardCommand" value="true"><br>');
		echo ('<input type="hidden" name="updateTable" value="uconomyvehicleshop"><br>');
		echo ('<input type="hidden" name="FCol" value="id"><br>');
		echo ('<input type="hidden" name="SCol1" value="cost"><br>');
		echo ('<input type="text" name="FInfo" value="id"><br>');
		echo ('<input type="text" name="SInfo1" value="cost"><br>');
		echo ('</form>');
		echo ('<button type="submit" form="SetVehCost" value="Submit">Update Price</button></div>');
		
		$conn->close();
		?>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</body></html>
