<?php
  include('connect.php');

  
 
  $username=$_REQUEST['username'];
  $password=$_REQUEST['password'];
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $adr=$_REQUEST['adr'];
  $phone=$_REQUEST['phone'];
  $role=$_REQUEST['role'];
  $store_id=$_REQUEST['store_id'];
 
  
      $query="insert into Employee values('','$username','$password','$name','$email','$adr','$phone','$role',$store_id)";
 
  
  
    $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
    if($result2){
      $response["success"]=1;
        echo json_encode($response);
    }else{
      
        $response["success"]=0;
        echo json_encode($response);
    }
    

  

  

 
  
  

  
  
  
  
?>