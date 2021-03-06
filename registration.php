<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    include_once('./classes/user.php');
    $user = new User();
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $user->username = stripslashes($_REQUEST['username']);
        $user->username = strtolower($user->username);
        //$username = mysqli_real_escape_string($con, $username);
        $user->email = stripslashes($_REQUEST['email']);
        $user->email = strtolower($user->email);
        //$email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        //$password = mysqli_real_escape_string($con, $password);

        $response =$user->register($user->username, $user->email, $user->password);
        
        if ($response) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
            require_once'C:\Users\Talha Ahmed\vendor\autoload.php';
            require_once'gmail_credentials.php';

            // create the Transport
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
                ->setUsername(EMAIL)
                ->setPassword(PASS);

            // create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            $message = (new Swift_Message('Registration Notification'))
                ->setFrom([EMAIL => 'Talha Ahmed'])
                ->setTo([$user->email])
                ->setBody("You're registered successfully");

            // send the message

            $result = $mailer->send($message);

        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account?&nbsp<a href="login.php">Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>