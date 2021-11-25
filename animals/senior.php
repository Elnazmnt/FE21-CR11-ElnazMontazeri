<?php require_once '../components/db_connect.php';
$sql = "SELECT * FROM animals WHERE age>8;";
$result = mysqli_query($connect, $sql);
$tbody = ''; 
if (mysqli_num_rows($result)  > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "
       <div class='col'>
       <div class='card mt-5 border-2 shadow' style='width: 18rem;' style='background-color: #eae9e4;'>
       <img src='pictures/" . $row['animal_photo'] . "' class='card-img-top' alt='...'>
       <div class='card-body'>
         <h4 class='card-title'>Name: " . $row['animal_name'] . "</h4>
         <p class='card-title'>Size: " . $row['size'] . "</p>
         <p class='card-title'>Age: " . $row['age'] . "</p>
         <p class='card-title'>Hobbies: " . $row['hobbies'] . "</p>
         <p class='card-title'>Breed: " . $row['breed'] . "</p>
         <p class='card-title'>Location: " . $row['location'] . "</p>
         <p class='card-text'>Description: " . $row['description'] . "</p>
         
         <div class='mt-2'>
         <a href='update.php?id=" . $row['animal_id'] . "'><button type='button' class='btn btn-outline'style='background-color:#02a0da'>Edit</button></a>
           <a href='delete.php?id=" . $row['animal_id'] . "'><button type='button' class='btn btn-outline'style='background-color:#a83b24'>Delete</button></a>
</div>

           
       </div>
     </div>
     </div>";
    };
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
                </svg> Display all senior animals <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                </svg></h3>
        </span>
    </ul>
    <!-- end heading -->

    <div class="mt-4">
        <a href="index.php">
            <button type="button" class="btn btn-lg" style="background-color: #6e9a44;font-family: 'Dancing Script', cursive;">Display all animals</button>
        </a>
       
        <a href="senior.php">
            <button type="button" class="btn btn-lg" style="background-color: #887d8a;font-family: 'Dancing Script', cursive;">Display all senior animals</button>
        </a>
        <hr>
        
    </div>
   

    <!-- start card -->

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?= $tbody; ?>
    </div>
    <!-- start card -->

</body>
</html>