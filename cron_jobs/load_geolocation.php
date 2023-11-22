<?php 
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 

$via = 'live'; //local //live
if($via =='local'){
$fp = fopen("load_geolocation_lock_1.txt", "w+");
}else{
$fp = fopen("/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/load_geolocation_lock_1.txt", "w+");    
}

/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/load_geolocation.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/load_geolocation.sh **/
/** http://local.officere.com/cron_jobs/load_geolocation.php **/

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock
 
date_default_timezone_set('America/New_York');
if($via =='local'){
include "../connect.php"; 
}else{
include "/kunden/homepages/27/d962833332/htdocs/first1.us/connect.php";     
}
//ini_set('display_errors', 1); 
//ini_set('display_startup_errors', 1); 
//error_reporting(E_ALL);
error_reporting(0);

$sqlUniqueID = "SELECT property_id, matrix_unique_id, MLSNumber, PropertyAddress FROM properties WHERE GeoLocFetched='No' ORDER BY Status ASC LIMIT 100"; //

$matRslt=mysqli_query($conn,$sqlUniqueID) or die(mysqli_error($conn));
$idExst=mysqli_num_rows($matRslt); 

if($idExst>0){ 
while($row=mysqli_fetch_array($matRslt)){
$property_id=$row['property_id'];
$matrix_unique_id = $row['matrix_unique_id'];
$MLSNumber = $row['MLSNumber'];
$PropertyAddress = urlencode($row['PropertyAddress']);
 
$request_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=".$PropertyAddress."&key=".WEBMAPAPI."&sensor=true";
$xml = simplexml_load_file($request_url) or die("url not loading");
$status = $xml->status;
if($status=="OK") {
  $Lat = $xml->result->geometry->location->lat;
  $Lon = $xml->result->geometry->location->lng;
}else{
  $Lat = "";
  $Lon = ""; 
}

$up="UPDATE properties SET Longitude='$Lon', Latitude='$Lat', GeoLocFetched='Yes' WHERE property_id='$property_id'";
$upRslt=mysqli_query($conn,$up) or die(mysqli_error($conn));

}

echo "$up <br/>";


}else{
    echo 'Not found';
}      

flock($fp, LOCK_UN); // release the lock 
}else{    
die();
} 
fclose($fp);  
?>