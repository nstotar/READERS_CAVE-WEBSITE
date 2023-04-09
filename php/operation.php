<?php

require_once("db.php");
require_once("component.php");

$con = Createdb();

// create button click
if (isset($_POST['create'])) {
    createData();
}

if (isset($_POST['update'])) {
    UpdateData();
}

if (isset($_POST['delete'])) {
    deleteRecord();
}

// if (isset($_POST['deleteall'])) {
//     deleteAll();
// }

function createData()
{
    $bookname = textboxValue("book_name");
    $bookimg = $_FILES['book_img']['name'];
    $book_temp = $_FILES['book_img']['tmp_name'];
    $mov = "uploaded_img/" . $bookimg;
    $bookpublisher = textboxValue("book_publisher");
    $bookDescription = textboxValue("book_Description");
    $sellerdetails = textboxValue("seller_info");
    $bookprice = textboxValue("book_price");


    if ($bookname  && $book_temp && $bookpublisher && $bookDescription && $sellerdetails && $bookprice) {

        $sql = "INSERT INTO books (book_name, book_img, book_publisher,book_Description,seller_info,book_price) 
                        VALUES ('$bookname','$bookimg','$bookpublisher','$bookDescription',  '$sellerdetails','$bookprice')";
        if ($sql) {
            move_uploaded_file($book_temp, $mov);
        }
        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", "Record Successfully Inserted...!");
        } else {
            echo "Error";
        }
    } else {
        TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value)
{
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if (empty($textbox)) {
        return false;
    } else {
        return $textbox;
    }
}


// messages
function TextNode($classname, $msg)
{
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from mysql database
function getData()
{
    $sql = "SELECT * FROM books";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
}

// update data
function UpdateData()
{
    $bookid = textboxValue("book_id");
    $bookname = textboxValue("book_name");
    $bookimg = $_FILES['book_img']['name'];
    $book_temp = $_FILES['book_img']['tmp_name'];
    $mov = "uploaded_img/" . $bookimg;
    $bookpublisher = textboxValue("book_publisher");
    $bookDescription = textboxValue("book_Description");
    $sellerdetails = textboxValue("seller_info");
    $bookprice = textboxValue("book_price");

    if ($bookname  && $bookimg && $bookpublisher && $bookDescription && $sellerdetails && $bookprice) {
        $sql = "
                    UPDATE books SET book_name='$bookname',book_img = '$bookimg', book_publisher = '$bookpublisher', book_Description ='$bookDescription',  seller_info='$sellerdetails', book_price = '$bookprice' WHERE book_id='$bookid' ;                    
        ";
        if ($sql) {
            move_uploaded_file($book_temp, $mov,);
        }
        if (mysqli_query($GLOBALS['con'], $sql)) {
            TextNode("success", "Data Successfully Updated");
        } else {
            TextNode("error", "Enable to Update Data");
        }
    } else {
        TextNode("error", "Select Data Using Edit Icon");
    }
}

//DELETE RECORD
function deleteRecord()
{
    $bookid = (int)textboxValue("book_id");

    $sql = "DELETE FROM books WHERE book_id=$bookid";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "Record Deleted Successfully...!");
    } else {
        TextNode("error", "Enable to Delete Record...!");
    }
}


function deleteBtn()
{
    $result = getData();
    $i = 0;
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            if ($i > 3) {
                buttonElement("btn-deleteall", "btn btn-danger", "<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}


function deleteAll()
{
    $sql = "DROP TABLE books";

    if (mysqli_query($GLOBALS['con'], $sql)) {
        TextNode("success", "All Record deleted Successfully...!");
        Createdb();
    } else {
        TextNode("error", "Something Went Wrong Record cannot deleted...!");
    }
}


// set id to textbox
function setID()
{
    $getid = getData();
    $id = 0;
    if ($getid) {
        while ($row = mysqli_fetch_assoc($getid)) {
            $id = $row['book_id'];
        }
    }
    return ($id + 1);
}