<?php

/*INFO 2180 PROJECT(CHEAPO MAIL)---#ID-620040594
This program is responsible for loading the the messages in the inbox (and on the main page)
after the user has successfully logged in to cheapo mail. */

include 'connect.php'; #<-- which handles the db connection and opening the session.




$query = "SELECT body,subject,id FROM Message M

        JOIN (select message_id from Recipients WHERE recipient_id=(select id from User where Username ='".$_SESSION['user'].

        "')) R ON M.id = R.message_id;";

$results = mysql_query($query);

while ($row = mysql_fetch_array($results)){

  $query0 = "(SELECT message_id,reader_id FROM Message_read WHERE message_id = ".$row['id']." AND reader_id =
  (SELECT id FROM User WHERE Username = '".$_SESSION['user']."'));";

  $query1 = "SELECT FirstName, LastName, Username FROM User WHERE id = (SELECT user_id FROM Message WHERE id = ".$row['id'].");";
  $result1= mysql_query($query1);
  $row1 = mysql_fetch_array($result1);

  $result0 = mysql_query($query0);
  $row2 = mysql_fetch_array($result0);

  if(mysql_num_rows($result0)== 0){ //if message has not been read, place it in bold else present it normally

  echo "<div onclick='display_messages(this)' class='inbox_item' id=".$row['id']."> <div class='new_icon'> <img src='eye_candy/emailsm.png'/></div>  <div class='email_from'>". $row1['FirstName']." ". $row1['LastName']. "</div> <div class='email_subject'> Subject: ". $row['subject']. "</div> </div>";
  //echo $row['body']."<br/>";
  }
  else{
    echo "<div onclick='display_messages(this)' class='read_inbox_item' id=".$row['id']."> <div class='old_icon'><img src='eye_candy/email-opensm.png'/></div> <div class='email_from'>". $row1['FirstName']." ". $row1['LastName']. "</div> <div class='email_subject'> Subject: ". $row['subject']. "</div> </div>";

  }
}



?>
