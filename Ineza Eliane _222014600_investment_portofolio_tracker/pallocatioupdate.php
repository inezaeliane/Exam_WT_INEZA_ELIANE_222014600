<?php
// Connection details
include('database_connection.php');
// Initialize ID variable
$id = null;

// Check if ID is set and form is submitted
if (isset($_GET['UpdatePortfolioID']) && isset($_POST['submit'])) {
    $id = $_GET['portfolio_id'];
    $atype = $_POST['asset_type'];
    $pallocation = $_POST['allocation_percentage'];
    $tallocation = $_POST['target_allocation'];
    $cvalue = $_POST['current_value'];

    // Prepare and execute the UPDATE statement
    $stmt = $conn->prepare("UPDATE portfolioallocation SET AssetType=?, AllocationPercentage=?, TargetAllocation=?, CurrentValue=? WHERE PortfolioID=?");
    $stmt->bind_param("ssssi", $atype, $pallocation, $tallocation, $cvalue, $id);

    if ($stmt->execute()) {
        header('Location: portofolioallocation_read_insert.php?msg=Record updated successfully');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch existing data for the selected ID
if (isset($_GET['UpdatePortfolioID'])) {
    $id = $_GET['UpdatePortfolioID'];
    $sql_select = "SELECT * FROM portfolioallocation WHERE PortfolioID=$id";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (!$row) {
            echo "Error fetching allocation portofolio data.";
            exit(); // Terminate script
        }
    } else {
        echo "No record found for ID: $id";
        exit(); // Terminate script
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Investment Portofolio Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #ccc;
            color: #000;
        }

        .btn-secondary:hover {
            background-color: #999;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <h2>Update Portofolio Allocation</h2>
        <form method="POST" action="" onsubmit="return confirmUpdate();">
        <div class="form-group">
        <label for="portfolio_id">Portfolio ID:</label>
    <select name="portfolio_id" id="portfolio_id">
        <?php
          // Establish database connection
          include('database_connection.php');

          // SQL query to fetch patient names and IDs from the patient table
          $sql = "SELECT id  , 	Portfolio_name FROM portfolio";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id'] . "'>" . $row['Portfolio_name'] .  "</option>";
              }
          } else {
              echo "<option value=''>No Records found</option>";
          }

          // Close connection
          $conn->close();
          ?>
</select>
        </div>
            
            <div class="form-group">
            <label for="asset_type">Asset Type:</label>
    <select id="asset_type" name="asset_type" required>
        <option value="Stocks">Stocks</option>
        <option value="Bonds">Bonds</option>
        <option value="Mutual Funds">Mutual Funds</option>
        <option value="Real Estate">Real Estate</option>
        <option value="Commodities">Commodities</option>
        <!-- Add more options as needed -->
    </select><br><br>
            </div>
            <div class="form-group">
                <label for="allocation_percentage">Allocation Percentage:</label>
                <input type="number" id="allocation_percentage" name="allocation_percentage" value="<?php echo $row['AllocationPercentage']; ?>" required>
            </div>
           

          <div class="form-group">
          <label for="target_allocation">Target Allocation:</label>
        <input type="number" id="target_allocation" name="target_allocation"value="<?php echo $row['TargetAllocation']; ?>"><br>
   </div>
   <div class="form-group">
   <label for="current_value">Current Value:</label>
        <input type="number" id="current_value" name="current_value"value="<?php echo $row['CurrentValue']; ?>"><br>
   </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                <a href="portofolioallocation_read_insert.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</body>
</html>
