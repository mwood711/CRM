  <?php 

    session_start();
    $id = $_SESSION['id'];
     require('dbconfig.php');
     $sql = "SELECT role FROM Login where id = '".$id."'";
     $stmt = sqlsrv_query( $conn, $sql );
     if( $stmt === false) {
     die( print_r( sqlsrv_errors(), true) );
     }
     while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        
        $role = $row['role'];
     }
     sqlsrv_free_stmt( $stmt);
    if ($role != 'admin')
    {
        header('location:login2.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Register</title>
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/dist/img/ico/ksu-favicon.png" type="image/x-icon">
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
         <!-- Pe-icon-7-stroke -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" />
        <!-- style css -->
        <link href="assets/dist/css/stylecrm.css" rel="stylesheet" />
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" "/>-->
    <!-- Logo style -->
    <style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    </style> 
    </head>
    <body>
        <!-- Site wrapper -->
        <div class="wrapper">
        <header class="main-header"> 
            <!-- Logo -->
        <span class="logo-lg">
        <img src="assets/dist/img/ksu.png" alt="" style="width:20%;">
        </span>
        </div>
        </header>   
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="container-center lg">
             <div class="login-area">
                <div class="card  panel-custom">
                    <div class="card-heading custom_head">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-unlock"></i>
                            </div>
                            <div class="header-title">
                                <h3>Register</h3>
                                <small><strong>Please enter your data to register.</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="registerQuery.php" method="POST" validate>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    <input type="text" value="" id="username" class="form-control" name="username" required >
                                    <span class="help-block small">Your unique username to app</span>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" value="" id="password" class="form-control" name="password" required>
                                    <span class="help-block small">Your hard to guess password</span>
                                </div>
                                <div class="form-group col-lg-6 mb-4">
                                    <label>Role</label>
                                    <select class="form-control" name="role" required>
                                        <option selected value="role">--Select Role Type--</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>

    
                                    </select>
                                </div>
                        </div>
                                                                
                            <div>
                                <button class="btn btn-warning" type="submit" name="submit" value="Add">Register</button>
                                <a class="btn green_btn" href="index.php">Back to Home</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- jQuery -->
      <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" ></script>
      <!-- Bootstrap proper -->
      <script src="assets/bootstrap/js/popper.min.js" ></script>
       <!-- Bootstrap -->
       <script src="assets/bootstrap/js/bootstrap.min.js" ></script>
    </body>
</html>