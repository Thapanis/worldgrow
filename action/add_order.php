<?php
    include '../connectdb.php';

    $id = $_REQUEST['id'];
    $user = $_REQUEST['user'];
    $totalprice = $_REQUEST['totalprice'];
    
    $sql = "INSERT INTO `order` (quantity, totalprice, member_id)
            VALUES (1, $totalprice, $id)";
            
    if ($conn->query($sql) === TRUE) {
        header("Location: ../order.php");
    } else {
        echo("Error description: " . $conn -> error);
    }

    $conn->close();

?>