
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!---added 10/28--->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!---end added-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Login Page</title>

    <!-- Added 10/28-->
    <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/ksu-favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Pe-icon-7-stroke -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <!-- style css -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" />
    <style>
    	img {
    			display: block;
    			margin-left: auto;
    			margin-right: auto;
    	}
    </style>
    <!-- end added -->

</head>

<body>
    <!-- Site wrapper-->
	<!-- added 10/28 -->
    <div class="wrapper">
    <header class="main-header"> 
        <!-- Logo -->
    	<span class="logo-lg">
    		<img src="assets/dist/img/ksu.png" alt="" style="width:20%;">
    	</span>
    </div>
	</header>

    <?php
        


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $serverName = "localhost";
            $connectionInfo = array( "Database"=>"CRM");
            $conn = sqlsrv_connect( $serverName, $connectionInfo );

            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            } 
            
            $username=$_POST['username'];
            $password=$_POST['password'];

            $sql = "Select  * FROM Login WHERE username='".$username."' and password='".$password."' ";
            $stmt = sqlsrv_query( $conn, $sql );

            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }

            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
            {
            
                session_start();
                $_SESSION['id']=$row['id'];
                header('location:index.php');

            }

            

            sqlsrv_free_stmt( $stmt);

        }
    ?>


<!-- aded 10/28-->
<!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="container-center">
            <div class="login-area">
                <div class="card panel-custom">
                    <div class="card-heading custom_head"> 
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Login</h3>
                                <small><strong>Please enter your credentials to login.</strong></small>
                            </div>
                        </div>
                    </div>
    	<div class ="card body">
   			 <form action="login2.php" method="post" id="loginForm" validate>

    	<!-- username section -->
    	<div class="form-group">
    		<center>
    		<label class="control-label" for="username">Username</label><br>
    		<input type="text" name="username" placeholder="Username" required autofocus>
    		</center>
    	</div>

    	<!-- password section -->
    	<div class="form-group">
    		<center>
            <label class="control-label" for="password">Password</label><br>
            <input type="password" name="password" placeholder="Password" required>
        	</center>
        </div>

        <!-- submit button -->
        <div>
        	<center>
           <button class="btn green_btn" type="submit" name="login">Login</button>
       		</center>
        </div>
        
        <!-- 
        <input type="text" name="username" placeholder="Username" required autofocus></br>
        <input type="password" name="password" placeholder="Password" required></br>
        <button type="submit" name="logon">Login!</button> -->

    </form>

    <!-- jQuery -->
      <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" ></script>
      <!-- Bootstrap proper -->
      <script src="assets/bootstrap/js/popper.min.js" ></script>
       <!-- Bootstrap -->
       <script src="assets/bootstrap/js/bootstrap.min.js" ></script>

</body>
</html>




