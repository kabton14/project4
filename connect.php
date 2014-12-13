<?php
/*INFO 2180 PROJECT(CHEAPO MAIL)---#ID-620040594
This program is responsible for connecting to and selecting the db and starting the php session  */

session_start();

$db = mysql_connect("localhost","root","");
mysql_select_db("cheapo");

?>
