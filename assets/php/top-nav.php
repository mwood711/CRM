<!DOCTYPE html>
<html>

    <head>
        
       <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet"> 

       <style>
           .navbar-custom {
            background-color: #febc11;
           }
        
       </style>
    </head>

    <body>

        <div class="navbar navbar-expand-md navbar-custom mb-4" role="navigation">
            <a class="navbar-brand" href="index">
              <img src="https://www.kennesaw.edu/images/ksu-logo.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="KSU">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto mt-4 nav" style="padding-bottom: 20px">
                    <li class="nav-item">
                        <a class="ref" style="color: black;font-family: 'Roboto', sans-serif; "  href="index">Dashboard</a>
                    </li>
                     <li class="nav-item">
                        <a class="ref" style="color: black;font-family: 'Roboto', sans-serif; "  href="clientlist">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="ref" style="color: black;font-family: 'Roboto', sans-serif; "  href="company">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="ref" style="color: black;font-family: 'Roboto', sans-serif; "  href="faculty">Faculty</a>
                    </li>
                    <li class="nav-item">
                        <a class="ref" style="color: black;font-family: 'Roboto', sans-serif; "  href="events">Events</a>
                    </li>
                      <li class="nav-item">
                        <a class="ref" style="color: black;font-family: 'Roboto', sans-serif; "  href="calender">Calendar</a>
                    </li>
                    </li>
                      <li class="nav-item">
                        <a class="ref" style="color: black;font-family: 'Roboto', sans-serif; "  href="ContactLog">Contact Log</a>
                    </li>
                    
                    <?php 


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



                        
                        if ($role == 'admin')
                        {
                            echo "<li class=\"nav-item\">
                        <a class=\"ref\" style=\"color: black;font-family: 'Roboto', sans-serif; \"  href=\"Users.php\">Users</a>
                        </li>"; 
                        }
                    ?>
                              


                     
                </ul>
                <div style="float: right; padding-right: 10px;">
                  <div class="nav-item dropleft">
                    <a style="color: black; font-family: 'Roboto', sans-serif;" class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown1">
                        <li class="dropdown-item"><a class="text-dark" href="userProfile.php" >User Profile</a></li>
                        
                        <li class="dropdown-item"><a class="text-dark" href="logout.php" >Sign Out</a></li>                  
                    </ul>
                  </div>

                </div>
               
            </div>
        </div>

        
    </body>

</html>