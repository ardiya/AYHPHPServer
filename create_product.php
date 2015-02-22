<?php
  include('connect.php');
 
  
 
  $storeid=$_REQUEST['storeid'];
  $productname=$_REQUEST['productname'];
  $price=$_REQUEST['price'];
  $image=$_REQUEST['image'];
  $desc=$_REQUEST['desc'];
  
 
 
  
    $query="insert into Product values('',$storeid,'$productname',$price,'$image','$desc')";
  //  echo $query;
  
    $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
    if($result2){
      $response["success"]=1;
        echo json_encode($response);
    }else{
      
        $response["success"]=0;
        echo json_encode($response);
    }
 

  

  

 
  
  

  
  
  
  
?>