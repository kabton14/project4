window.onload = function(){


$("submit").onclick = submit;
$("done").onclick = redirect;


}


function submit(){

  new Ajax.Request("newUser.php",
    {
      method:"post",
      parameters:{user:$("user").value, fname:$("fname").value, lname:$("lname").value, pass:$("pass").value},
      onSuccess:result
    });
}

function result(ajax){

  $("result").innerHTML = ajax.responseText;
  $("user").value="";
  $("fname").value="";
  $("lname").value="";
  $("pass").value="";


}

function redirect(){
  window.location = "login.html";
}
