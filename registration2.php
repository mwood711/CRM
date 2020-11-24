<?php 

    session_start();
    if ($_SESSION['role'] != 'admin')
    {
        header('location:login2.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Login Page</title>
</head>
<body>
    <h1>Register</h1>

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
            $role=$_POST['role'];

            $sql = "INSERT INTO  Login (username, password, role) VALUES ('$username', '$password', '$role')";
            $stmt = sqlsrv_query( $conn, $sql );

            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }

            header('location:index.php'); 
            exit(); 

            sqlsrv_free_stmt( $stmt);

        }
    ?>

    <form action="" method="post">
        
        <input type="text" name="username" placeholder="Username" required autofocus></br>
        <input type="password" name="password" placeholder="Password" required></br>
        <label for="roles">Choose role:</label>
        <select id="roles" name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br/> 
        <button type="submit">Register</button>
    </form>
</body>
</html>