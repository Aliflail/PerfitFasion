<html>


<head>
	

	<title> Perfit Fashion | Store's Home</title>

	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   
	<!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css' />
</head>
	
</head>
<body>
<?php
	session_start();
?>
<div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="images/logo.jpg" class="img-responsive" style=" margin:0px; max-height: 60px;max-width: auto;" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                <?php echo $_SESSION['username'] ?>&nbsp
                  <a href="logout.php" style="color:#fff;">LogOut</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="ShopHome.php" ><i class="fa fa-desktop "></i>SCAN INFO</a>
                    </li>
                   

                    <li>
                        <a href="#"><i class="fa fa-table "></i>VTR FILES </a> 
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-level-up "></i>UPGRADES  </a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-qrcode "></i>REQUESTS</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cog"></i>SETTINGS</a>
                    </li>

                    
                    
                </ul>
            </div>

        </nav>


<div id="page-wrapper" >

            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>Scan Details</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                 
<div class="row">
				<form method="POST" action="ShopHome.php">

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="input-group">
								<input type="text" class="form-control" name="search" placeholder="Search for...">
								<span class="input-group-btn">
									<!-- <button class="btn btn-secondary" type="button" name="submitted">Go!</button> -->
									<form method='post'>
									<input type="submit" class="btn btn-secondary" name="test" id="test" value="Go!"/><br/>
									</form>
<!-- 									<button class="btn btn-secondary" type="button" name="submitted">Go!</button>
 -->								</span>
							</div>
						</div>					
					</form>
</div>
<br/>

					<?php
					include("connect.php");
					global $conn;
					
					
					// if(array_key_exists('test', $_POST))
					// {
					// 	Myfunc();
					// }

					$store = $_SESSION['UserId'];
					
					if(array_key_exists('test', $_POST)) {
						$phone = $_POST['search'];
						$quer="SELECT * FROM `user_table` Inner JOIN (SELECT Max(Date) as max_date ,Phone,StoreId FROM `measurements`where StoreId = '$store' GROUP BY Phone,StoreId) a On user_table.Phone = a.Phone left Join orders_table on orders_table.UserPhone = a.Phone and orders_table.StoreId = '$store' where a.Phone LIKE '%$phone%' or UserName LIKE '%$phone%' ";
						$result = $conn->prepare($quer);
						$result->execute();
						$row = $result->fetch(PDO::FETCH_ASSOC);
							if($row){
						echo " <div class=\"row\"><div class =\"col-lg-8 col-md-8  col-xs-8 col-md-8\">";
						echo "<table class=\"table table-striped table-hover\">";
						echo "<thead  class=\"thead-inverse\">";
						echo "<tr> <th>Name</th><th>Gender</th>  <th>Scan</th> <th>Delivery</th> <th>Product</th></tr>";
						echo "</thead>";
						echo "<tbody>";
						    $phone = $row['Phone'];
							echo "<tr><td>";
							echo "<a href=\"Details.php?ph=".$phone."\">";
							echo $row['UserName'];
							echo "</a>";
							echo "</td><td>";	
							echo $row['Gender'];
							echo "</td><td>";
							echo $row['max_date'];
							echo "</td><td>";
							echo $row['DeliveryDate'];
							echo "</td><td>";
							echo $row['Product'];
							echo "</td></a></tr>";
						while ($row =  $result->fetch_assoc()) {
							$phone = $row['Phone'];
							echo "<tr><td>";
							echo "<a href=\"Details.php?ph=".$phone."\">";
							echo $row['UserName'];
							echo "</a>";
							echo "</td><td>";	
							echo $row['Gender'];
							echo "</td><td>";
							echo $row['max_date'];
							echo "</td><td>";
							echo $row['DeliveryDate'];
							echo "</td><td>";
							echo $row['Product'];
							echo "</td></a></tr>";
						}
						echo "</tbody>";
						echo "</table></div></div>";
					}
					else
					{
						echo "Data not found";
					}

					}
					else{

						$quer2="SELECT * FROM `user_table` Inner JOIN (SELECT Max(Date) as max_date,Phone,StoreId FROM `measurements`where StoreId = '$store' GROUP BY Phone,StoreId) a On user_table.Phone = a.Phone left Join orders_table on orders_table.UserPhone = a.Phone and orders_table.StoreId = '$store'";
						$result = $conn->prepare($quer2);
						$result->execute();
						echo "<div class =\"container\"><div class=\"col-lg-8 col-sm-8 col-xs-8 col-md-8\">";
						echo "<table class=\"table table-striped table-hover\">";
						echo "<thead  class=\"thead-inverse\">";
						echo "<tr> <th>Name</th><th>Gender</th>  <th>Scan</th> <th>Delivery</th> <th>Product</th></tr>";
						echo "</thead>";
						echo "<tbody>";
						while ($row  = $result->fetch(PDO::FETCH_ASSOC)) {
							$phone = $row['Phone'];
							echo "<tr><td>";
							echo "<a href=\"Details.php?ph=".$phone."\">";
							echo $row['UserName'];
							echo "</a>";
							echo "</td><td>";	
							echo $row['Gender'];
							echo "</td><td>";
							echo $row['max_date'];
							echo "</td><td>";
							echo $row['DeliveryDate'];
							echo "</td><td>";
							echo $row['Product'];
							echo "</td></a></tr>";

						}
						echo "</tbody>";
						echo "</table></div></div>";
					}

					?>

				</div>
			</div>
		</div>
	


</body>
</html>