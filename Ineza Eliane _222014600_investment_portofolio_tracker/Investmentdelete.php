<?php
// Connection details
include('database_connection.php');

// Check if ID is set
if(isset($_REQUEST['Investment_id'])) {
    $id = $_REQUEST['Investment_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM investment WHERE Investment_id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header('location:investment_read_insert.php?msg=Delete data successful');
        exit(); // Stop further execution
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "click here to confirm";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Investment</title>
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = 'investment_read_insert.php?id=' + id;
            }
        }
    </script>
</head>
<body>
    <button onsubmit="confirmDelete(<?php echo $_REQUEST['Investment_id']; ?>)">Delete Record</button>
</body>
</html>

