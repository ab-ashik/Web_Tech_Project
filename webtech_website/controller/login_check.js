function loginValidation()
{
    var loginId = document.getElementById("loginId").value.trim();
    var loginPass = document.getElementById("loginPass").value.trim();

var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;


flag = true;



if(loginId =="")
{
      document.getElementById("uiderr").innerHTML = "*can not be blank";
      flag = false;
}
else{
    document.getElementById("uiderr").innerHTML = "";
}
if(loginPass =="")
{
      document.getElementById("passerr").innerHTML = "*can not be blank";
      flag = false;
}
else if(loginPass.length < 5){
    document.getElementById("passerr").innerHTML = "*password must be at least 5 characters";
    flag = false;
}
else{
    document.getElementById("passerr").innerHTML = "";
}




return flag;



}
