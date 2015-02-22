<?php
  include('connect.php');
  
  
  
  $name=$_REQUEST['random'];

  
 
  
    $query="select Image from Product where Image = '$name' UNION SELECT Image FROM Category where Image = '$name'";
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