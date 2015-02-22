<?php
  include('connect.php');
  $storeid=$_REQUEST['storeid'];
  
  
  $query="select StoreName from Store where StoreID=$storeid";
  
  $result2 = mysql_query($query) or die("BP2:".mysql_error());
  if($result2 ){
    while($row=mysql_fetch_array($result2 )) {
      $response["storename"]=$row['StoreName'];
    }
    
     echo json_encode($response);
  }
  
  
  ?>