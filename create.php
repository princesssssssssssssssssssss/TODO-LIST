<?php
include "controller.php";

if (isset($_POST["submit"])) {
    create($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>DAILY TO DO</title>

</head>
<body>
    <form action="" method="POST">
    <span class="BorderTopBottom"></span>
    <span class="BorderLeftRight"></span>
    <h1>TO DO LIST</h1>
    <div class="w-75 mx-auto">   
    <div>
        <label for="Tugas" class="form-action">Tugas</label><br>
        <input type="text" id="Tugas" class="form-control" name="Tugas" placeholder=" To Do List" required><br>
    </div>
    <div class="mb-0">
        <label for="Deadline" class="form-action">Deadline</label><br>
        <input type="date" class="form-control" id="Deadline" name="Deadline" placeholder="Deadline" required><br>
    </div>
    <div class="mb-0">
        <label for="Keterangan" class="form-action">Keterangan</label><br>
        <input type="text" class="form-control" id="Keterangan" name="Keterangan" placeholder="Input keterangan"required><br>
    </div>
    <div class="button-container">
        <button type="submit" class="btn " name="submit">Submit</button><br>
        <a href="index.php" class="btn ">Home</a><br> 
    </div>
    </form>
    </div>
    <!-- <div class="alert alert-success">New record created successfully <a href="index.php">view data</a></div>
    <div class="alert alert-danger">error <a href="index.php">view data</a></div>     -->
</body>
</html>