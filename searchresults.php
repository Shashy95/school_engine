<?php
session_start();
include("config.php"); 


$lang = "en";
if(isset($_GET['lang'])){ 
  $lang = $_GET['lang'];
   
} 
require_once("lang.".$lang.".php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>School Search Engine &mdash;<?php echo $language["searchresult"] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui-1.12.1.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/sample.css">
  <style type="text/css">
    
    .pagination{
      margin-top: 15px;
    }
.results{

  text-decoration: underline;
}



  </style>  
  </head>
  <body>
  
  <div class="site-loader"></div>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

      <div class="site-navbar">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
               <h1 class=""><a href="index.php" class="h5 text-uppercase text-black"><strong>SCHOOL SEARCH ENGINE<span class="text-danger"></span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-left text-md-left" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                   <li>
                    <a href="index.php"><?php echo $language["index"]; ?></a>
                  </li>
               <li><a href="about.php"><?php echo $language["about"]; ?></a></li>
                  <li><a href="contact.php"><?php echo $language["contactpage"]; ?></a></li>

                 <li>
                      <span class="language" style="margin-left:10px;">

              <?php if($lang == 'en'){?> <img  class="img-fluid" src='images/en.png' width='27px;'> EN <?php } ?>
            <?php if($lang == 'sw'){?><img  class="img-fluid" src='images/sw.png' width='27px;'> SW <?php } ?>
</span>
                </li>

                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>

   <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="1.0">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2"><?php echo $language["searchresult"] ?></h1>
            <div><a href="index.php"><?php echo $language["index"] ?></a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white"><?php echo $language["searchresult"] ?></strong></div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">

          <div class="row justify-content-center" >
          <div class="col-lg-12">
            <div class="mb-5">
<?php
if (isset($_GET['page'])) {
$page = $_GET['page'];
if ($page=="" || $page=="1")
{
$page1 =0 ;
$page = 1;
}else{
$page1 = ($page*6)-6;
}         
}else{
$page1 = 0;
$page = 1;  

}




if(empty($_GET[$lang.'_level']) && empty($_GET[$lang.'_category']) && empty($_GET[$lang.'_type']) && empty($_GET['region']) && empty($_GET[$lang.'_gender']) && empty($_GET['combination']) &&  empty($_GET['schoolname'])){

$sql="SELECT * FROM schools order by id ASC LIMIT $page1,6 ";

$paging_query = "SELECT * FROM schools  ";

$result= mysqli_query($connection,$sql);

$query=mysqli_query($connection,$paging_query);
$total_result = $query->num_rows;

 $limit = 6;

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
echo"<p class='results'><b> $language[result]: $total_result  </b></p>";
while($row=mysqli_fetch_array($result))
        {


          ?>


        
        <div class="row mb-5">
          <div class="col-sm-12 col-md-12 col-lg-12">
             <div class="col-sm-12 col-md-12 col-lg-12">
             <img src="admin/uploads/<?php echo $row['logo']; ?>" width="120px" height="120px" class="img-fluid">
           </div>
            <table cellpadding="5" style="table-layout:fixed;width:85%;" class="table-results">
   <tr>
    <td><b><?php echo $language["label7"]; ?>: </b> <?php echo $row['schoolname']; ?></td>
    <td><b><?php echo $language["label2"]; ?>: </b><?php echo $row[$lang.'_category']; ?></td>
     
    
   </tr>
<tr>
  <td><b><?php echo $language["label1"];?>: </b><?php echo $row[$lang.'_level'];?></td>
  <td><b><?php echo $language["label5"]; ?>: </b><?php echo $row[$lang.'_gender'];  ?></td>
</tr>

<tr>
  <td><b> <?php echo $language["label3"]; ?>:</b> <?php echo $row[$lang.'_type'];?></td>
  <td><b> <?php echo $language["label4"]; ?>: </b><?php echo $row['region'];  ?></td>
  
</tr>

<tr>

  <td colspan="2"><b> <?php echo $language["label6"]; ?>: </b> <?php echo $row['combination']; ?> </td>
</tr>

<tr>
 
  <td colspan="2" style="text-align: center;"><a href="view.php?id=<?php echo $row['id'];?> &lang=<?php echo $lang ?>"> <?php echo $language["info"]; ?> &raquo;</a></td>
  
</tr>
 </table> 
            </div>
             </div>

         
  <?php  } 

}
print '<br><br>';



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$total_records = 0;
$result_per_page = 6;

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

        <li class='page-item <?php ($page ==1 ? print 'disabled' : '')?>'>
        <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $start;?>'><?php echo $language["link1"]; ?></a>
            </li>
            
            
            <!-- Link of the previous page -->
  <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
<a class='page-link' href='<?php echo $newlink; ?>&page=<?php ($page>1 ? print($page-1) : print 1)?>'><?php echo $language["link2"]; ?></a>
            </li>


        <?php for ($b=1;$b<=$records;$b++){?>
<li class='page-item <?php ($b == $page ? print 'active' : '')?>'>
     <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $b; ?>'><?php echo $b;?></a>
            </li>
            <?php } ?>

<li class='page-item <?php ($page >= $records ? print 'disabled' : '')?>'>
<a class='page-link' href='<?php echo $newlink; ?>&page=<?php ($page < $records ? print($page+1) : print $records)?>'><?php echo $language["link3"]; ?></a>
            </li>
            <!-- Link of the last page -->
            <li class='page-item <?php ($page >= $records ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $records;?>'><?php echo $language["link4"]; ?></a>
            </li>
     
   </ul>
 
</b>

    
        <?php


     }

} 

$conn->close();

}



