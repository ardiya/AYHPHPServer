<?php
  
  
  /*
$base=$_REQUEST['image'];

echo $base;

// base64 encoded utf-8 string

$binary=base64_decode($base);

// binary, utf-8 bytes

header('Content-Type: bitmap; charset=utf-8');

// print($binary);

//$theFile = base64_decode($image_data);
  
$file = fopen('a.jpg', 'wb');

fwrite($file, $binary);

fclose($file);

  //echo '<img src=test.jpg>';
  */
  
  function save_image($inPath,$outPath)
{ //Download images from remote server
    $in=    fopen($inPath, "rb");
    $out=   fopen($outPath, "wb");
    while ($chunk = fread($in,8192))
    {
        fwrite($out, $chunk, 8192);
    }
    fclose($in);
    fclose($out);
}

save_image('http://upload.wikimedia.org/wikipedia/commons/a/ac/Approve_icon.svg','image.jpg');
?>
