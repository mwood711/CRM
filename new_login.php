<?php
    ob_start();
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Login Page</title>
</head>
<body>
    <h1>Please Login to Continue!</h1>

    <?php
        $msg = '';


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
                header("location: /crm");
            } else {
                $msg = "Incorrect username or password";
            }
        }
    ?>

    <form action="" method="post">
        <h4><?php echo $msg;?></h4>
        <input type="text" name="username" placeholder="Username" required autofocus></br>
        <input type="password" name="password" placeholder="Password" required></br>
        <button type="submit" name="logon">Login!</button>
    </form>
</body>
</html>