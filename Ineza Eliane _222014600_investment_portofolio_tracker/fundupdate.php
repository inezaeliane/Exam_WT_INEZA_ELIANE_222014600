<?php
// Connection details
include('database_connection.php');

// Check if ID is set and form is submitted
if (isset($_GET['updateFund_id']) && isset($_POST['submit'])) {
    $id = $_GET['updateFund_id'];
    $fname = $_POST['fund_name'];
    $fmanager = $_POST['fund_manager'];
    $expenses = $_POST['expense_ratio'];
    $nav = $_POST['nav'];
    $holding = $_POST['holdings'];

    // Prepare and execute the UPDATE statement
    $stmt = $conn->prepare("UPDATE mutual_funds SET Fund_name=?, Fund_manager=?, Expenses_ratio=?, 	Nav=?,	Holdings=? WHERE Fund_id=?");
    $stmt->bind_param("sssssi", $fname, $fmanager, $expenses, $nav,$holding, $id);

    if ($stmt->execute()) {
        header('Location: funds_read_insert.php?msg=Record updated successfully');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch existing data for the selected ID
if (isset($_GET['updateFund_id'])) {
    $id = $_GET['updateFund_id'];
    $sql_select = "SELECT * FROM mutual_funds WHERE Fund_id=$id";
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
         body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="date"],
        select,
         {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .container {
    max-width: 800px;
    margin: auto;
    padding: 20px;
}
.header--title {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.header--title h2 {
    margin: 0;
    font-size: 24px;
    color: #333; /* Adjust color as needed */
}

.header--title li {
    margin-left: 20px;
    display: inline-block;
}

.header--title li a {
    text-decoration: none;
    color: #666; /* Adjust color as needed */
    font-weight: bold;
}

.header--title li a:hover {
    color: green; /* Adjust color for hover state */
}
    </style>
</head>
<body>
    <!-- Your HTML content -->
    <div class="sidebar">
        <!-- Sidebar content -->
    </div>
    <div class="main--content">
        <!-- Main content -->
        <h2>Update Mutual fund</h2>
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
            <label for="fund_name">Fund Name:</label>
    <input type="text" id="fund_name" name="fund_name" value="<?php echo $row['Fund_name']; ?>">

    <label for="fund_manager">Fund Manager:</label>
    <input type="text" id="fund_manager" name="fund_manager" value="<?php echo $row['Fund_manager']; ?>">

    <label for="expense_ratio">Expense Ratio:</label>
    <input type="number" id="expense_ratio" name="expense_ratio" step="0.01" value="<?php echo $row['Expenses_ratio']; ?>">

    <label for="nav">Net Asset Value (NAV):</label>
    <input type="number" id="nav" name="nav" step="0.01" value="<?php echo $row['Nav']; ?>">

    <label for="holdings">Holdings:</label>
    <textarea id="holdings" name="holdings" rows="4" cols="50" value="<?php echo $row['Holdings']; ?>"></textarea>

                <input type="submit" name="submit" value="Submit">
                <a href="funds_read_insert.php" class="btn btn-secondary">Cancel</a>
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
