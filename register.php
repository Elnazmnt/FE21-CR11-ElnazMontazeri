<?php
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}
if (isset($_SESSION["adm"]) != "") {
    header("Location: dashBoard.php");
}


require_once "components/db_connect.php";
require_once "file_upload.php";
$error = false;
$first_name = $last_name = $phone_number = $address = $picture = $email = $password = '';
$first_nameError = $last_nameError = $phone_numberError = $addressError = $pictureError = $emailError = $passwordError = '';

if (isset($_POST['btn-signup'])) {


    $first_name = trim($_POST['first_name']);
    $first_name = strip_tags($first_name);
    $first_name = htmlspecialchars($first_name);



    $last_name = trim($_POST['last_name']);
    $last_name = strip_tags($last_name);
    $last_name = htmlspecialchars($last_name);

    $phone_number = trim($_POST['phone_number']);
    $phone_number = strip_tags($phone_number);
    $phone_number = htmlspecialchars($phone_number);

    $address = trim($_POST['address']);
    $address = strip_tags($address);
    $address = htmlspecialchars($address);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);



    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    $uploadError = '';
    $picture = file_upload($_FILES['picture']);



    // basic name validation
    if (empty($first_name) || empty($last_name)) {
        $error = true;
        $first_nameError = "Please enter your full name and surname";
    } else if (strlen($first_name) < 3 || strlen($last_name) < 3) {
        $error = true;
        $first_nameError = "Name and surname must have at least 3 characters.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $first_name) || !preg_match("/^[a-zA-Z]+$/", $last_name)) {
        $error = true;
        $first_nameError = "Name and surname must contain only letters and no spaces.";
    }

    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }

    // phone validation
    if (empty($phone_number)) {
        $error = true;
        $phone_numberError = "Please enter your phone number.";
    } else if (strlen($phone_number) < 10) {
        $error = true;
        $phoneError = "phone number must have at least 10 digits.";
    }
    // password validation
    if (empty($password)) {
        $error = true;
        $passwordError = "Please enter password.";
    } else if (strlen($password) < 6) {
        $error = true;
        $passwordError = "Password must have at least 6 characters.";
    }
    // address  validation
    if (empty($address)) {
        $error = true;
        $addressError = "Please enter address.";
    } else if (strlen($address) < 0) {
        $error = true;
        $addressError = "Please enter your address.";
    }

    // password hashing for security
    $password = hash('sha256', $password);
    // if there's no error, continue to signup
    if (!$error) {



        $query = "INSERT INTO users(first_name,last_name,phone_number,address,picture,email,password)
                 VALUES('$first_name','$last_name','$phone_number','$address','$picture->fileName','$email','$password')";



        $res = mysqli_query($connect, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
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

    <style>
        form {
            width: 40vw;
            min-width: 300px;
            margin: auto;
        }
    </style>
</head>

<body style="background-image: url('photo.jpg');background-attachment: fixed; background-size: cover; " class="container">
    <!-- start heading -->
    <ul class="nav justify-content-center sticky-top" style="background-color: #dbaf96;">

        <span class="navbar-brand mb-0 ">
            <h3><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                </svg> Adopt a Pet & enjoy life <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                </svg></h3>
        </span>
    </ul>
    <!-- end heading -->
    <div class="container">
    
    <div class="mt-3  p-2 text-dark bg-opacity-50 pt-0 mt-0" style="background-color:#f7e8e3 ;opacity:0.8;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
            <h2>Sign Up.</h2>
            <hr />
            <?php
            if (isset($errMSG)) {
            ?>
                <div class="alert alert-<?php echo $errTyp ?>">
                    <p><?php echo $errMSG; ?></p>
                    <p><?php echo $uploadError; ?></p>
                </div>

            <?php
            }
            ?>




            <input type="text" name="first_name" class="form-control mt-3" placeholder="First name" maxlength="50" value="<?php echo $first_name ?>" />
            <span class="text-danger"> <?php echo $first_nameError; ?> </span>

            <input type="text" name="last_name" class="form-control mt-3" placeholder="Last name" maxlength="50" value="<?php echo $last_name ?>" />
            <span class="text-danger"> <?php echo $first_nameError; ?> </span>

            <input type="text" name="phone_number" class="form-control mt-3" placeholder="Enter Your phone number" maxlength="40" value="<?php echo $phone_number ?>" />
            <span class="text-danger"> <?php echo $phone_numberError; ?> </span>

            <input type="text" name="address" class="form-control mt-3" placeholder="Enter Your address" maxlength="40" value="<?php echo $address ?>" />
            <span class="text-danger"> <?php echo $addressError; ?> </span>

            <div class="d-flex">
                <input class='form-control mt-3 w-50' type="email" name="email" placeholder="Enter Your Email" value="<?php echo $email ?>" />
                <span class="text-danger"> <?php echo $emailError; ?> </span>

                <input class='form-control mt-3 w-50' type="file" name="picture">
                <span class="text-danger"> <?php echo $pictureError; ?> </span>
            </div>
            <input type="password" name="password" class="form-control mt-3" placeholder="Enter Password" maxlength="15" />
            <span class="text-danger"> <?php echo $passwordError; ?> </span>
            <hr />
            <button type="submit" class="btn btn-block btn-danger" name="btn-signup">Sign Up</button>
            <hr />
            <a href="index.php">Sign in Here...</a>
        </form>
    </div>
        </div>
</body>

</html>