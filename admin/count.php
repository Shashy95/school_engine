
<?
$a = array();

$connection = mysqli_connect('localhost', 'root');
$select_db = mysqli_select_db($connection,'school'); 

 $sql="SELECT combination FROM schools where combination NOT IN ('')";

$dbquery = mysqli_query($connection,$sql);


while($row = mysqli_fetch_array($dbquery)) {

  $b = explode(",",$row['combination']);

 foreach($b AS $fin) {
  
   if(array_key_exists($fin,$a)) {
     $a[$fin] += 1;
   }
   else {
     $a[$fin] = 1;
 }
}
}
print json_encode($a);
