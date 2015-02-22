<?php
  include('connect.php');
  
  
  
  $productid=$_REQUEST['productid'];
  $catid=$_REQUEST['catid'];
  
 
  
    $query="select * from Product_Category where CategoryID=$catid and ProductID=$productid";
  //echo $query;
  
    $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
    if($result2){
      $response["success"]=0;
      while ($row = mysql_fetch_array($result2)) {
        $response["success"]=1;
        //echo json_encode($response);
        break;
        
      }  
      echo json_encode($response);
    }else{
      
        $response["success"]=0;
        echo json_encode($response);
    }
  

  
?>