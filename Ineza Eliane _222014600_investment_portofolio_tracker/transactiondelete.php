<?php
// Connection details
include('database_connection.php');

// Check if ID is set
if(isset($_REQUEST['Transaction_id'])) {
    $id = $_REQUEST['Transaction_id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM transaction WHERE Transaction_id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header('location:transaction_read_insert.php?msg=Delete data successful');
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
<html>
<head>
    <title>Delete Transaction</title>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</head>
<body>
    <!-- Button to trigger deletion -->
    <button onclick="if(confirmDelete()) { window.location.href = 'transaction_read_insert.php?Transaction_id=<?php echo $_REQUEST['Transaction_id']; ?>'; }">Delete Record</button>
</body>
</html>
