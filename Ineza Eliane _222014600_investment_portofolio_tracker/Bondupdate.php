<?php
// Connection details
include('database_connection.php');
// Check if ID is set and form is submitted
if (isset($_GET['updateBond_id']) && isset($_POST['submit'])) {
    $id = $_GET['updateBond_id'];
    $bname = $_POST['bond_name'];
    $issuer = $_POST['issuer'];
    $Maturitydate = $_POST['maturity_date'];
    $crate = $_POST['coupon_rate'];
    $ymaturity = $_POST['yield_to_maturity'];
    $crating = $_POST['credit_rating'];

    // Prepare and execute the UPDATE statement
    $stmt = $conn->prepare("UPDATE bonds SET Bond_name=?, Issuer=?, Maturity_date=?, Coupon_rate=?, Yield_to_maturity=?, Credit_rating=? WHERE Bond_id =?");
    $stmt->bind_param("ssssssi", $bname, $issuer, $Maturitydate, $crate, $ymaturity, $crating, $id);

    if ($stmt->execute()) {
        header('Location: bond_read_insert.php?msg=Record updated successfully');
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch existing data for the selected ID
if (isset($_GET['updateBond_id'])) {
    $id = $_GET['updateBond_id'];
    $sql_select = "SELECT * FROM bonds WHERE Bond_id=$id";
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
        <h2>Update Bonds</h2>
        <div class="container">
            <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            ?>
            <form method="POST" action=""onsubmit="return confirmUpdate();">
                <label for="bond_name">Bond Name:</label>
                <input type="text" id="bond_name" name="bond_name" value="<?php echo $row['Bond_name']; ?>">

                <label for="issuer">Issuer:</label>
                <input type="text" id="issuer" name="issuer" value="<?php echo $row['Issuer']; ?>">

                <label for="maturity_date">Maturity Date:</label>
                <input type="date" id="maturity_date" name="maturity_date" value="<?php echo $row['Maturity_date']; ?>">

                <label for="coupon_rate">Coupon Rate:</label>
                <input type="text" id="coupon_rate" name="coupon_rate" step="0.01" value="<?php echo $row['Coupon_rate']; ?>">

                <label for="yield_to_maturity">Yield to Maturity:</label>
                <input type="text" id="yield_to_maturity" name="yield_to_maturity" step="0.01" value="<?php echo $row['Yield_to_maturity']; ?>">

                <label for="credit_rating">Credit Rating:</label>
                <select id="credit_rating" name="credit_rating">
                    <option value="AAA" <?php if($row['Credit_rating'] == 'AAA') echo 'selected'; ?>>AAA</option>
                    <option value="AA" <?php if($row['Credit_rating'] == 'AA') echo 'selected'; ?>>AA</option>
                    <option value="A" <?php if($row['Credit_rating'] == 'A') echo 'selected'; ?>>A</option>
                    <option value="BBB" <?php if($row['Credit_rating'] == 'BBB') echo 'selected'; ?>>BBB</option>
                    <option value="BB" <?php if($row['Credit_rating'] == 'BB') echo 'selected'; ?>>BB</option>
                    <option value="B" <?php if($row['Credit_rating'] == 'B') echo 'selected'; ?>>B</option>
                    <option value="CCC" <?php if($row['Credit_rating'] == 'CCC') echo 'selected'; ?>>CCC</option>
                    <option value="CC" <?php if($row['Credit_rating'] == 'CC') echo 'selected'; ?>>CC</option>
                    <option value="C" <?php if($row['Credit_rating'] == 'C') echo 'selected'; ?>>C</option>
                </select>
                <br><br>

                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                <a href="bond_read_insert.php" class="btn btn-secondary">Cancel</a>

            </form>
        </div>
    </div>

    <!-- Bootstrap and other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
     <!-- Confirmation script -->
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
