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



$id=$_GET['id'];

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

  <title>Admin - Edit Schools</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
 
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

    $query ="SELECT *FROM schools WHERE id='$id'";
    $result= mysqli_query($connection,$query);

 $query2 ="SELECT *FROM description WHERE sch_id='$id'";
   $result2= mysqli_query($connection,$query2);
$column=mysqli_fetch_array($result2);

     $row=mysqli_fetch_array($result);
     $a=$row["combination"];
      $b=explode(",", $a);

      $old=$row["logo"];

    $e=$row["en_category"];
      $category=explode(",", $e);

      $r=$row["sw_category"];
      $swcategory=explode(",", $r);

$errors = array();
 $msg='';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
   if(!(preg_match("/[A-Za-z]/", $_POST['schoolname']))){
        $errors['schoolname'] = "* Not a valid name.";
    }

    } 


if (isset($_POST['submit'])) {
if(count($errors) === 0){ 

  $id=$_REQUEST['id'];

  $c=$_REQUEST['combination'];
  $d=implode("," ,$c);

   $f=$_REQUEST['en_category']; 
  $g=implode("," ,$f);

   $h=$_REQUEST['sw_category']; 
  $i=implode("," ,$h);

$logo=$_FILES["logo"]["name"];


  if($logo=="")
  { 
$query1 ="update schools JOIN description  set schools.schoolname='".$_POST['schoolname']."',en_level='".$_POST['en_level']."',sw_level='".$_POST['sw_level']."',en_category='$g',sw_category='$i', en_type='".$_POST['en_type']."', sw_type='".$_POST['sw_type']."', region='".($_POST['region'])."',en_gender='".$_POST['en_gender']."',sw_gender='".$_POST['sw_gender']."',combination='$d',location='".$_POST['location']."',phone='".$_POST['phone']."',email='".$_POST['email']."',address='".$_POST['address']."',description.schoolname='".$_POST['schoolname']."',en_description='".$_POST['en_description']."',sw_description='".$_POST['sw_description']."'  where id='$id' and sch_id='$id' ";


    $result1 = mysqli_query($connection,$query1);
     

        if($result1==true){
$msg= '<div class="alert alert-success">Success! Your school has been added successfully.
<button type="button" class="close" data-dismiss="alert">x</button>
            </div>';
        }
  }
  
 

  else{

$file=$_FILES['logo']['tmp_name'];
$image = $_FILES["logo"] ["name"];
$image_name= addslashes($_FILES['logo']['name']);
unlink("uploads/".$old);
move_uploaded_file($_FILES["logo"]["tmp_name"],"uploads/" . $_FILES["logo"]["name"]);
$logo=$_FILES["logo"]["name"];

$query1 ="update schools JOIN description set  schools.schoolname='".$_POST['schoolname']."',en_level='".$_POST['en_level']."',sw_level='".$_POST['sw_level']."',en_category='$g',sw_category='$i', en_type='".$_POST['en_type']."', sw_type='".$_POST['sw_type']."', region='".($_POST['region'])."', en_gender='".$_POST['en_gender']."',sw_gender='".$_POST['sw_gender']."',combination='$d',logo='$logo',location='".$_POST['location']."',phone='".$_POST['phone']."',email='".$_POST['email']."',address='".$_POST['address']."', description.schoolname='".$_POST['schoolname']."',en_description='".$_POST['en_description']."',sw_description='".$_POST['sw_description']."' where id='$id' and sch_id='$id' ";


    $result1 = mysqli_query($connection,$query1);
     
if($result1==true){
 
   $msg= '<div class="alert alert-success">Success! Your school has been added successfully.
<button type="button" class="close" data-dismiss="alert">x</button>
            </div>';
        }

  }
  
    }
    }     
        
    ?>




        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
           <span class="msg"> <?php echo $msg;?></span>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><a href="viewschools.php">Manage Schools</a> | Edit Schools </h6>
            </div>
            <div class="card-body">
              <div class="col-lg-12">
                  
                   

  <form method="post" action="" enctype="multipart/form-data" >
  <div class="row">
  
