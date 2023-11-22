<?php 
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 
/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/verify_pix.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/verify_pix.sh **/
/** http://local.officere.com/cron_jobs/verify_pix.php **/

$via = 'live'; //local //live
if($via =='local'){
$fp = fopen("verify_pix_lock.txt", "w+");
}else{
$fp = fopen("/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/verify_pix_lock.txt", "w+");    
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
    
$pptyQry="SELECT MLSNumber, PhotoCount, AllPixList FROM properties WHERE AllPixDownloaded='Yes' AND PixVerified='No' ORDER BY Status ASC LIMIT 250";
$pptyRslt=mysqli_query($conn,$pptyQry) or die(mysqli_error($conn));
$pptyExst=mysqli_num_rows($pptyRslt); 

if($pptyExst>0){
while($row=mysqli_fetch_array($pptyRslt)){
$MLSNumber=$row['MLSNumber'];
$PhotoCount=$row['PhotoCount'];
$AllPixList=$row['AllPixList'];

$expldPix = explode(',',$AllPixList);
$allCount = count($expldPix);

if($allCount>$PhotoCount){
$up="UPDATE properties SET PixVerified='Yes' WHERE MLSNumber='$MLSNumber'";
}else{
$up="UPDATE properties SET AllPixDownloaded='No', PixVerified='No' WHERE MLSNumber='$MLSNumber'";   
}

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