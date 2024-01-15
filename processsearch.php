<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="jquery/jquery.js"></script>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>


</head>

<body style="background: url(image/b.jpg) ">

<div id="wrapper">
<nav class="navbar ">SCHOOL SEARCH ENGINE</nav>

<p style="margin-left: 60px; "><a href="javascript:history.go(-1)" title="Return to the previous Page">&laquo; Go back to the previous page</a>
<a href="search.php" title="Return to Home Page" style="margin-left: 90px;">&laquo; Go back to Home page</a></p><br/>

<?php
if (isset($_GET['page'])) {
$page = $_GET['page'];
if ($page=="" || $page=="1")
{
$page1 =0 ;
$page = 1;
}else{
$page1 = ($page*3)-3;
}         
}else{
$page1 = 0;
$page = 1;  

}



$connection = mysqli_connect('localhost', 'root', '');
if (!$connection){
    die("Connection Failed" . mysql_error());
}
  $select_db = mysqli_select_db($connection,'school');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}



 if(empty($_GET['level']) && empty($_GET['category']) && empty($_GET['type']) && empty($_GET['region']) && empty($_GET['gender']) && empty($_GET['combination']) &&  empty($_GET['schoolname'])){

$sql="SELECT * FROM schools LIMIT $page1,3";

$paging_query = "SELECT * FROM schools  ";

$result= mysqli_query($connection,$sql);

$query=mysqli_query($connection,$paging_query);
$total_result = $query->num_rows;

 $limit = 3;

    // How many pages will there be
    $pages = ceil($total_result / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total_result);

if($total_result>0){
echo"<b style='margin-left:60px;'>Showing $start - $end  of $total_result results </b><hr>";
while($row=mysqli_fetch_array($result))
        {
          ?>

          <div id="content-process"> 
         
           <p style="float: left; ;margin-left: 30px;margin-top: 20px; width:30%;"> 
          <img src="admin/uploads/<?php echo $row[8]; ?>" width="100px" height="120px""><br/>
            <b>Name: </b>                   <?php echo $row[1];  ?><br/>
            <b>Level:</b>                   <?php echo $row[2];  ?><br/>
            <b>School Category:</b>          <?php echo $row[3];  ?><br/>
            <b>School Type: </b>              <?php echo $row[4];  ?><br/>
            <b> Region:</b>                 <?php echo $row[5];  ?><br/>
              <b> Gender: </b>               <?php echo $row[6];  ?><br/>
              <b> Combination: </b>               <?php echo $row[7];  ?><br/>
             
                         
<?php  } 
}




print '<br><br>';



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$total_records = 0;
$result_per_page = 3;

$selflink = "$_SERVER[REQUEST_URI]";
$newlink = str_replace("page","prev",$selflink);


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = $paging_query;
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

      $total_records = $total_records + 1;
       
    }

   $records = $total_records/$result_per_page;
   $records = ceil($records);

 $adjacents=5;

if($records <= (1+($adjacents * 2))) {
          $start = 1;
          $end   = $records;
        } else {
          if(($page - $adjacents) > 1) {           //Checking if the current page minus adjacent is greateer than one.
            if(($page + $adjacents) < $records) {  //Checking if current page plus adjacents is less than total pages.
              $start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
              $end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
            } else {                   //If current page plus adjacents is greater than total pages.
              $start = ($records - (1+($adjacents*2)));  //then the page range will start from total pages minus 1+($adjacents*2)
              $end   = $records;               //and the end will be the last page number that is total pages number.
            }
          } else {                     //If the current page minus adjacent is less than one.
            $start = 1;                                //then start will be start from page number 1
            $end   = (1+($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
          }
        }


        if($records > 1) { ?>
          <ul class="pagination pagination-sm justify-content-center">
            
            <!-- Link of the previous page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php ($page>1 ? print($page-1) : print 1)?>'>Previous</a>
            </li>


        <?php for ($b=1;$b<=$records;$b++){?>
          <li class='page-item <?php ($b == $page ? print 'active' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $b; ?>'><?php echo $b;?></a>
            </li>
            <?php } ?>

            <li class='page-item <?php ($page >= $records ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php ($page < $records ? print($page+1) : print $records)?>'>Next</a>
            </li>
            <!-- Link of the last page -->
            <li class='page-item <?php ($page >= $records ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $records;?>'>Last</a>
            </li>
     
      
        <?php


     }

} 
$conn->close();
}


$combination='';
$arrlength=1;

