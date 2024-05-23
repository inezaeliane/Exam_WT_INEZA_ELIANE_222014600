<?php
// Connection details
include('database_connection.php');

// Check if ID is set and form is submitted
if (isset($_GET['updateCommodities_id']) && isset($_POST['submit'])) {
    $id = $_GET['updateCommodities_id'];
    $cname = $_POST['commodity_name'];
    $price = $_POST['price'];
    $demands = $_POST['supply_demand_dynamics'];
    $fcontracts = $_POST['future_contracts'];

    // Prepare and execute the UPDATE statement
    $stmt = $conn->prepare("UPDATE commodities SET Commodity_name=?, Price=?, Supply_demand_dynamics=?, Future_contracts=? WHERE Commodities_id = ?");
    $stmt->bind_param("ssssi", $cname, $price, $demands, $fcontracts, $id);

    if ($stmt->execute()) {
        header('Location: commodities_read_insert.php?msg=Record updated successfully');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch existing data for the selected ID
if (isset($_GET['updateCommodities_id'])) {
    $id = $_GET['updateCommodities_id'];
    $sql_select = "SELECT * FROM commodities WHERE Commodities_id=$id";
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
        <h2>Update Commodities</h2>
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
                <label for="commodity_name">Commodity Name:</label>
                <input type="text" id="commodity_name" name="commodity_name" value="<?php echo $row['Commodity_name']; ?>">

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" step="0.01" value="<?php echo $row['Price']; ?>">

                <label for="supply_demand_dynamics">Supply-Demand Dynamics:</label>
                <textarea id="supply_demand_dynamics" name="supply_demand_dynamics" rows="4" cols="50"><?php echo $row['Supply_demand_dynamics']; ?></textarea>

                <label for="future_contracts">Future Contracts:</label>
                <input type="text" id="future_contracts" name="future_contracts" value="<?php echo $row['Future_contracts']; ?>">

                <input type="submit" name="submit" value="Submit">
                <a href="commodities_read_insert.php" class="btn btn-secondary">Cancel</a>
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
