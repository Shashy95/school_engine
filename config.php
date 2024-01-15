
  <?php

$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Connection Failed" . mysql_error());
}


$select_db = mysqli_select_db($connection,'school');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}


?>
               