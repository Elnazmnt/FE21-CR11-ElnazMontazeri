<?php
require_once "../../components/db_connect.php";
require_once  "../../components/file_upload.php";

if ($_POST) {
    $id = $_POST['animal_id'];
    $animal_name = $_POST['animal_name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $hobbies = $_POST['hobbies'];
    $breed = $_POST['breed'];
    $uploadError = '';
    $animal_photo = file_upload($_FILES['animal_photo']);
    if ($animal_photo->error === 0) {
        ($_POST["animal_photo"] == "default.jpg") ?: unlink("../pictures/$_POST[animal_photo]");
        $sql = "UPDATE animals SET animal_name = '$animal_name', location = '$location', animal_photo = '$animal_photo->fileName' ,description = '$description', size = '$size',age = '$age',hobbies = '$hobbies',breed = '$breed'  WHERE animal_id = {$id}";
    } else {
        $sql = "UPDATE animals SET animal_name = '$animal_name', location = '$location' ,description = '$description', size = '$size',age = '$age',hobbies = '$hobbies',breed = '$breed'  WHERE animal_id = {$id}";
    }


    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($animal_photo->error !=0)? $animal_photo->ErrorMessage :'';
    } else {
       
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_error($connect);
        $uploadError = ($animal_photo->error !=0)? $animal_photo->ErrorMessage :'';
       
    }
    mysqli_close($connect);    
} 
else {
    header("location: ../error.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../../components/boot.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
</body>

</html>