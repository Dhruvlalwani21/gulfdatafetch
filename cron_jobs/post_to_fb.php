<?php
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 

$via = 'live'; //local //live
if($via =='local'){
$fp = fopen("post_to_fb_lock.txt", "w+");
}else{
$fp = fopen("/home/u110616855/domains/first1.us/public_html/cron_jobs/post_to_fb_lock.txt", "w+");    
}

/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/post_to_fb.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/post_to_fb.sh **/
/** http://local.officere.com/cron_jobs/post_to_fb.php **/

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock
 
date_default_timezone_set('America/New_York');
if($via =='local'){
include "../connect.php"; 
}else{
include "/home/u110616855/domains/first1.us/public_html/connect.php";     
}

//https://developers.facebook.com/docs/graph-api/reference/v12.0/page/feed

//ini_set('display_errors', 1); 
//ini_set('display_startup_errors', 1); 
//error_reporting(E_ALL);
error_reporting(0);

if($via =='local'){
require_once("../vendor/autoload.php");
}else{
require_once("/home/u110616855/domains/first1.us/public_html/vendor/autoload.php");    
}

$selPPty = "SELECT matrix_unique_id, MLSNumber, BathsTotal, BedsTotal, City, CurrentPrice, DevelopmentName, GarageSpaces, PropertyAddress, PostalCode, Status, SubCondoName, TotalArea, DefaultPic FROM properties WHERE Status='Active' AND PostToFbWall='Yes' LIMIT 1";  
$pptyRslts = mysqli_query($conn,$selPPty);
$toPstExst = mysqli_num_rows($pptyRslts);

if($toPstExst>0){
$row = mysqli_fetch_array($pptyRslts);
extract($row);

$selToken = "SELECT token FROM fb_long_token WHERE token!='' AND status='Active' LIMIT 1";  
$tokRslts = mysqli_query($conn,$selToken);
$tokExst = mysqli_num_rows($tokRslts);

if($tokExst>0){
$rowTok = mysqli_fetch_assoc($tokRslts);
$access_token = $rowTok['token'];

$addrssLink = preg_replace("/[^a-zA-Z0-9-_]+/", "-", $PropertyAddress);
if(!$BedsTotal){
    $BedsTotal = '0';
}

if(!$BathsTotal){
    $BathsTotal = '0';
}

$BathsTotal = str_replace('.00','',$BathsTotal);
$GarageSpaces = str_replace('.00','',$GarageSpaces);
$TotalArea = number_format($TotalArea,0);
                
$facebook = new Facebook(array(
  'appId'  => FBAPPID,
  'secret' => FBAPPSECRET,
  'default_graph_version' => 'v2.5'
));

$facebook->setAccessToken($access_token);
 
if(!$SubCondoName){
    $SubCondoName = "New Property";
}

$City = preg_replace("/[^a-zA-Z0-9-_]+/", "", $City);
$DevelopmentName = preg_replace("/[^a-zA-Z0-9-_]+/", "", $DevelopmentName);

$linkPost = WEBURL."/real-estate-homes-and-condos-listing-information/$MLSNumber/$addrssLink";
$toPost = "Check out this $TotalArea SqFt property on $PropertyAddress #".$City." #".$City."realestate #".$DevelopmentName . $City." #".$DevelopmentName."realestate #".$DevelopmentName . $City."realestate #".$DevelopmentName."homes #".$DevelopmentName . $City."homes #".$DevelopmentName."homesforsale #".$DevelopmentName . $City."homesforsale #".$PostalCode." #".$PostalCode."realestate #".$PostalCode."homesforsale #".$DevelopmentName."SWFlorida #".$DevelopmentName . $City."SWFlorida #home #house #relocate #movetoflorida #movetoswflorida #sunshinestate #beachlife #realtor. Details: $BathsTotal Baths - $BedsTotal Beds - $GarageSpaces Car Garage. $linkPost";

$msg = [
    "message" => $toPost,
    "link" => $linkPost
]; 
try{
    
    $response = $facebook->api('/me/feed/', 'post', $msg);
    $up="UPDATE properties SET PostToFbWall='No' WHERE MLSNumber='$MLSNumber'";
    $upRslt=mysqli_query($conn,$up) or die(mysqli_error($conn));
    if($upRslt){
        echo "$MLSNumber posted to facebook wall.";
    }else{
        echo "Unable to post $MLSNumber to facebook wall.";
    }
    
}catch(FacebookApiException $e){
    $errorMsg = $e->getMessage();
    echo "Error occured: ".$errorMsg;
     
    if((strpos($errorMsg, 'Session has expired') !== false) || (strpos($errorMsg, 'If posting to a group, requires app being installed in the group') !== false)){ 
        $upTok="UPDATE fb_long_token SET status='Expired' WHERE token!=''";
        $upTokRslt=mysqli_query($conn,$upTok) or die(mysqli_error($conn));
    }
    
    exit();
}

}else{
    echo "Echo token has expired";
}

}else{
    echo "Nothing to post";
}

flock($fp, LOCK_UN); // release the lock 
}else{    
die();
} 
fclose($fp);  
?>