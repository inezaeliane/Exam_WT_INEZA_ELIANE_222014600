<?php
// Connection
include('database_connection.php');

// Insert data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $conn->prepare("INSERT INTO investment ( Portofolio_id, Investment_name,Type_of_investment, Amount,Purchase_price,Purchase_date,Current_value,Dividends) VALUES ( ?, ?, ?, ?,?,?,?,?)");

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssssss", $portfolio,  $name, $type, $amaunt, $pprice,$pdate,$value,$dividends);

    // Set parameters and execute
     $portfolio = $_POST['portfolio_id'];
    $name = $_POST['investment_name'];
    $type = $_POST['type_of_investment'];
    $amaunt = $_POST['amount'];
    $pprice = $_POST['purchase_price'];
    $pdate = $_POST['purchase_date'];
    $value = $_POST['current_value'];
    $dividends = $_POST['dividends'];

    if ($stmt->execute()) {
        header("Location:investment_read_insert.php");
        echo "New record has been added successfully";

    } else {
        echo "Error: " . $stmt->error;
    }
   
}

$sql_select = "SELECT * FROM investment";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Add search condition to SQL query
    $sql_select .= " WHERE Portofolio_id LIKE '%$search%' OR Investment_name LIKE '%$search%' OR Type_of_investment LIKE '%$search%' 
    OR Amount LIKE '%$search%' OR 	Purchase_price LIKE '%$search%' OR Purchase_date LIKE '%$search%' OR 
    Current_value LIKE '%$search%' OR Dividends LIKE '%$search%'";
}

$result = $conn->query($sql_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Portofolio Tracker</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="
sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css
" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="
sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
        <div class="logo">Logo</div>
        <ul class="menu">
            <li class="active">
                <a href="Dashboard.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="register.html">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="Service.php">
                    <i class="fas fa-list"></i>
                    <span>All Tracker</span>
                </a>
                
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-folder-open"></i>
                    <span>Portfolio</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="logout">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <h2>Investment Portfolio Tracker</h2>
                
                <li><a href="portofolio_read_insert.php">Portofolio</a></li>
                <li><a href="investment_read_insert.php">Investment</a></li>
                <li><a href="transaction_read_insert.php">Transaction</a></li>
                <li><a href="performance_read_insert.php">Performance</a></li>
                <li><a href="stock_read_insert.php">Stock</a></li>
                <li><a href="bond_read_insert.php">Bonds</a></li>
                <li><a href="funds_read_insert.php">Mutual funds</a></li>
                <li><a href="Realestate_read_insert.php">Real Estate Investment</a></li>
                <li><a href="optioncontract_read_insert.php">Option Contract</a></li>
                <li><a href="commodities_read_insert.php">Commodities</a></li>
                <li><a href="portofolioallocation_read_insert.php">Portofolio Allocations</a></li>
            </div>
        </div>

        <h2>Investment Records</h2>
    <div class="container">
        <?php
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
       
</form>

        <a href="investment.php" class="btn btn-success">Add New</a>
    </div><br>
    <form method="GET" action="">
    <input type="text" name="search" placeholder="Search...">
    <button type="submit" class="btn btn-primary">Search</button><br>
    <table id="dataTable" class="table table-hover text-center">
        <tr>
            <th>Investment ID</th>
            <th>Portofolio</th>
            <th>Investment Name</th>
            <th>Type of investment</th>
            <th>Amount</th>
            <th>Purchase Price</th>
            <th>Purchase Date</th>
            <th>Current value</th>
            <th>Dividends</th>
            <th>Actions</th>
        </tr>
        <?php
        


        // Output data of each row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Investment_id"] . "</td>";
                echo "<td>" . $row["Portofolio_id"] . "</td>";
                echo "<td>" . $row["Investment_name"] . "</td>";
                echo "<td>" . $row["Type_of_investment"] . "</td>";
                echo "<td>" . $row["Amount"] . "</td>";
                echo "<td>" . $row["Purchase_price"] . "</td>";
                echo "<td>" . $row["Purchase_date"] . "</td>";
                echo "<td>" . $row["Current_value"] . "</td>";
                echo "<td>" . $row["Dividends"] . "</td>";
                echo "<td>";
                echo "<a href='Investmentupdate.php?updateInvestment_id=" . $row['Investment_id'] . "'>Update</a> | ";
                echo "<a href='Investmentdelete.php?Investment_id=" . $row['Investment_id'] . "'>Delete</a>";
                 echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No data found</td></tr>";
        }
        ?>
    </table>

</body>

</html>

<?php
// Close connection at the end of the file
$conn->close();
?>