<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="level">Level</label><br>
<select class="form-control" id="level" onchange="updateCheckBox(this)" name="en_level">
<option value="">Choose</option>
<option value="Nursery School" <?php if($row['en_level']=="Nursery"){echo "selected";}?>>Nursery</option>
<option value="Primary School" <?php if($row['en_level']=="Primary"){echo "selected";}?>>Primary</option>
<option value="Nursery and Primary School" <?php if($row['en_level']=="Nursery and Primary"){echo "selected";}?>>Nursery and Primary </option>
<option value="O level School" <?php if($row['en_level']=="O level"){echo "selected";}?> >O level</option>
<option value="A level School" <?php if($row['en_level']=="A level"){echo "selected";}?>>A level</option>
<option value="O level and A level School" <?php if($row['en_level']=="O level and A level "){echo "selected";}?>>O level and A level </option>
</select>                                                                                               
</div>

 <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="level">Ngazi ya Shule</label><br>
<select class="form-control" id="level" name="sw_level">
<option value="">Choose</option>
<option value="Chekechea" <?php if($row['sw_level']=="Chekechea"){echo "selected";}?>>Chekechea</option>
<option value="Msingi" <?php if($row['sw_level']=="Msingi"){echo "selected";}?>>Msingi</option>
<option value="Chekechea na Msingi" <?php if($row['sw_level']=="Chekechea na Msingi"){echo "selected";}?>> Chekechea na Msingi</option>
<option value="Daraja la chini la sekondari" <?php if($row['sw_level']=="Daraja la chini la sekondari"){echo "selected";}?> >Daraja la chini la sekondari</option>
<option value="Daraja la juu la sekondari"<?php if($row['sw_level']=="Daraja la juu la sekondari"){echo "selected";}?>>Daraja la juu la sekondari</option>
<option value="Daraja la chini na juu la sekondari" <?php if($row['sw_level']=="Daraja la chini na juu la sekondari"){echo "selected";}?>>Daraja la chini na juu la sekondari</option>
</select>
</div>

   
<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="category">Category</label><br>   
<input  type="checkbox" value="Private School"  <?php if(in_array("Private School",$category)){echo "checked";}?> id="category" name="en_category[]"> Private School
&nbsp&nbsp
<input type="checkbox" value="Public School"  <?php if(in_array("Public School",$category)){echo "checked";}?> id="category" name="en_category[]"> Public School  
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="category">Kundi La Shule</label><br>   
<input type="checkbox" value="Shule Binafsi"  <?php if(in_array("Shule Binafsi",$swcategory)){echo "checked";}?> id="category" name="sw_category[]"> Shule Binafsi
&nbsp&nbsp
<input  type="checkbox" value="Shule ya Serikali"  <?php if(in_array("Shule ya Serikali",$swcategory)){echo "checked";}?> id="category" name="sw_category[]"> Shule ya Serikali    
</div>


<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="type">Type</label><br>                                       
<select class="form-control" id="type" name="en_type">
<option value="">Choose</option>
<option value="Boarding School" <?php if($row['en_type']=="Boarding School"){echo "selected";}?>>Boarding School</option>
<option value="Day School" <?php if($row['en_type']=="Day School"){echo "selected";}?>> Day school</option>
<option value="Day and Boarding " <?php if($row['en_type']=="Day and Boarding "){echo "selected";}?>>Day and Boarding School</option>
</select>
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="type">Aina Ya Shule</label><br>                                       
<select class="form-control" id="type" name="sw_type">
<option value="">Choose</option>
<option value="Shule ya Bweni" <?php if($row['sw_type']=="Shule ya Bweni"){echo "selected";}?>>Shule ya Bweni</option>
<option value="Shule ya Kutwa" <?php if($row['sw_type']=="Shule ya Kutwa"){echo "selected";}?>> Shule ya Kutwa</option>
<option value="Shule ya Kutwa na Bweni" <?php if($row['sw_type']=="Shule ya Kutwa na Bweni"){echo "selected";}?>>Shule ya Kutwa na Bweni</option>
</select>
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="gender">Gender</label><br>                                        
<select class="form-control" id="gender" name="en_gender">
<option value="">Choose</option>
<option value="Boys Only " <?php if($row['en_gender']=="Boys Only "){echo "selected";}?> >Boys Only</option>
<option value="Girls Only " <?php if($row['en_gender']=="Girls Only "){echo "selected";}?> > Girls Only </option>
<option value="Boys and Girls" <?php if($row['en_gender']=="Boys and Girls"){echo "selected";}?>>Boys and Girls</option>
</select>
</div>

 <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="gender">Jinsia</label><br>                                        
