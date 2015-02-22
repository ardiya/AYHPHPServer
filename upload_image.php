<?php
  
  /*
  $base=$_REQUEST['image'];
    $binary=mysql_real_escape_string(base64_decode($base));
    header('Content-Type: bitmap; charset=utf-8');
    $file = fopen('uploaded_image.jpg', 'wb');
    fwrite($file, $binary);
    fclose($file);
  include("connect.php");
  //echo "insert into Store(Logo) values ('$binary') ";
  mysql_query("insert into Store(Logo) values ('$binary') ") or die(mysql_error());
    echo 'Image upload complete!!, Please check your php file directory--';
  //base=$_REQUEST['image'];
  // $binary=base64_decode($base);
  // header('Content-Type: bitmap; charset=utf-8');
  //ob_start();
  //fwrite($file, $binary);
  
  
  */
  
  echo "coba" ;
 
  chmod("\\image",0777);
  chmod("image",0777);
     echo "sukses" ;
  echo "1";

  
    $file = fopen("\\image\\a.txt", 'w');
  
  fwrite($file,"tes123");
  fclose($file);
  echo "Antara write dan read";

  $tmpFileName = $_FILES['tes123']['name'];
  echo $tmpFileName ;
    // Punya Yohan
  $file2 = fopen("\\image\\a.txt", 'r');
 $temp =fgets($file2);
  echo $temp;
  fclose($file2);
  /*
  
  $temp =fgets($file2);
  echo $temp;
  fclose($file2);
  */
    echo 'Image upload complete!!, Please <span class="IL_AD" id="IL_AD8">check your</span> php file directory...';
  
  //ob_end_flush();
  //ob_end_clean() ;
?>