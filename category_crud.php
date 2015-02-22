<?php
  include("connect.php");
  if(isset($_REQUEST['type']))
  {
    $type = $_REQUEST['type'];
    if($type == "insert")
    {
        $isi = $_REQUEST['categoryname'];
        $id = $_REQUEST['store_id'];
        $image = $_REQUEST['image'];
        $query = "INSERT INTO Category (CategoryName, StoreID, Image) VALUES ('$isi', $id, '$image')";  
        $result = mysql_query($query) or die(mysql_error());
        if($result)
        {          
            $response["success"] = 1;
            $response["message"] = "Product successfully updated.";
            echo json_encode($response);
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Request Failed";
        }
    }
    else if($type=="update")
    {
        $categoryid = $_REQUEST['categoryid'];
        $categoryname = $_REQUEST['categoryname'];
        if(isset($_REQUEST['image'])){
            $image = $_REQUEST['image'];      
             $query = "UPDATE Category SET CategoryName = '$categoryname', Image = '$image' WHERE CategoryID = $categoryid ";            
        }
        $query = "UPDATE Category SET CategoryName = '$categoryname' WHERE CategoryID = $categoryid ";  
      
        $result = mysql_query($query) or die(mysql_error());
        if($result)
        {          
            $response["success"] = 1;
            $response["message"] = "Product successfully updated.";
            echo json_encode($response);
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Request Failed";
        }
      
    }
    else if($type=="delete")
    {
        
        $pid = $_REQUEST['id'];
        $query = "DELETE FROM Category WHERE CategoryID = $pid";  
        $result = mysql_query($query) or die(mysql_error());
        if($result)
        {          
            $response["success"] = 1;
            $response["message"] = "Product successfully updated.";
            echo json_encode($response);
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Request Failed";
            echo json_encode($response);
        } 
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