<?php
// Connection details
include('database_connection.php');

// Check if ID is set and form is submitted
if (isset($_GET['updateInvestment_id']) && isset($_POST['submit'])) {
    $id = $_GET['updateInvestment_id'];
    $portfolio = $_POST['portfolio_id'];
    $name = $_POST['investment_name'];
    $type = $_POST['type_of_investment'];
    $amount = $_POST['amount'];
    $pprice = $_POST['purchase_price'];
    $pdate = $_POST['purchase_date'];
    $value = $_POST['current_value'];
    $dividends = $_POST['dividends'];

    // Prepare and execute the UPDATE statement
    $stmt = $conn->prepare("UPDATE investment SET Portofolio_id=?, Investment_name=?, Type_of_investment=?, Amount=?, Purchase_price=?, Purchase_date=?, Current_value=?, Dividends=? WHERE Investment_id=?");
    $stmt->bind_param("ssssssssi", $portfolio, $name, $type, $amount, $pprice, $pdate, $value, $dividends, $id);
    
    if ($stmt->execute()) {
        header('Location: investment_read_insert.php?msg=Record updated successfully');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch existing data for the selected ID
if (isset($_GET['updateInvestment_id'])) {
    $id = $_GET['updateInvestment_id'];
    $sql_select = "SELECT * FROM investment WHERE Investment_id=$id";
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
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="date"],
        select {
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
        <h2>Update Investment</h2>
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
                <label for="portfolio_id">Portfolio ID:</label>
                <select name="portfolio_id" id="portfolio_id">
                    <?php
                    // Fetch portfolio options from the database
                    $sql = "SELECT id, Portfolio_name FROM portfolio";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($rowPortfolio = $result->fetch_assoc()) {
                            $selected = ($row['Portfolio_id'] == $rowPortfolio['id']) ? 'selected' : '';
                            echo "<option value='" . $rowPortfolio['id'] . "' $selected>" . $rowPortfolio['Portfolio_name'] .  "</option>";
                        }
                    } else {
                        echo "<option value=''>No Records found</option>";
                    }
                    ?>
                </select>

                <label for="investment_name">Investment Name:</label>
                <input type="text" id="investment_name" name="investment_name" value="<?php echo isset($row['Investment_name']) ? $row['Investment_name'] : ''; ?>"><br>
                
                <label for="type_of_investment">Type of Investment:</label>
                <select id="type_of_investment" name="type_of_investment">
                    <option value="stocks" <?php echo ($row['Type_of_investment'] == 'stocks') ? 'selected' : ''; ?>>Stocks</option>
                    <option value="bonds" <?php echo ($row['Type_of_investment'] == 'bonds') ? 'selected' : ''; ?>>Bonds</option>
                    <option value="mutual_funds" <?php echo ($row['Type_of_investment'] == 'mutual_funds') ? 'selected' : ''; ?>>Mutual Funds</option>
                    <option value="others" <?php echo ($row['Type_of_investment'] == 'others') ? 'selected' : ''; ?>>Others</option>
                </select><br>
                
                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" value="<?php echo isset($row['Amount']) ? $row['Amount'] : ''; ?>"><br>
                
                <label for="purchase_price">Purchase Price:</label>
                <input type="text" id="purchase_price" name="purchase_price" value="<?php echo isset($row['Purchase_price']) ? $row['Purchase_price'] : ''; ?>"><br>
                
                <label for="purchase_date">Purchase Date:</label>
                <input type="date" id="purchase_date" name="purchase_date" value="<?php echo isset($row['Purchase_date']) ? $row['Purchase_date'] : ''; ?>"><br>
                
                <label for="current_value">Current Value:</label>
                <input type="text" id="current_value" name="current_value" value="<?php echo isset($row['Current_value']) ? $row['Current_value'] : ''; ?>"><br>
                
                <label for="dividends">Dividends:</label>
                <input type="text" id="dividends" name="dividends" value="<?php echo isset($row['Dividends']) ? $row['Dividends'] : ''; ?>"><br>

                <input type="submit" name="submit" value="Submit">
                <a href="investment_read_insert.php" class="btn btn-secondary">Cancel</a>
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
