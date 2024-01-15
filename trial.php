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
    <title>School Search Engine &mdash; <?php echo $language["index"]; ?></title>
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



/* Add padding BETWEEN each column (if you want) */

.column {
  padding: 8px;
}


/* Create three equal columns that floats next to each other */

.column {

  display: none;
  /* Hide columns by default */
}


/* Clear floats after rows */



/* Content */

.content {
  background-color: white;
  padding: 10px;
}


/* The "show" class is added to the filtered elements */

.show {
  display: block;
}


/* Style the buttons */

.btn {
  padding: 15px 50px;
    margin-right: 30px;
    margin-bottom: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: all .5s ease;

}




/* Add a dark background color to the active button */


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
                  <li class="active">
                    <a href="index.php"><?php echo $language["index"]; ?></a>
                  </li>
               
                  <li><a href="about.php"><?php echo $language["about"]; ?></a></li>
                  <li><a href="contact.php"><?php echo $language["contactpage"]; ?></a></li>
                 
                  <li class="language">
     <div class="select-wrap">
          <img class="img-fluid" width="27px;" src="images/<?php echo $lang?>.png" >
         
                    <select class="selectpicker" name="language" id="language" onchange="this.options[this.selectedIndex].value && (window.location=this.options[this.selectedIndex].value);">
                  <option value="trial.php?lang=en"<?php if($lang == 'en'){echo "selected"; } ?>>EN</option>
                  <option value="trial.php?lang=sw"<?php if($lang == 'sw'){echo "selected"; } ?>>SW</option>
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


 
  <div class="site-section" style="background-image: url(images/c.jpg) ; " data-aos="fade" data-stellar-background-ratio="0.8">
        
                <div class="col-lg-12 text-center">
                    <div class="hero-text">
                        <h1><?php echo $language["form-title"]; ?></h1>
                    </div>
                </div>
          
   
<section class="search-filter">
          <div class="py-5">
      <div class="container">

  <div class="col-lg-12">
			 
				 <form action="searchresults.php" method="GET " class="check-form" >
					<h4><?php echo $language["title"]; ?></h4>
					 <div class="row">
						  <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
						 <input class="form-control border-0 pl-0 bg-white" type="text" name="schoolname" id="search" placeholder="<?php echo $language['placeholder'] ; ?>">
 </div>
 
						 <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="select-wrap">
            <select class="form-control" id="level"  onchange="updateCheckBox(this)" name="<?php echo $lang.'_level'; ?>">
                              <option value=""><?php echo $language["label1"]; ?></option>
                              <option value='<?php echo $language["level1"]; ?>'><?php echo $language["level1"]; ?></option>
                              <option value= '<?php echo $language["level2"]; ?>' ><?php echo $language["level2"]; ?></option>
                              <option value='<?php echo $language["level3"]; ?>'><?php echo $language["level3"]; ?></option>
                              <option value='<?php echo $language["level4"]; ?>'><?php echo $language["level4"]; ?></option>
                              <option value='<?php echo $language["level5"]; ?>'><?php echo $language["level5"]; ?></option>
                              <option value='<?php echo $language["level6"]; ?>' ><?php echo $language["level6"]; ?></option>
                            </select>


            </div>
          </div>

  <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="select-wrap">
            <select class="form-control" id="type" name="<?php echo $lang.'_type'; ?>">
                                <option value=""><?php echo $language["label3"]; ?></option>
                               <option value='<?php echo $language["type1"]; ?>' ><?php echo $language["type1"]; ?></option>
                               <option value='<?php echo $language["type2"]; ?>' > <?php echo $language["type2"]; ?></option>
                                <option value='<?php echo $language["type3"]; ?>' ><?php echo $language["type3"]; ?></option>
                            </select>
          </div>
 </div>


                  <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="select-wrap">
              <select class="form-control" id="gender" name="<?php echo $lang.'_gender'; ?>">
                                <option value=""><?php echo $language["label5"]; ?></option>
                                <option value='<?php echo $language["gender1"]; ?>' ><?php echo $language["gender1"]; ?></option>
                                <option value='<?php echo $language["gender2"]; ?>'> <?php echo $language["gender2"]; ?> </option>
                                <option value='<?php echo $language["gender3"]; ?>' ><?php echo $language["gender3"]; ?></option>  
                            </select>
                    </select>
          </div>
 </div>

    <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="select-wrap">
             <select class="form-control" id="region" name="region">
                          <option value=""><?php echo $language["label4"]; ?></option>
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
          </div>


  
           

  <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
          
  <label for="category" style="margin-left: 3px;"><?php echo $language["label2"]; ?> <a style="color: #4682B4;" href="# "data-toggle="tooltip" data-placement="right" title='<?php echo $language["title1"]; ?>'>
 </a></label><br/>
   
<input  type="checkbox"  value='<?php echo $language["category1"]; ?>' id="category" name="<?php echo $lang.'_category[]'; ?>" ><label style="color: white;"> <?php echo $language["category1"]; ?> </label>

<input  type="checkbox"  value='<?php echo $language["category2"]; ?>' id="category" name="<?php echo $lang.'_category[]'; ?>" ><label style="color: white;"> <?php echo $language["category2"]; ?>  </label>
          

</div>

                  <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
        
<label for="category" style="margin-left: 3px;"><?php echo $language["label6"]; ?> <a style="color: #4682B4;" href="# "data-toggle="tooltip" data-placement="right" title='<?php echo $language["title2"]; ?>'>
 </a></label><br/>
