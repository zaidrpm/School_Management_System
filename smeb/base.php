<?php
require '../base.php';
$roll=$_GET['roll'];
$class=$_GET['classs'];
$sec=$_GET['sec'];
$etype=$_GET['exam'];
?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<title>class Mark</title>
<script src="../java/smeb.js"></script>
<link rel="stylesheet" href="../css/smeb.css" type="text/css" />
</head>
<body onload="per()">
<div id="main2">
<?php
echo "<p id='headerr'>".$_SESSION['sfname']."</p>";
$total=0;
$sql="select Name from Eas where id=$etype limit 1";
$result=$conn->query($sql);
if($result===false)
die("Error 1");
$row=$result->fetch_assoc();
$exam=$row['Name'];
$result->close();
$sql="select a.Name,a.rank,b.* from Names a,Attendence b where a.roll=$roll and a.class=$class and a.sec='$sec' and a.uid=b.uid limit 1";
$result=$conn->query($sql);
if($result===false)
{
die("Some Error occured");
}
$row=$result->fetch_assoc();
if(isset($_GET['print']))
$rank=$row['rank'];
else
$rank='NA';
$name=$row['Name'];
$uid=$row['uid'];
//Starting calculating Attendence
$month_name=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dece');
$tdays=0;
$present=0;
for($i=0;$i<12;$i++)
{
$temp=$row[$month_name[$i]];
$l=strlen($temp);
if($l==0)
continue;
for($j=0;$j<$l;$j++)
{
if($temp[$j]=='P')
{
$present+=1;
$tdays+=1;
}
else
{
if($temp[$j]=='A')
$tdays+=1;
}
}
}
if($tdays>0)
$attendence=round(($present*100/$tdays),1);
else
$attendence='Err';
unset($month_name);
unset($temp);
$result->close();
//End of attendence
echo "<table border='1' id='head'><tr><td colspan='3'class='he' style='width:200mm'>Name:&nbsp ".$row['Name']."</td></tr><tr><td class='he'>Class: $class</td><td class='he'>Sec: $sec</td><td class='he'>Roll: $roll</td></tr><tr><td colspan='3' class='he'>Exam: $exam</td></tr></table></br></br>"; 
$sql="select a.Name as subject,b.Mob from Eas a,c$class b where a.id=b.Subject and b.uid=$uid and b.Etype=$etype";
$result=$conn->query($sql);
if($result===false)
{
die("Error occured");
}
echo "<table border='1' id='main'><tr><th width='100%'>Subject</th><th style='width:30mm'>Marks Attained</th></tr>";
$t_attained=0;
$t_mark=0;
while($row=$result->fetch_assoc())
{
echo '<tr><td>'.$row['subject'].'</td><td>'.$row['Mob'].'</td></tr>';
$t_attained+=$row['Mob'];
$t_mark+=100;
}
echo "<tr><th>Total</th><th>$t_attained</th></tr>"; 
echo "</table></br></br>";
$result->close();
?>
<table id="lft" border='1'>
<tr>
<td class='rtitle'>Percentage</td>
<td rowspan="3" class="lll" style='border-top-width:1px;'><?php $temp3=round(($t_attained/$t_mark*100),1);echo "$temp3<xyz>%</xyz>";?></td>
</tr>
<tr><td class="jjj"></td></tr><tr><td class="hhh"></td></tr><tr>
<td width="100%" class='rtitle'>Attendence</td>
<td rowspan="3" class="lll">
<?php
echo "$attendence<xyz>%</xyz>";
?>
</td></tr>
<tr><td class="jjj">&nbsp</td></tr><tr><td class="hhh">&nbsp</td></tr>
<tr><td class='rtitle'>Rank</td><td rowspan="3" class="lll"><?php echo $rank;?></td></tr>
<tr><td class="jjj">&nbsp</td></tr><tr><td class="hhh">&nbsp</td></tr>
</table>
<table id="cmnt" border="4" cellspacing="0">
<tr><td style="width:93mm;text-align:left;padding-bottom:0px;"><h2>Comment:</h2></td></tr><tr><td>&nbsp</td></tr><tr><td>&nbsp</td></tr><tr><td>&nbsp</td></tr><tr><td>&nbsp</td></tr></table>
<div id="lop">Teachers Sign:_________________________ </br></br></br>Parents Sign:___________________________</div>
</div>
</body>
</html>

