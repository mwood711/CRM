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
            <a class="navbar-brand" href="#">
              <img src="https://www.kennesaw.edu/images/ksu-logo.png" width="50" height="50" class="d-inline-block align-top" alt="" loading="KSU">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto mt-4">
                    <li class="nav-item">
                        <a style="color: black;font-family: 'Roboto', sans-serif;" class="nav-link" href="index">Dashboard</a>
                    </li>
                   <li class="nav-item dropdown">
                        <a style="color: black;font-family: 'Roboto', sans-serif;" class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" href="#">Client</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <li class="dropdown-item"><a class="text-dark" href="addclient" >Add New Client</a></li>
                            <li class="dropdown-item"><a class="text-dark" href="clientlist" >Client List</a></li>                  
                        </ul>
                    </li>  
                    <li class="nav-item">
                      <a style="color: black;font-family: 'Roboto', sans-serif;" class="nav-link" href="faculty">Faculty</a>
                    </li>
                    <li class="nav-item">
                      <a style="color: black;font-family: 'Roboto', sans-serif;" class="nav-link" href="document">Documents</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="color: black;font-family: 'Roboto', sans-serif;" class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" href="#">More</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1">
                            <li class="dropdown-item"><a class="text-dark" href="company" >Company</a></li>
                            <li class="dropdown-item"><a class="text-dark" href="calender" >Calendar</a></li>
                            <li class="dropdown-item"><a class="text-dark" href="EventReport" >Event Report</a></li>                   
                        </ul>
                    </li>              
                     
                </ul>
                <div style="float: right; padding-right: 10px;">
                  <div class="nav-item dropleft">
                    <a style="color: black; font-family: 'Roboto', sans-serif;" class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown1">
                        <li class="dropdown-item"><a class="text-dark" href="" >User Profile</a></li>
                        <?php
                          if ($_SESSION['role'] == 'admin'){
                            echo '<li class="dropdown-item"><a class="text-dark" href="registration2.php" >Add User</a></li>';
                          }
                        ?>
                        <li class="dropdown-item"><a class="text-dark" href="logout.php" >Sign Out</a></li>                  
                    </ul>
                  </div>

                </div>
               
            </div>
        </div>

        
    </body>

</html>