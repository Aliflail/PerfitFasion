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
					<form method="POST" action="ShopHome.php">

						<div class="col-lg-4">
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



					<?php
					include("connect.php");
					global $dbcon;
					
					
					function Myfunc()
					{
						echo "hello world";
					}
					// if(array_key_exists('test', $_POST))
					// {
					// 	Myfunc();
					// }


					if(array_key_exists('test', $_POST)) {
						$phone = $_POST['search'];
						$quer="SELECT * FROM measurements INNER JOIN user_table ON measurements.Phone = user_table.Phone and  measurements.Phone='$phone'";
						$result = $dbcon->query($quer);
						$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
						if($row){
						echo "<div class =\"container\"><div class=\"col-lg-8\">";
						echo "<table class=\"table table-striped\">";
						echo "<thead  class=\"thead-inverse\">";
						echo "<tr> <th>Phone</th><th>Name</th>  <th>Latest Date</th> </tr>";
						echo "</thead>";
						echo "<tbody>";
						    $phone = $row['Phone'];
							echo "<tr><td>";
							echo "<a href=\"Details.php?ph=<?php echo $phone; ?>\">";
							echo $row['Phone'];
							echo "</a>";
							echo "</td><td>";	
							echo $row['UserName'];
							echo "</td><td>";	
							echo $row['Date'];
							echo "</td></a></tr>";
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							$phone = $row['Phone'];
							echo "<tr><td>";
							echo "<a href=\"Details.php?ph=<?php echo $phone; ?>\">";
							echo $row['Phone'];
							echo "</a>";
							echo "</td><td>";	
							echo $row['UserName'];
							echo "</td><td>";	
							echo $row['Date'];
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

						$quer2="SELECT * FROM measurements cross JOIN user_table ON measurements.Phone= user_table.Phone  order by Date DESC";
						$result = $dbcon->query($quer2);
						echo "<div class =\"container\"><div class=\"col-lg-8\">";
						echo "<table class=\"table table-striped\">";
						echo "<thead  class=\"thead-inverse\">";
						echo "<tr> <th>Phone</th><th>Name</th>  <th>Latest Date</th> </tr>";
						echo "</thead>";
						echo "<tbody>";
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							$phone = $row['Phone'];
							echo "<tr><td>";
							echo '<a href=Details.php?ph='. $phone.'>';
							echo $row['Phone'];
							echo "</a>";
							echo "</td><td>";	
							echo $row['UserName'];
							echo "</td><td>";	
							echo $row['Date'];
							echo "</td></tr>";

						}
						echo "</tbody>";
						echo "</table></div></div>";
					}

					?>

				</div>
			</div>
		</div>
	</div>


</body>
</html>