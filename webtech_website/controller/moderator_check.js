function modcheck()
{
   

var mid = document.getElementById("mod_id").value.trim();
var mname = document.getElementById("mod_name").value.trim();
var memail = document.getElementById("mod_email").value.trim();
var mphone = document.getElementById("mod_phone").value.trim();
var madrs = document.getElementById("mod_address").value.trim();
var mpass = document.getElementById("mod_pass").value.trim();

var flag = true;

var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
var letters = /^[A-Za-z]+$/;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var userid_expression = /^[a-zA-Z0-9]+$/;



if(mid =="")
{
      document.getElementById("miderr").innerHTML = "*can not be blank";
      flag = false;
}
else if(mid.length < 3)
{
   document.getElementById("miderr").innerHTML = "*must be at least 3 characters";
   flag = false;
}
else  if(!userid_expression.test(mid)){
   //alert('Please provide a valid user id');
     document.getElementById("miderr").innerHTML = "*provide a valid user id";
     flag = false;
   
}
else 
{
   document.getElementById("miderr").innerHTML = "";
}

if(mname =="")
{
      document.getElementById("nameerr").innerHTML = "*can not be blank";
      flag = false;
}
else if(mname.length < 3)
{
   document.getElementById("nameerr").innerHTML = "*must be at least 3 characters";
   flag = false;
}
else  if(!letters.test(mname)){
   document.getElementById("nameerr").innerHTML = "*required only alphabet characters";
   flag = false;
}
else 
{
   document.getElementById("nameerr").innerHTML = "";
}

if(memail =="")
{
      document.getElementById("emailerr").innerHTML = "*can not be blank";
      flag = false;
}
else 
{
   document.getElementById("emailerr").innerHTML = "";
}

if(mphone =="")
{
      document.getElementById("phnerr").innerHTML = "*can not be blank";
      flag = false;
}
else
{
   document.getElementById("phnerr").innerHTML = "";
}

if(madrs =="")
{
      document.getElementById("addresserr").innerHTML = "*can not be blank";
      flag = false;
}
else
{
   document.getElementById("addresserr").innerHTML = "";
}

if(mpass =="")
{
      document.getElementById("passerr").innerHTML = "*can not be blank";
      flag = false;
}
else if(mpass.length < 5)
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
   alert("Moderator Added Successfully");
   
}

return flag;

}