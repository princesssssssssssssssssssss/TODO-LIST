<?php
include "controller.php";

$id = $_GET['id'];
$sqlGet = "SELECT * FROM tasks WHERE id='$id'";
$queryGet = mysqli_query($conn, $sqlGet);
$data = mysqli_fetch_assoc($queryGet);

if(isset($_POST["submit"])){
    $id = $_GET['id'];
    $Tugas = $_POST["Tugas"];
    $Deadline = $_POST["Deadline"];
    $Keterangan = $_POST["Keterangan"];
    
    $sqlUpdate = "UPDATE tasks 
                  SET Tugas='$Tugas', Deadline='$Deadline', Keterangan='$Keterangan' 
                  WHERE id='$id'";
    
    $queryUpdate = mysqli_query($conn, $sqlUpdate);
    
    if ($queryUpdate) {
        header("location: index.php");
        exit; // Exit after redirection
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>DAILY TO DO</title>
</head>
<body>
    <div class="w-50 mx-auto border p-3 mt-5">
    <h2>To Do List</h2>
    <form action="" method="POST">
        <div class="mb-4 mt-4">
            <label for="Tugas" class="form-action">Tugas</label>
            <input type="text" id="Tugas" class="form-control" name="Tugas" value="<?php echo $data['Tugas']; ?>" placeholder=" Example input Tugas" required>
        </div>
        <div class="mb-4">
            <label for="Deadline" class="form-action">Deadline</label>
            <input type="date" class="form-control" id="Deadline" name="Deadline" value="<?php echo $data['Deadline']; ?>" placeholder="Deadline" required>
        </div>
        <div class="mb-4">
            <label for="Keterangan" >Keterangan</label>
            <select name="Keterangan" class="form-select" id="Keterangan">
                <option>Pilih Keterangan</option>
                <option value="Selesai" <?php if ($data['Keterangan'] == 'Selesai') echo 'selected'; ?>>Selesai</option>
                <option value="Sedang Proses" <?php if ($data['Keterangan'] == 'Proses') echo 'selected'; ?>>Sedang Proses</option>
                <option value="Belum Selesai" <?php if ($data['Keterangan'] == 'Belum Selesai') echo 'selected'; ?>>Belum Selesai</option>
            </select>
        </div>
       
        <button type="submit" class="btn btn-primary btn-sm mt-3" name="submit">Submit</button>
        <a href="index.php" class="btn btn-primary btn-sm mt-3">Home</a>
    </form>
    </div>
</body>
</html>
