<?php
// Connection details
include('database_connection.php');

if (isset($_REQUEST['ID']) && isset($_REQUEST['confirm']) && $_REQUEST['confirm'] == 1) {
    $id = $_REQUEST['ID'];

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM performance WHERE ID=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: performance_read_insert.php?msg=Delete data successful');
        exit(); // Stop further execution
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo '<script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>';

    if (isset($_REQUEST['ID'])) {
        $id = $_REQUEST['ID'];
        echo '<a href="performancedelete.php?ID=' . $id . '&confirm=1" onclick="return confirmDelete();">Click here to confirm delete</a>';
    } else {
        echo 'ID not set.';
    }
}

$conn->close();
?>