<input type="checkbox"  value="CBA" id="combination" name="combination[]"  onclick="check();"><label style="color: white;"> CBA </label>
<input type="checkbox"  value="CBG" id="combination" name="combination[]"  onclick="check();"><label style="color: white;"> CBG </label>
<input type="checkbox" value="CBN"  id="combination" name="combination[]" onclick="check();"><label style="color: white;"> CBN </label>
<input type="checkbox"  value="ECA"  id="combination" name="combination[]" onclick="check();"><label style="color: white;"> ECA </label>
<input type="checkbox" value="EGM"  id="combination" name="combination[]"  onclick="check();"><label style="color: white;"> EGM </label>
<input type="checkbox" value="HGE"  id="combination" name="combination[]"  onclick="check();"><label style="color: white;"> HGE </label>
<input type="checkbox"  value="HGK"  id="combination" name="combination[]" onclick="check();"><label style="color: white;"> HGK </label>
<input type="checkbox"  value="HGL" id="combination" name="combination[]" onclick="check();"><label style="color: white;"> HGL </label>
<input type="checkbox" value="HKL" id="combination" name="combination[]" onclick="check();"><label style="color: white;"> HKL </label>
<input type="checkbox"  value="PCB"  id="combination" name="combination[]" onclick="check();"><label style="color: white;"> PCB </label>
<input type="checkbox"  value="PCM"  id="combination" name="combination[]" onclick="check();"><label style="color: white;"> PCM </label>
<input type="checkbox"  value="PGM"  id="combination" name="combination[]" onclick="check();"><label style="color: white;"> PGM </label>
         
 </div>

  <div class="col-sm-12 col-md-8 col-lg-3 mb-4">
            <input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" name="submit" value="<?php echo $language["button"]; ?>">
            <input type="hidden" name="lang" value="<?php echo $lang ?>"/>
</div>
</div>
				 </form>
      
      </div>
    </div>
  </div>
</section>
</div>

        


    
        
       <div class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center mb-5">
            <div class="site-section-title">
              <h2><?php echo $language["services"] ; ?></h2>
            </div>
          </div>
        </div>
 
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-house"></span>
              <div class="text">
                <h2 class="mt-0">Wide Range of Properties</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>

              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-rent"></span>
              <div class="text">
                <h2 class="mt-0">Rent or Sale</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-3 mb-lg-0">
            <div class="feature d-flex align-items-start">
              <span class="icon mr-3 flaticon-location"></span>
              <div class="text">
                <h2 class="mt-0">Property Location</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit rem sint debitis porro quae dolorum neque.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



        
    <div class="site-section site-section-sm bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
            <div class="site-section-title">
              <h2><?php echo $language["performance"] ; ?></h2>
            </div>
          </div>
        </div>
       
      
       
<div id="myBtnContainer" >
  <button class="btn btn-primary active" onclick="filterSelection('primary')"><?php echo $language["level3"] ; ?></button>
  <button class="btn btn-dark" onclick="filterSelection('O-level')"> <?php echo $language["level4"] ; ?></button>
  <button class="btn btn-dark" onclick="filterSelection('A-level')"><?php echo $language["level5"] ; ?></button>
</div>


<!-- Portfolio Gallery Grid -->
 <div class="row">

<div class="column primary col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=13&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Lucky Vincent Nursery and Primary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                        </div>

                    </div>
                                      </div>


 <div class="column primary col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=2&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">St Thomas Nursery and Primary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>
                                      </div>


</div>
</div>

 

<div class="column O-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=7&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Canossa Girls Secondary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                    
  </div>
</div>
</div>

<div class="column O-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=8&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Marian Girls High School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                    
  </div>
</div>
</div>

<div class="column O-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=5&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">St Francis  Girls Secondary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                    
  </div>
</div>
</div>

<div class="column O-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=3&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Tengeru Boys Secondary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                        </div>
    </div>
  </div>







<div class="column A-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=7&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Canossa Girls Secondary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                    
  </div>
</div>
</div>

<div class="column A-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                        <span class="b-tag"><a href="view.php?id=10&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Ilboru Secondary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                    
  </div>
</div>
</div>


<div class="column A-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=6&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Kibaha Boys Secondary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                    
  </div>
</div>
</div>


<div class="column A-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                        <span class="b-tag"><a href="view.php?id=9&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Kisimiri Secondary School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                    
  </div>
</div>
</div>

  <div class="column A-level col-xs-12 col-sm-6 col-md-6 col-lg-4 ">
    <div class="blog-item set-bg" style="background-image: url(images/img_1.jpg);margin-top:30px; ">
                        <div class="bi-text">
                            <span class="b-tag"><a href="view.php?id=8&lang=<?php echo $lang ?>"><?php echo $language["info"]; ?></a></span>
                            <h5 style="color: black;">Marian Girls High School</h5>
                             <div class="b-time"><i class="icon_clock_alt"></i></div>

                    
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



<script>
    function updateCheckBox(opts) {
        var chks = document.getElementsByName("combination[]");

        if (opts.value == '<?php echo $language["level5"]; ?>') {
            for (var i = 0; i <= chks.length - 1; i++) {
                chks[i].disabled = false;
                
            }
        }
        else if (opts.value == '<?php echo $language["level6"]; ?>') {
            for (var i = 0; i <= chks.length - 1; i++) {
                chks[i].disabled = false;
                
            }
        }

         else if (opts.value == '') {
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



   <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  
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

<script type="text/javascript">
  $(function() {
     $( "#search" ).autocomplete({
       source: 'load_data.php',
     });
  });
</script>



 <script>
 filterSelection("primary") // Execute the function and show all columns
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

// Show filtered elements
function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += " " + arr2[i];
    }
  }
}

// Hide elements that are not selected
function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

      
    </script>




</html>