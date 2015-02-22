<?php
  include("connect.php");
  $ret = array();
  if(isset($_REQUEST['id']) && isset($_REQUEST['start']) && isset($_REQUEST['end']))
  {
    $id = $_REQUEST['id'];
    $start = $_REQUEST['start'];
    $end = $_REQUEST['end'];
    $query = "SELECT TransactionDate, sum(Quantity) FROM HeaderTransaction JOIN DetailTransaction WHERE Status='paid' AND DetailTransaction.TransactionID = HeaderTransaction.TransactionID AND storeid = $id AND '".$start."' <= TransactionDate AND TransactionDate <= '".$end."' GROUP BY TransactionDate";
    $result = mysql_query($query) or die(mysql_error());
    $ret['success'] = 1;
    $ret['result'] = array();
    while($row = mysql_fetch_array($result)){
      $dat = array();
      $dat["date"] = $row[0];
      $dat["count"] = $row[1];
      array_push($ret['result'], $dat);
    }
  }else{
    
    $ret['success'] = 0;
    $ret['message'] = "invalid parameter";
   
  }
  echo json_encode($ret);
?>