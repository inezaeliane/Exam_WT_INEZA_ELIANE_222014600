<?php
// Connection details
include('database_connection.php');

// Check if ID is set
if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM portfolio WHERE id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header('location:portofolio_read_insert.php?msg=Delete data successful');
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
    <title>Delete Portofolio</title>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</head>
<body>
    <button onclick="if(confirmDelete(<?php echo $_REQUEST['id']; ?>)) { window.location.href = 'portofolio_read_insert.php?id=<?php echo $_REQUEST['id']; ?>'; }">Delete Record</button>
</body>
</html>
