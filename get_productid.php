<?php
  include('connect.php');
  $storeid=$_REQUEST['storeid'];
  $productname=$_REQUEST['productname'];
  $price=$_REQUEST['price'];
  
  //echo "test";
  $query="select ProductID from Product where StoreID=$storeid and ProductName='$productname' and Price =$price order by ProductID desc";
  //echo $query;
  $result2 = mysql_query($query) or die("BP2:".mysql_error());
  $response["productid"]=$query;
  if($result2 ){
    while($row=mysql_fetch_array($result2 )) {
      $response["productid"]=$row['ProductID'];
    }
    
     
  }
  
  echo json_encode($response);
  ?>