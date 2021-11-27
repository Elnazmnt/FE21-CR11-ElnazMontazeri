<?php
session_start();
require_once 'components/db_connect.php';


$sql = "SELECT * FROM animals";
$result = mysqli_query($connect, $sql);
$tbody = ''; 
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "
       <div class='col'>
       <div class='card mt-5 border-2 shadow' style='width: 18rem;' style='background-color: #eae9e4;'>
       <img src='animals/pictures/" . $row['animal_photo'] . "' class='card-img-top' alt='...'>
       <div class='card-body'>
         <h4 class='card-title'>Name: " . $row['animal_name'] . "</h4>
         <p class='card-title'>Size: " . $row['size'] . "</p>
         <p class='card-title'>Age: " . $row['age'] . "</p>
         <p class='card-title'>Hobbies: " . $row['hobbies'] . "</p>
         <p class='card-title'>Breed: " . $row['breed'] . "</p>
      
         <a href='showMore.php?id=" . $row['animal_id'] . "' class='btn 'style='background-color: #6e9a44;font-family: 'Dancing Script', cursive;'>Show More Infos</a>
         <div class='mt-2'>
</div> 
       </div>
     </div>
     </div>";
    };
} else {
    $tbody =   "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
   header("Location: dashboard.php");
   exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
   header("Location: index.php");
   exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome Dear :<?php echo $row['first_name']; ?></title>
<?php require_once 'components/boot.php'?>

</head>
<body style="background-image: url('photo.jpg');background-attachment: fixed; background-size: cover; " class="container">
<div class="container">
   <div class="hero" style="background-color: #8c7b73;">
       <img class="userImage rounded img-thumbnail" src="picture/<?php echo $row['picture']; ?>" style="width: 200px;height: 200px;" alt="<?php echo $row['first_name']; ?>">
       <h3 class="text-white" >Hi Dear <?php echo $row['first_name']; ?></h3>
       <hr>
       <a href="logout.php?logout">
       <button type="button" class="btn btn-outline-danger">Sign Out</button> </a> 
   <a href="update.php?id=<?php echo $_SESSION['user'] ?>"><button type="button" class="btn btn-outline-secondary">Update your profile</button> </a>
   </div>
   </div>
   <br>
   <a href="senior.php">
            <button type="button" class="btn btn-lg" style="background-color: #887d8a;font-family: 'Dancing Script', cursive;">Display all senior animals</button>
        </a>

  <!-- start card -->

  <div class="row row-cols-1 row-cols-md-3 g-4">
        <?= $tbody; ?>
    </div>
    <!-- start card -->

</body>
</html>