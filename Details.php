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
						<h2>Measurements</h2>   
					</div>
				</div>              
				<!-- /. ROW  -->
				<hr />



				
			<div class="row">
					<aside>
						<div class="col-lg-6 col-md-6 col-sm-4 col-xs-4">

							<img src="images/chart.jpg" class="img-responsive" style="min-height: 70%; align-content: left;">

						</div>					
				</aside>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					
					<table class="table">
					<tbody>
						<?php
						include("connect.php");
						global $conn;

						$phone = $_GET['ph'] ;
						$quer = "SELECT * FROM measurements INNER JOIN user_table ON measurements.Phone = user_table.Phone and  measurements.Phone ='$phone' ORDER BY Date Desc";
						$result = $conn->prepare($quer);
						$result->execute();
						$row = $result->fetch(PDO::FETCH_ASSOC);
						echo "<tr><td>";
							echo "<h3>Name</h3>";
							echo "</td><td><h3>"; 
							echo $row['UserName'];							
						echo "</h3></td></tr>";	
						echo "<tr><td>";
							echo "Phone Number :";
							echo "</td><td>"; 
							echo $row['Phone'];							
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Chest :";
							echo "</td><td>"; 
							echo $row['Chest'];							
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Turso :";
							echo "</td><td>"; 
							echo $row['Turso'];							
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Hip :";
							echo "</td><td>"; 
							echo $row['Hip'];							
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Biceps :";
							echo "</td><td>"; 
							echo $row['biceps'];							
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Neck :";
							echo "</td><td>"; 
							echo $row['Neck'];							
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Shoulder :";
							echo "</td><td>"; 
							echo $row['Shoulder'];							
													
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Arm Length :";
							echo "</td><td>"; 
							echo $row['ArmLength'];							
													
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Waist :";
							echo "</td><td>"; 
							echo $row['Waist'];							
													
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Thighs :";
							echo "</td><td>"; 
							echo $row['Thighs'];							
													
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Crotch :";
							echo "</td><td>"; 
							echo $row['Crotch'];							
													
						echo "</td></tr>";	
						echo "<tr><td>";
							echo "Height :";
							echo "</td><td>"; 
							echo $row['Height'];							
													
						echo "</td></tr>";	
										

						?>
						</tbody>
						</table>
					</div>
				</div>
</div>
			</div>
		</div>
	</div>

</div>

</body>
</html>