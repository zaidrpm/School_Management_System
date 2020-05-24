<?php require 'base.php';
if(file_exists("report/$school.php"))
$target="report/$school.php";
else
$target='report/base.php';
?>
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
<img onclick='logout()' width='80' height='80' src='css/lock.png' /></div>
<div id="bg"><center>
<div id="head"><?php echo $_SESSION['sfname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="main">
</br>
<table id='cen' style='width:380px;'>
<form Action="<?php echo $target;?>" method="get">
<tr><td><h1><x>R</x>oll:</h1></td><td><input type="number" size="10" name="roll" value="1" required></td></tr>
<tr><td><h1><x>C</x>lass:</td></h1><td><select name="class" onchange='res()' id='class'>
<option value="1" class="a" selected>1</option>
<option value="2" class="b">2</option>
<option value="3" class="a">3</option>
<option value="4" class="b">4</option>
<option value="5" class="a">5</option>
<option value="6" class="b">6</option>
<option value="7" class="a">7</option>
<option value="8" class="b">8</option>
<option value="9" class="a">9</option>
<option value="10" class="b">10</option>
<option value="11" class="a">11</option>
<option value="12" class="b">12</option>
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
<tr><td colspan="2"><input type="submit" value="Go" id='sss'></td></tr>
</form></table></br>
</div></center></br></div>
</body>
</html>
