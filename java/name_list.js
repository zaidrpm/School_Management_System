var rn;var uid;var xmlhttp;var url;var url2;var marks;
function mrf(rn)
{
row=rn.parentNode.rowIndex;
if(eflag)
{
uid=document.getElementById("main").rows[row].cells[0].innerHTML;
document.getElementById("fil").style.display="initial";
document.getElementById("in").style.display="initial";
document.getElementById("mkk").value="";
}
else
{
alert("You Are not Admin of this class, Therefore you cannot edit its contents.");
}
}
function cancel()
{
document.getElementById("fil").style.display="none";
document.getElementById("in").style.display="none";
}
function db()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
tmp=xmlhttp.responseText;
temp=tmp.split(',');
temp[0]=parseInt(temp[0]);
alert(temp[1]);
tmp=document.getElementById('main');
if(temp[0]==0)
return
else if(temp[0]==1)
{
r=tmp.rows.length;
temp[2]=parseInt(temp[2]);
for(i=1;i<r;i++)
{
if(tmp.rows[i].cells[0].innerHTML==temp[2])
{
tmp.rows[i].cells[2].innerHTML=temp[3];
break;
}
}
}
else if(temp[0]==2)
{
r=tmp.rows.length;
for(i=1;i<r;i++)
{
if(tmp.rows[i].cells[0].innerHTML==temp[2])
{
tmp.deleteRow(i);
break;
}
}
}
}
}
function ajax(url2)
{
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=db;
xmlhttp.open("GET",url2,true);
xmlhttp.send();
document.getElementById("fil").style.display="none";
document.getElementById("in").style.display="none";
}
function submit()
{
new_name=document.getElementById("mkk").value;
if(new_name.length>0)
{
url="name_editor.php?uid="+uid+"&new_name="+new_name;
ajax(url);
}
else
{
alert("Field is Empty");
}
}
function del()
{
if(!eflag)
{
alert("You are not admin of this class");
return
}
if(confirm("Are you Sure?")==true)
{
url="name_editor.php?uid="+uid;
ajax(url);
}
}
