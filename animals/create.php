<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Aminal</title>
    <?php require_once  '../components/boot.php' ?>
</head>
<body style="background-image: url('photo.jpg');background-attachment: fixed; background-size: cover; " class="container">
    <!-- start Form -->
    
        <legend class="mt-4 h2" style="color: black;font-family: 'Dancing Script', cursive;background-color:#f7e8e3 ;opacity:0.8;">Add cute Animal</legend>
        <div class="mt-3  p-2 text-dark bg-opacity-50" style="background-color:#f7e8e3 ;opacity:0.8;">
          
            <form action ="actions/a_create.php" method= "post"  enctype="multipart/form-data">
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">Name</label>
                    <input type="text" class="form-control" name="animal_name" id="validationCustom01" required>
                    
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">choose Image</label>
                    <input class="form-control" type="file" name="animal_photo" id="formFile">
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">Size</label>
                    <input type="text" class="form-control" name="size" id="validationCustom01" required>

                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">Age</label>
                    <input type="text" class="form-control" name="age" id="validationCustom01" required>

                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">Hobbies</label>
                    <input type="text" class="form-control" name="hobbies" id="validationCustom01" required>

                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">Breed</label>
                    <input type="text" class="form-control" name="breed" id="validationCustom01" required>

                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">Location</label>
                    <input type="text" class="form-control" name="location" id="validationCustom01" required>

                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label mt-2 fs-6">Description</label>
                    <input type="text" class="form-control" name="description" id="validationCustom01" required>

                </div>
                <button type="submit" class="btn btn-outline-dark mt-4" style="background-color:#025b0e;">Insert Item </button>
                <a href="index.php">
                    <button type="button" class="btn btn-outline-dark mt-4" style="background-color:#fa448c;">Home</button>
                </a>
            </form>
    
    <!-- end Form -->
</body>
</html>