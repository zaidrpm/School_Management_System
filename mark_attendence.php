<?php require 'base.php';?>
<htmL>
<head>
<title>sMs</title>
<script src="java/mark_attendence.js"></script>
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/mark_attendence.css" type="text/css" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
</head>
<body onload="fs()">
<div id ='nav'><a href='../homepage.php'><img src='css/home.png' width='40' height='40' /></a></br>
<img onclick='logout()' width='50' height='50' src='css/lock.png' /></div>
<div id="bg"><center>
<div id="head"><?php echo $_SESSION['sname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="mainxx">
<table id="main" cellspacing="0">
<tr>
<th class="hid">Uid</th>
<th class='df'>Name</th>
<th class='df' style='position:relative;left:0px;top:0px;'>Status<button type='button' id='mak' onclick='mall()'>All P</button></th>
</tr>
<?php
$clas=$_SESSION['class'];
$sec=$_SESSION['sec'];
$result=$conn->query("select uid,Name from Names where class=$clas AND sec='$sec' order by roll");
while($row=$result->fetch_assoc())
{
$uid=$row['uid'];
$na=$row['Name'];
echo "<tr>
<td class='hid'>$uid</td>
<td class='a'>
$na
</td>
<td class='blk' onclick='sms(this)'>A</td>
</tr>";
}
$conn->close();
?>
</table>
<form Action="submit_attendence.php" method="post" onSubmit="return calcu()" target='_blank'>
<input type="text" size="50" name="jsondata" id="data" class='hid'>
</br><div style='display:inline-block;text-align:center;width:100%;'><input type="submit" value='Submit'></div>
</form>
</div></center></br></div>
</body>
</html>
