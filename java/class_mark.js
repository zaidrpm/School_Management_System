var i=0;var rn;var h;var xmlhttp;var uid;var marks;var url2;
function mrf(rn)
{
row=rn.parentNode.rowIndex;
obj=document.getElementById('main');
//alert("ss");
if(uuid==(obj.rows[row].cells[3].innerHTML))
{
uid=obj.rows[row].cells[0].innerHTML;
document.getElementById("fil").style.display="initial";
document.getElementById("in").style.display="initial";
document.getElementById("mkk").value="";
document.getElementById("mkk").focus();
}
else
alert("You dont have permission to edit this");
}
function cancel()
{
document.getElementById("fil").style.display="none";
document.getElementById("in").style.display="none";
document.getElementById("loading").style.display="none";
}

function ajax(url2)
{
document.getElementById("fil").style.display="initial";
document.getElementById("in").style.display="none";
document.getElementById("loading").style.display="initial";
xmlhttp=new XMLHttpRequest();
xmlhttp.open("GET",url2,false);
xmlhttp.send();
alert(xmlhttp.responseText);
cancel();
}
function submit()
{
marks=document.getElementById("mkk").value;
if(marks.length>0)
{
url2=url+'&value='+marks+"&uid="+uid;
ajax(url2);
document.getElementById('main').rows[row].cells[2].innerHTML=document.getElementById("mkk").value;
}
else
{
alert('Field is empty');
}
}
function del()
{
if(confirm("Are you Sure?")==true)
{
url2=url+"&uid="+uid;
ajax(url2);
document.getElementById('main').deleteRow(row);
}
}
