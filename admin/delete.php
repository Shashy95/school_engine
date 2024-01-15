<?php
 $connection = mysqli_connect('localhost', 'root', '');
 $select_db = mysqli_select_db($connection,'school');

$delete_id=$_GET['id'];
        $result = mysqli_query($connection,"DELETE FROM schools WHERE id=$delete_id"); 
        header("Location: viewschool.php");

?>