  <?php
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
     <title>School Search Engine &mdash; <?php echo $language["contactpage"]; ?></title>
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




input[type="text"]::placeholder {
 font-size: 17px;
  font-weight: 15;
  color:#808080;
  text-align: left;


}


a{
    color: #4682B4;
    
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
              <h1 class=""><a href="index.php" class="h5 text-uppercase text-black"><strong>SCHOOL SEARCH ENGINE</strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-left text-md-left" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li>
                    <a href="index.php"><?php echo $language["index"]; ?></a>
                  </li>
               
                  <li><a href="about.php"><?php echo $language["about"]; ?></a></li>
                  <li  class="active"><a href="contact.php"><?php echo $language["contactpage"]; ?></a></li>
                       
               
                          <li>
                         
    <span class="language" style="margin-left:10px;">
          <img class="img-fluid" width="27px;" src="images/<?php echo $lang?>.png" ></span>
         
                    <select class="selectpicker" name="language" id="language" onchange="this.options[this.selectedIndex].value && (window.location=this.options[this.selectedIndex].value);">
                  <option value="contact.php?lang=en"<?php if($lang == 'en'){echo "selected"; } ?>>EN</option>
                  <option value="contact.php?lang=sw"<?php if($lang == 'sw'){echo "selected"; } ?>>SW</option>
                  </select>
</div>
                </li>

                  </ul>

                </div>
              </div>
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
            <h1 class="mb-2"><?php echo $language["contactpage"]; ?></h1>
            <div><a href="index.php"><?php echo $language["index"]; ?></a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white"><?php echo $language["contactpage"]; ?></strong></div>
          </div>
        </div>
      </div>
    </div>

    <?php


$msg='';
$message='';
$swmessage='';


if(isset($_POST['submit'])){

if(isset($_POST['en_message'])){
$message=$_POST['en_message'];
}

if(isset($_POST['sw_message'])){
$swmessage=$_POST['sw_message'];
}


$fname = $_POST['fullname'];
$email = $_POST['email'];



        $query = "INSERT INTO contact(fullname,email,en_message,sw_message,postingdate) 
                  VALUES ('$fname','$email','$message','$swmessage',now())";
        $result = mysqli_query($connection,$query);

            if(!$result) 
        {  
            $msg='<div class="alert alert-danger " > '.$language["msg2"].'
           <a href="" class="closebtn" data-dismiss="alert" aria-label="close">&times;</a>
           </div>';

          
        }
        
        else{
         $msg= '<div class="alert alert-success" > '.$language["msg"].'
         <a href="" class="closebtn" data-dismiss="alert" aria-label="close">&times;</a>

            </div>';
            
        }
        
    }

?>

    <div class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
            <form action="" class="p-5 bg-white border" method="post">
              <div class="row form-group">

                  <span class="msg"> <?php echo $msg;?></span>
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname"><?php echo $language["fullname"] ?></label>
                  <input type="text" id="name" name="fullname"  class="form-control" pattern="[A-Za-z ]{1,32}" title="Only Alphabets." required="required">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email"><?php echo $language["label10"] ?></label>
                  <input type="email"  name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,63}$" title="Wrong Format." required="required">
                </div>
              </div>
            
              
           <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message"><?php echo $language["message"] ?></label> 
                  <textarea id="message" id="message" name="<?php echo $lang.'_message'; ?>" cols="30" rows="5" required="required"  class="form-control"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value='<?php echo $language["sendmsg"] ?>' class="btn btn-primary  py-2 px-4 rounded-0">
                </div>
              </div>

            </form>
          </div>

          <div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h6 text-black mb-3 text-uppercase"><?php echo $language["contactus"] ?></h3>
              <p class="mb-0 font-weight-bold"><?php echo $language["address"] ?></p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold"><?php echo $language["label9"] ?></p>
              <p class="mb-4">+255 655 682268</p>

              <p class="mb-0 font-weight-bold"><?php echo $language["label10"] ?></p>
              <p class="mb-0"><a href="mailto:schoolengine@example.com">schoolengine@example.com</a></p>

            </div>
            
          </div>
        </div>
      </div>
    </div>


    
    <div class="site-section bg-light">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2><?php echo $language["testimonies"] ?></h2>
          </div>
        </div>
      </div>
      <div class="row block-13">

        <div class="nonloop-block-13 owl-carousel">

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_1.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

          <div class="slide-item">
            <div class="team-member text-center">
              <img src="images/person_3.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
              <div class="text p-3">
                <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
                <span class="d-block mb-3 text-white-opacity-05">Guest</span>
                <p class="mb-5">&ldquo;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. &rdquo;</p>
                
              </div>
            </div>
          </div>

        </div>

        </div>
      </div>
    </div>


    

     <div class="site-section site-section-sm bg-dark">
      <div class="container" >
        <div class="row align-items-center" >
          <div class="col-md-8">  
            <h2 class="text-white"><?php echo $language["wide"] ?> </h2>
            <p class="lead text-white-5"><?php echo $language["wide2"] ?></p>
          </div>
          <div class="col-md-4 text-center">
            <a href="searchresults.php?lang=<?php echo $lang ?>" class="btn btn-outline-primary btn-block py-3 btn-lg"><?php echo $language["wide3"] ?></a>
          </div>
        </div>
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