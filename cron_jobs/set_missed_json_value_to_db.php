<?php
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 
/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/set_missed_json_value_to_db.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/set_missed_json_value_to_db.sh **/
/** http://local.officere.com/cron_jobs/set_missed_json_value_to_db.php **/

$via = 'live'; //local //live
if($via =='local'){
$fp = fopen("set_missed_json_value_to_db_lock.txt", "w+");
}else{
$fp = fopen("/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/set_missed_json_value_to_db_lock.txt", "w+");    
}

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock

if($via =='local'){
include "../connect.php"; 
}else{
include "/kunden/homepages/27/d962833332/htdocs/first1.us/connect.php";     
}

$sqlLastPpty = "SELECT property_id FROM last_ppy_json_screpped WHERE property_id!=''"; //
$lastRslt = mysqli_query($conn,$sqlLastPpty) or die(mysqli_error($conn));
$rowL = mysqli_fetch_array($lastRslt);
$last_property_id = $rowL['property_id'];
    
$sqlPpty = "SELECT property_id, MLSNumber, other_fields_json FROM properties WHERE property_id>=$last_property_id ORDER BY property_id ASC LIMIT 250"; //
$pptyRslt = mysqli_query($conn,$sqlPpty) or die(mysqli_error($conn));
$noProperties = mysqli_num_rows($pptyRslt);

if($noProperties>0){
   while($row = mysqli_fetch_array($pptyRslt)){
    $property_id = $row['property_id'];
    $MLSNumber = $row['MLSNumber'];
    $other_fields_json = $row['other_fields_json'];
    $data = json_decode($other_fields_json);
    $GulfAccessYN = filterThis($data->GulfAccessYN, $conn);
    ///$BuildingDesign = filterThis($data->BuildingDesign, $conn);
    //$SubCondoName = filterThis($data->SubCondoName, $conn);
    
    $sqlUp = "UPDATE properties SET GulfAccessYN='$GulfAccessYN' WHERE MLSNumber='$MLSNumber'"; //
    $upRslt = mysqli_query($conn,$sqlUp) or die(mysqli_error($conn));
    echo "$sqlUp <br>";
    //echo "$MLSNumber updated <br/>";
   } 
   
   $upLastPpty = "UPDATE last_ppy_json_screpped SET property_id='$property_id' WHERE scrape_id='1'"; //
   $upLastRslt = mysqli_query($conn,$upLastPpty) or die(mysqli_error($conn));
   echo "----- $upLastPpty";
}

flock($fp, LOCK_UN); // release the lock 
}else{    
die();
} 
fclose($fp);  
?>