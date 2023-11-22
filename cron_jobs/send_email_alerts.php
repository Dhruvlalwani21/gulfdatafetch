<?php
ini_set('max_execution_time', 7200); //600 seconds = 10 minutes 

$via = 'live'; //local //live
if($via =='local'){
$fp = fopen("send_email_alerts_lock.txt", "w+");
}else{
$fp = fopen("/home/u110616855/domains/first1.us/public_html/cron_jobs/send_email_alerts_lock.txt", "w+");    
}

/** /usr/bin/php /home/u110616855/domains/first1.us/public_html/cron_jobs/send_email_alerts.php **/
/** /bin/sh /home/u110616855/domains/first1.us/public_html/cron_jobs/send_email_alerts.sh **/
/** http://local.officere.com/cron_jobs/send_email_alerts.php **/

if(flock($fp, LOCK_EX | LOCK_NB)){ // do an exclusive lock
 
date_default_timezone_set('America/New_York');
if($via =='local'){
include "../connect.php"; 
}else{
include "/home/u110616855/domains/first1.us/public_html/connect.php";     
}

//ini_set('display_errors', 1); 
//ini_set('display_startup_errors', 1); 
//error_reporting(E_ALL);
error_reporting(0);

if($via =='local'){
require_once("../vendor/autoload.php");
}else{
require_once("/home/u110616855/domains/first1.us/public_html/vendor/autoload.php");    
}


$crntHour=date('H');

if($crntHour>=6){ /** 6 Am Florida **/

$date = date("Y-m-d H:i:s");
$today = date("Y-m-d");
$today = "$today 06:00:00"; /** Always set to 6 AM **/
 
$selQueue = "SELECT DISTINCT(user_email), search_id, search_link, user_id, fullname, new_listings, in_contract, sold FROM saved_searches WHERE (user_email!='' AND user_email IS NOT NULL) AND (last_email_notification <= NOW() - INTERVAL 1 DAY OR last_email_notification IS NULL) LIMIT 500";
$queueRslts = mysqli_query($conn,$selQueue);  
$noQueue = mysqli_num_rows($queueRslts);

if($noQueue>0){
    $tos=array();
    $sub=array();
    $queueArray = array();
    while($row = mysqli_fetch_assoc($queueRslts)){
        $search_id = $row['search_id'];
        $search_link = $row['search_link'];
        $user_id = $row['user_id'];
        $user_email = $row['user_email'];
        $fullname = $row['fullname'];
        $new_listings = $row['new_listings'];
        $in_contract = $row['in_contract'];
        $sold = $row['sold'];
        $xpld = explode(' ',$fullname);
        $first_name = $xpld[0];
        
        $xplLink = explode('&sort=',$search_link); //&page=
        $mainLink = $xplLink[0];
        
        $activeLink = "$mainLink&sort=new-desc&pagination=get&page=1";//page=1 
        $pendingLink = "$mainLink&status=Pending&sort=new-desc&pagination=get&page=1"; //page=1 
        $soldLink = "$mainLink&status=Sold&sort=new-desc&pagination=get&page=1"; //page=1 
        
        //echo "$user_email -- <br/>";
        
        $build_to = new \SendGrid\Mail\To(
        $user_email,
        $fullname,
          [
            '[user_id]' => $user_id,
            '[active_link]' => $activeLink,
            '[pending_link]' => $pendingLink,
            '[sold_link]' => $soldLink,
            '[user_email]' => $user_email,
            '[first_name]' => $first_name,
            '[new_listings]' => $new_listings,
            '[in_contract]' => $in_contract,
            '[sold]' => $sold,
            '[WEBLOGOALT]' => WEBLOGOALT,
            '[WEBMAILRCVR]' => WEBMAILRCVR,
            '[WEBADDRESS]' => WEBADDRESS,
            '[WEBURL]' => WEBURL,
            '[WEBNAME]' => WEBNAME
          ]
        ); 
        
        $subject = new \SendGrid\Mail\Subject("$new_listings New, $in_contract Pending, $sold Sold Properties - first1.us Home Search");
        
        $tos[] = $build_to;
        $sub[] = $subject;
        array_push($queueArray, $search_id);
    }
    
    $eml_body='Hello [first_name],<br />
    There are [new_listings] new, [in_contract] under contract and [sold] sold properties in our database that match your saved searches.
    <br />
    <br />
    <b>New Active Listings:</b><br />
    Saved Search: <a href="[active_link]">Saved Search - [new_listings] new properties</a><br /><br />
    <b>Under Contract Listings:</b><br />
    Saved Search: <a href="[pending_link]">Saved Search - [in_contract] new under contract property</a><br /><br />
    <b>Sold Listings:</b><br />
    Saved Search: <a href="[sold_link]">Saved Search - [sold] new sold properties</a>
    <br /><br />
    Thank you for using our real estate search engine. It has every property for sale and is updated every five minutes by the official Real Estate Listing Database, 
    the MLS. We look forward to helping you find the perfect home.
    <br /><br />
    Feel free to contact us any time.
    <br />
    <b>First 1 Team</b><br />
    <b>Phone:</b> (239) 992-9119<br />
    <b>Email:</b> office@first1.us<br />
    
    <br /><br />
    <hr />
    <br />
    <b>To unsubscribe instantly:</b> Click below to opt out and stop receiving your daily updates: 
    <a href="[WEBURL]/unsubscribe.php?email=[user_email]&ref=[user_id]">Click here to unsubscribe</a>';
    
    if(!empty($tos)){ /** array is not empty **/ 
    $from = new \SendGrid\Mail\From(WEBMAIL, 'First 1 Team');
    $replyTo = new \SendGrid\Mail\ReplyTo(WEBMAIL, 'First 1 Team');
    $plainTextContent = new \SendGrid\Mail\PlainTextContent("You need to view this email in an HTML enabled browser.");
    $htmlContent = new \SendGrid\Mail\HtmlContent($eml_body);
    $sendEmail = new \SendGrid\Mail\Mail($from,$tos,$sub,$plainTextContent,$htmlContent);
    
    $sendgrid = new \SendGrid(SENDGRID);
    
    try {
    $response = $sendgrid->send($sendEmail);
    $code = $response->statusCode();
    
    if($code=='202'){ 
    /** mail sent **/  
    
    $idArray = implode("','",$queueArray);
    
    $upQ="UPDATE saved_searches SET new_listings='0', in_contract='0', sold='0', last_email_notification='$today' WHERE search_id IN ('$idArray')";  
    $upQRslt=mysqli_query($conn,$upQ) or die(mysqli_error($conn));   
    
    if($upQRslt){
        echo "Email Sent <br/>";
    }
        
    }else{
    /** insert into system reports notification **/ 
    /** keep emails in queue until problem is rectified **/
    $error=$response->body(); 
    $errors=json_decode($error);   
    $message=$errors->errors[0]->message;
    $message=mysqli_real_escape_string($conn,$message);
    
    //print_r($response);
    echo "Error: $message"; 
    } 
    
    }catch (Exception $e) {
     /** insert into system reports notification **/ 
     /** keep emails in queue until problem is rectified **/  
     $message = $e->getMessage();
     $message=mysqli_real_escape_string($conn,$message);
     echo "Error: $message";
    }  
       
    }

}else{
    echo "Nothing on the queue";
}

}

flock($fp, LOCK_UN); // release the lock 
}else{//echo "Couldn't get the lock!";
die();
} 
fclose($fp); 
?>