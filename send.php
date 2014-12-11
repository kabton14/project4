<?php

include 'connect.php';

if(isset($_SESSION['user'])&&isset($_SESSION['pass'])){

$subject = $_REQUEST['subject'];
$recipients = $_REQUEST['recipients'];
$message = $_REQUEST['message'];

$recipients_arr = explode(";",$recipients);
$test_str="";
//$recipient"";



if($subject != NULL && $recipients != NULL && $message != NULL ){

  $query = "INSERT INTO Message(body,subject,user_id) VALUES ('$message','$subject',
            (SELECT id FROM User WHERE Username='".$_SESSION['user']."'));";

  $result = mysql_query($query);

  foreach($recipients_arr as $recipient){

    $recipient = preg_replace('/\s+/', '', $recipient); //Removing unnecessary whitespace that might lead to problems!

    $query2 = "INSERT INTO Recipients(message_id, recipient_id) VALUES ((
                SELECT id FROM Message ORDER BY id DESC LIMIT 1),
               (SELECT id FROM User WHERE Username='$recipient'));";


               $result2 = mysql_query($query2);
               //$test_str=$test_str.$recipient;

             }

 //mysql_query($query2);
  if($result){
  echo "Message Sent!";
  //echo "$recipients_arr[0],$recipients_arr[1]";
  //echo "$test_str,$result,$result2";
}
}

else{
  echo "Please enter a subject and recipient(s).";
}

}

else{
  header("Location:login.html");
  exit();

}


?>
