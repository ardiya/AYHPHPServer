<?php
    $query = "SELECT * FROM Category";
    if(isset($_REQUEST['storeid'])) $query=$query." WHERE StoreID=".$_REQUEST['storeid'];
    include('connect.php');
    $result = mysql_query($query) or die(mysql_error());
    
    $response["result"] = array();
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $category= array();
        $category["CategoryID"] = $row["CategoryID"];
        $category["CategoryName"] = $row["CategoryName"];
        $category["StoreID"] = $row["StoreID"];
        $category["Image"] = $row["Image"];
 
        // push single product into final response array
        array_push($response["result"], $category);
    }
      $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
?>