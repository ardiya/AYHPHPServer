<?php
  include("connect.php");
        $id= $_REQUEST['id'];
        $query = "DELETE FROM Employee WHERE EmployeeID= $id";  
        $result = mysql_query($query) or die(mysql_error());
        if($result)
        {          
            $response["success"] = 1;
            $response["message"] = "Employee successfully updated.";
            echo json_encode($response);
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Request Failed...";
        }     
  
  
 ?>