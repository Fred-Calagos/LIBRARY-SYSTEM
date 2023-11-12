<?php
session_start();
include "inc/connect.php";

$maxLoginAttempts = 3; // Maximum number of login attempts allowed
$lockoutDuration = 15; // Lockout duration in seconds

if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if ($_SESSION['login_attempts'] >= $maxLoginAttempts) {
    $errorMessage = "Too many login attempts. <br>";
    $timeRemaining = $_SESSION['lockout_time'] - time();
    if ($timeRemaining > 0) {
        $errorMessage .= " Try again in <span id='countdown'>$timeRemaining</span> seconds.";
    }
}
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        $_SESSION['error'] = "Username is required";
        header("Location: admin-login.php");
        exit();
    } else if (empty($password)) {
        $_SESSION['error'] = "Password is required";
        header("Location: admin-login.php");
        exit();
    }
    if (isset($_SESSION['lockout_time']) && $_SESSION['lockout_time'] > time()) {
            $timeRemaining = $_SESSION['lockout_time'] - time();
            $errorMessage = "Too many login attempts.<br>Please try again in <span id='countdown'>$timeRemaining</span> seconds.";
    } else {
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_array($result);
            $_SESSION['username'] = $rows['UserName'];
            unset($_SESSION['login_attempts']); // Reset login attempts on successful login
            header('Location: source/admin/dashboard.php');
            exit();
        } else {
            $_SESSION['login_attempts']++;
                if ($_SESSION['login_attempts'] >= $maxLoginAttempts) {
                    $_SESSION['lockout_time'] = time() + $lockoutDuration;
                    $timeRemaining = $lockoutDuration;
                    $errorMessage = "Too many login attempts.<br>Please try again in <span id='countdown'>$timeRemaining</span> seconds.";
                    header("Location: admin-login.php");
                } else {
                    $remainingAttempts = $maxLoginAttempts - $_SESSION['login_attempts'];
                    $errorMessage = "Incorrect username or password!<br>$remainingAttempts attempts remaining.";
                    header("Location: admin-login.php");
                }
        }
    }

    if (isset($errorMessage)) {
        echo '<div class="error-message">' . $errorMessage . '</div>';
    }
} else {
    header("Location: admin-login.php");
    exit();
}
