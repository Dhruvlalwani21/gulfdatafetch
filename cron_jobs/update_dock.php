<?php
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 
//ini_set('memory_limit', '32M');

$from = 'update';
$via = 'live'; //local //live
//$PropertyClass = 'RES';
//$PropertyClass = 'RIN';
//$PropertyClass = 'LOT';
//$PropertyClass = 'COM';
$PropertyClass = 'DOCK';

if($via =='local'){
$path = "";
}else{
$path = "/kunden/homepages/27/d962833332/htdocs/first1.us/cron_jobs/";    
}

$fp = fopen($path."update_".$PropertyClass."_listings.txt", "w+");
/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/update_dock.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/update_dock.sh **/
/** http://local.officere.com/cron_jobs/update_dock.php **/

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock

include_once $path.'rets_login.php'; /** Includes **/

/* Query Server */
if($login){     
    $sqllastTime = "SELECT last_time FROM last_modified WHERE last_time!='' AND PropertyClass='$PropertyClass' LIMIT 1"; 
    $resultTime=mysqli_query($conn,$sqllastTime) or die(mysqli_error($conn));
    $rowT=mysqli_fetch_array($resultTime);
    $last_time=$rowT['last_time'];
    $last_time=str_replace(' ','T',$last_time);
    
    $status_ftch = 'A,S,AP,P,PC';
    $results = $rets->Search('Property', $PropertyClass, '(Status=|'.$status_ftch.'), (MatrixModifiedDT='.$last_time.'+)', ['QueryType' => 'DMQL2', 'Format' => 'COMPACT-DECODED']); // 'Format' => 'COMPACT-DECODED', '(LIST_15=|12LL26N0CFUH)
    
    //echo "<pre>"; 
    //print_r($results->toArray());
    //echo $results->getTotalResultsCount();
    //echo "</pre>"; 
    
    $listingsExist=count($results); 
    //echo "$listingsExist <br/>";
    //die();
    
    $counter=0;
    if($listingsExist>0){ /** it will still fetch the last id so incase it reaches end, it must be reater than 1 **/  
    
    include_once $path.'fetch_body.php';
    
    echo $counter.' Properties added';
     
    $rets->Disconnect();  
     
    }else{
      $upMod="UPDATE last_modified SET last_time='$start_time' WHERE last_time!='' AND PropertyClass='$PropertyClass'";
      $modRslt=mysqli_query($conn,$upMod) or die(mysqli_error($conn));
      
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