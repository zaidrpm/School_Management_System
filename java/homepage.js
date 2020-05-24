var uid;var xmlhttp;var url;var url2;var xmlhttpp;
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
function sname()
{
uid=prompt("Please Enter Uid");
if(uid.length>0)
{
url="view/tname.php?uid="+uid;
ajax(url);
}
}
function sor()
{
if(confirm("Please confirm to sort Name list"))
{
url="name_sort.php";
ajax(url);
}
}
function logout()
{
if(confirm("Remove Autologin from this device?"))
{
localStorage.removeItem("uname");
localStorage.removeItem("pswd");
}
ajax("view/logout.php");
}
