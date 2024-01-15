<?php
session_start();
if(!isset($_SESSION["name"])){
  header("Location:index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" href="style.css" type="text/css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
       <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script> 
      <script type="text/javascript" src="vendor/charts/theme.fusion.js"></script>
</head>

<body style="background: url(image/c.jpg)">
<div id="wrapper">

  
<nav class="navbar">

SCHOOL SEARCH ENGINE| Admin</nav>
                       
<div class="sidebar" id="sidebar" >

<i class="fa fa-user" style="font-size: 108px;"></i>
  <p>Hi <?php echo $_SESSION['name']?></p>
                <hr>
<p><i class="fa fa-home" style="font-size: 17px; margin-left:-45px;">&nbsp<a  href="home.php">Dashboard</a></i></p>
<p><i class="fa fa-briefcase" style="font-size: 18px;">&nbsp<a href="viewschool.php">Manage Schools</a></i></p>
<p><i class="fa fa-plus" style="font-size: 18px;margin-left:-33px;">&nbsp<a href="post.php">Add Schools</a></i></p>
<p><i class="fa fa-lock" style="font-size: 18px;margin-left:5px;">&nbsp<a href="changepass.php">Change Password</a></i></p>
<p><i class="fa fa-sign-out" style="font-size: 18px;margin-left:-60px;">&nbsp<a href="logout.php">Log Out</a></i></p>
              </div>
              </div>

<div id="content-home"> 
<div id="page-wrapper">


<?php
        $connection = mysqli_connect('localhost', 'root');
        $select_db = mysqli_select_db($connection,'school'); 

        $sql="SELECT id FROM  schools";
        $fetch=mysqli_query($connection, $sql);
        $count = $fetch->num_rows;
        ?>

     <div class="tile">
      <h3 align="center">NO OF SCHOOLS</h3>
      <h3 align="center"> <?php echo"$count"; ?></h3>
      
    </div>  


 <div class="graphs">
 <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
 <h3 class="panel-title">GRAPHS BASED ON SCHOOLS DATA</h3>
</div>
</div>
</div>
</div>
   

 <a  href="home.php">Level</a>
  <a  href="home-category.php">Category</a>
  <a  href="home-type.php">Type</a>
  <a  href="home-region.php">Region</a>  
   <a  href="home-gender.php">Gender</a> 
    <a  href="home-combination.php" class="active">Combination</a>  
 
<div id="chart-1"><!-- Fusion Charts will render here--></div>

    </div>  

<?php
include("fusioncharts.php");
   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "school";  // MySQL database name

   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
   if ($dbhandle->connect_error) {
      exit("There was an error with your connection: ".$dbhandle->connect_error);
   }

      $strQuery = "SELECT combination, COUNT(combination) FROM schools GROUP BY combination order by COUNT(combination) desc ";
           $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

           if ($result) {
              $arrData = array(
                  "chart" => array(
                    "caption" => "Numbers of Schools Based on Different Combination",
                    "theme" => "fusion",
                     "caption" => "",
                      "showPercentInTooltip" => "0",
                      "enableMultiSlicing" =>"1",
                     
                    )
                 );

              $data = array();


              $arrData["data"] = array();
              while($row = mysqli_fetch_array($result)) {
                   
               
               array_push($arrData["data"], array(
                       
                    "label" =>$row["combination"] ,
                    "value" =>  $row["COUNT(combination)"]
                    )
                );
            
              }
$jsonEncodedData = json_encode($arrData);

              $columnChart = new FusionCharts("pie3D", "myFirstChart" , 900, 500, "chart-1", "json", $jsonEncodedData);
              $columnChart->render();
              $dbhandle->close();
           }

      ?>

    </div>
</div>
    
<nav class="end1">
  <i class="fa fa-copyright "></i>2018
  Designed by
</nav>


</body>

</html>