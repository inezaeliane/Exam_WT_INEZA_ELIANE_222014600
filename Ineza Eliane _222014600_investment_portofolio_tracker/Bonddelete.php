<?php
// Connection details
include('database_connection.php');

// Check if ID is set and if the delete action is confirmed
if (isset($_REQUEST['Bond_id']) && isset($_REQUEST['confirm'])) {
    $id = $_REQUEST['Bond_id'];

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM bonds WHERE Bond_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('location: bond_read_insert.php?msg=Delete data successful');
        exit(); // Stop further execution
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    $id = $_REQUEST['Bond_id']; // Initialize $id to avoid undefined variable error

    // Display a JavaScript confirmation prompt
    echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this record?');
            if (confirmDelete) {
                window.location.href = 'bond_read_insert.php?Bond_id=".urlencode($id)."&confirm=1';
            } else {
                // Cancel action
                window.location.href = 'bond_read_insert.php';
            }
          </script>";
}

$conn->close();
?>
