<?php

global $root_path;
$root_path = dirname(__FILE__);

global $db_path;
global $dbc;
global $url;
global $port;
global $base_url;
global $asset_path; 
global $verbose_errors;


include('db/db.sqlite.class.php');




$url= "http://localhost/homeloancalculator";
$port =  "";
$base_url = $url."".$port;
$asset_path = $base_url . "/assets"; 
$db_real_path =$root_path."/db/homeloan.db";
$counter_file_path ="counter";


$verbose_errors=1;
if($verbose_errors==1){
    ini_set('display_errors', $verbose_errors);    
}

try{
    $dbc = new SQLite3Database($db_real_path);
}
catch(Exception $e) {
    echo($e->getMessage());        
    echo '<pre>';    
        print_r($e);    
    echo '</pre>';
   // die();    
}
?>