<?php
session_start();
include("config.php");

if(!isset($_SESSION["name"])){
    ?>
    <script>
    window.location="index.php";
    </script>
    <?php
    
} 



$lang = "en";
if(isset($_GET['lang'])){ 
  $lang = $_GET['lang']; 
} 
require_once("lang.".$lang.".php");

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin - View Schools</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
@media only screen and (max-width: 576px)  {

.table-view{ 
width: 100%;
}
.table-view td{
display: block;
 
}

 }

 @media only screen and (min-width: 576px)  {

.table-view{ 
width: 100%;
}
.table-view td{
display: block;
 
}

 }

@media only screen and (min-width: 768px) {
.table-view td{
display: block;
 
}
 }

  @media only screen and (min-width: 991px) {

.table-view td{
display: table-cell;

 
}
}
 
</style>
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
      <div class="sidebar-brand-text mx-1">school search engine | Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

        <li class="nav-item active">
        <a class="nav-link" href="viewschools.php">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Manage Schools</span></a>
      </li>

          <li class="nav-item ">
        <a class="nav-link" href="post.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Add Schools</span></a>
      </li>

       <li class="nav-item ">
        <a class="nav-link" href="viewapp.php">
          <i class="fas fa-fw fa-file"></i>
          <span>View Applications</span></a>
      </li>

       <li class="nav-item ">
        <a class="nav-link" href="viewmsg.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>View Messages</span></a>
      </li>

      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        <ul class="navbar-nav ml-auto">
            
<li class="nav-item dropdown no-arrow mx-1" style="margin-top:25px;">
<?php if($lang == 'en'){?> <img style="margin-left:-30px;" src='img/en.png' width='27px;'> EN <?php } ?>
<?php if($lang == 'sw'){?><img style="margin-left:-30px;" src='img/sw.png' width='27px;'> SW <?php } ?>

             
</li>

          
 


            <!-- Nav Item - Alerts -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown">
             
<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                            <b style="color:black;"><?php echo $_SESSION['name']?></b>

              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="changepass.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><a href="viewschools.php">Manage Schools</a> | View Schools </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <?php


$id=$_GET['id'];

$query="SELECT *FROM schools WHERE id=$id";
$result = mysqli_query($connection,$query);

 while($row=mysqli_fetch_array($result))
        {
    
          ?>

 <img src="uploads/<?php echo $row['logo']; ?>" width="120px" height="120px"  class="img-fluid">
           <p><h3 ><?php echo $row['schoolname'];  ?></h3></p>


<div class="col-md-6 col-lg-12 text-left border-bottom border-top py-3">
    <table cellpadding="5" style="table-layout:fixed;width:100%;" class="table-view">
   <tr>
    <td><b><?php echo $language["label2"]; ?>: </b><?php echo $row[$lang.'_category']; ?></td>
    <td><b><?php echo $language["label1"];?>: </b><?php echo $row[$lang.'_level'];?></td> 
   </tr>

<tr>
  <td><b><?php echo $language["label5"]; ?>: </b><?php echo $row[$lang.'_gender'];  ?></td>
  <td><b> <?php echo $language["label3"]; ?>:</b> <?php echo $row[$lang.'_type'];?></td>
</tr>

<tr> 
  <td><b> <?php echo $language["label4"]; ?>: </b><?php echo $row['region'];  ?></td>
   <td><b> <?php echo $language["label6"]; ?>: </b><?php echo $row['combination'];  ?></td>
</tr>

<tr>
 <td><b> <?php echo $language["label9"]; ?>: </b><?php echo $row['phone'];  ?></td>
 <td><b> <?php echo $language["label10"]; ?>: </b><a href="mailto:<?php echo $row['email'];  ?>"><?php echo $row['email'];  ?></a></td>
</tr>
  
  <tr>
  <td><b> <?php echo $language["label8"]; ?>: </b><?php echo $row['location'];  ?></td>
  <td><b> <?php echo $language["label11"]; ?>: </b><?php echo $row['address'];  ?></td>
</tr>


 </table>   
                </div>
              </div>

 <?php }  

 $query="SELECT * FROM description WHERE sch_id=$id";
$result = mysqli_query($connection,$query);

 while($row=mysqli_fetch_array($result))
        {
    
          ?>


<div class="col-md-6 col-lg-12 text-left border-bottom border-top py-3">
    <table cellpadding="5" style="table-layout:fixed;width:100%;">
   <tr>
    <td><?php echo $row[$lang.'_description']; ?></td>
   </tr>


 </table>   
                </div>
             

<?php } 
?>


</div>

</p>
              </div>
            </div>
          
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website</script><script>document.write(new Date().getFullYear());</script></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
