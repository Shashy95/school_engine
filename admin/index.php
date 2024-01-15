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

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <link href="css/popup_style.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-7 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-8 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-12">
                <div class="p-5">
  <?php


 if (isset($_POST['submit'])){
$username=$_POST['name'];
$password=$_POST['password'];


     $query = "SELECT * FROM admin WHERE name='$username'and password='$password'";
    $result = mysqli_query($connection,$query);
      $row  = mysqli_fetch_array($result);
      
    $_SESSION["name"] = $row['name'];
     $_SESSION["password"] = $row['password'];
   

    $count = mysqli_num_rows($result);
  if(isset($_SESSION["name"]) && isset($_SESSION["password"])) {
     {       
        ?>
         <div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Login Successfully</p>
    <p>
    
     <?php echo "<script>setTimeout(\"location.href = 'home.php';\",1500);</script>"; ?>
    </p>
  </div>
</div>
  
     <?php
    }
}
else {?>
   <div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Invalid Email or Password</p>
    <p>
      <a href="index.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
    </p>
  </div>
</div>
   
        <?php
       
         }
    
    }
?>

  
               
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>

                
                 
                  <form class="user"  action="" method="post">
                   
                    <div class="form-group">
                    <input class="form-control form-control-user" type="text" id="exampleInputEmail" name="name" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                       <label style="margin-top: 30px;">
                                        <a href="forgot-password.php">Forgot Password?</a>
                                    </label>
                    </div>
                   <input type="submit" name="submit" id="loginbtn" value="Sign In" class="btn btn-primary btn-user btn-block"/>
                    
                
                      
                  </form>
                

               
                </div>
              </div>
            </div>
          </div>
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

</body>

</html>
