<?php
// Connection details
include('database_connection.php');

// Initialize $id to avoid undefined variable error
$id = $_REQUEST['Property_id'];

if (isset($_REQUEST['confirm'])) {
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM real_estate_investments WHERE Property_id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('location:Realestate_read_insert.php?msg=Delete data successful');
        exit(); // Stop further execution
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this record?');
            if (confirmDelete) {
                window.location.href = 'Realestate_read_insert.php?Property_id=" . urlencode($id) . "&confirm=1';
            } else {
                // Cancel action
                window.location.href = 'Realestate_read_insert.php';
            }
          </script>";
}

$conn->close();
?>
