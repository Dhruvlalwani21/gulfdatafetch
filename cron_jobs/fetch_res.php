<?php
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 
ini_set('memory_limit', '512M');

$from = 'fetch';
$via = 'live'; //local //live
$PropertyClass = 'RES';
//$PropertyClass = 'RIN';
//$PropertyClass = 'LOT';
//$PropertyClass = 'COM';
//$PropertyClass = 'DOCK';

if($via =='local'){
$path = "";
}else{
$path = "/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/";    
}
    
$fp = fopen($path."fetch_".$PropertyClass."_listings.txt", "w+");
/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/fetch_res.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/fetch_res.sh **/
/** http://local.officere.com/cron_jobs/fetch_res.php **/

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock

include_once $path.'rets_login.php';

/* Query Server */
if($login){
                     
    $sqlOffset = "SELECT COUNT(property_id) AS offset FROM properties WHERE PropertyClass='$PropertyClass'"; 
    $rslt = mysqli_query($conn,$sqlOffset) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($rslt);
    $offset = $row['offset'];
    
    //$status_ftch = 'A,S,AP,P,PC';
    $status_ftch = 'A';
    $results = $rets->Search('Property', $PropertyClass, '(Status=|'.$status_ftch.'), (MatrixModifiedDT=1900-01-01T00:00:00+)', ['Limit' => 1000, 'Offset' => $offset, 'QueryType' => 'DMQL2', 'Format' => 'COMPACT-DECODED']); // 'Format' => 'COMPACT-DECODED', '(LIST_15=|12LL26N0CFUH)
    
    //echo "<pre>"; 
    //print_r($results->toArray());
    //echo $results->getTotalResultsCount();
    //echo "</pre>"; 
    
    $listingsExist=count($results); 
    //echo $listingsExist;
    //die();
    
    $counter=0;
    if($listingsExist>1){ /** it will still fetch the last id so incase it reaches end, it must be reater than 1 **/  
    
    include_once $path.'fetch_body.php';
    
    echo $counter.' Properties added';
     
    $rets->Disconnect();  
     
    }else{
      $sqlAllListings = "SELECT matrix_unique_id FROM properties WHERE matrix_unique_id!='' AND PropertyClass='$PropertyClass'"; 
      $listRslt=mysqli_query($conn,$sqlAllListings) or die(mysqli_error($conn));
      $allList=mysqli_num_rows($listRslt);  
      echo "Seems all $allList properties for $PropertyClass has been downloaded.";  
      
      $rets->Disconnect();
    } 
    
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