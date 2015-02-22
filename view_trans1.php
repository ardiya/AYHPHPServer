<?php
  include('connect.php');
  $storeid=$_REQUEST['storeid'];
 
  
  if(isset($_REQUEST['transid'])) {
    
   $transid=$_REQUEST['transid'];   
   $query = "SELECT * FROM DetailTransaction where TransactionID= $transid";
    $result = mysql_query($query) or die(mysql_error());
    $response["result"] = array();
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $trans= array();
        $trans["ProductID"] =  $row["ProductID"];
        $productid=$row["ProductID"];
      
        $query2="select * from Product where ProductID=$productid";
        $result2 = mysql_query($query2) or die(mysql_error());
        if($result2){
           if($row2 = mysql_fetch_array($result2)) {
              $trans["ProductName"] =  $row2["ProductName"];
             $trans["price"] =  $row2["Price"];
           }else{
             $trans["ProductName"] =  "Error";
             $trans["price"] = "0";            
           }
             
        }else{
          $trans["ProductName"] =  "Error";
        }  
      
        $trans["Quantity"] = $row["Quantity"];
       
 
        // push single product into final response array
        array_push($response["result"], $trans);
        $response["success"] = 1;
 
        // echoing JSON response
       
    }
      echo json_encode($response);
    
  }else{
    
    $query = "SELECT * FROM HeaderTransaction where StoreId = $storeid";
    if(isset($_REQUEST['type']))$query=$query." and Status='unpaid'";
    $result = mysql_query($query) or die(mysql_error());
    $response["result"] = array();
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $trans= array();
        $trans["TransactionID"] =  $row["TransactionID"];
        $trans["TransactionDate"] = $row["TransactionDate"];
        $trans["CustomerName"] = $row["CustomerName"];
        $trans["Status"] = $row["Status"];
        $trans["EmployeeID"] = $row["EmployeeID"];
        $EmployeeID=$row["EmployeeID"];
        
      
      
      $query2="select * from Employee where EmployeeID=$EmployeeID";
      
        $result2 = mysql_query($query2) or die(mysql_error());
        if($result2){
          if ($row2 = mysql_fetch_array($result2)) {
              $trans["EmployeeName"] =  $row2["EmployeeName"];
          }else{
            $trans["EmployeeName"] = 'error';
          }
        }else{
         
          $trans["EmployeeName"] = 'Error';
        }  
      
      
        // push single product into final response array
        array_push($response["result"], $trans);
        $response["success"] = 1;
 
        // echoing JSON response
        
    }
      echo json_encode($response);
    
  }
  
  
 
?>
