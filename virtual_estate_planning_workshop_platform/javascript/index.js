function validation() {
  if (document.Formfill.Fname.value==" ") {
    document.getElementById("result ").innerHTML="Enter your first name";
    return false;
  } 
  else if (document.Formfill.Fname.value="") {
    document.getElementById("result").innerHTML="Enter first name";
    return false;
  } 
  else if (document.Formfill.Lname.value="") {
    document.getElementById("result").innerHTML="Enter your Last name";
    return false;
  }
  else if (document.Formfill.email.value="") {
    document.getElementById("result").innerHTML="Enter your email";
    return false;
  }
  else if (document.Formfill.Username.value=""){
    document.getElementById("result").innerHTML="Enter  your user name";
    return false;
  }
  else if (document.Formfill.password.value) {
    document.getElementById("result").innerHTML="Enter your password";
    return false;
  }
  
  else if (document.Formfill.Cpassword.value=="") {
    document.getElementById("result").innerHTML="Enter Confirm password";
    return false;
  }
  else if (document.Formfill.password.value!==document.Formfill.Cpassword.value) {
    document.getElementById("result").innerHTML=" Password doesn't matched";
    return false;
  }
  
  else if (document.Formfill.password.value.length<6) {
    document.getElementById("result").innerHTML=" password must be 6-digits";
    return false;
  }
}
var popup=document.getElementById("popup");
function CloseSlide() {
  popup.classList.remove('open-slide');
  
}