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

  <title>Admin - Add Schools</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  

   <script type="text/javascript">
  function validateImage() {
    var formData = new FormData();
 
    var file = document.getElementById("logo").files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert('Please select a valid image file');
        document.getElementById("logo").value = '';
        return false;
    }
    if (file.size > 1024000) {
        alert('Max Upload size is 1MB only');
        document.getElementById("logo").value = '';
        return false;
    }
    return true;
}

</script>


 
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

        <li class="nav-item">
        <a class="nav-link" href="viewschools.php">
          <i class="fas fa-fw fa-briefcase"></i>
          <span>Manage Schools</span></a>
      </li>

          <li class="nav-item active">
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

<?php


$msg='';
$errors = array();
$combination='';
$category='';
$swcategory='';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!(preg_match("/[A-Za-z]/", $_POST['schoolname']))){
        $errors['schoolname'] = "* Not a valid name.";
    }
    }


if(isset($_POST['submit'])){
if(count($errors) === 0){

if (isset($_POST['combination'])){
$combination=implode("," ,$_POST['combination']);
}

if (isset($_POST['en_category'])){
$category=implode("," ,$_POST['en_category']);
}

if (isset($_POST['sw_category'])){
$swcategory=implode("," ,$_POST['sw_category']);
}


$file=$_FILES['logo']['tmp_name'];
$image = $_FILES["logo"] ["name"];
$image_name= addslashes($_FILES['logo']['name']);
move_uploaded_file($_FILES["logo"]["tmp_name"],"uploads/" . $_FILES["logo"]["name"]);

$schoolname=$_POST['schoolname'];

$level=$_POST['en_level'];
$swlevel=$_POST['sw_level'];

$type=$_POST['en_type'];
$swtype=$_POST['sw_type']; 

$region=$_POST['region'];

$gender=$_POST['en_gender'];
$swgender=$_POST['sw_gender'];

$logo=$_FILES["logo"]["name"];

$location=$_POST['location'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];

$description=$_POST['en_description'];
$swdescription=$_POST['sw_description'];



$sql="INSERT INTO schools(schoolname,en_level,sw_level,en_category,sw_category,en_type,sw_type,region,en_gender,sw_gender,combination,logo,location,phone,email,address)
VALUES('$schoolname','$level','$swlevel','$category','$swcategory','$type','$swtype','$region','$gender','$swgender','$combination','$logo','$location','$phone','$email','$address')";

$result = mysqli_query($connection,$sql);
$school_id = mysqli_insert_id($connection);


$sql2="INSERT INTO description (schoolname,sch_id,en_description,sw_description)
VALUES('$schoolname','$school_id','$description','$swdescription')";

  $result2 = mysqli_query($connection,$sql2);
  
             if(!$result && !$result2) 
        {  
$msg='<div class="alert alert-danger">Sorry try again.
 <a href="" class="closebtn" data-dismiss="alert" aria-label="close">&times;</a>
           </div>';

          
        }
        
        else{
$msg= '<div class="alert alert-success">Success! Your school has been added successfully.
 <a href="" class="closebtn" data-dismiss="alert" aria-label="close">&times;</a>
            </div>';
        }
        
        
}
}

?> 
 




        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><a href="post.php">Add Schools</a> </h6>
            </div>
            <div class="card-body">
                   <div class="col-lg-12">

        <span class="msg"> <?php echo $msg;?></span>

<form method="post" action="" enctype="multipart/form-data" >
  <div class="row">

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="level">Level</label><br>
<select  class="form-control" id="level" onchange="updateCheckBox(this)" name="en_level">
<option value="">Choose</option>
<option value="Nursery ">Nursery </option>
<option value="Primary " >Primary </option>
<option value=" Nursery and Primary " >Nursery and Primary </option>
<option value="O level " >O level</option>
<option value="A level ">A level </option>
<option value="O level and A level" >O level and A level</option>
</select>
</div>

 <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="level">Ngazi Ya Shule</label><br>
<select class="form-control" id="level" name="sw_level">
<option value="">Choose</option>
<option value="Chekechea">Chekechea </option>
<option value="Msingi" >Msingi</option>
<option value="Chekechea na Msingi" >Chekechea na Msingi</option>
<option value="Daraja la chini la sekondari" >Daraja la chini la sekondari</option>
<option value="Daraja la  juu la sekondari">Daraja la  juu la sekondari</option>
<option value="Daraja la chini na juu la sekondari" >Daraja la chini na juu la sekondari</option>
</select>
</div>

   
<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="category">Category</label><br>   
<input type="checkbox" value="Private School" id="category" name="en_category[]" > Private School
&nbsp&nbsp
<input type="checkbox" value="Government School" id="category" name="en_category[]" > Public School   
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="category">Kundi La Shule</label><br>   
<input type="checkbox" value="Shule Binafsi" id="category" name="sw_category[]" > Shule Binafsi
&nbsp&nbsp
<input type="checkbox" value="Shule ya Serikali" id="category" name="sw_category[]" > Shule ya Serikali 
</div>


<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="type">Type</label><br>                                       
<select class="form-control" id="type" name="en_type">
<option value="">Choose</option>
<option value="Boarding School" >Boarding School</option>
<option value="Day School" > Day school</option>
<option value="Day and Boarding " >Day and Boarding School</option>
</select>
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="type">Aina ya shule</label><br>                                       
<select class="form-control" id="type" name="sw_type">
<option value="">Choose</option>
<option value="Shule ya Bweni" >Shule ya Bweni</option>
<option value="Shule ya Kutwa" >Shule ya Kutwa</option>
<option value="Shule ya Kutwa na Bweni " >Shule ya Kutwa na Bweni</option>
</select>
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="gender">Gender</label><br>                                        
<select class="form-control" id="gender" name="en_gender">
<option value="">Choose</option>
<option value="Boys Only" >Boys Only</option>
<option value="Girls Only" > Girls Only </option>
<option value="Boys and Girls" >Boys and Girls</option>
</select>
</div>

 <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="gender">Jinsia</label><br>                                        
