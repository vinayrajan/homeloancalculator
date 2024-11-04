<?php
include('config.php');

$counter = file_get_contents('counter');
$counter=$counter+1;
file_put_contents('counter',$counter);
echo "Visitor-Number -".$counter;

function get_loan_settings($settings_name) {
  global $dbc;
    $sql ="select setting_name,setting_value from loan_settings where setting_name = '". $settings_name ."' order by modified_on limit 0,1";
    $res = $dbc->get_row($sql,true);
    return $res['setting_value'];
}


function lastDayOfMonth(){

  // debug
  //$a_date = "2024-8-23";
  //$a_date = date("Y-m-t", strtotime($a_date));
  //$lastdateofthemonth = $a_date;

  $lastdateofthemonth = date("Y-m-t");
  $lastworkingday = date('l', strtotime($lastdateofthemonth));
  switch(strtoupper($lastworkingday))
  {
  case strtoupper("Saturday"):  // $lastworkingday minus 1 days
    $lastdateofthemonth = date('Y-m-d', strtotime('-1 day', strtotime($lastdateofthemonth)));
    break;
  case strtoupper("Sunday"): // $lastworkingday minus 2 days
    $lastdateofthemonth = date('Y-m-d', strtotime('-2 day', strtotime($lastdateofthemonth)));
    break;
  default:
  $lastdateofthemonth= $lastdateofthemonth;
  }

  $lastworkingday = date('l', strtotime($lastdateofthemonth));
  // debug
  //echo $lastworkingday." ".$lastdateofthemonth;
  return date('m/j/Y',strtotime($lastdateofthemonth))." 12:59:59";
}


  function formatDollars($dollars)
  {
      return "$".number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $dollars)),2);
  }



?>