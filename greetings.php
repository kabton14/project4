<?php

session_start();


if(isset($_SESSION['user'])&&isset($_SESSION['pass'])){


echo "Hello, ". $_SESSION['fname'] ." <form action='logout.php' method='post'>  <input type='submit' id='logout_btn' name='logout' value='logout'/> </form>";

}


?>