if(isset($_GET['level']) && isset($_GET['category']) && isset($_GET['type']) && isset($_GET['region']) && isset($_GET['gender'])&& isset($_GET['schoolname'])){

if (isset($_GET['combination'])){
$a=$_GET['combination'];
$combination=implode("," ,$a);

foreach ($a as $combination) {
    $arrlength++;
 }

}

 $level = $_GET['level'];
$category=$_GET['category'];
$type=$_GET['type'];
$region=$_GET['region'];
$gender=$_GET['gender'];
$name=$_GET['schoolname']; 

 
if($level!= ""||$category!= ""||$type!= ""||$region!= ""||$gender!= ""||$combination!==""|| $name!= ""){ 

  $paging_query = "SELECT * FROM schools where  level like'%$level%' AND category like'%$category%'  AND type like'%$type%'  AND region like'%$region%'  AND gender like'%$gender%' AND  combination like '%$combination%' AND schoolname like'%$name%'";


  $full_query = "SELECT * FROM schools where  level like'%$level%' AND category like'%$category%'  AND type like'%$type%'  AND region like'%$region%'  AND gender like'%$gender%' AND combination like '%$combination%' AND schoolname like'%$name%' LIMIT $page1,3";

 
$result=mysqli_query($connection,$full_query);

$query=mysqli_query($connection,$paging_query);
$total_result = $query->num_rows;


 $limit = 3;

    // How many pages will there be
    $pages = ceil($total_result / $limit);

    // What page are we currently on?
    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total_result);

if($total_result>0){
echo"<b style='margin-left:60px;'>Showing $start - $end  of $total_result results </b><hr>";

    while($row=mysqli_fetch_array($result))
        {
    
          ?>


          <div id="content-process"> 
         
           <p style="float: left; ;margin-left: 30px;margin-top: 20px; width:30%;"> 
          <img src="admin/uploads/<?php echo $row[8]; ?>" width="100px" height="120px""><br/>
            <b>Name: </b>                   <?php echo $row[1];  ?><br/>
            <b>Level:</b>                   <?php echo $row[2];  ?><br/>
            <b>School Category:</b>          <?php echo $row[3];  ?><br/>
            <b>School Type: </b>              <?php echo $row[4];  ?><br/>
            <b> Region:</b>                 <?php echo $row[5];  ?><br/>
              <b> Gender: </b>               <?php echo $row[6];  ?><br/>
              <b> Combination: </b>               <?php echo $row[7];  ?><br/>
             
 <?php ++$page1;           
                        
} 
}

  else{
  echo"<b style='margin-left:60px;'>0 result found </b><hr>";
  echo"<div id='content-process'>";
  }
}
}

print '<br><br>';

if($level!= ""||$category!= ""||$type!= ""||$region!= ""||$gender!= ""||$combination!==""|| $name!= ""){ 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$total_records = 0;
$result_per_page = 3;

$selflink = "$_SERVER[REQUEST_URI]";
$newlink = str_replace("page","prev",$selflink);


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = $paging_query;
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

      $total_records = $total_records + 1;
       
    }

   $records = $total_records/$result_per_page;
   $records = ceil($records);
   $adjacents=5;

if($records <= (1+($adjacents * 2))) {
          $start = 1;
          $end   = $records;
        } else {
          if(($page - $adjacents) > 1) {           //Checking if the current page minus adjacent is greateer than one.
            if(($page + $adjacents) < $records) {  //Checking if current page plus adjacents is less than total pages.
              $start = ($page - $adjacents);         //If true, then we will substract and add adjacent from and to the current page number  
              $end   = ($page + $adjacents);         //to get the range of the page numbers which will be display in the pagination.
            } else {                   //If current page plus adjacents is greater than total pages.
              $start = ($records - (1+($adjacents*2)));  //then the page range will start from total pages minus 1+($adjacents*2)
              $end   = $records;               //and the end will be the last page number that is total pages number.
            }
          } else {                     //If the current page minus adjacent is less than one.
            $start = 1;                                //then start will be start from page number 1
            $end   = (1+($adjacents * 2));             //and end will be the (1+($adjacents * 2)).
          }
        }


        if($records > 1) { ?>
          <ul class="pagination pagination-sm justify-content-center">
            
            <!-- Link of the previous page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php ($page>1 ? print($page-1) : print 1)?>'>Previous</a>
            </li>


        <?php for ($b=1;$b<=$records;$b++){?>
          <li class='page-item <?php ($b == $page ? print 'active' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $b; ?>'><?php echo $b;?></a>
            </li>
            <?php } ?>

            <li class='page-item <?php ($page >= $records ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php ($page < $records ? print($page+1) : print $records)?>'>Next</a>
            </li>
            <!-- Link of the last page -->
            <li class='page-item <?php ($page >= $records ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $records;?>'>Last</a>
            </li>
          </ul>
  
  
        <?php 


     }

} else {

}
$conn->close();

}

?>
