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
<table id='cen'>
<form Action="show_class_attend.php" method="get">
<tr>
<td><h1><x>C</x>lass:</td><td>
<select name="cla" onchange='res()' id='class'></h1>
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
<h1><x>S</x>ection:</td><td><select name="sec" id='sec'></h1>
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
<tr><td>
<h1><x>M</x>onth:</td><td><select name="month"></h1>
<option value="Jan" class="a" selected>January</option>
<option value="Feb" class='b'>Febuary</option>
<option value="Mar" class='a'>March</option>
<option value="Apr" class='b'>April</option>
<option value="May" class='a'>May</option>
<option value="Jun" class='b'>June</option>
<option value="Jul"class='a'>July</option>
<option value="Aug" class='b'>August</option>
<option value="Sep" class='a'>September</option>
<option value="Oct" class='b'>October</option>
<option value="Nov" class='a'>November</option>
<option value="Dece" class='b'>December</option>
</select></br></td></tr>
<tr><td colspan="2"><input type="submit" value="Go" id='sss'></td></tr>
</form></table></br>
</div></center></br></div>
</body>
</html>
