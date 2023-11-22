<?php
$rets_login_url='https://matrix.swflamls.com/rets/login.ashx';
$rets_username='NAPNMVP1';
$rets_password='ag2021mv7p112';

date_default_timezone_set('America/New_York');
if($via =='local'){
include "../connect.php";
}else{
include "/kunden/homepages/27/d962833332/htdocs/first1.us/connect.php";    
}

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
//error_reporting(0);

if($via =='local'){
require_once("../vendor/autoload.php");
}else{
require_once("/kunden/homepages/27/d962833332/htdocs/first1.us/vendor/autoload.php");    
}

$start_time=date('Y-m-d H:i:s'); 
    
$config = new \PHRETS\Configuration;
$config->setLoginUrl($rets_login_url);
$config->setUsername($rets_username);
$config->setPassword($rets_password);

// optional.  value shown below are the defaults used when not overridden
$config->setRetsVersion('1.8'); // see constants from \PHRETS\Versions\RETSVersion
$config->setUserAgent('PHRETS/2.0');
$config->setUserAgentPassword(''); // string password, if given
$config->setHttpAuthenticationMethod('digest'); // 'digest' 'or 'basic'  if required 
$config->setOption('use_post_method', false); // boolean
$config->setOption('disable_follow_location', false); // boolean

$rets = new \PHRETS\Session($config);  
$login = $rets->Login();
    
/*
Status 
-------
A	A	Active
AP	AP	Application In Progress
P	P	Pending
PC	PC	Pending With Contingencies
R	R	Rented
S	S	Sold
**/
    
/**
td:nth-child(2), td:nth-child(3), td:nth-child(4), td:nth-child(5), td:nth-child(6) {
    display: none;
}
**/
?>
