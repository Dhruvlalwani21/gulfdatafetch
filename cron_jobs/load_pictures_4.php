<?php 
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 
ini_set('memory_limit', '512M');
$via = 'live'; //local //live

if($via =='local'){
$path = "";
$main_path = "../../gulfshore/";
}else{
$path = "/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/"; 
$main_path = "/kunden/homepages/27/d962833332/htdocs/gulfshore/";       
}
    
$fp = fopen($path."load_pictures_lock_4.txt", "w+");
/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/load_pictures_4.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/load_pictures_4.sh **/
/** http://local.officere.com/cron_jobs/load_pictures_4.php **/

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock

include_once $path.'rets_login.php';

/* Query Server */
if($login){
    
    $sqlUniqueID = "SELECT property_id, matrix_unique_id, MLSNumber, PropertyAddress FROM properties WHERE AllPixDownloaded='No' ORDER BY Status ASC LIMIT 25"; //AND MLSNumber='221025670'

    $matRslt=mysqli_query($conn,$sqlUniqueID) or die(mysqli_error($conn));
    $idExst=mysqli_num_rows($matRslt); 
 
    if($idExst>0){ 
    while($row=mysqli_fetch_array($matRslt)){
    $property_id=$row['property_id'];
    $matrix_unique_id = $row['matrix_unique_id'];
    $MLSNumber = $row['MLSNumber'];
    $PropertyAddress = $row['PropertyAddress'];
    
    /** LargePhoto or Photo or XLargePhoto
    Photo: listings
    XLargePhoto: property dtails
    **/ 
    
    $imgName = preg_replace("/[^a-zA-Z0-9-_]+/", "-", $PropertyAddress);
    $AllPictures='';
    
    $photos = $rets->GetObject('Property', 'XLargePhoto', $matrix_unique_id, '*', 0);
    $counter=0;
    foreach($photos as $photo){ 
     $isError = $photo->isError();
     $getError = $photo->getError(); // returns a \PHRETS\Models\RETSError
     $ContentType = $photo->getContentType();
     $image = $photo->getContent();
     
     $ThisImgPic="listings_images/$imgName-$matrix_unique_id-$MLSNumber-$counter.jpeg";
     
     if(!file_exists($main_path."$ThisImgPic")){
     if(!$isError){
        file_put_contents($main_path."$ThisImgPic", $image); 
     }else{
        print_r($getError);
     } 
     }
     
     $AllPictures .= "$ThisImgPic,";
     $counter++;
    }
    
    $up="UPDATE properties SET AllPixDownloaded='Yes', AllPixList='$AllPictures' WHERE property_id='$property_id'";
    $upRslt=mysqli_query($conn,$up) or die(mysqli_error($conn));
    
    echo "$counter Downloaded for $MLSNumber <br/>";
    
    }
    
    }else{
        echo 'Not found';
    }      
    $rets->Disconnect();
    
}else{
	$error = $rets->Error();
	print_r($error);
}


flock($fp, LOCK_UN); // release the lock 
}else{    
die();
} 
fclose($fp);
?>