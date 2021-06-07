<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    session_start();
    include_once('user.php');
    $user = new User();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']); // removes backslashes
        $password = stripslashes($_REQUEST['password']);
        // Check if user exists in the database

        $result = $user->login($username, $password);
        
        if ($result == 1) { 
            $_SESSION['username'] = $username;
            if($username == 'Admin'){
                header('Location: admin_panel.php');
            }else{       
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account?&nbsp;<a href="registration.php">Register</a></p>
  </form>
<?php
    }
?>
</body>
</html>