<select class="form-control" id="gender" name="sw_gender">
<option value="">Choose</option>
<option value="Wavulana tu" <?php if($row['sw_gender']=="Wavulana tu"){echo "selected";}?> >Wavulana tu</option>
<option value="Wasichana tu" <?php if($row['sw_gender']=="Wasichana tu"){echo "selected";}?> > Wasichana tu</option>
<option value="Wavulana na Wasichana" <?php if($row['sw_gender']=="Wavulana na Wasichana"){echo "selected";}?>>Wavulana na Wasichana</option>
</select>
</div>

 <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="region">Region</label><br>                                        
<select class="form-control" id="region" name="region">
<option value="">Choose</option>
<option value="Arusha" <?php if($row['region']=="Arusha"){echo "selected";}?>>Arusha</option>  
<option value="Dar es Salaam"  <?php if($row['region']=="Dar es Salaam"){echo "selected";}?>>Dar es Salaam</option>
<option value="Dodoma"  <?php if($row['region']=="Dodoma"){echo "selected";}?>>Dodoma</option>  
<option value="Geita"  <?php if($row['region']=="Geita"){echo "selected";}?>> Geita</option>
<option value="Iringa"  <?php if($row['region']=="Iringa"){echo "selected";}?>>Iringa</option> 
<option value="Kagera"  <?php if($row['region']=="Kagera"){echo "selected";}?>>Kagera</option>    
<option value="Katavi"  <?php if($row['region']=="Katavi"){echo "selected";}?>> Katavi</option>   
<option value="Kigoma"  <?php if($row['region']=="Kigoma"){echo "selected";}?>>Kigoma</option>    
<option value="Kilimanjaro"  <?php if($row['region']=="Kilimanjaro"){echo "selected";}?>> Kilimanjaro</option>   
<option value="Lindi"  <?php if($row['region']=="Lindi"){echo "selected";}?>>Lindi</option>    
<option value="Manyara"  <?php if($row['region']=="Manyara"){echo "selected";}?>> Manyara</option>   
<option value="Mara"  <?php if($row['region']=="Mara"){echo "selected";}?>>Mara</option>    
<option value="Mbeya"  <?php if($row['region']=="Mbeya"){echo "selected";}?>>Mbeya</option>  
<option value="Morogoro"  <?php if($row['region']=="Morogoro"){echo "selected";}?>> Morogoro </option>  
<option value="Mtwara"  <?php if($row['region']=="Mtwara"){echo "selected";}?>> Mtwara  </option> 
<option value="Mwanza"  <?php if($row['region']=="Mwanza"){echo "selected";}?>> Mwanza </option>  
<option value="Njombe" <?php if($row['region']=="Njombe"){echo "selected";}?>> Njombe </option>  
<option value="Pemba" <?php if($row['region']=="Pemba"){echo "selected";}?>> Pemba  </option>
<option value="Pwani" <?php if($row['region']=="Pwani"){echo "selected";}?>> Pwani    </option>
<option value="Rukwa" <?php if($row['region']=="Rukwa"){echo "selected";}?>> Rukwa    </option>
<option value="Ruvuma" <?php if($row['region']=="Ruvuma"){echo "selected";}?>> Ruvuma  </option> 
<option value="Shinyanga" <?php if($row['region']=="Shinyanga"){echo "selected";}?>> Shinyanga </option>  
<option value="Simiyu"  <?php if($row['region']=="Simiyu"){echo "selected";}?>> Simiyu    </option>
<option value="Singida"  <?php if($row['region']=="Singida"){echo "selected";}?>> Singida  </option> 
<option value="Songwe"  <?php if($row['region']=="Songwe"){echo "selected";}?>> Songwe </option>
<option value="Tabora"  <?php if($row['region']=="Tabora"){echo "selected";}?>> Tabora  </option> 
<option value="Tanga"  <?php if($row['region']=="Tanga"){echo "selected";}?>> Tanga    </option>
<option value="Zanzibar"  <?php if($row['region']=="Zanzibar"){echo "selected";}?>> Zanzibar</option>
</select>
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>School Name</label><br>
<input class="form-control" type="text" placeholder="Kisimiri Secindary School" name="schoolname" value="<?php echo$row['schoolname']; ?>">
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>Location</label><br>
<input class="form-control" type="text" placeholder="Njiro,Road Block C" name="location" value="<?php echo$row['location']; ?>">
</div>

 <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>Phone Number</label><br>
