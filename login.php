<?php

include 'connect.php';

$user = $_REQUEST["user"];
$pass = $_REQUEST["pass"];

//$username="";
//$password="";


$query = "SELECT Username,Password,FirstName, LastName FROM User WHERE Username='$user' AND Password='$pass';";
$results = mysql_query($query);

while($row = mysql_fetch_array($results)){

  $username = $row['Username'];
  $password = $row['Password'];
  $fname = $row['FirstName'];
  $lname = $row['LastName'];

}

if($username == $user && $password == $pass &&  $username != "" && $password !=""){
//echo "Awesome , '$username' whose  password is '$password'";
$_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['pass']=$password;
$_SESSION['user']=$username;

//header('Location:main.html');
echo "awesome";


}

else{
  //echo "The username or password is incorrect or doesn't exist!";
  echo "notawesome";
}

//$db.close();

?>
