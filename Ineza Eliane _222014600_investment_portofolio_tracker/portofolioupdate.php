<?php
// Connection details
include('database_connection.php');

// Check if ID is set and form is submitted
if (isset($_GET['updateid']) && isset($_POST['submit'])) {
    $id = $_GET['updateid'];
    $portfolio_name = $_POST['portfolio_name'];
    $description = $_POST['description'];
    $total_value = $_POST['total_value'];
    $date_created = $_POST['date_created'];

    // Prepare and execute the UPDATE statement
    $stmt = $conn->prepare("UPDATE portfolio SET Portfolio_name=?, Description=?, Total_value=?, Date_created=? WHERE id=?");
    $stmt->bind_param("ssssi", $portfolio_name, $description, $total_value, $date_created, $id);

    if ($stmt->execute()) {
        header('Location: portofolio_read_insert.php?msg=Record updated successfully');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch existing data for the selected ID
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
    $sql_select = "SELECT * FROM portfolio WHERE id=$id";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found for ID: $id";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Portfolio Tracker</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css">
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <!-- Your HTML content -->
    <div class="sidebar">
        <!-- Sidebar content -->
    </div>
    <div class="main--content">
        <!-- Main content -->
        <h2>Update Portofolio</h2>
        <div class="container">
            <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            <form method="POST" action="" onsubmit="return confirmUpdate();">
            <label for="portfolio_name">Portfolio Name:</label>
        <input type="text" id="portfolio_name" name="portfolio_name" value="<?php echo $row['Portfolio_name']; ?>"><br>
        
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" value="<?php echo $row['Description']; ?>"></textarea><br>
        
        <label for="total_value">Total Value:</label>
        <input type="text" id="total_value" name="total_value" value="<?php echo $row['Total_value']; ?>"><br>
        
        <label for="date_created">Date Created:</label>
        <input type="date" id="date_created" name="date_created"value="<?php echo $row['Date_created']; ?>"><br>

                <input type="submit" name="submit" value="Submit">
                <a href="portofolio_read_insert.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</body>
</html>

<?php
// Close connection at the end of the file
$conn->close();
?>
