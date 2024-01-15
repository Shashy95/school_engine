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
 <style type="text/css">

 </style>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="style.css" type="text/css">

  
</head>
<body style=" background: url(image/c.jpg);">

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


        <div id="content-table">
          
            <div id="page-wrapper">

               <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-9">
 <h3 class="panel-title">MANAGE SCHOOLS</h3>
</div>
</div>
</div>
</div>
        
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                             <thead>
                                        <tr>


              <th>#</th>
            <th>School Name</th>
            <th>Level </th>
            <th>Category</th>
            <th>Type</th>
            <th>Region</th>
            <th>Gender</th>
            <th>Combination</th>
            
            <th>Action</th>
        </tr>
                </thead>
                <tbody>
        <?php
       $connection = mysqli_connect('localhost', 'root', '');
        $select_db = mysqli_select_db($connection,'school');

       
        $view_school="select * from schools";//select query for viewing users.
        $run=mysqli_query($connection,$view_school);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $id=$row[0];
          $school_name=$row[1];
            $level=$row[2];
            $category=$row[3];
            $type=$row[4];
            $region=$row[5];
            $gender=$row[6];
            $combination=$row[7];
            
        ?>

                    <tr>
            <td><?php echo $id;  ?></td>
            <td><?php echo $school_name;  ?></td>
            <td><?php echo $level;  ?></td>
             <td><?php echo $category;  ?></td>
              <td><?php echo $type;  ?></td>
              <td><?php echo $region;  ?></td>
               <td><?php echo $gender;  ?></td>
                <td><?php echo $combination;  ?></td>
            
                    <td>


<a href="update.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to edit');"><i class="fa fa-edit"></i></a>&nbsp&nbsp&nbsp&nbsp
<a href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete');"><i class="fa fa-remove"></i></a>


                        </td>
                    </tr>
                    <?php } ?>        
                </tbody>
            </table>
            </div>
</div>

 
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="dist/js/sb-admin-2.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    
<nav class="end">
  <i class="fa fa-copyright "></i>2018
  Designed by
</nav>


</div> 



</body>
</html>                          