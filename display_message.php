<?php

/*INFO 2180 PROJECT(CHEAPO MAIL)---#ID-620040594
This program is responsible for displaying a selected message from the list of messages in the inbox/main-page  */

include 'connect.php';

if(isset($_SESSION['user'])&&isset($_SESSION['pass'])){

$id = $_REQUEST['message_id'];

//$query = "SELECT body,subject,user_id FROM Message WHERE id='$id' ";
$query = "SELECT * FROM Message M JOIN User ON M.user_id = User.id AND M.id ='$id';";
$result = mysql_query($query);

if($result){
  while($row = mysql_fetch_array($result)){
    echo "<strong> From: </strong>".$row['FirstName']." ".$row['LastName']." (".$row['Username'].")<br/> <strong>Subject: </strong>".$row['subject']."<hr/><br/> <strong>Message: </strong><br/>".$row['body'];
    echo "<div class='reply_section'>Reply to Message:<br/>
          <div id='reply_msg'><textarea id='reply_message' name='reply_message'></textarea></div>
          <div id='reply_btn'><input type='button' id='reply_button' name='reply_button' value='Reply'></div>
          </div>";

          $_SESSION['subject'] = $row['subject'];
          $_SESSION['body'] = $row['body'];
          $_SESSION['recipient'] = $row['Username'];
          

  }



}

}

else{
  echo "notawesome";
  exit();

}

?>
