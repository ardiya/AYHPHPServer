<?php
  include("connect.php");
  if(isset($_REQUEST['type']))
  {
    $type = $_REQUEST['type'];
    if($type == "insert")
    {
        $isi = $_REQUEST['isi'];
        $query = "INSERT INTO TEST (isi) VALUES ('$isi')";  
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
            $response["message"] = "Request Failed...";
        }
    }
    else if($type=="update")
    {
        $isi = $_REQUEST['isi'];
        $pid = $_REQUEST['pid'];
        $query = "UPDATE TEST SET isi = '$isi' WHERE id = $pid";  
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
            $response["message"] = "Request Failed...";
        }
    }
    else if($type=="delete")
    {
        $pid = $_REQUEST['pid'];
        $query = "DELETE FROM TEST WHERE id = $pid";  
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
            $response["message"] = "Request Failed...";
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