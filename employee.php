<?php
  $query = "SELECT * FROM Employee";
  if(isset($_REQUEST['username'])&&isset($_REQUEST['password'])) $query=$query." WHERE username='".$_REQUEST['username']."' and password='".$_REQUEST['password']."'";
  include('connect.php');
  $result = mysql_query($query) or die(mysql_error());
  if($result)
  {
    $response["result"] = array();
    while ($row = mysql_fetch_array($result)) {
      $employee= array();
      $employee["username"] = $row["Username"];
      $employee["name"] = $row["EmployeeName"];
      $employee["role"] = $row["Role"];
      $employee["storeid"] = $row["StoreID"];
      $employee["emp_id"] = $row["EmployeeID"];
      array_push($response["result"], $employee);
    }
    $response["success"] = 1;
    if(mysql_num_rows($result)==0){
      $response["success"]=0;
      $response["message"]="Invalid Username/Password";
    }
    echo json_encode($response);
  }else{
    $response["success"] = 0;
    $response["message"]= "Invalid Command";
    echo json_encode($response);
  }
?>