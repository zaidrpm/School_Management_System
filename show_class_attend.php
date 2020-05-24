<?php
require 'base.php';
$class=$_GET['cla'];
$sec=$_GET['sec'];
$month=$_GET['month'];
$days_cal=array('Jan'=>31,'Feb'=>28,'Mar'=>31,'Apr'=>30,'May'=>31,'Jun'=>30,'Jul'=>31,'Aug'=>31,'Sep'=>30,'Oct'=>31,'Nov'=>30,'Dece'=>31);
$days=$days_cal[$month];
$sql="select b.uid,b.Name,b.roll,a.$month as Month from Attendence a,Names b where b.class=$class and b.sec='$sec' and a.uid=b.uid order by b.roll";
$result=$conn->query($sql);
if($result===false)
{
echo $conn->error;
die("ERROR");
}
if($class==$_SESSION['class'] && $sec==$_SESSION['sec'])
$eflag=true;
else
$eflag=false;
?>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<link rel="stylesheet" href="css/show_class_attend.css" type="text/css" />
<script src='java/atten_regis.js'></script>
<script>
var month='<?php echo $month;?>';
var eflag='<?php echo $eflag;?>';
</script>
</head>
<body> 
<img id='loading' src='css/loading.gif'>
<div id='fil'></div>
<div id='in'>
<h1><x>E</x>dit</h1>
<p>Mark this Student as</p>
<button type='button' onclick='submit()' id='sb'>Present</button><button onclick='cancel()' type='button'>Cancel</button>
</div>
<table id='main' width="100%">
<tr>
<td class='hid'>Uid</td>
<td class='head'>Roll</td>
<td class='head'>Name</td>
<?php
for($i=1;$i<=9;$i++)
{
echo "<td class='head'>&nbsp$i</td>";
}
for($i=10;$i<=$days;$i++)
{
echo "<td class='head'>$i</td>";
}
?>
</tr>
<?php
while($row=$result->fetch_assoc())
{
/*if($row['uid']==$class)
continue;*/
echo '<tr><td class="hid">'.$row['uid'].'</td><td class="lftpnl">'.$row['roll'].'</td><td class="lftpnl" onclick="highlight(this)">'.$row['Name'].'</td>';
for($i=1;$i<=$days;$i++)
{
$temp1=$row['Month'];
$temp2=$i<10?"0$i":"$i";
$temp3=strpos($temp1,$temp2);
if($temp3===false)
echo '<td>H</td>';
else
{
if($temp1[$temp3+2]=='A')
echo '<td onclick="edit(this)">A</td>';
else
echo '<td onclick="edit(this)">P</td>';
}
}
echo "</tr>";
}
?>
</table>
</body>
</html>
