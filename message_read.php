<?php
include 'connect.php';

$id = $_REQUEST['message_id'];

$query0 = "SELECT message_id,reader_id FROM Message_read WHERE message_id = '$id' AND reader_id =
            (SELECT id FROM User WHERE Username = '".$_SESSION['user']."');";

$result0 = mysql_query($query0);


if(mysql_num_rows($result0)== 0){ //If message is not yet read
$query = "INSERT INTO Message_read(message_id,reader_id,_date)  VALUES (
          '$id', (SELECT recipient_id FROM Recipients WHERE message_id = '$id' AND recipient_id = (SELECT id FROM User WHERE Username = '".$_SESSION['user']."')),NOW());";


          $result = mysql_query($query);
}

else{
  echo "Houston, there's a problem.";
}









?>
