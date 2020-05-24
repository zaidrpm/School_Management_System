<?php require 'base.php';?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/nl1.css" type="text/css" />
<script>
function res()
{
var clas=document.getElementById("class").value;
var obj=document.getElementsByClassName('sc');
var len=obj.length;
var temp2='['+clas+']';
var b=true;
for(i=0;i<len;i++)
{
temp=obj[i].getAttribute("data-classes");
if(temp.indexOf(temp2)>=0)
{
obj[i].disabled=false;
if(b)
{
document.getElementById('sec').value=obj[i].value;
b=false
}
}
else
obj[i].disabled=true;
}
}
</script>
</head>
<body onload='res()'>
<div id ='nav'><a href='../homepage.php'><img src='css/home.png' width='70' height='70' /></a></br>
<img onclick='logout()' width='80' height='80' src='css/lock.png' /></div>
<div id="bg"><center>
<div id="head"><?php echo $_SESSION['sfname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="main">
</br>
<table id='cen' style='width:380px;'>
<form Action="class_mark.php" method="get">
<tr>
<td><h1><x>S</x>ubject:</td><td></h1><select name="subject">
<?php
if ($conn->connect_error)
{
 die("Connection failed: ");
}
$result=$conn->query("Select * from Eas order by Name");
if($result===false)
die("Errror 1");
while($row=$result->fetch_assoc())
{
if($row['identifier']==1)
continue;
$subname=$row['Name'];
$id=$row['id'];
echo "<option value='$id'>$subname</option>";
}
?>
</select></td></tr>
<tr>
<td><h1><x>C</x>lass:</h1></td><td><select name="classs" id='class' onchange='res()'>
<option value="1" selected>1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select></td></tr>
<tr><td>
<h1><x>S</x>ection:</h1></td><td><select name="sec" id='sec'>
<?php
$result1=$conn->query("Select * from secinfo order by secname");
if($result1===false)
die("Errror7");
while($row=$result1->fetch_assoc())
{
$secname=$row['secname'];
$class=$row['class'];
echo "<option value='$secname' data-classes='$class' class='sc'>$secname</option>";
}
?>
</select></td></tr>
<tr>
<td><h1><x>E</x>xam:</h1></td><td><select name="etype">
<?php
$result->data_seek(0);
while($row=$result->fetch_assoc())
{
if($row['identifier']==0)
continue;
$ename=$row['Name'];
$id=$row['id'];
echo "<option value='$id'>$ename</option>";
}
?>
</select></td></tr>
<tr><td colspan="2"><input type="submit" value="Go" id='sss'></td></tr>
</form></table></br>
</div></center></br></div>
</body>
</html>
