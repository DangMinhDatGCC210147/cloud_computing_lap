<?php
    include_once 'connect.php';
    $conn = new Connect();
    $db_link = $conn->connectToPDO();

    if(isset($_GET['cid'])):
        // print_r($_GET);
        $value = $_GET['cid'];
        // echo "$value";
        $sqlDelete = "DELETE FROM `category` WHERE `cat_id` = ?";
        $stmt = $db_link->prepare($sqlDelete);
        $stmt->execute(array("$value"));
        header("Location: category.php");
    endif; 
?>