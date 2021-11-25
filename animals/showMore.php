<?php require_once '../components/db_connect.php';
if ($_GET["id"]) {
    $id = $_GET["id"];
$sql = "SELECT * FROM animals where animal_id= {$id}";
$result = mysqli_query($connect, $sql);}
$tbody = ''; 
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "
       
     
     
     <div class='card' style='background-color: #eae9e4;'>
  
  <img src='pictures/" . $row['animal_photo'] . "' class='card-img' alt='...'>
  <div class='card-img-overlay'>
  <h1 class='card-title'style='background-color:#f0eeef ;opacity:0.8;'>Name: " . $row['animal_name'] . "</h1>
  <h3 class='card-title'>Size: " . $row['size'] . "</h3>
  <h3 class='card-title'>Age: " . $row['age'] . "</h3>
  <h3 class='card-title'>Hobbies: " . $row['hobbies'] . "</h3>
  <h3 class='card-title'>Breed: " . $row['breed'] . "</h3>
  <h3 class='card-title'>Location: " . $row['location'] . "</h3>
  <h3 class='card-text'>Description: " . $row['description'] . "</h3>
  </div>"; };
} else {
    $tbody =   "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals</title>
    <?php require_once '../components/boot.php' ?>
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

    <div class="mt-4">
        <a href="create.php">
            <button type="button" class="btn btn-lg" style="background-color: #6e9a44;font-family: 'Dancing Script', cursive;">Add New Pet</button>
        </a>
       
        <a href="index.php">
            <button type="button" class="btn btn-lg" style="background-color: #887d8a;font-family: 'Dancing Script', cursive;">Home</button>
        </a>
        <hr>
        
    </div>
   

    <!-- start card -->

   
        <?= $tbody; ?>
   
    <!-- start card -->

</body>
</html>