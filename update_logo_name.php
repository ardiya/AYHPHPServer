<?php
  include('connect.php');

  
 
  $name=$_REQUEST['name'];
  $storeid=$_REQUEST['storeid'];
  
        
   $query="update Store set StoreName ='$name' where StoreID= $storeid";
    
  //echo $query;
  
    $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
    if($result2){
      $response["success"]=1;
        echo json_encode($response);
    }else{
      
        $response["success"]=0;
        echo json_encode($response);
    }
    

  

  

 
  
  

  
  
  
  
?>