<?php 
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes  

/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/communities_stats.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/communities_stats.sh **/
/** http://local.officere.com/cron_jobs/communities_stats.php **/

$via = 'live'; //local //live
if($via =='local'){
$fp = fopen("communities_stats_lock_1.txt", "w+");
}else{
$fp = fopen("/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/communities_stats_lock_1.txt", "w+");    
}

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock

if($via =='local'){
include "../connect.php"; 
}else{
include "/kunden/homepages/27/d962833332/htdocs/first1.us/connect.php";     
}
//ini_set('display_errors', 1); 
//ini_set('display_startup_errors', 1); 
//error_reporting(E_ALL);
error_reporting(0);

$cityQry="SELECT city_id, communities FROM cities";
$cityRslt=mysqli_query($conn,$cityQry) or die(mysqli_error($conn));
$cityExst=mysqli_num_rows($cityRslt); 
$datas = array();
if($cityExst>0){
while($row=mysqli_fetch_array($cityRslt)){
$city_id=$row['city_id'];
 $communities=$row['communities'];
// $datas['city'] = $row['city_id'];

 
 $xpldComm = explode(',',$communities);
   
foreach($xpldComm as $comWtId){

if($comWtId!=''){
    
    $exldId = explode(':',$comWtId);

    $commID = $exldId[0];
     $comName = $exldId[1];
     $sqlCounts = "SELECT (SELECT COUNT(property_id) FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND CommunityType LIKE '%Condo%') as Condos, 
                  (SELECT COUNT(property_id) FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND PropertyClass='RES') as Homes, 
                  (SELECT COUNT(property_id) FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND PropertyClass='DOCK') as Land,
                  (SELECT COUNT(property_id) FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Sold') as Sold, 
                  (SELECT COUNT(property_id) FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active') as ActiveListings,
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' ORDER BY CurrentPrice DESC LIMIT 1) as MaxPrice, 
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' ORDER BY CurrentPrice ASC LIMIT 1) as MinPrice,
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND CommunityType LIKE '%Condo%' ORDER BY CurrentPrice DESC LIMIT 1) as CondoMaxPrice, 
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND CommunityType LIKE '%Condo%' ORDER BY CurrentPrice ASC LIMIT 1) as CondoMinPrice,
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND PropertyClass='RES' ORDER BY CurrentPrice DESC LIMIT 1) as HomeMaxPrice,
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND PropertyClass='RES' ORDER BY CurrentPrice ASC LIMIT 1) as HomeMinPrice,
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND PropertyClass='DOCK' ORDER BY CurrentPrice DESC LIMIT 1) as LandMaxPrice, 
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Active' AND PropertyClass='DOCK' ORDER BY CurrentPrice ASC LIMIT 1) as LandMinPrice,
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Sold' ORDER BY CurrentPrice DESC LIMIT 1) as SoldMaxPrice,
                  (SELECT CurrentPrice FROM properties WHERE (Development='$comName' OR DevelopmentName='$comName') AND status='Sold' ORDER BY CurrentPrice ASC LIMIT 1) as SoldMinPrice";
    $countRslt=mysqli_query($conn,$sqlCounts) or die(mysqli_error($conn));
    $rowCounts=mysqli_fetch_array($countRslt);
    extract($rowCounts);
    
    if(!$Condos){ $Condos = '0'; }
    if(!$Homes){ $Homes = '0'; }
    if(!$ActiveListings){ $ActiveListings = '0'; }
    if(!$MinPrice){ $MinPrice = '0'; }
    if(!$MaxPrice){ $MaxPrice = '0'; }
    if(!$CondoMinPrice){ $CondoMinPrice = '0'; }
    if(!$CondoMaxPrice){ $CondoMaxPrice = '0'; }
    if(!$HomeMinPrice){ $HomeMinPrice = '0'; }
    if(!$HomeMaxPrice){ $HomeMaxPrice = '0'; }
    if(!$LandMinPrice){ $LandMinPrice = '0'; }
    if(!$LandMaxPrice){ $LandMaxPrice = '0'; }
    if(!$SoldMinPrice){ $SoldMinPrice = '0'; }
    if(!$SoldMaxPrice){ $SoldMaxPrice = '0'; }
    
    $currentDate = date("Y-m-d H:i:s");
    
    $up="UPDATE all_communities SET active_listings='$ActiveListings', min_price='$MinPrice', max_price='$MaxPrice', homes_for_sale='$Homes', homes_min_price='$HomeMinPrice', 
    homes_max_price='$HomeMaxPrice', condos_for_sale='$Condos', condos_min_price='$CondoMinPrice', condos_max_price='$CondoMaxPrice', lands_for_sale='$Land', lands_min_price='$LandMinPrice', 
    lands_max_price='$LandMaxPrice', sold='$Sold', min_sold_price='$SoldMinPrice', max_sold_price='$SoldMaxPrice', last_updated='$currentDate' WHERE unique_id='$commID'";
    $upRslt=mysqli_query($conn,$up) or die(mysqli_error($conn));
    
    if($upRslt){
        //echo "$city_id updated<br/>";
        $upCty="UPDATE cities SET last_city_updates='$currentDate' WHERE city_id='$city_id'";
        $upCtyRslt=mysqli_query($conn,$upCty) or die(mysqli_error($conn));
    }

}

}

echo "$communities Updated";

}

}else{
    echo 'Not found';
}  

flock($fp, LOCK_UN); // release the lock 
}else{    
die();
} 
fclose($fp);  
?>