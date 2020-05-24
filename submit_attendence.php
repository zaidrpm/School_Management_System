<?php require 'base.php';?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/nl1.css" type="text/css" />
</head>
<body>
<div id ='nav'><a href='../homepage.php'><img src='css/home.png' width='70' height='70' /></a></br>
<img onclick='logout()' width='80' height='80' src='css/lock.png' /></div>
<div id="bg"><center>
<div id="head"><?php echo $_SESSION['sfname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="main">
</br>
<table id='cen' style='width:350px;'>
<?php
$class=$_SESSION['class'];
$sec=$_SESSION['sec'];
$jdata=json_decode($_POST['jsondata']);
$k=date("M");
if($k=='Dec')
$k='Dece';
$d=date("d");
$sql="update Attendence set $k=substring($k,4) where uid in (select uid from Names where class=$class and sec='$sec') and $k like '$d%'";
if($conn->query($sql)===false)
die("Error 1");
$sql="update Attendence set $k=concat(?,$k) where uid=?";
$stmt=$conn->prepare($sql);
$p=0;
$a=0;
foreach($jdata as $key => $value)
{
if($value=='P')
{
$temp="$d".'P';
$stmt->bind_param('si',$temp,$key);
$stmt->execute();
$p++;
}
if($value=='A')
{
$temp="$d".'A';
$stmt->bind_param('si',$temp,$key);
$stmt->execute();
$a++;
}
}
echo '<tr><td colspan="2" style="text-align:right;"><h1><x>S</x>uccessful</h1></td></tr>';
echo '<tr><td><h1><x>T</x>otal:</h1></td><td><h1>'.($p+$a).'</h1></td></tr>';
echo "<tr><td><h1><x>P</x>resent:</h1></td><td><h1>$p</h1></td></tr>";
echo "<tr><td><h1><x>A</x>bsent:</h1></td><td><h1>$a</h1></td></h1></tr>";
$conn->close();
?>
</br>
</table></div></center></br></div>
</body>
</html>
