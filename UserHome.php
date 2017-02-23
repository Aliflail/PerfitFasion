<html>


<head>
	

	<title> Perfit Fashion | User Home</title>

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
<script type="text/javascript">
	$(document).ready(function(){
    $('table tr').click(function(){
        window.location = $(this).attr('href');
        return false;
    });
});
</script>
	
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
                        <img src="images/3.jpg" class="img-responsive" style=" margin:0px; max-height: 60px;max-width: auto;" />

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
                        <a href="UserHome.php" ><i class="fa fa-desktop "></i>SCAN INFO</a>
                    </li>
                   

                    <li>
                        <a href="#"><i class="fa fa-table "></i>SHARE</a> 
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
                     <h4>Welcome ,</h4><h3 style="text-transform: uppercase;"> <?php echo $_SESSION['username'] ?></h3>   
                    </div>
                </div>    


                <div class="row">
                    <div class="col-lg-12">
                     <h2>Scan Details</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                 

<br/>

				<?php
					include("connect.php");
					
								
					
					$user = $_SESSION['phone'];
					$id = 1;
						$quer2 = "SELECT * FROM `measurements` where Phone = '$user' order by Date desc";
						$result = $conn->prepare($quer2);
						$result->execute();
						echo "<div class =\"container\"><div class=\"col-lg-8 col-sm-8 col-xs-8 col-md-8\">";
						echo "<table class=\"table table-striped table-hover\">";
						echo "<thead  class=\"thead-inverse\">";
						echo "<tr>  <th>#</th> <th>Scan Date</th> </tr>";
						echo "</thead>";
						echo "<tbody>";
						while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
							$date = $row['Date'];
							echo "<tr><td>";							
							echo $id;
							echo "</td><td>";
							echo "<a href=\"UserDetails.php?date=".$date."&user=".$user."\">";
							echo $row['Date'];							
							echo "</a></td></tr>";
							$id = $id + 1;

						}
						echo "</tbody>";
						echo "</table></div></div>";
					

					?>

				</div>
			</div>
		</div>
	


</body>
</html>