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
    <title>School Search Engine &mdash;<?php echo $language["viewpage"] ?></title>
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
                  <li><a href="contact.php"><?php echo $language["contactpage"]; ?></a></li>
                 
                 
                 <li>
                      <span class="language" style="margin-left:10px;">

              <?php if($lang == 'en'){?> <img  class="img-fluid" src='images/en.png' width='27px;'> EN <?php } ?>
            <?php if($lang == 'sw'){?><img  class="img-fluid" src='images/sw.png' width='27px;'> SW <?php } ?>
</span>
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

<?php


$id=$_GET['id'];

$query="SELECT *FROM schools WHERE id=$id";
$result = mysqli_query($connection,$query);

 while($row=mysqli_fetch_array($result))
        {
    
          ?>

    
  <div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?php echo $language['schinfo'];  ?>  </span>
            <h1 class="mb-2"><?php echo $row['schoolname'];  ?></h1>
          
          </div>
        </div>
      </div>
    </div>



    <div class="site-section site-section-sm">
      <div class="container" >
        <div class="row justify-content-center" >
          <div class="col-lg-12" style="margin-top: -150px;">
            <div class="mb-5">
        
                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              </div>

              <div class="row mb-5">
 <div class="col-sm-12 col-md-12 col-lg-12 text-left border-bottom border-top py-3">
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


              <h2 class="h4 text-black"><?php echo $language["desc"];  ?></h2>
              <p><?php echo $row[$lang.'_description'];  ?></p>

<?php } 
?>
              <div class="row mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3"><?php echo $language['gallery'];  ?></h2>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_1.jpg" class="image-popup gal-item"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_2.jpg" class="image-popup gal-item"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_3.jpg" class="image-popup gal-item"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_4.jpg" class="image-popup gal-item"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_5.jpg" class="image-popup gal-item"><img src="images/img_5.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_6.jpg" class="image-popup gal-item"><img src="images/img_6.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_7.jpg" class="image-popup gal-item"><img src="images/img_7.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_8.jpg" class="image-popup gal-item"><img src="images/img_8.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_1.jpg" class="image-popup gal-item"><img src="images/img_1.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_2.jpg" class="image-popup gal-item"><img src="images/img_2.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_3.jpg" class="image-popup gal-item"><img src="images/img_3.jpg" alt="Image" class="img-fluid"></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/img_4.jpg" class="image-popup gal-item"><img src="images/img_4.jpg" alt="Image" class="img-fluid"></a>
                </div>
              </div>
            </div>
          </div>
        
  

          </div>
          
        </div>
      </div>
    </div>


    <div class="site-section site-section-sm bg-light">
      <div class="container">

        <div class="row">
          <div class="col-12">
            <div class="site-section-title mb-5">
              <h2><?php echo $language["related"];  ?></h2>
            </div>
          </div>
        </div>
      
        <div class="row mb-5">
         

              <?php

$sql="SELECT * FROM schools where id!= $id ORDER BY RAND() LIMIT 3";
$result= mysqli_query($connection,$sql);
 while($row=mysqli_fetch_array($result))
        {
    
          ?>
         
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
          <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=<?php echo $row['id'];?> &lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;"> <?php echo $row['schoolname'];  ?></h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                        </div>

                    </div>
                     
                  </div>
   <?php } ?>
                





        </div>
      </div>
 </div>

    

    
    <div class="site-section site-section-sm bg-dark">
      <div class="container" >
        <div class="row align-items-center" >
          <div class="col-md-8">
            <h2 class="text-white">Wide Range of Schools Just For You</h2>
            <p class="lead text-white-5">For wide view of schools.please click the button on the right</p>
          </div>
          <div class="col-md-4 text-center">
            <a href="searchresults.php?lang=<?php echo $lang ?>" class="btn btn-outline-primary btn-block py-3 btn-lg">Browse All Schools</a>
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