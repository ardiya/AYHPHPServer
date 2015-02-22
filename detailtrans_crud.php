<?php
  include("connect.php");
  if(isset($_REQUEST['type']))
  {
    $type = $_REQUEST['type'];
    
   if($type=="update")
    {
        $transid= $_REQUEST['transid'];
        $productid= $_REQUEST['productid'];      
        $qty= $_REQUEST['qty'];
      
        $query="update DetailTransaction set  Quantity=$qty WHERE TransactionID= $transid and ProductID=$productid";
       
       
      
        $result = mysql_query($query) or die(mysql_error());
        
        if($result)
        {          
          
            $response["success"] = 1;
            $response["message"] = "Category successfully updated.";
           
           
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Request Failed";
             
        }
         $response["query update"] = $query;
         echo json_encode($response);
    }
    
    else if($type=="delete")
    {
        
        $transid= $_REQUEST['transid'];
        $productid= $_REQUEST['productid'];      
      
       
        $query = "DELETE FROM DetailTransaction WHERE TransactionID= $transid and ProductID=$productid";  
        $result = mysql_query($query) or die(mysql_error());
        if($result)
        {          
            $response["success"] = 1;
            $response["message"] = "Category successfully updated.";
            echo json_encode($response);
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Request Failed";
            echo json_encode($response);
        }
    }else if($type=="add"){
        $transid= $_REQUEST['transid'];
        $productid= $_REQUEST['productid'];      
        $qty= $_REQUEST['qty'];
      
        $flag=0;
        $qty_old=0;
        $query="select * from DetailTransaction WHERE TransactionID= $transid and ProductID=$productid";
        $result = mysql_query($query) or die(mysql_error());
        while($row=mysql_fetch_array($result)){
            $qty_old=$row['Quantity'];
            $flag=1;
        }
      
       if($flag==0){
         $query="insert INTO DetailTransaction VALUES($transid,$productid,$qty)";
       }else{
          $query="update DetailTransaction set  Quantity=($qty+$qty_old) WHERE TransactionID= $transid and ProductID=$productid";
       }
       
       
      
        $result = mysql_query($query) or die(mysql_error());
        
        if($result)
        {          
          
            $response["success"] = 1;
            $response["message"] = "Category successfully inserted.";
           
           
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Request Failed";
             
        }
         $response["query update"] = $query;
         echo json_encode($response);
      
    }else if($type=="pay"){
      $transid= $_REQUEST['transid'];
      $query="select * from DetailTransaction WHERE TransactionID= $transid";
      $total=0;
       $result = mysql_query($query) or die(mysql_error());
        while($row=mysql_fetch_array($result)){
          $id=$row['ProductID'];
          $qty=$row['Quantity'];
          $query2="select * from Product where ProductID=$id";
          $result2=mysql_query($query2) or die(mysql_error());
           while($row2=mysql_fetch_array($result2)){
             $price=$row2['Price'];
           }
          $total=$total+($price*$qty);
         
        }
      $response["success"] = 1;
          $response["total"] = $total;
          echo json_encode($response);  
      
    }else if($type=="money"){
      $transid= $_REQUEST['transid'];
      $query="update HeaderTransaction set Status='paid' where TransactionID=$transid";
       $result = mysql_query($query) or die(mysql_error());
       if($result)
        {          
            $response["success"] = 1;
            $response["message"] = "Category successfully inserted.";
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Request Failed";
             
        }
         $response["query update"] = $query;
         echo json_encode($response);
    }
    else
    {
        $response["success"] = 0;
        $response["message"] = "Required field(s) is missing";
        echo json_encode($response);      
    }
  }
  else
  {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
  }
?>