<?php
require_once "../../components/db_connect.php";
require_once  "../../components/file_upload.php";

if ($_POST) { 
$animal_name = $_POST["animal_name"];
$animal_photo =file_upload($_FILES["animal_photo"]);
$location = $_POST["location"];
$description = $_POST["description"];
$size = $_POST["size"];
$age = $_POST['age'];
$hobbies = $_POST['hobbies'];
$breed = $_POST['breed'];
$uploadError = '';

$sql="INSERT INTO animals(animal_name, animal_photo, location, description, size, age, hobbies, breed) VALUES
('$animal_name','$animal_photo->fileName','$location', '$description','$size','$age','$hobbies', '$breed')";

if (mysqli_query($connect, $sql)=== true){
    $class = "success";
    $message = "The entry below was successfully created <br>
    
    
        <table class='table w-50'>
        <tr>
       
        <th >name</th>
        <th >age</th> 
        <th >hobbies </th>
        <th >location</th>
        <th >breed</th>
       

    </tr>
        <tr>
       
        <td>$animal_name</td>
        <td>$age </td>
        <td>$hobbies</td>
        <td>$location</td>
        <td>$breed</td>
       
        </tr></table><hr>";
        
    $uploadError = ($animal_photo->error !=0)? $animal_photo ->ErrorMessage :'';

} else {
    $class = "danger";
    $message = "Error while creating record. Try again: <br>" . $connect->error;
    $uploadError = ($animal_photo->error !=0)? $animal_photo->ErrorMessage :'';
}

mysqli_close($connect);
} else {
    header("location: ../error.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
    <?php require_once "../../components/boot.php"?>
</head>
<body style="background-image: url('photo.jpg');background-attachment: fixed; background-size: cover; " class="container">
    

<div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>"  role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
               <p><?php echo ($uploadError) ?? '' ; ?></p>
                <a href='../index.php'><button class="btn btn-primary"  type='button'>Home</button></a>
            </div>
       </ div>


</body>
</html>