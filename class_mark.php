<?php require 'base.php';
$sec=$_GET['sec'];
$sub=$_GET['subject'];
$etype=$_GET['etype'];
$class=$_GET['classs'];
$url="editor.php?subject=$sub&etype=$etype&class=$class";
?>
<html>
<head>
<script>
var uuid='<?php echo $_SESSION["uid"];?>'
var url='<?php echo $url;?>';
</script>
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<title>class Mark</title>
<script src="java/class_mark.js"></script>
<link rel="stylesheet" href="css/class_mark.css" type="text/css" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
</head>
<body>
<img src='css/loading.gif' id='loading' />
<div id ='nav'><a href='../homepage.php'><img src='css/home.png' width='70' height='70' /></a></br>
<img onclick='logout()' width='80' height='80' src='css/lock.png' /></div>
<table cellspacing="0" id="main">
<tr>
<th class="hid">uid</th><th style="border:2px solid black">Name</th><th style="border:2px solid black">Marks</th><th style="border:2px solid black">Creator</th>
</tr>
<?php
$sql="select a.uid,a.Mob,a.rcb,b.Name from c$class a,Names b where b.class=$class and b.sec='$sec' and a.Etype=$etype and a.Subject=$sub and a.uid=b.uid";
$result=$conn->query($sql);
if($result===false)
{
die("Server Error".$conn->error);
}
while($row=$result->fetch_assoc())
{
echo "<tr><td class='hid'>".$row['uid']."</td><td>".$row['Name']."</td><td onclick='mrf(this)'>".$row['Mob']."</td><td>".$row['rcb']."</td></tr>\n";
}
$conn->close();
?>
</table>
<div id="in">
<input type="number" id="mkk">
</br>
<button type="button" onclick="del()" id="delb">Delete</button>
</br></br><button type="button" onclick="submit()">Submit</button>
<button type="button" onclick="cancel()">Cancel</button>
</div>
<div id="fil"></div>
</body>
</html>
