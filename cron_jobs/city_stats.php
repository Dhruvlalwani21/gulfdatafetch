<?php 
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 
/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/city_stats.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/city_stats.sh **/
/** http://local.officere.com/cron_jobs/city_stats.php **/

$via = 'live'; //local //live
if($via =='local'){
$fp = fopen("city_stats_lock_1.txt", "w+");
}else{
$fp = fopen("/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/city_stats_lock_1.txt", "w+");    
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

$cityQry="SELECT name FROM cities WHERE name!=''";
$cityRslt=mysqli_query($conn,$cityQry) or die(mysqli_error($conn));
$cityExst=mysqli_num_rows($cityRslt); 

if($cityExst>0){
while($row=mysqli_fetch_array($cityRslt)){
$name=$row['name'];
$startOflstmnth = date("Y-m-d", strtotime("first day of last month"));
$endOflstmnth = date("Y-m-d", strtotime("last day of last month"));

$sqlCounts = "SELECT (SELECT COUNT(property_id) FROM properties WHERE City='$name' AND status='Active' AND CommunityType LIKE '%Condo%') as Condos, 
              (SELECT COUNT(property_id) FROM properties WHERE City='$name' AND status='Active' AND PropertyClass='RES') as Homes,
              (SELECT COUNT(property_id) FROM properties WHERE City='$name' AND status='Active') as ActiveListings,
              (SELECT COUNT(property_id) FROM properties WHERE City='$name' AND status='Sold' AND DATE(CloseDate) BETWEEN '$startOflstmnth' AND '$endOflstmnth') as Sold, 
              (SELECT CurrentPrice FROM properties WHERE City='$name' AND status='Active' ORDER BY CurrentPrice DESC LIMIT 1) as MaxPrice, 
              (SELECT CurrentPrice FROM properties WHERE City='$name' AND status='Active' ORDER BY CurrentPrice ASC LIMIT 1) as MinPrice";
$countRslt=mysqli_query($conn,$sqlCounts) or die(mysqli_error($conn));
$rowCounts=mysqli_fetch_array($countRslt);
extract($rowCounts);

if(!$Condos){
    $Condos = '0';
}

if(!$Homes){
    $Homes = '0';
}

if(!$ActiveListings){
    $ActiveListings = '0';
}

if(!$MinPrice){
    $MinPrice = '0';
}

if(!$MaxPrice){
    $MaxPrice = '0';
}

$currentDate = date("Y-m-d H:i:s");

$up="UPDATE cities SET active_listings='$ActiveListings', min_price='$MinPrice', max_price='$MaxPrice', homes_for_sale='$Homes', condos_for_sale='$Condos', sold_last_month='$Sold', last_updated='$currentDate' WHERE name='$name'";
$upRslt=mysqli_query($conn,$up) or die(mysqli_error($conn));

if($upRslt){
    echo "Updated <br/>";
}

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