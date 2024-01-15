<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "school";
    $connection=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$connection){
          die('Could not Connect MySql Server:' .mysql_error());
        }

if (isset($_GET['term'])) {
     
   $query = "SELECT * FROM schools WHERE schoolname LIKE '{$_GET['term']}%' LIMIT 25";
    $result = mysqli_query($connection, $query);
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['schoolname'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>