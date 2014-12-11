<?php

/*INFO 2180 PROJECT(CHEAPO MAIL)---#ID-620040594
This program is responsible for displaying a selected message from the list of messages in the inbox/main-page  */

include 'connect.php';

if(isset($_SESSION['user'])&&isset($_SESSION['pass'])){

$id = $_REQUEST['message_id'];

$query = "SELECT body,subject FROM Message WHERE id='$id' ";
$result = mysql_query($query);

if($result){
  while($row = mysql_fetch_array($result)){

    echo "<strong>Subject: </strong>".$row['subject']."<br/> <strong>Message: </strong>".$row['body'];

  }


}

}

else{
  echo "notawesome";
  exit();

}

?>
