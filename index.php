<?php

include "controller.php";

if(isset($_POST["submit"])){
    create($_POST);
}

$rows = view(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <title><?php echo "WELCOME TO DAILY TO DO";?></title>
    <link rel="stylesheet" type="text/css" href="datatables/datatables.css">
    <script type="text/javascript" src="datatables/datatables.js"></script>
 
</head> 


<script type="text/javascript">
    $(document).ready(function() {
        $('#dt').DataTable();
    });
</script>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5 fs-1";>DAILY TO DO LIST</nav>
  </nav>
    <div class="container mt-5">
        <div class="btn-container">
            <a href="create.php" class="btn btn-info btn-md mb-3">Add Task</a>
            <?php
                if(isset($_SESSION['eksekusi'])):
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert>
                    <?php
                        echo $_SESSION['eksekusi'];
                    ?>
                    <button type="button class="btn-close" data-bs-dismiss="alert" aria-label:>
                </div>
            <?php
                endif;
            ?>
            
        </div>
        <div class="table-responsive">
        
            <table id="dt" class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>                
                        <th>Tugas</th>                
                        <th>Deadline</th>                
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                <tbody>  
                    <?php $i=1?>
                    <?php foreach($rows as $row): ?>  
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $row["Tugas"] ?></td>
                            <td><?= $row["Deadline"] ?></td>
                            <td><?= $row["Keterangan"] ?></td>
                            <td>
                                <div class="row">
                                        <div class="col d-flex justify-content-center">
                                            <a href='delete.php?id=<?= $row["id"] ?>' class="btn btn-sn btn-danger btn-sm">Delete</a>
                                        </div>
                                        <div class="col d-flex justify-content-center">
                                            <a href='update.php?id=<?= $row["id"] ?>' class='btn btn-sn btn-success btn-sm'>Update</a>
                                        </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>   
</body>
</html>
