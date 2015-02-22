<?php
  //ay120.ap01.aws.af.cm/genexcel.php?id=1&start=2013-04-16&end=2013-04-17
  if(isset($_REQUEST['id']) && isset($_REQUEST['start']) && isset($_REQUEST['end']) )
  {
    include('connect.php');
    require_once 'PHPExcel/PHPExcel.php';
    require_once 'PHPExcel/PHPExcel/IOFactory.php';

    $objPHPExcel = new PHPExcel();
    ////////////////////////////////////////////////////////////
    // Generate Sheet Header Transaction
    ////////////////////////////////////////////////////////////
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'TransactionID');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'TransactionDate');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'EmployeeID');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'CustomerName');
    $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Status');
    $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Discount');
    $query = "SELECT * FROM HeaderTransaction WHERE StoreID = ".$_REQUEST['id']." and TransactionDate>='".$_REQUEST['start']."' and TransactionDate<='".$_REQUEST['end']."'";
    $counter = 2;
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result))
    {
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$counter, $row['TransactionID']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$counter, $row['TransactionDate']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$counter, $row['EmployeeID']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$counter, $row['CustomerName']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$counter, $row['Status']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$counter, $row['Discount']);      
        $counter=$counter+1;
    }
    $objPHPExcel->getActiveSheet()->setTitle('Header Transaction');

    ////////////////////////////////////////////////////////////
    // Generate Sheet Detail Transaction
    ////////////////////////////////////////////////////////////
    $objPHPExcel->createSheet();
    
    $objPHPExcel->setActiveSheetIndex(1);
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'TransactionID');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'ProductID');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Quantity');

    $query = "SELECT dt.TransactionID, ProductID, Quantity FROM DetailTransaction dt JOIN HeaderTransaction ht on dt.TransactionID = ht.TransactionID ".
      " WHERE StoreID = ".$_REQUEST['id']." and TransactionDate>='".$_REQUEST['start']."' and TransactionDate<='".$_REQUEST['end']."'";
    $counter = 2;
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result))
    {
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$counter, $row['TransactionID']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$counter, $row['ProductID']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$counter, $row['Quantity']);
        $counter=$counter+1;
    }
    
    $objPHPExcel->getActiveSheet()->setTitle('Detail Transaction');
    ////////////////////////////////////////////////////////////
    // Generate Sheet Detail Transaction
    ////////////////////////////////////////////////////////////
    $objPHPExcel->createSheet();
    
    $objPHPExcel->setActiveSheetIndex(2);
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'ProductID');
    $objPHPExcel->getActiveSheet()->setCellValue('B1', 'ProductName');
    $objPHPExcel->getActiveSheet()->setCellValue('C1', 'Price');
    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Description');

    $query = "SELECT * FROM Product WHERE StoreID = ".$_REQUEST['id'];
    $counter = 2;
    $result = mysql_query($query) or die(mysql_error());
    while($row = mysql_fetch_array($result))
    {
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$counter, $row['ProductID']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$counter, $row['ProductName']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$counter, $row['Price']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$counter, $row['Description']);
        $counter=$counter+1;
    }
    
    $objPHPExcel->getActiveSheet()->setTitle('Product');

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="report.xls"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
  }else{
    echo 'Incomplete format';
  }
?>
