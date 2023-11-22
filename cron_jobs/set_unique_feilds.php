<?php
//http://local.officere.com/cron_jobs/uniqueFeilds.php

include 'resFeilds.php';
include 'resIncmFeilds.php';
include 'comFeilds.php';
include 'lotsFeilds.php';
include 'dockFeilds.php';

$allFld = "$resFeild, $resInc, $comFeild, $lotFeild, $dockFeild";

$array = array();
$xpld = explode(',',$allFld);

foreach($xpld as $feild){
    if($feild!=''){
        array_push($array, $feild);
    }
}

$unique = array_unique($array);

$counter = 1;
foreach($unique as $field){
    echo "$field,<br/>";
    $counter++;
}
?>