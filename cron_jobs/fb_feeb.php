<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '/home/u110616855/domains/first1.us/public_html/facebook-graph-sdk/src/Facebook/Facebook.php';
require_once '/home/u110616855/domains/first1.us/public_html/facebook-graph-sdk/src/Facebook/autoload.php';
require_once '/home/u110616855/domains/first1.us/public_html/facebook-graph-sdk/src/Facebook/Exceptions/FacebookResponseException.php';
require_once '/home/u110616855/domains/first1.us/public_html/facebook-graph-sdk/src/Facebook/Exceptions/FacebookSDKException.php';
require_once '/home/u110616855/domains/first1.us/public_html/facebook-graph-sdk/src/Facebook/Helpers/FacebookRedirectLoginHelper.php';

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$appId = '347251250481799';
$appSecret = '8088455fa7bd64322caec2d13d78d222';

$fb = new Facebook([
	'app_id' => $appId,
	'app_secret' => $appSecret,
	'default_graph_version' => 'v3.1',
]);

date_default_timezone_set('America/New_York');
include "/home/u110616855/domains/first1.us/public_html/connect.php";

$selToken = "SELECT token FROM fb_long_token WHERE token!='' AND status='Active' LIMIT 1";  
$tokRslts = mysqli_query($conn,$selToken);
$tokExst = mysqli_num_rows($tokRslts);
$rowTok = mysqli_fetch_assoc($tokRslts);
$accessToken = $rowTok['token'];

$selPPty = "SELECT matrix_unique_id, MLSNumber, BathsTotal, BedsTotal, City, CurrentPrice, DevelopmentName, GarageSpaces, PropertyAddress, PostalCode, Status, SubCondoName, TotalArea, DefaultPic FROM properties WHERE Status='Active' AND PostToFbWall='Yes' LIMIT 1";  
$pptyRslts = mysqli_query($conn,$selPPty);
$toPstExst = mysqli_num_rows($pptyRslts);
// YOUR user's access token, refer
// "https://developers.facebook.com/tools/explorer/"


$response= "";

$selPPty = "SELECT matrix_unique_id, MLSNumber, BathsTotal, BedsTotal, City, CurrentPrice, DevelopmentName, GarageSpaces, PropertyAddress, PostalCode, Status, SubCondoName, TotalArea, DefaultPic FROM properties WHERE Status='Active' AND PostToFbWall='Yes' LIMIT 1";  
$pptyRslts = mysqli_query($conn,$selPPty);
$toPstExst = mysqli_num_rows($pptyRslts);

if($toPstExst>0){
$row = mysqli_fetch_array($pptyRslts);
extract($row);
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
if(!$SubCondoName){
    $SubCondoName = "New Property";
}

$City = preg_replace("/[^a-zA-Z0-9-_]+/", "", $City);
$DevelopmentName = preg_replace("/[^a-zA-Z0-9-_]+/", "", $DevelopmentName);

$linkPost = WEBURL."/homes-for-sale/$MLSNumber/$addrssLink";
$toPost = "Check out this $TotalArea SqFt property on $PropertyAddress #".$City." #".$City."realestate #".$DevelopmentName . $City." #".$DevelopmentName."realestate #".$DevelopmentName . $City."realestate #".$DevelopmentName."homes #".$DevelopmentName . $City."homes #".$DevelopmentName."homesforsale #".$DevelopmentName . $City."homesforsale #".$PostalCode." #".$PostalCode."realestate #".$PostalCode."homesforsale #".$DevelopmentName."SWFlorida #".$DevelopmentName . $City."SWFlorida #home #house #relocate #movetoflorida #movetoswflorida #sunshinestate #beachlife #realtor. Details: $BathsTotal Baths - $BedsTotal Beds - $GarageSpaces Car Garage. $linkPost";

try
{
	$linkData = [
  'link' => $linkPost,
  'message' => $toPost,
  ];

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/feed', $linkData, $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Posted with id: ' . $graphNode['id'];
}
catch(FacebookResponseException $e)
{
	echo 'Graph returned an error:' . $e->getMessage();
	exit();
}
catch(FacebookSDKException $e)
{
	echo 'Facebook SDK returned an error:' . $e->getMessage();
	exit();
}
$me = $response->getGraphUser();
echo 'Logged in as (username) : ' . $me->getName().'<br/>';
?>
