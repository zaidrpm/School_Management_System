<?php require 'security_only.php';?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Poppins:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/reset_pswd-h.css" type="text/css" />
<script>
function db()
{
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    alert(xmlhttp.responseText);
    }
}
function ajax(url2)
{
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=db;
xmlhttp.open("GET",url2,true);
xmlhttp.send();
}
function logout()
{
if(confirm("Remove Autologin from this device?"))
{
localStorage.removeItem("uname");
localStorage.removeItem("pswd");
}
ajax("logout.php");
}
</script>
</head>
<body>
<div id ='nav'><a href='../homepage.php'><img src='css/home.png' width='70' height='70' /></a></br>
<img onclick='logout()' width='80' height='80' src='css/lock.png' /></div>
<div id="bg"><center>
<div id="head"><?php echo $_SESSION['sfname'];?></div></br>
<p id="sp">&nbsp</p>
<div id="main">
</br>
<table id='cen' style='width:380px;'>
<form Action="reset_pswd.php" method="post">
<tr><td><h1><x>U</x>sername:</td><td><input type="text" size="10" name="uname"></h1></td></tr>
<tr><td><h1><x>O</x>ld Pswd:</td><td><input type="password" size="10" name="opswd"></h1></td></tr>
<tr><td><h1><x>N</x>ew Pswd:</td><td><input type="password" size="10" name="npswd"></h1></td></tr>
<tr>
<td><h1><x>R</x>epeat:</td><td><input type="password" size="10" name="rnpswd"></h1></td></tr>
<tr><td colspan="2"><input type="submit" value="Submit" id='sss'></td></tr>
</form></table></br>
</div></center></br></div>
</body>
</html>
