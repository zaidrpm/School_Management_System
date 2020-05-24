var obj,uid,row,date;
var lsr=-1;
function highlight(e)
{
row=e.parentNode.rowIndex;
var obj=document.getElementById('main');
var len=obj.rows[0].cells.length;
for(i=3;i<len;i++)
{
if(lsr!=-1)
obj.rows[lsr].cells[i].style.backgroundColor='#FFEBEE';
obj.rows[row].cells[i].style.backgroundColor='#FFCDD2';
}
lsr=row;
}
function db()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
var temp=xmlhttp.responseText;
temp1=temp.split(',');
temp1[0]=parseInt(temp1[0]);
temp1[1]=parseInt(temp1[1]);
temp1[2]=parseInt(temp1[2]);
temp1[3]=parseInt(temp1[3]);
//uid,date,state,status
obj=document.getElementById('main');
temp=obj.rows.length;
if(temp1[3]==0)
{
alert('Failed!');
return
}
for(i=1;i<temp;i++)
{
if((obj.rows[i].cells[0].innerHTML)==temp1[0])
{
row=i;
break
}
}
col=temp1[1]+2;
if(temp1[2]==1)
obj.rows[row].cells[col].innerHTML='P';
else
obj.rows[row].cells[col].innerHTML='A';
alert('Done');
}
}

function ajax(url2)
{
xmlhttp=new XMLHttpRequest();
//xmlhttp.onreadystatechange=db;
xmlhttp.open("GET",url2,false);
document.getElementById("in").style.display="none";
document.getElementById("loading").style.display='initial';
xmlhttp.send();
document.getElementById("loading").style.display='none';
document.getElementById("fil").style.display="none";
var temp=xmlhttp.responseText;
temp1=temp.split(',');
temp1[0]=parseInt(temp1[0]);
temp1[1]=parseInt(temp1[1]);
temp1[2]=parseInt(temp1[2]);
temp1[3]=parseInt(temp1[3]);
//uid,date,state,status
obj=document.getElementById('main');
temp=obj.rows.length;
if(temp1[3]==0)
{
alert('Failed!');
return
}
for(i=1;i<temp;i++)
{
if((obj.rows[i].cells[0].innerHTML)==temp1[0])
{
row=i;
break
}
}
col=temp1[1]+2;
if(temp1[2]==1)
obj.rows[row].cells[col].innerHTML='P';
else
obj.rows[row].cells[col].innerHTML='A';
alert('Done');
}

function edit(f)
{
if(!eflag)
{
alert("You are not admin");
return
}
obj=document.getElementById('main');
row=f.parentNode.rowIndex;
uid=obj.rows[row].cells[0].innerHTML;
date=f.cellIndex - 2;
if(f.innerHTML=='P')
document.getElementById('sb').innerHTML='Absent';
else
document.getElementById('sb').innerHTML='Present';
document.getElementById("fil").style.display="initial";
document.getElementById("in").style.display="initial";
}
function submit()
{
if(document.getElementById('sb').innerHTML=='Present')
{
query="editAtten.php?month="+month+"&uid="+uid+"&date="+date+"&state=1";
ajax(query);
}
else
{
query="editAtten.php?month="+month+"&uid="+uid+"&date="+date+"&state=0";
ajax(query)
}
}
function cancel()
{
document.getElementById("fil").style.display="none";
document.getElementById("in").style.display="none";
}
