<?php
    $query = "SELECT * FROM Employee";
    if(isset($_REQUEST['storeid'])) $query=$query." WHERE StoreID=".$_REQUEST['storeid'];
     if(isset($_REQUEST['id'])) $query=$query." WHERE EmployeeID=".$_REQUEST['storeid'];
    include('connect.php');
    $result = mysql_query($query) or die(mysql_error());
    
    $response["result"] = array();
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["id"] = $row["EmployeeID"];
        $product["isi"] = $row["Username"];
        $product["pass"] = $row["Password"];
        $product["role"] = $row["Role"];
        $product["emp_name"] = $row["EmployeeName"];
        $product["emp_email"] = $row["EmployeeEmail"];
        $product["emp_adr"] = $row["EmployeeAddress"];
        $product["emp_phone"] = $row["EmployeePhone"];
        // push single product into final response array
        array_push($response["result"], $product);
    }
      $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
?>