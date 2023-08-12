<?php
include 'controller.php'; 


$sql = "SELECT * FROM tasks WHERE due_date >= CURDATE()";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $taskName = $row['task_name'];
        $dueDate = $row['due_date'];

        
        $today = strtotime(date('Y-m-d'));
        $dueDateTimestamp = strtotime($dueDate);
        $daysRemaining = floor(($dueDateTimestamp - $today) / (60 * 60 * 24));

        if ($daysRemaining <= 2) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
            echo "Task '{$taskName}' is due in {$daysRemaining} days!";
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '<span aria-hidden="true">&times;</span>';
            echo '</button>';
            echo '</div>';
        }
    }
}

mysqli_close($conn);
?>
