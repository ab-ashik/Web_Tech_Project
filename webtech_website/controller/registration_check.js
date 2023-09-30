
function regcheck()
{
   

var uid = document.getElementById("clientId").value.trim();
var pass = document.getElementById("clientPass").value.trim();
var cPass = document.getElementById("Cpass").value.trim();
var Fname = document.getElementById("clientName").value.trim();
var email = document.getElementById("clientEmail").value.trim();
var phone = document.getElementById("clientPhone").value.trim();
var address = document.getElementById("clientAddress").value.trim();
var gender = document.getElementById("clientGender").value.trim();
var role = document.getElementById("role").value.trim();

    
var flag = true;

var pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
var fullnameRegex = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/g;
// var letters = /^[A-Za-z]+$/;
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var userid_expression = /^[a-zA-Z0-9]+$/;


// if(Fname== "" || uid == '' || pass == null || cPass == null || email == null || phone == null || address == '' || gender == null)
// {
//     //alert("Please fill up all the fields");
//     document.getElementById("nameerr").innerHTML = "*can not be blank";
//     document.getElementById("uiderr").innerHTML = "*can not be blank";
//       document.getElementById("passerr").innerHTML = "*can not be blank";
//       document.getElementById("cpasserr").innerHTML = "*can not be blank";
//       document.getElementById("emailerr").innerHTML = "*can not be blank";
//       document.getElementById("phnerr").innerHTML = "*can not be blank";
//       document.getElementById("addresserr").innerHTML = "*can not be blank";
//       document.getElementById("gendererr").innerHTML = "*can not be blank"; 
// }
if(Fname =="")
{
      document.getElementById("nameerr").innerHTML = "*can not be blank";
      flag = false;
}
else if(Fname.length < 3)
{
   // alert('Name must be 3 characters long');
   document.getElementById("nameerr").innerHTML = "*must be minimum 3 characters long";
   flag = false;

}
else  if(!fullnameRegex.test(Fname)){
   // alert('Name field required only alphabet characters');
   document.getElementById("nameerr").innerHTML = "*required only alphabet characters";
   flag = false;
}
else 
{
   document.getElementById("nameerr").innerHTML = "";
}
 if(uid =="")
{
      document.getElementById("uiderr").innerHTML = "*can not be blank";
      flag = false;
}
else if(uid.length < 3)
{
   // alert('User Id must be 3 characters long');
   document.getElementById("uiderr").innerHTML = "*must be minimum 3 characters long";
   flag = false;
}
else  if(!userid_expression.test(uid)){
   //alert('Please provide a valid user id');
     document.getElementById("uiderr").innerHTML = "*provide a valid user id";
     flag = false;
   
}
else 
{
   document.getElementById("uiderr").innerHTML = "";
}

 if(email =="")
{
      document.getElementById("emailerr").innerHTML = "*can not be blank";
      flag = false;
}
else  if(!filter.test(email)){
   //alert('Please provide a valid email address');
   document.getElementById("emailerr").innerHTML = "*provide a valid email address";
   flag = false;
}
else 
{
   document.getElementById("emailerr").innerHTML = "";
}  

 if(phone =="")
{
      document.getElementById("phnerr").innerHTML = "*can not be blank";
      flag = false;
}
else  if(isNaN(phone) || phone.length != 11){
   // alert('Please provide a valid phone number');
   document.getElementById("phnerr").innerHTML = "*provide a valid phone number";
   flag = false;
}
else 
{
   document.getElementById("phnerr").innerHTML = "";
}
 if(address =="")
{
      document.getElementById("addresserr").innerHTML = "*can not be blank";
      flag = false;
}
else 
{
   document.getElementById("addresserr").innerHTML = "";
}

if(gender =="")
{
      document.getElementById("gendererr").innerHTML = "*can not be blank";
      flag = false;
}
else 
{
   document.getElementById("gendererr").innerHTML = "";
}

 if(pass =="")
{
      document.getElementById("passerr").innerHTML = "*can not be blank";
      flag = false;
}
else if(pass.length < 5)
{
   // alert('Password must be 5 characters long');
   document.getElementById("passerr").innerHTML = "*must be minimum 5 characters long";
   flag = false;

}
else 
{
   document.getElementById("passerr").innerHTML = "";
}
 if(cPass =="")
{
      document.getElementById("cpasserr").innerHTML = "*can not be blank";
      flag = false;
}
else
{
   document.getElementById("cpasserr").innerHTML = "";
}
 if(pass != cPass){
   // alert('Password and Confirm Password does not match');
   document.getElementById("cpasserr").innerHTML = "*does not match";
   flag = false;
}

if(role =="")
{
      document.getElementById("roleerr").innerHTML = "*can not be blank";
      flag = false;
}
else 
{
   document.getElementById("roleerr").innerHTML = "";
}





if(flag == true)
{
   alert("Registration Successfull");
   //window.location = "../view//home.php";
   
}

return flag;

}