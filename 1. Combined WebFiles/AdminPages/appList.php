<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Xen Admin Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.xen.ai" class="simple-text">
                    <img src="assets/img/favicon.png" height="50 px" width="50 px" alt="Xen.ai"/>
                </a>
				
				
            </div>

            <ul class="nav">
                <li>
                    <a href="#">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li  class="active">
				
                <li>
                    <a href="envList.php">
                        <i class="pe-7s-note2"></i>
                        <p>Environment List</p>
                    </a>
                </li>
                
                <li>
                    <a href="#">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        
						<li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <!-- <span class="notification"></span> -->
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
						<li>
                            <a href="../index.html">
                                Log out
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "hadoop";
			$dbname = "XenAdmin";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql_select = "SELECT Distinct environment_name FROM xen_environments";
			$resEnvList = $conn->query($sql_select);
			
			
			
		?>
        
		
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<h4 class="title">Application List</h4>
							</div>
							<div class="content">
								<form action='appList.php' method="post">
									<div class="row">
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Select Environment</label>
												<select type="text" name='envName' class="form-control">
													<?php
														while($row = $resEnvList->fetch_assoc())
														{
															echo '<option>'.$row["environment_name"].'</option>';
														}
													?>
													
												</select>
											</div>
										</div>
										<div class="col-md-2 ">
											<label></label>
											<button type="submit" class="btn btn-default btn-block" name='selection' >Select</button>
										</div>
										<div class="col-md-2 ">
											<label></label>
											<a href='addApp.php'> <button type="button" class="btn btn-default btn-block" >Add New Application</button></a>
										</div>
									</div>
									<?php
										if(isset($_POST['selection'])){
											if($_POST["envName"]!=''){
											$sql = 'SELECT app_name, app_desc ,app_logSource,a.environment_name as environment_name FROM xen_environments a,xen_application b where a.environment_ID = b.env_ID and a.environment_name ="'.$_POST["envName"].'"';
											$result = $conn->query($sql);
											
											}
											
										
										echo '<div class="row">';
										echo '<div class="content table-responsive table-full-width">';
												echo '<table class="table table-hover table-striped">';
												echo '<thead><th>Application Name</th> 	<th>Application Log Source </th> <th> Application Description </th><th> Environment In </th></thead>';
												echo '<tbody>';
													if($result->num_rows >0)
														{
															while($row = $result->fetch_assoc())
																{
																	echo '<tr>
																	<td>'. $row["app_name"].' </td>
																	<td>'.$row["app_logSource"].'</td>
																	<td>'.$row["app_desc"]. '</td>
																	<td>'.$row["environment_name"]. '</td>
																	</tr>';
																}
														}
												echo '</tbody>';
												echo '</table> </div> </div>';
										
										}
									?> 

									
									<div class="clearfix"></div>
								</form>
							</div>
						</div>
					</div>
					

				</div>
			</div>
		</div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                         <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
						<li>
                            <a href="#">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="http://www.xen.ai">
                                Company
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.xen.ai"</a>XEN.AI, Artificial Intelligence Innovations
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
