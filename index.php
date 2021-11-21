<?php
session_start();
require_once "components/db_connect.php";

if (isset($_SESSION["user"]) != "") {
    header("Location: home.php");
    exit;
}
if (isset($_SESSION["adm"]) != "") {
    header("Location: dashBoard.php");
}

$error = false;
$email = $password = $emailError = $passwordError = "";

if (isset($_POST["btn-login"])) {
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    if (empty($email)) {
        $error = true;
        $emailError = "Please enter your email address.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    }

    if (empty($password)) {
        $error = true;
        $passwordError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

        $password = hash('sha256', $password); // password hashing

        $sql = "SELECT id, first_name, password, status FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($count == 1 && $row['password'] == $password) {
            if ($row['status'] == 'adm') {
                $_SESSION['adm'] = $row['id'];
                header("Location: dashBoard.php");
            } else {
                $_SESSION['user'] = $row['id'];
                header("Location: home.php");
            }
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }
    }
}


mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration System</title>
    <?php require_once 'components/boot.php' ?>

</head>

<body style="background-image: url('photo.jpg');background-attachment: fixed; background-size: cover; " class="container">

  <!-- start heading -->
<nav class="navbar navbar-light" style="background-color: #dbaf96;">
  <div class="container-fluid ">
    <span class="navbar-brand mb-0 "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
</svg> Adopt a Pet & enjoy life <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"/>
</svg></span>
  </div>
</nav>
  <!-- end heading -->

   
    <div class=" container mt-3  p-2 text-dark bg-opacity-50 rounded mx-auto" style="background-color:#ccaf9b ;opacity:0.8; width: 40vw; min-width: 300px; margin: auto;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        
            <h2>LogIn</h2>
            <hr />
            <?php
            if (isset($errMSG)) {
                echo $errMSG;
            }
            ?>

            <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
            <span class="text-danger"><?php echo $emailError; ?></span>

            <input type="password" name="password" class="form-control mt-3" placeholder="Your Password" value="<?php echo $password; ?>" maxlength="15" />
            <span class="text-danger"><?php echo $passwordError; ?></span>
            <hr />
            <button class="btn btn-block " style="background-color: #d02a2a;" type="submit" name="btn-login">Sign In</button>
            <hr />
            <a href="register.php" style="background-color: burlywood;">Not registered yet? Click here</a>
        </form>
    </div>
</body>

</html>