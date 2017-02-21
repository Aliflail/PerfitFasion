<?php
   ob_start();
   session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Perfit Fashion</title>
<link href="css/style1.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Perfit Fashion Sign In form"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion           
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
				   </script>
	<link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
				   
</head>
<body>
	
		 <ul class="topnav" id="myTopnav">
  <li><a href="#home"><b><i>Perfit Fashion</i></b></a></li>
  <li><a href="#" >Home</a></li>
 
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
  </li>
</ul>	
<div class="main-content">
	<div class="sap_tabs">	
		 
		<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
		 
			  <ul>
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>User Sign in</span></li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Store Sign in</span></li>
				  
			  </ul>		
				  <!---->

			<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
				<div class="facts">
					<!--login1-->
					<div class="register">
						
						<form method="POST" action="index.php">	
							<input placeholder="Enter Your Phone Number" name="phonenum" type="text" required="">
							<input placeholder="Enter Password" type="password" name="pass" required="">									
								<div class="sign-up">
									<input type="submit" name="loginuser" value="Sign In"/>
								</div>
						</form>
					</div>
				</div>
			</div>	
			
			<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
				<div class="facts">
					<div class="register">
						
						<form method="POST" action="index.php">										
							<input placeholder="Store Name" name="username" class="mail" type="text" required="">									
							<input placeholder="Password"  name="password" class="lock" type="password" required="">										
							<div class="sign-up"><a href="ShopHome.php">
								<input type="submit" name="login" value="Sign In"/></a>
							</div>
						</form>
					</div>
				</div> 
			</div> 			        					            	      
			 	

<?php

			include("connect.php");
			global $conn;
			$msg = '';
           
           
            if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {

            	$store = $_POST['username'];
           		$pass = $_POST['password'];
            	$quer="SELECT * FROM store_table where   Store_Name = '$store' and Password = '$pass'";
				$result = $conn->prepare($quer);
				$result->execute();
				$row = $result->fetch(PDO::FETCH_ASSOC);

               if ($row) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $row['Store_Name'];
                  $_SESSION['UserId'] = $row['St_Id'];
                  $myid = $_SESSION['UserId'];
                  echo $myid;
                 header('Location:ShopHome.php');
               }else {
                  $msg = 'Wrong username or password';
               }
            }

            if (isset($_POST['loginuser']) && !empty($_POST['phonenum']) && !empty($_POST['pass'])) {

            	$user = $_POST['phonenum'];
           		$passw = $_POST['pass'];
            	$quer="SELECT * FROM user_table where   Phone = '$user' and Password = '$passw'";
				$result = $conn->prepare($quer);
				$result->execute();
				$row = $result->fetch(PDO::FETCH_ASSOC);

               if ($row) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $row['UserName'];
                  $_SESSION['phone'] = $row['Phone'];

                 header('Location:UserHome.php');
               }else {
                  $msg = 'Wrong username or password';
               }
            }


			?>

		</div>	
		
	</div>
</div>
	 <!--start-copyright-->
   		<div class="copy-right">
   			<div class="wrap">
				<p>&copy; 2017 Perfit Fashion.  All Rights  Reserved | Design by CFI</p>
			</div>
		</div>
	<!--//end-copyright-->
 
</body>
</html>