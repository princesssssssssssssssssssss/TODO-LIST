<?php
include "config.php";

function create($data) {
    global $conn;
    $Tugas = $data["Tugas"];
    $Deadline = $data["Deadline"];
    $Keterangan = $data["Keterangan"];
    $sql = "INSERT INTO tasks (Tugas, Deadline, Keterangan) VALUES ('$Tugas', '$Deadline', '$Keterangan')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function view() {
    global $conn;
    $sql = "SELECT * FROM tasks";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result); // Free the result set
    } else {
        $rows = array(); // Return an empty array if no results found
        echo "0 results";
    }

    mysqli_close($conn);
    return $rows;
}

function delete($id) {
    global $conn;
    $sql = "DELETE FROM tasks WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn); 
}

function update($id, $data) {
    global $conn;
    $Tugas = $data["Tugas"];
    $Deadline = $data["Deadline"];
    $Keterangan = $data["Keterangan"];
    
    $sql = "UPDATE tasks SET Tugas = ?, Deadline = ?, Keterangan = ? WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $Tugas, $Deadline, $Keterangan, $id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
}
?>
