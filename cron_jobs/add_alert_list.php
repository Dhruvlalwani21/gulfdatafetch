<?php
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 

$via = 'live'; //local //live
if($via =='local'){
$fp = fopen("add_alert_list_lock.txt", "w+");
}else{
$fp = fopen("/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/add_alert_list_lock.txt", "w+");    
}

/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/add_alert_list.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/add_alert_list.sh **/
/** http://local.officere.com/cron_jobs/add_alert_list.php **/

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock
 
date_default_timezone_set('America/New_York');
if($via =='local'){
include "../connect.php"; 
}else{
include "/kunden/homepages/27/d962833332/htdocs/first1.us/connect.php";     
}

//https://developers.facebook.com/docs/graph-api/reference/v12.0/page/feed

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
//error_reporting(0);

if($via =='local'){
require_once("../vendor/autoload.php");
}else{
require_once("/kunden/homepages/27/d962833332/htdocs/first1.us/vendor/autoload.php");    
}

$selPPty = "SELECT MLSNumber, AdditionalRooms, BathsTotal, BedsTotal, City, CommunityType, DefaultPic, Development, DevelopmentName, GulfAccessYN, CurrentPrice, GarageSpaces, GuestHouseDesc, PropertyAddress, 
PropertyInformation, PrivatePoolYN, PrivateSpaYN, PostalCode, PropertyClass, Status, SubCondoName, TotalArea, WaterfrontYN, YearBuilt, other_fields_json FROM properties WHERE SendAlerts='Yes' LIMIT 1";
$pptyRslts = mysqli_query($conn,$selPPty);
$toAlertExst = mysqli_num_rows($pptyRslts);

