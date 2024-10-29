<?php
include('db/db.sqlite.class.php');

global $dbc;
global $url;
global $port;
global $base_url;
global $asset_path; 
global $verbose_errors;

$url= "http://localhost/homeloancalculator";
$port =  "";
$base_url = $url."".$port;
$asset_path = $base_url . "/assets"; 


$verbose_errors=1;
if($verbose_errors==1){
    ini_set('display_errors', $verbose_errors);    
}


try{
    $dbc = new SQLite3Database('db/homeloan.db');
}
catch(Exception $e) {
    echo($e->getMessage());        
    echo '<pre>';    
        print_r($e);    
    echo '</pre>';
    die();    
}
?>