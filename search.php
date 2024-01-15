<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" href="style.css" type="text/css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script>
  $(function() {
    $( "#schoolname" ).autocomplete({
      source: 'processsearch.php'
    });
  });
  </script>

<script src="jquery/jquery.js"></script>
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>

</head>
<body style="background: url(image/a.jpeg) no-repeat ">

<nav class="navbar ">SCHOOL SEARCH ENGINE</nav>

<div id="page-wrapper">

<div id="content-search"> 

  <h3 style="margin-left: 30px;">Search Schools</h3>
  <hr>

<form action="processsearch.php" method="GET">

<p style="float: left;  width: 50%; margin-left: 30px; ">
<label for="level">Level</label><br>
<select id="level" name="level">
<option value="">Choose</option>
<option value="Nursery School">Nursery School</option>
<option value="Primary School" >Primary School</option>
<option value="Nursery and Primary School">Nursery and Primary School</option>
<option value="O level School" >O level School</option>
<option value="A level School">A level School</option>
<option value="O level and A level School" >O level and A level School</option>
</select>
</p>


<label for="category">Category</label><br>                                        
<select id="category" name="category">
<option value="">Choose</option>
<option value="Private School" >Private School</option>
<option value="Government School" > Government School</option>
</select>
</p>



<p style="float: left;margin-left: 30px;width: 50%; ">
<label for="type">Type</label><br>                                       
<select id="type" name="type">
<option value="">Choose</option>
<option value="Boarding School" >Boarding School</option>
<option value="Day School" > Day school</option>
<option value="Day and Boarding " >Day and Boarding School</option>
</select>
</p>


<label for="region">Region</label><br>                                        
<select id="region" name="region">
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
</p>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    

<p style="float: left;margin-left: 30px;width: 50%; ">
<label for="gender">Gender</label><br>                                        
<select id="gender" name="gender">
<option value="">Choose</option>
<option value="Boys" >Boys Only</option>
<option value="Girls" > Girls Only </option>
<option value="Mixture" >Boys and Girls</option>
</select>
</p>


<label for="combination">Combination <a href="# "data-toggle="tooltip" data-placement="right" title="Select for A level School">
<i class="fa fa-question-circle"></i></a></label><br>
<input type="checkbox" value="CBA" id="combination" name="combination[]"  onclick="check();">CBA
<input type="checkbox" value="CBG" id="combination" name="combination[]"  onclick="check();">CBG
<input type="checkbox" value="CBN"  id="combination" name="combination[]" onclick="check();">CBN
<input type="checkbox" value="EGM"  id="combination" name="combination[]" onclick="check();">EGM
<input type="checkbox" value="ECA"  id="combination" name="combination[]"  onclick="check();">ECA
<input type="checkbox" value="HGE"  id="combination" name="combination[]"  onclick="check();">HGE
<br><input type="checkbox" value="HGL"  id="combination" name="combination[]" onclick="check();">HGL
<input type="checkbox" value="HKL" id="combination" name="combination[]" onclick="check();">HKL
<input type="checkbox" value="PCB"  id="combination" name="combination[]" onclick="check();">PCB
<input type="checkbox" value="PCM"  id="combination" name="combination[] " onclick="check();">PCM
<input type="checkbox" value="PGM"  id="combination" name="combination[]" onclick="check();">PGM


<p style="margin-left: 30px;"><label>School Name</label><br>
<input type="text" placeholder="Search" name="schoolname" id="schoolname">
</p>

<p><input type="submit" name="submit" value="Search" ></p>

</form>
</div>
</div>

<nav class="end">
  <i class="fa fa-copyright "></i>2018
  Designed by
</nav>

<script>
 $(document).ready(function () {
        $('#level').change(function () {
            if ($(this).val() == "A level School") {
                $(':checkbox').each(function () {
                    $(this).prop('disabled', false);
                   
                });
            }
           else if ($(this).val() == "O level and A level School") {
                $(':checkbox').each(function () {
                    $(this).prop('disabled', false);
                   
                });
            }
            else {
                $(':checkbox').each(function () {
                    $(this).prop('disabled', true);
                    $(this).prop('checked', false);
                   
                });
            }
        });
    });
</script>
</body>

</html>