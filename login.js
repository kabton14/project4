window.onload = function(){
$("logon").onclick = login;
$("register").onclick = redirect;

}


function login(){

  new Ajax.Request("login.php",
  {
    method:"post",
    parameters:{user:$("user").value,pass:$("pass").value},
    onSuccess:result
  });


}

function result(ajax){
  if(ajax.responseText == "awesome"){
    window.location.replace("main.html");
  }

  else if(ajax.responseText == "notawesome"){
    //window.location = "login.html";
    $("result").innerHTML = "Incorrect Username/Password";
  }

}

function redirect(){
  window.location = "newUser.html";
}
