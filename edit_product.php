<?php
  include('connect.php');
  if(isset($_REQUEST['type'])){
  $type= $_REQUEST['type'];
  
    if($type=="delete"){
      
      $id=$_REQUEST['id'];
      $query="delete from Product where ProductID=$id";
       $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
        if($result2){
          $response["success"]=1;
          
        }else{
            $response["success"]=0;
        }
      
      
    }else if($type=="update"){
      $id=$_REQUEST['id'];
      $productname=$_REQUEST['productname'];
      $price=$_REQUEST['price'];
  
      $desc=$_REQUEST['desc'];
      $query="";
      if(isset($_REQUEST['image'])){
         $image=$_REQUEST['image'];
         $query="update Product set ProductName= '$productname',Price=$price,Image='$image',Description='$desc'  where ProductID=$id";
      }else{
         $query="update Product set ProductName= '$productname',Price=$price,Description='$desc'  where ProductID=$id";
      }

        $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
        if($result2){
          $response["success"]=1;
           
        }else{
      
            $response["success"]=0;
           
        }
      
      
    }
     echo json_encode($response);
  
  
    
  
  }else{
     $response["success"]=0;
    echo json_encode($response);
  }

  

  

 
  
  

  
  
  
  
?>