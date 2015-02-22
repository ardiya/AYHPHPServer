<?php
  $file = fopen("a.txt", 'a');
  
  fwrite($file,"asdsadsad");
  fclose($file);
  
  /*
    $query = "SELECT * FROM TEST";
    if(isset($_REQUEST['pid'])) $query=$query." WHERE id=".$_REQUEST['pid'];
    include('connect.php');
    $result = mysql_query($query) or die(mysql_error());
    
    $response["result"] = array();
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["id"] = $row["id"];
        $product["isi"] = $row["isi"];
 
        // push single product into final response array
        array_push($response["result"], $product);
    }
      $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
  */
?>