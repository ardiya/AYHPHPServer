<?php
  include('connect.php');
  
  
  
  $name=$_REQUEST['name'];
  $image=$_REQUEST['image'];
  
 
  
    $query="insert into Category values('','$name','$image')";
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