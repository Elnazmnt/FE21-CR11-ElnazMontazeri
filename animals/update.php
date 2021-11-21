<?php
require_once "../components/db_connect.php";

if ($_GET["id"]) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM animals WHERE animal_id = {$id}";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);

        $animal_name = $data['animal_name'];
        $location = $data['location'];
        $animal_photo = $data['animal_photo'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $hobbies = $data['hobbies'];
        $breed = $data['breed'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Item</title>
    <?php require_once '../components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body style="background-image: url('photo.jpg');background-attachment: fixed; background-size: cover; " class="container">

    <!-- start Form -->
    <legend class="mt-4 h2" style="color: black;font-family: 'Dancing Script', cursive;background-color:#f7e8e3 ;opacity:0.8;">Add cute Animal</legend>
    <div class="mt-3  p-2 text-dark bg-opacity-50" style="background-color:#f7e8e3 ;opacity:0.8;">
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label mt-2 fs-6">Name</label>
                <input type="text" class="form-control" name="animal_name" id="validationCustom01" value="<?php echo $data['animal_name'] ?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label mt-2 fs-6">choose Image</label>
                <input class="form-control" type="file" name="animal_photo" id="formFile">
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label mt-2 fs-6">Size</label>
                <input type="text" class="form-control" name="size" id="validationCustom01" value="<?php echo $data['size'] ?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label mt-2 fs-6">Age</label>
                <input type="text" class="form-control" name="age" id="validationCustom01" value="<?php echo $data['age'] ?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label mt-2 fs-6">Hobbies</label>
                <input type="text" class="form-control" name="hobbies" id="validationCustom01" value="<?php echo $data['hobbies'] ?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label mt-2 fs-6">Breed</label>
                <input type="text" class="form-control" name="breed" id="validationCustom01" value="<?php echo $data['breed'] ?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label mt-2 fs-6">Location</label>
                <input type="text" class="form-control" name="location" id="validationCustom01" value="<?php echo $data['location'] ?>" required>
            </div>
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label mt-2 fs-6">Description</label>
                <input type="text" class="form-control" name="description" id="validationCustom01" value="<?php echo $data['description'] ?>" required>
                <button type="submit" class="btn btn-outline-dark mt-4" style="background-color:#025b0e;">Save Changes </button>
                <a href="index.php"> </a>
                <button type="button" class="btn btn-outline-dark mt-4" style="background-color:#fa448c;"><a href="index.php">Back to Home </a></button>
                <input type="hidden" name="animal_id" value="<?php echo $data['animal_id'] ?>" />
                <input type="hidden" name="animal_photo" value="<?php echo $data['animal_photo'] ?>" />
        </form>
    </div>
    <!-- end form -->
</body>

</html>