<?php
require 'base.php';
$class=$_GET['classs'];
$sec=$_GET['sec'];
if($class==$_SESSION['class'] && $sec==$_SESSION['sec'])
$eflag=true;
else
$eflag=false;
?>
<html>
<head>
<script>
var cls='<?php echo $class;?>';
var sec='<?php echo $sec;?>';
var eflag='<?php echo $eflag;?>';
</script>
<title>Name_list</title>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/name_list.css" type="text/css" />
<script src="java/name_list.js"></script>
</head>
<body onload="fs()">
<div id ='nav'><a href='../homepage.php'><img src='css/home.png' width='70' height='70' /></a></br>
<img onclick='logout()' width='80' height='80' src='css/lock.png' /></div>
<div id="bg"><center>
<div id="head"><?php echo $_SESSION['sname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="mainxx">
<table id='headerr'><tr><th><h1><x>C</x>lass:</h1></th><th class='lko'><?php echo $class;?></th><th><h1>&nbsp&nbsp&nbsp<x>S</x>ection:</h1></th><th class='lko'><?php echo $sec;?></th></tr></table></br>
<table id="main" cellspacing="0">
<tr>
<th class='hid'>uid</th>
<th class='df l'>Roll</th>
<th class='df r'>Name</th>
</tr>
<?php
$result=$conn->query("select uid,roll,Name from Names where class=$class and sec='$sec' order by roll");
if($result===false)
{
die("Failed,Try again");
}
$i=1;
while($row=$result->fetch_assoc())
{
echo '<tr><td class="hid">'.$row['uid'].'</td><td class="l">'.$row['roll'].'</td><td onclick="mrf(this)" class="r">'.$row['Name'].'</td></tr>';
++$i;
}
$conn->close();
?>
</table>
<div id="in">
<div class='df' style='width:100%'>Editor</div></br>
<input type="text" id="mkk">
</br></br></br>
<button type="button" onclick="del()" id="delb">Delete</button>
&nbsp&nbsp<button type="button" id='fghh' onclick="submit()">Submit</button>
&nbsp&nbsp<button type="button" onclick="cancel()">Cancel</button>
</div>
<div id="fil"></div>
</div></center></br></br></div>
<p style="display:none" id='llll'><?php echo $_SESSION['sfname'];?></p>
</body>
</html>
