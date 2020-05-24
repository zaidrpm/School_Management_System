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
<body onload="res()">
<div id ='nav'><a href='../homepage.php'><img src='css/home.png' width='70' height='70' /></a></br>
<a href='logout.php'><img width='80' height='80' src='css/lock.png' /></a></div>
<div id="bg"><center>
<div id="head"><?php echo $_SESSION['sfname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="main">
</br>
<table id='cen'>
<form Action="name_list.php" method="get">
<tr>
<td><h1><x>C</x>lass:</td><td><select name="classs" onchange='res()' id='class'></h1>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
</select></td></tr>
<tr><td>
<h1><x>S</x>ection:</h1></td><td><select name="sec" id='sec'>
<?php
$result=$conn->query("Select * from secinfo order by secname");
if($result===false)
die("Errror7");
while($row=$result->fetch_assoc())
{
$secname=$row['secname'];
$class=$row['class'];
echo "<option value='$secname' data-classes='$class' class='sc'>$secname</option>";
}
?>
</select></br></td></tr>
<tr><td colspan="2"><input type="submit" value="Go" id='sss'></td></tr>
</form></table></br>
</div></center></br></div>
</body>
</html>
