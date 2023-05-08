<?php

include("data_class.php");

$bookname = $_POST['bookname'];
$bookauthor = $_POST['bookauthor'];
$bookdetail = $_POST['bookdetail'];
$bookpub = $_POST['bookpub'];
$branch = $_POST['branch'];
$bookquantity = $_POST['bookquantity'];
$bookprice = $_POST['bookprice'];


if(move_uploaded_file($_FILES["bookphoto"]["tmp_name"],"uploads/".$_FILES["bookphoto"]["name"])) {
    echo "updated";
    $bookpic = $_FILES["bookphoto"]["name"];
$obj = new data();
$obj->setconnection();
$obj->addbook($bookpic,$bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquantity);
}
else {
    echo "File not uploaded";
}



?>