<select class="form-control" id="gender" name="sw_gender">
<option value="">Choose</option>
<option value="Wavulana tu" >Wavulana tu</option>
<option value="Wasichana tu" > Wasichana tu </option>
<option value="Wavulana na Wasichana" >Wavulana na Wasichana</option>
</select>
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="region">Region</label><br>                                        
<select class="form-control" id="region" name="region">
<option value="">Choose</option>
<option value="Arusha">Arusha</option>  
<option value="Dar es Salaam">Dar es Salaam</option>
<option value="Dodoma">Dodoma</option>  
<option value="Geita"> Geita</option>
<option value="Iringa">Iringa</option> 
<option value="Kagera">Kagera</option>    
<option value="Katavi"> Katavi</option>   
<option value="Kigoma">Kigoma</option>    
<option value="Kilimanjaro"> Kilimanjaro</option>   
<option value="Lindi">Lindi</option>    
<option value="Manyara"> Manyara</option>   
<option value="Mara">Mara</option>    
<option value="Mbeya">Mbeya</option>  
<option value="Morogoro"> Morogoro </option>  
<option value="Mtwara"> Mtwara  </option> 
<option value="Mwanza"> Mwanza </option>  
<option value="Njombe"> Njombe </option>  
<option value="Pemba"> Pemba  </option>
<option value="Pwani"> Pwani    </option>
<option value="Rukwa"> Rukwa    </option>
<option value="Ruvuma"> Ruvuma  </option> 
<option value="Shinyanga"> Shinyanga </option>  
<option value="Simiyu"> Simiyu    </option>
<option value="Singida"> Singida  </option> 
<option value="Songwe"> Songwe </option>
<option value="Tabora"> Tabora  </option> 
<option value="Tanga"> Tanga    </option>
<option value="Zanzibar"> Zanzibar</option>
</select>
</div>

 <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>School Name</label><br>
<input class="form-control" type="text" placeholder="Kisimiri Secondary School" name="schoolname" id="schoolname">
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>Location</label><br>
<input class="form-control" type="text" placeholder="Njiro,Road Block C" name="location" id="location">
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>Phone Number</label><br>
<input class="form-control" type="text" placeholder="0710000000" name="phone" id="phone">
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>Email Address</label><br>
<input class="form-control" type="text" placeholder="schoolengine@example.com" name="email" id="email">
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>Postal  Address</label><br>
<input class="form-control" type="text" placeholder="P.O BOX 0000,Arusha" name="address" id="address">
</div>

<div class="col-sm-12 col-md-12 col-lg-12 mb-4">
<label for="combination">Combination</label><br>
<input type="checkbox" value="CBA" id="combination" name="combination[]"  onclick="check();">CBA
<input type="checkbox" value="CBG" id="combination" name="combination[]"  onclick="check();">CBG
<input type="checkbox" value="CBN"  id="combination" name="combination[]" onclick="check();">CBN
<input type="checkbox" value="ECA"  id="combination" name="combination[]" onclick="check();">ECA
<input type="checkbox" value="EGM"  id="combination" name="combination[]"  onclick="check();">EGM
<input type="checkbox" value="HGE"  id="combination" name="combination[]"  onclick="check();">HGE
<br><input type="checkbox" value="HGK"  id="combination" name="combination[]" onclick="check();">HGK
<input type="checkbox" value="HGL" id="combination" name="combination[]" onclick="check();">HGL
<input type="checkbox" value="HKL" id="combination" name="combination[]" onclick="check();">HKL
<input type="checkbox" value="PCB"  id="combination" name="combination[]" onclick="check();">PCB
<input type="checkbox" value="PCM"  id="combination" name="combination[] " onclick="check();">PCM
<input type="checkbox" value="PGM"  id="combination" name="combination[]" onclick="check();">PGM
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="description">School Description </label><br/>
<span><textarea class="form-control" name="en_description" required="required"  ></textarea></span>
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="description">Maelezo Ya Shule </label><br/>
<span><textarea class="form-control" name="sw_description" required="required"  ></textarea></span>
</div>

<div class="col-sm-6 col-md-6 col-lg-12 mb-4">
<label for="logo">School Logo</label><br> 
<input type="file"  id="logo" name="logo" required="required"  onchange="validateImage()"/>
</div>

<div class="col-sm-12 col-md-8 col-lg-3 mb-4">
<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block form-control-same-height rounded-0" >
</div>
 
</form>
                

</div>
</div>
</div>
            
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website </script><script>document.write(new Date().getFullYear());</script></span>
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


<script>
    function updateCheckBox(opts) {
        var chks = document.getElementsByName("combination[]");

        if (opts.value == "O level and A level School") {
            for (var i = 0; i <= chks.length - 1; i++) {
                chks[i].disabled = false;
                
            }
        }
        else if (opts.value == "A level School") {
            for (var i = 0; i <= chks.length - 1; i++) {
                chks[i].disabled = false;
                
            }
        }
        else {
            for (var i = 0; i <= chks.length - 1; i++) {
                chks[i].disabled = true;
                chks[i].checked = false;
               
            }
        }
    }
</script>


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