if($toAlertExst>0){
$row = mysqli_fetch_array($pptyRslts);
extract($row);
$otherFieldsJson = json_decode($other_fields_json); 
$ListOfficeName = $otherFieldsJson->ListOfficeName;
$ListOfficePhone = $otherFieldsJson->ListOfficePhone;

$addToActv = 0;
$addToSold = 0;
$addToContrct = 0;

if($Status == 'Active'){
    $addToActv = 1;
}else if($Status == 'Sold'){
    $addToSold = 1;
}else{
    $addToContrct = 1;
}        
                    
if($PrivatePoolYN == '1'){ $PrivatePoolYN = 'Yes'; }
if($PrivateSpaYN == '1'){ $PrivateSpaYN = 'Yes'; }
if($WaterfrontYN == '1'){ $WaterfrontYN = 'Yes'; }
if($GulfAccessYN == '1'){ $GulfAccessYN = 'Yes'; }
$BathsTotal = intval($BathsTotal);
$GarageSpaces = intval($GarageSpaces);

if(!$YearBuilt){
    $YearBuilt = date("Y");   
}
$CurrentPrice = intval($CurrentPrice);
$selSavedSrchs = "SELECT * FROM saved_searches WHERE (city='$City' OR city='') AND (zipcode='$PostalCode' OR zipcode='') AND min_year<=$YearBuilt 
AND (pool='$PrivatePoolYN' OR pool='') AND (spa='$PrivateSpaYN' OR spa='') AND (waterfront='$WaterfrontYN' OR waterfront='') AND (gulf_access='$GulfAccessYN' OR gulf_access='')";  
$savdRslts = mysqli_query($conn,$selSavedSrchs) or die(mysqli_error($conn));
$srchExst = mysqli_num_rows($savdRslts);

if($srchExst>0){
while($rowSrch = mysqli_fetch_assoc($savdRslts)){

$search_id = $rowSrch['search_id'];
$user_id = $rowSrch['user_id'];
$user_email = $rowSrch['user_email'];
$srch_location = $rowSrch['location'];
$srch_property_type = $rowSrch['property_type']; 
$srch_beds = $rowSrch['beds'];
$srch_baths = $rowSrch['baths'];
$srch_min_price = $rowSrch['min_price'];
$srch_max_price = $rowSrch['max_price'];
$srch_min_sq_ft = $rowSrch['min_sq_ft'];
$srch_max_sq_ft = $rowSrch['max_sq_ft'];
$srch_garage = $rowSrch['garage'];
$srch_guest_house = $rowSrch['guest_house'];
$srch_gated = $rowSrch['gated'];
$srch_communities = $rowSrch['communities'];
$srch_gulf_access = $rowSrch['gulf_access'];
$new_listings = $rowSrch['new_listings'];
$in_contract = $rowSrch['in_contract'];
$sold = $rowSrch['sold'];

$addThis = 'Yes';

if($srch_location!='' && $srch_location!='Any'){
    if(strpos($City, $srch_location) === false && strpos($PostalCode, $srch_location) === false && strpos($Development, $srch_location) === false && strpos($DevelopmentName, $srch_location) === false && strpos($PropertyAddress, $srch_location) === false){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}

if($srch_property_type == 'Condos' || $srch_property_type == 'Multi-Family' || $srch_property_type == 'Town Homes'){
    
    if(strpos($CommunityType,$srch_property_type) === false){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
    
}else if($srch_property_type == 'Homes' || $srch_property_type == 'Land' || $srch_property_type == 'Commercial' || $srch_property_type == 'Dock'){
    if($srch_property_type == 'Homes'){
        $srchClass = 'RES-RIN';
    }else if($srch_property_type == 'Land'){
        $srchClass = 'LOT';
    }else if($srch_property_type == 'Commercial'){
        $srchClass = 'COM';
    }else if($srch_property_type == 'Dock'){
        $srchClass = 'DOCK';
    }
    
    if($srchClass == 'RES-RIN'){
        if($PropertyClass != 'RES' && $PropertyClass != 'RIN'){
            $addThis = 'No'; /** Won't be added to alert list **/
        }
    }else{
        if($PropertyClass != $srchClass){
            $addThis = 'No'; /** Won't be added to alert list **/
        }
    }
}

if($srch_beds!='' && $srch_beds!='Any'){
if(strpos($srch_beds,'+') !== false){
    $bedVal = intval(str_replace('+','',$srch_beds));
    if($BedsTotal < $bedVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}else{
    $bedVal = intval($srch_beds);
    if($BedsTotal != $bedVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}
}

if($srch_baths!='' && $srch_baths!='Any'){
if(strpos($srch_baths,'+') !== false){
    $bathVal = intval(str_replace('+','',$srch_baths));
    if($BathsTotal < $bathVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}else{
    $bathVal = intval($srch_baths);
    if($BathsTotal != $bathVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}
}

if($srch_min_price!='' && $srch_min_price!='Any'){
    $minPrcVal = intval($srch_min_price);
    if($CurrentPrice < $minPrcVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}

if($srch_max_price!='' && $srch_max_price!='Any'){
    $maxPrcVal = intval($srch_max_price);
    if($CurrentPrice > $maxPrcVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}

if($srch_min_sq_ft!='' && $srch_min_sq_ft!='Any'){
    $minSqFtVal = intval($srch_min_sq_ft);
    if($TotalArea < $minSqFtVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}

if($srch_max_sq_ft!='' && $srch_max_sq_ft!='Any'){
    $maxSqFtVal = intval($srch_max_sq_ft);
    if($TotalArea > $maxSqFtVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}

if($srch_garage!='' && $srch_garage!='Any'){
if(strpos($srch_garage,'+') !== false){
    $garageVal = intval(str_replace('+','',$srch_garage));
    if($GarageSpaces < $garageVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}else{
    $garageVal = intval($srch_garage);
    if($GarageSpaces != $garageVal){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}
}


if($srch_guest_house == 'Yes' && $srch_guest_house!='Any'){
    if($GuestHouseDesc=='' && strpos($AdditionalRooms,'guest') === false){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}

if($srch_gated == 'Yes' && $srch_gated!='Any'){
    $CommunityType = str_replace('-Gated','',$CommunityType); /** For Non-Gated **/
    if(strpos($CommunityType,'Gated') === false){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}

if($srch_communities!='' && $srch_communities!='Any'){
    if(strpos($srch_communities, $Development) === false && strpos($srch_communities, $DevelopmentName) === false){
        $addThis = 'No'; /** Won't be added to alert list **/
    }
}

/**
**/

if($addThis == 'Yes'){
    
$newListings = intval($new_listings + $addToActv);
$inContract = intval($in_contract + $addToSold);
$soldNew = intval($sold + $addToContrct);
$date = date("Y-m-d H:i:s");

$updateSvdSrch="UPDATE saved_searches SET new_listings='$newListings', in_contract='$inContract', sold='$soldNew', last_update='$date' WHERE search_id='$search_id'";
$upSvdRslt=mysqli_query($conn, $updateSvdSrch) or die(mysqli_error($conn));

}else{
    echo 'Wont add';
}
}

/** All Done, update saved_searches **/
$updatePPTY="UPDATE properties SET SendAlerts='No' WHERE MLSNumber='$MLSNumber'";
$upPptyRslt=mysqli_query($conn, $updatePPTY) or die(mysqli_error($conn));
echo "$updatePPTY <br/>";     
}else{
    echo "No search found";
    $updatePPTY="UPDATE properties SET SendAlerts='No' WHERE MLSNumber='$MLSNumber'";
    $upPptyRslt=mysqli_query($conn, $updatePPTY) or die(mysqli_error($conn));
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