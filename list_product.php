<?php
	include 'connectdb.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body class="goto-here">
  <div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">088 623 9445</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">worldgrowthailand@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
              <?php
								if(!isset($_SESSION["username"])){
									echo "<a class='text' href='/worldgrow/login/login.php'>เข้าสู่ระบบ</a>";
								} else {
									echo "<span class='text'>ผู้ใช้งาน : ".$_SESSION["username"]."</span>";
									echo "&nbsp;&nbsp;";
									echo "<a class='text' href='action/logout.php'>ออกจากระบบ</a>";
								}
							?>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" style="align=center" href="index.php">Worldgrow Organic Farm</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">กลับไปหน้าหลัก</a></li>
          </ul>
        </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="container">
      <div class="row">
        <?php include('banner.php');?>
      </div>
      <div class="row">
        <div class="col-md-2">
          <?php include('menu.php');?>        	 
        </div>
        <div class="col-md-10">

        <br>
        <h3 align="center"> รายการสินค้า <a href="add_product.php" class="btn btn-primary"> + เพิ่มสินค้า </a> </h3>
        <table class="table">
				<thead>
				<tr>
					<th>ภาพสินค้า</th>
					<th>id</th>
					<th>ชื่อสินค้า</th>
					<th>รายละเอียด</th>
          <th>ราคา</th>
          <th>ประเภทสินค้า</th>
          <th>จำนวนสินค้า</th>
          <th>แก้ไข</th>
          <th>ลบ</th>
				</tr>
				</thead>
				<tbody>
        <?php
                  	$sql = "SELECT product_id, product_name, product_detail, price, producttype_id, quantity, pic FROM product ";
				  	$result = $conn->query($sql);
				  
				  	if ($result->num_rows > 0) {
                    	while($row = $result->fetch_assoc()) {
                      echo "<tr> ";
                        echo "<td><img height='100' width='100' src='images/".$row['pic']."' alt='' /></td>";
                        echo "<td>".$row['product_id']."</td>";
                        echo "<td>".$row['product_name']."</td>";
                        echo "<td>".$row['product_detail']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['producttype_id']."</td>";
                        echo "<td>".$row['quantity']."</td>";
                        echo "<td> <a href='#?id=" . $row["product_id"] . "' class='btn btn-danger'>แก้ไข</a></td>";
                        echo "<td> <a href='action/del_product.php?id=" . $row["product_id"] . "' class='btn btn-danger'>ลบ</a></td>";
                      echo "</tr> ";
						} 
          }
          
				?>


        <!-- <tr>
                <?php
                  $sql = "SELECT product_id, product_name, product_detail, price, producttype_id, quantity , pic FROM product ";
                  $result = $conn->query($sql);

                    while($row = $result->fetch_assoc()) { ?>
                      <tr>
                      <td><img height="100" width="100" src="images/<?php echo $row['pic']; ?>" alt=""></td>
                      <td><?php echo $row['product_id'];?></td>
                      <td><?php echo $row['product_name'];?></td>
                      <td><?php echo $row['product_detail'];?></td>
                      <td><?php echo $row['price'];?></td>
                      <td><?php echo $row['producttype_id'];?></td>
                      <td><?php echo $row['quantity'];?></td>
                      <td>
                      <a class="btn btn-danger" name="updatestatus" href="action/del_product?id=<?php echo $row['product_id']; ?>" role="button">
                          <i class="material-icons">แก้ไข</i></a>
                      </td>
                      <td>
                          <a class="btn btn-danger" href="action/del_product?id=<?php echo $row['product_id']; ?>" role="button">
                          <i class="material-icons">ลบ</i></a>
                      </td>
                    </tr>
                    <?php } ?>
        </tr> -->
				</tbody>
				</table>

        </div>
      </div>
    </div>

    <br/><br/><br/>

 <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>