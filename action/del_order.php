<?php
	include '../connectdb.php';

	$order_id = $_REQUEST['id'];

	$sql ="DELETE FROM `order` WHERE order_id = '$order_id' ";
		
	if ($conn->query($sql) === TRUE) {
		// echo "Record deleted successfully";
		header("Location: ../order.php");
	} else {
		echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?>