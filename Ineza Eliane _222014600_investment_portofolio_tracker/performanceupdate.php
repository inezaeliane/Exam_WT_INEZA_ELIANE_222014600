<?php
// Connection details
include('database_connection.php');

// Check if ID is set and form is submitted
if (isset($_GET['updateInvestment_id']) && isset($_POST['submit'])) {
    $id = $_GET['updateInvestment_id'];
    $investment = $_POST['investment_id'];
    $treturn = $_POST['total_return'];
    $areturn = $_POST['annualized_return'];
    $volatile = $_POST['volatility'];
    $sratio = $_POST['sharpe_ratio'];

    // Prepare and execute the UPDATE statement
    $stmt = $conn->prepare("UPDATE performance SET Investment_id=?, Total_return=?, Annualized_return=?, Volatility=?, Sharp_ratio=? WHERE ID=?");
    $stmt->bind_param("sssssi", $investment, $treturn, $areturn, $volatile, $sratio, $id);
    
    if ($stmt->execute()) {
        header('Location: performance_read_insert.php?msg=Record updated successfully');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch existing data for the selected ID
if (isset($_GET['updateID'])) {
    $id = $_GET['updateID'];
    $sql_select = "SELECT * FROM performance WHERE ID=$id";
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
    <div class="sidebar">
        <!-- Sidebar content -->
    </div>
    <div class="main--content">
        <h2>Update Performance</h2>
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
            <label for="investment_id">Investment ID:</label>
    <select name="investment_id" id="investment_id">
       <?php
          // Establish database connection
          include('database_connection.php');

          // SQL query to fetch patient names and IDs from the patient table
          $sql = "SELECT Investment_id  , 	Investment_name FROM investment";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['Investment_id'] . "'>" . $row['Investment_name'] .  "</option>";
              }
          } else {
              echo "<option value=''>No Records found</option>";
          }

          // Close connection
          $conn->close();
          ?>
       </select>

    <label for="total_return">Total Return:</label>
    <input type="number" id="total_return" name="total_return" step="0.01" value="<?php echo isset($row['Total_return']) ? $row['Total_return'] : ''; ?>">

    <label for="annualized_return">Annualized Return:</label>
    <input type="number" id="annualized_return" name="annualized_return" step="0.01" value="<?php echo isset($row['Annualized_return']) ? $row['Annualized_return'] : ''; ?>"><br><br>

    <label for="volatility">Volatility:</label>
    <input type="number" id="volatility" name="volatility" step="0.01" value="<?php echo isset($row['Volatility']) ? $row['Volatility'] : ''; ?>">

    <label for="sharpe_ratio">Sharpe Ratio:</label>
    <input type="number" id="sharpe_ratio" name="sharpe_ratio" step="0.01" value="<?php echo isset($row['Sharp_ratio']) ? $row['Sharp_ratio'] : ''; ?>">


                <input type="submit" name="submit" value="Submit">
                <a href="performance_read_insert.php" class="btn btn-secondary">Cancel</a>
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