$category='';
$combination='';
$level='';
$type='';
$region='';
$gender='';
$name='';
$arrlength=1;

if(isset($_GET[$lang.'_level'])  && isset($_GET[$lang.'_type']) && isset($_GET['region']) && isset($_GET[$lang.'_gender'])&& isset($_GET['schoolname'])){

if (isset($_GET['combination'])){
$a=$_GET['combination'];
$combination=implode("," ,$a);

foreach ($a as $combination) {
    $arrlength++;
 }

}

if (isset($_GET[$lang.'_category'])){
$b=$_GET[$lang.'_category'];
$category=implode("," ,$b);

}

 $level = $_GET[$lang.'_level'];
$type=$_GET[$lang.'_type'];
$region=$_GET['region'];
$gender=$_GET[$lang.'_gender'];
$name=$_GET['schoolname']; 

 
if($level!= ""||$category!= ""||$type!= ""||$region!= ""||$gender!= ""||$combination!==""|| $name!= ""){ 

$paging_query = "SELECT * FROM schools where  ".$lang."_level like'%$level%' AND ".$lang."_category like'%$category%' AND ".$lang."_type like'%$type%'  AND region like'%$region%'  AND ".$lang."_gender like'%$gender%' AND  combination like '%$combination%' AND schoolname like'%$name%'";


  $full_query = "SELECT * FROM schools where  ".$lang."_level like'%$level%' AND ".$lang."_category like'%$category%'  AND ".$lang."_type like'%$type%'  AND region like'%$region%'  AND ".$lang."_gender like'%$gender%' AND combination like '%$combination%' AND schoolname like'%$name%' order by id ASC LIMIT $page1,6";

 
$result=mysqli_query($connection,$full_query);

$query=mysqli_query($connection,$paging_query);
$total_result = $query->num_rows;


 $limit = 6;

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
echo"<p class='results'><b> $language[result]: $total_result  </b></p>";

    while($row=mysqli_fetch_array($result))
        {
    
          ?>


              
        <div class="row mb-5">
          <div class="col-sm-12 col-md-12 col-lg-12">
             <div class="col-sm-12 col-md-12 col-lg-12">
             <img src="admin/uploads/<?php echo $row['logo']; ?>" width="120px" height="120px" class="img-fluid">
           </div>
            
            <table cellpadding="5" style="table-layout:fixed;width:85%;" class="table-results">
   <tr>
    <td><b><?php echo $language["label7"]; ?>: </b> <?php echo $row['schoolname']; ?></td>
    <td><b><?php echo $language["label2"]; ?>: </b><?php echo $row[$lang.'_category']; ?></td>
     
    
   </tr>
<tr>
  <td><b><?php echo $language["label1"];?>: </b><?php echo $row[$lang.'_level'];?></td>
  <td><b><?php echo $language["label5"]; ?>: </b><?php echo $row[$lang.'_gender'];  ?></td>
</tr>

<tr>
  <td><b> <?php echo $language["label3"]; ?>:</b> <?php echo $row[$lang.'_type'];?></td>
  <td><b> <?php echo $language["label4"]; ?>: </b><?php echo $row['region'];  ?></td>
  
</tr>

<tr>

  <td colspan="2"><b> <?php echo $language["label6"]; ?>: </b> <?php echo $row['combination']; ?> </td>
</tr>

<tr>
 
  <td colspan="2" style="text-align: center;"><a href="view.php?id=<?php echo $row['id'];?> &lang=<?php echo $lang ?>"> <?php echo $language["info"]; ?> &raquo;</a></td>
  
</tr>
 </table> 
            </div>
             </div>

 <?php            
                        
} 
}

  else{
  echo"<p class='results'><b> $language[NO_RESULT] </b></p>";
 
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
$result_per_page = 6;

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

             <li class='page-item <?php ($page ==1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>?lang=<?php echo $lang ?>&page=<?php echo $start;?>'><?php echo $language["link1"]; ?></a>
            </li>
            
            
            <!-- Link of the previous page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php ($page>1 ? print($page-1) : print 1)?>'><?php echo $language["link2"]; ?></a>
            </li>


        <?php for ($b=1;$b<=$records;$b++){?>
          <li class='page-item <?php ($b == $page ? print 'active' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $b; ?>'><?php echo $b;?></a>
            </li>
            <?php } ?>

            <li class='page-item <?php ($page >= $records ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php ($page < $records ? print($page+1) : print $records)?>'><?php echo $language["link3"]; ?></a>
            </li>
            <!-- Link of the last page -->
            <li class='page-item <?php ($page >= $records ? print 'disabled' : '')?>'>
              <a class='page-link' href='<?php echo $newlink; ?>&page=<?php echo $records;?>'><?php echo $language["link4"]; ?></a>
            </li>
          
          
        </ul>
 
</b>




  
  
        <?php 


     }

} else {

}
$conn->close();

}

?>        
         

         
         
             
        
  </div>

      </div>
    </div>

      </div >
          </div>
            </div>
   
    
    

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4"><?php echo $language["footer"] ?> School Search Engine</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur  n ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>

            
            
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4"><?php echo $language["footer2"] ?></h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="index.php"><?php echo $language["index"] ?></a></li>
                   <li><a href="about.php"><?php echo $language["about"] ?></a></li>
                 <li><a href="contact.php"><?php echo $language["contactpage"] ?></a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                 
                  <li><a href="#"><?php echo $language["privacy"] ?></a></li>
                 
                  <li><a href="#"><?php echo $language["terms"] ?></a></li>
                </ul>
              </div>
            </div>


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4"><?php echo $language["footer3"] ?></h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>

            

          </div>
           </div>
          
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;</script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>

  </div>

   <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/mediaelement-and-player.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>