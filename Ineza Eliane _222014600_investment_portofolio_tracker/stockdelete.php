<?php
// Connection details
include('database_connection.php');

// Check if ID is set and confirmation is given
if (isset($_REQUEST['Stock_id']) && isset($_REQUEST['confirm']) && $_REQUEST['confirm'] == 1) {
    $id = $_REQUEST['Stock_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM stock WHERE Stock_id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header('location:stock_read_insert.php?msg=Delete data successful');
        exit(); // Stop further execution
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    $id = isset($_REQUEST['Stock_id']) ? $_REQUEST['Stock_id'] : '';
    echo '<script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>';
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Stock</title>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</head>
<body>
    <button onclick="if(confirmDelete()) { window.location.href = 'stock_read_insert.php?Stock_id=<?php echo $id; ?>&confirm=1'; }">Delete Record</button>
</body>
</html>