<input class="form-control" type="text" placeholder="0710000000" name="phone" value="<?php echo$row['phone']; ?>">
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>Email Address</label><br>
<input class="form-control" type="text" placeholder="schoolengine@example.com" name="email" value="<?php echo$row['email']; ?>">
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label>Postal Address</label><br>
<input class="form-control" type="text" placeholder="P.O BOX 0000,Arusha" name="address" value="<?php echo$row['address']; ?>">
</div>

<div class="col-sm-6 col-md-6 col-lg-12 mb-4">
<label for="combination">Combination</label><br>
<input type="checkbox" value="CBA" id="combination" name="combination[]" <?php if(in_array("CBA",$b)){echo "checked";}?> onclick="check();">CBA
<input type="checkbox" name="combination[]" value="CBG" <?php if(in_array("CBG",$b)){echo "checked";}?> onclick="check();">CBG
<input type="checkbox" name="combination[]" value="CBN" <?php if(in_array("CBN",$b)){echo "checked";}?> onclick="check();">CBN
<input type="checkbox" name="combination[]" value="ECA" <?php if(in_array("ECA",$b)){echo "checked";}?> onclick="check();">ECA
<input type="checkbox" name="combination[]" value="EGM" <?php if(in_array("EGM",$b)){echo "checked";}?> onclick="check();">EGM
<input type="checkbox" name="combination[]" value="HGE"<?php if(in_array("HGE",$b)){echo "checked";}?> onclick="check();">HGE
<br><input type="checkbox" name="combination[]" value="HGK"<?php if(in_array("HGK",$b)){echo "checked";}?> onclick="check();">HGK
<input type="checkbox" name="combination[]" value="HGL" <?php if(in_array("HGL",$b)){echo "checked";}?> onclick="check();">HGL
<input type="checkbox" name="combination[]" value="HKL" <?php if(in_array("HKL",$b)){echo "checked";}?> onclick="check();">HKL
<input type="checkbox" name="combination[]" value="PCB" <?php if(in_array("PCB",$b)){echo "checked";}?> onclick="check();">PCB
<input type="checkbox" name="combination[]" value="PCM" <?php if(in_array("PCM",$b)){echo "checked";}?> onclick="check();">PCM
<input type="checkbox" name="combination[]" value="PGM" <?php if(in_array("PGM",$b)){echo "checked";}?> onclick="check();">PGM
</div>

<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="description">School Description </label><br/>
<span><textarea class="form-control" name="en_description"><?php echo $column['en_description']; ?></textarea></span>
</div>

 <div class="col-sm-6 col-md-6 col-lg-6 mb-4">
<label for="description">Maelezo Ya Shule </label><br/>
<span><textarea class="form-control" name="sw_description" ><?php echo$column['sw_description']; ?></textarea></span>
</div>

<div class="col-sm-6 col-md-6 col-lg-12 mb-4">
<label for="logo" style="margin-top: -20px;">School Logo</label><br> 
<img src="uploads/<?php echo $row['logo']; ?>" width="100px" height="100px"> 
<input type="file" class="logo" name="logo"  onchange="validateImage()"   value="<?php echo$row['logo']; ?>"/>
</div>

 <div class="col-sm-12 col-md-8 col-lg-3 mb-4">
<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block form-control-same-height rounded-0" >
</div>

 </div>
</form>
                


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
