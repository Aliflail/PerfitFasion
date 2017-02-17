<html>


<head>
	

	<title> Perfit Fashion | Store's Home</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Perfit Fashion Sign In form"./>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.min.css">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	
</head>
<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" >
						<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Perfit Fashion</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile">
						<div class="profile_pic">
							<img src="images/3.jpg" alt="..." class="img-circle profile_img responsive">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>Myntra</h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

					<br/>

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">

								<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
								</li>
								<li><a><i class="fa fa-edit"></i> Settings <span class="fa fa-chevron-down"></span></a>

								</li>              

							</ul>
						</div>           

					</div>

				</div>
			</div>






        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Logout
                    <span class="glyphicon glyphicon-user"></span>
                  </a>
                 
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->





			<div class="right_col" role="main">
				<div class="container">
					<h1>The Measurements table</h1>
					<form method="post" action="ShopHome.php">

						<div class="col-lg-4">
							<div class="input-group">
								<input type="text" class="form-control" name="search" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-secondary" type="button" name="submitted">Go!</button>
								</span>
							</div>
						</div>					
					</form>



					<?php
					include("connect.php");
					global $dbcon;
					
						$phone = $_GET['ph'] ;
						$quer = "SELECT * FROM measurements INNER JOIN user_table ON measurements.Phone = user_table.Phone and  measurements.Phone ='$phone'";
						$result = $dbcon->query($quer);
						$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
						echo "<div class =\"container\"><div class=\"col-lg-8\">";
						echo "<h2>Name :</h2>" ;
						echo  $data['UserName'] ;
						echo "<h2>Phone :</h2>";
						echo $data['Phone'] ;
						echo "<h2>Chest :</h2>";
						echo $data['Chest'] ;
						echo "<h2>Turso :</h2>";
						echo $data['Turso'] ;
						echo "<h2>Hip :</h2>";
						echo $data['Hip'] ;
						echo "<h2>biceps :</h2>";
						echo  $data['biceps'] ;											
						echo "</div></div>";		
						
					

					?>

				</div>
			</div>
		</div>
	</div>


</body>
</html>