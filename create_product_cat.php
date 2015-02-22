<?php
  include('connect.php');

  
  $categoryid=$_REQUEST['categoryid'];
  $productid=$_REQUEST['productid'];
  

  
  
    $query="insert into Product_Category values($categoryid,$productid)";
  //echo $query;
 
    $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
    if($result2){
      $response["success"]=1;
        $response["query"]=$query;
        echo json_encode($response);
    }else{
      
        $response["success"]=0;
        echo json_encode($response);
    }
  

  
?>