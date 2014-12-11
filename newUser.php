<?php

include 'connect.php';

$user = $_REQUEST["user"];
$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$pass = $_REQUEST["pass"];


$regexp = "/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/"; # Regular Express to check is password entered meets the criteria

if(!preg_match($regexp,$pass)){

    echo "Please enter a valid password.";?> <em>(Password should be atleast 8 characters long ,
          should include at least one digit and a mixture of capital and common letters)</em>

          <?php
  }

  else{

    $query = "INSERT INTO User(FirstName, LastName, Password, Username) VALUES('$fname','$lname','$pass','$user');";
    $results = mysql_query($query);

    if(!$results){


      die("SQL query failed:\n$query\n" . mysql_error());

    }

    else{

      echo "Awesome sauce! The user,'$user' was created successfully! ";

    }

}






?>
