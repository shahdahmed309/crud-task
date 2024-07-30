<?php
include "db.php";

// الحصول على معرف المستخدم من رابط URL
$id = $_GET['id'];

// استعلام لجلب بيانات المستخدم من قاعدة البيانات
$sql = "SELECT * FROM crud WHERE id = $id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // استعلام لتحديث بيانات المستخدم في قاعدة البيانات
    $sql = "UPDATE crud SET first_name='$first_name', last_name='$last_name', email='$email', gender='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: read.php?msg=Data updated successfully");
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>CRUD APP</title>
</head>
<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color:antiquewhite;">
    PHP CRUD APPLICATION
   </nav> 

   <div class="container">
    <div class="text-center mb-4">
        <h3>Edit User Information</h3>
        <p class="text-muted">Click update after changing any Information</p>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'] ?>">
                </div>

                <div class="col">
                    <label class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'] ?>">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
            </div>

            <div class="form-group mb-3">
                <label>Gender:</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($row['gender']=='male')?"checked":""; ?>>
                <label for="male" class="form-input-label">Male</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($row['gender']=='female')?"checked":""; ?>>
                <label for="female" class="form-input-label">Female</label>
            </div>

            <div>
                <button type="submit" class="btn btn-success" name="submit">Update</button>
                <a href="read.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
