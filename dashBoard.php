<?php
session_start();
require_once 'components/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: index.php");
   exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
   header("Location: home.php");
   exit;
}

$id = $_SESSION['adm'];
$status = 'adm';
$sql = "SELECT * FROM users WHERE status != '$status'";
$result = mysqli_query($connect, $sql);

//this variable will hold the body for the table
$tbody = '';
if ($result->num_rows > 0) {
   while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
       $tbody .= "<tr>
           <td><img class='img-thumbnail rounded-circle' src='picture/" . $row['picture'] . "' alt=" . $row['first_name'] . "></td>
           <td>" . $row['first_name'] . " " . $row['last_name'] . "</td>
           <td>" . $row['phone_number'] . "</td>
           <td>" . $row['address'] . "</td>
           <td>" . $row['email'] . "</td>
           
           <td><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
           <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
        </tr>";
   }
} else {
   $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}


mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Adm-DashBoard</title>
   <?php require_once 'components/boot.php'?>
   <style type="text/css">       
       .img-thumbnail{
           width: 70px !important;
           height: 70px !important;
       }
       td
       {
           text-align: left;
           vertical-align: middle;
       }
       tr
       {
           text-align: center;
       }
       .userImage{
width: 100px;
height: auto;
}
   </style>
</head>
<body style="background-image: url('photo.jpg');background-attachment: fixed; background-size: cover; " class="container">
<div class="container">
   <div class="row">
       <div class="col-2 bg-light mt-2">
       <img class="userImage" src="picture/eli.jpg" alt="Adm avatar">
       <p class="bg-light">Administrator</p>

       <button type="button" class="btn" style="background-color: #d73d6c;"><a href="logout.php?logout"><p style="color:cornsilk">Sign Out</p></a></button>
       <button type="button" class="btn btn-lg mt-3" style="background-color: #d39b75;">
       <a href="animals/index.php"><p style="color:cornsilk">Edit Animals</p></a>
    </button>
        
       </div>
       <div class="col-8 mt-2 " style="background-color: #f7e8e3;">
       <p class='h2'>Users</p>
       <table class='table table-striped bg-light'>
           <thead class='table-success'>
               <tr>
                   <th>Picture</th>
                   <th>Name</th>
                   <th>phone Number</th>
                   <th>Address</th>
                   <th>Email</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
           <?=$tbody?>
           </tbody>
       </table>
       </div>
   </div>
</div>
</body>
</html>