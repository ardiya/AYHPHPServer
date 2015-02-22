<?php
  include('connect.php');

  
 
  $username=$_REQUEST['username'];
  $password=$_REQUEST['password'];
  $name=$_REQUEST['name'];
  $email=$_REQUEST['email'];
  $adr=$_REQUEST['adr'];
  $phone=$_REQUEST['phone'];

  $storename=$_REQUEST['store_name'];
  $role='Admin';
  
  $error = array();
  $error["result"] = 0;
  $query="insert into Store values(NULL,'$storename',NULL,NULL)";
  //echo $query;
  $result = mysql_query($query) or die(json_encode($error));
  
  $storeid=0;
  if($result){
    $query="select StoreID from Store where storeName='$storename' order by StoreID desc limit 0,1";
    $result2 = mysql_query($query) ;
    while ($row = mysql_fetch_array($result2)) {
      $storeid= $row["StoreID"];
      //echo $storeid;
    }
    
    $query="insert into Employee values('','$username','$password','$name','$email','$adr','$phone','Admin',$storeid)";
    
  
    $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
    if($result2){
      $response["success"]=1;
        echo json_encode($response);
    }else{
      
        $response["success"]=0;
        echo json_encode($response);
    }
    
  }else{
   
    $response["success"]=0;
    echo json_encode($response);
  }
  

  

 
  
  

  
  
  
  
?>