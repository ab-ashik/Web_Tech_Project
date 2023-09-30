function vencheck()
{
   

var vid = document.getElementById("vendor_id").value.trim();
var vname = document.getElementById("vendor_name").value.trim();
var vemail = document.getElementById("vendor_email").value.trim();
var vphone = document.getElementById("vendor_phone").value.trim();
var vadrs = document.getElementById("vendor_address").value.trim();
var vpass = document.getElementById("vendor_pass").value.trim();

var flag = true;

var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
var letters = /^[A-Za-z]+$/;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var userid_expression = /^[a-zA-Z0-9]+$/;



if(vid =="")
{
      document.getElementById("viderr").innerHTML = "*can not be blank";
      flag = false;
}
else if(vid.length < 3)
{
   document.getElementById("viderr").innerHTML = "*must be at least 3 characters";
   flag = false;
}
else  if(!userid_expression.test(vid)){
     document.getElementById("viderr").innerHTML = "*provide a valid user id";
     flag = false;
   
}
else 
{
   document.getElementById("viderr").innerHTML = "";
}

if(vname =="")
{
      document.getElementById("nameerr").innerHTML = "*can not be blank";
      flag = false;
}
else  if(!letters.test(vname)){
   document.getElementById("nameerr").innerHTML = "*required only alphabet characters";
   flag = false;
}
else 
{
   document.getElementById("nameerr").innerHTML = "";
}

if(vemail =="")
{
      document.getElementById("emailerr").innerHTML = "*can not be blank";
      flag = false;
}
else 
{
   document.getElementById("emailerr").innerHTML = "";
}

if(vphone =="")
{
      document.getElementById("phnerr").innerHTML = "*can not be blank";
      flag = false;
}
else
{
   document.getElementById("phnerr").innerHTML = "";
}

if(vadrs =="")
{
      document.getElementById("addresserr").innerHTML = "*can not be blank";
      flag = false;
}
else
{
   document.getElementById("addresserr").innerHTML = "";
}

if(vpass =="")
{
      document.getElementById("passerr").innerHTML = "*can not be blank";
      flag = false;
}
else if(vpass.length < 5)
{
   document.getElementById("passerr").innerHTML = "*must be minimum 5 characters long";
   flag = false;

}
else
{
   document.getElementById("passerr").innerHTML = "";
}

if(flag == true)
{
   alert("Vendor Added Successfully");
   
}

return flag;

}