<?php
    
    $storeid=$_REQUEST['storeid'];
    $query = "SELECT * FROM Product where StoreID=$storeid";
   $cat_id="";
  if(isset($_REQUEST['cat_id'])){
    $cat_id=$_REQUEST['cat_id'];
  
   $query=$query." and ProductID in(
     select ProductID from Product_Category where CategoryID=$cat_id
     )";
  }
  
    include('connect.php');
    $result = mysql_query($query) or die(mysql_error());
    
    $response["result"] = array();
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["id"] = $row["ProductID"];
        $product["name"] = $row["ProductName"];
        $product["price"] = $row["Price"];
        $product["image"] = $row["Image"];
        $product["desc"] = $row["Description"];
       
        // push single product into final response array
        array_push($response["result"], $product);
    }
      $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
?>