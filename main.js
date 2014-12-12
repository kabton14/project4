var msg_id;

window.onload = function(){
greet();
inbox();
$("sb_item2").onclick = compose;
$("sb_item1").onclick = inbox;
}



function greet(){

  new Ajax.Request("greetings.php",
  {
    onSuccess:greetings
  });
}


function compose(){

  new Ajax.Request("",
  {

    onSuccess:result
  });
}


function result(ajax){

  //alert("ajax.responseText");

  $("display").innerHTML = "<div id='message_header'>"+
                           "<div id='sub'> Subject: <input id='subject' name='subject' type='text'/></div>" +
                           "<div id='recip'> Recipients: <input id='recipients' name='recipients' type='text' placeholder='If entering multiple recipients, separate each recipient by a semi-colon&#39;&#59;&#39;'/></div>"+
                           "<div id='msg'><textarea id='message' name='message'></textarea></div>"+
                            "</div>"+
                            "<div id='send_msg'><input type='button' id='send' name='send' value='Send Message'/> </div>";

                           $("send").onclick = send;
}

function send(){

  new Ajax.Request("send.php",
  {
    method:"post",
    parameters:{subject:$("subject").value,recipients:$("recipients").value,message:$("message").value},
    onSuccess:sent
  });


}

function sent(ajax1){

  alert(ajax1.responseText);

}

function greetings(ajax2){

  $("greeting").innerHTML = ajax2.responseText ;
  //$("logout_btn").onclick=logout;

}


function inbox(){

  new Ajax.Request("main.php",
  {
  onSuccess:function getMessages(ajax3){$("display").innerHTML = ajax3.responseText;}

  });

}



function display_messages(obj){

  msg_id = obj.id;
  //alert(x);

  new Ajax.Request("display_message.php",
  {
    parameters:{message_id:msg_id},
    onSuccess:function disp(ajax4){$("display").innerHTML = ajax4.responseText;
                                    $("reply_button").onclick = reply;
                                    }


  });




  new Ajax.Request("message_read.php",
  {
    parameters:{message_id:msg_id}
    //onSuccess:function disp(ajax5){alert(ajax5.responseText);}

  });



}

function logout(){

  new Ajax.Request("logout.php",
  {
    method:"post",
    onSuccess:alert("awesome")

  });


}

function reply(){

  new Ajax.Request("reply.php",
  {
    method:"post",
    parameters:{message:$("reply_message").value},
    onSuccess:sent
  });

  //alert($("reply_message").value);
}
