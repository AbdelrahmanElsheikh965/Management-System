<?php

$conn = mysqli_connect("localhost", "root", "", "management_system");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}

?>