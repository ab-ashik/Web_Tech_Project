function eventCheck()
{
   

var eid = document.getElementById("event_id").value.trim();
var etype = document.getElementById("event_type").value.trim();
var eduration = document.getElementById("event_duration").value.trim();
var erate = document.getElementById("event_rate").value.trim();


var flag = true;

var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
var letters = /^[A-Za-z]+$/;
var fullnameRegex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/g;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var userid_expression = /^[a-zA-Z0-9]+$/;



if(eid =="")
{
      document.getElementById("eiderr").innerHTML = "*can not be blank";
      flag = false;
}
else if(vid.length < 3)
{
   document.getElementById("eiderr").innerHTML = "*must be at least 3 numbers";
   flag = false;
}
else  if(!isNaN.test(vid)){
     document.getElementById("eiderr").innerHTML = "*event id must be a number";
     flag = false;
   
}
else 
{
   document.getElementById("eiderr").innerHTML = "";
}

if(etype =="")
{
      document.getElementById("etypeerr").innerHTML = "*can not be blank";
      flag = false;
}
else if(etype.length < 3)
{
    document.getElementById("etypeerr").innerHTML = "*must be at least 3 characters";
    flag = false;
}
else  if(!fullnameRegex.test(etype)){
   document.getElementById("etypeerr").innerHTML = "*required only alphabet characters";
   flag = false;
}
else 
{
   document.getElementById("etypeerr").innerHTML = "";
}

if(eduration =="")
{
      document.getElementById("edurationerr").innerHTML = "*can not be blank";
      flag = false;
}
else 
{
   document.getElementById("edurationerr").innerHTML = "";
}

if(erate =="")
{
      document.getElementById("erateerr").innerHTML = "*can not be blank";
      flag = false;
}
else if(!isNaN.test(erate)){
    document.getElementById("erateerr").innerHTML = "*event rate must be a number";
    flag = false;
}
else
{
   document.getElementById("erateerr").innerHTML = "";
}


if(flag == true)
{
   alert("Vendor Added Successfully");
   
}

return flag;

}