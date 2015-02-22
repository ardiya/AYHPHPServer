<?php
  include('connect.php');
  
  
      $urutan=$_REQUEST['urutan'];
      $storeid="";
      $employeeid="";
      $customerName="";
      $status="";
      $diskon="";
  if($urutan==1){
    
      $storeid=$_REQUEST['storeid'];
      $employeeid=$_REQUEST['employeeid'];
      $customerName=$_REQUEST['customername'];
      $status=$_REQUEST['status'];
      $diskon=$_REQUEST['diskon'];
     

 
  
    $query="insert into HeaderTransaction values('',now(),$storeid,$employeeid,'$customerName','$status',$diskon)";
    
    
    $result2 = mysql_query($query) or die("BP2:".mysql_error());
    
    if($result2){
      
      $query="select * from HeaderTransaction where StoreID=$storeid and EmployeeID=$employeeid and CustomerName='$customerName' order by TransactionID desc limit 0,1";
 
      $result3 = mysql_query($query) or die("BP3:".mysql_error());
      
      
         while ($row = mysql_fetch_array($result3)) {
              $transid= $row["TransactionID"];
               $response["transid"]=$transid;
           //echo $transid;
           }
          $response["success"]=1;
         
           echo json_encode($response);
      
    
      
      
    }
    
    else{
      
        $response["success"]=0;
        echo json_encode($response);
    }
    
  
  }else{
    
      $transid=$_REQUEST['transid'];
      $productid=$_REQUEST['productid'];
      $qty=$_REQUEST['qty'];
      
    
      $query="insert into DetailTransaction values($transid,$productid,$qty)";
    //echo $query;
      $result3 = mysql_query($query) or die("BP4:".mysql_error());
    
    if($result3){
        $response["success"]=1;
        echo json_encode($response);
    }else{
        $response["success"]=0;
        echo json_encode($response); 
    }
    
  }
    
  
  

  

 
  
  

  
  
  
  
?>