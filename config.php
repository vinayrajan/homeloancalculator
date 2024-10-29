<?php
include('db/db.sqlite.class.php');

global $dbc;
global $url;
global $port;
global $base_url;
global $asset_path; 


$url= "http://localhost/homeloancalculator";
$port =  "";
$base_url = $url."".$port;
$asset_path = $base_url . "/assets"; 

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