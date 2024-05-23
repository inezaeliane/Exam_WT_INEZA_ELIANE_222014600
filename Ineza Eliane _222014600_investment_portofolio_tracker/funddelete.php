<?php
// Connection details
include('database_connection.php');

// Initialize $id to avoid undefined variable error
$id = $_REQUEST['Fund_id'];

if (isset($_REQUEST['confirm'])) {
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM mutual_funds WHERE Fund_id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('location:funds_read_insert.php?msg=Delete data successful');
        exit(); // Stop further execution
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this record?');
            if (confirmDelete) {
                window.location.href = 'funds_read_insert.php?Fund_id=" . urlencode($id) . "&confirm=1';
            } else {
                // Cancel action
                window.location.href = 'funds_read_insert.php';
            }
          </script>";
}

$conn->close();
?>
