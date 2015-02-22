<?php
  include('connect.php');

  $productid=$_REQUEST['productid'];
  $query="delete from Product_Category where ProductID=$productid";  
   $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
    if($result2){
      $response["success"]=1;
       
    }else{
      
        $response["success"]=0;
       
    }
   echo json_encode($response);
  
 ?>