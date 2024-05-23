<?php
include('database_connection.php');

// Check if Attendance_Id is set
if(isset($_REQUEST['Property_id'])) {
    $id = $_REQUEST['Property_id'];
    
    $stmt = $connection->prepare("SELECT * FROM real_estate_investments WHERE 	Property_id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['Property_id'];
        $pname = $_POST['property_name'];
    $location = $_POST['location'];
    $pprice = $_POST['purchase_price'];
    $mvalue = $_POST['market_value'];
    $rincome = $_POST['rental_income'];
    $expense = $_POST['expenses'];
    } else {
        echo "Real estate not found.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Real Estate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        center {
            margin-top: 50px;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0078D4;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #005ea2;
        }
    </style>
    <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body>
    <center>
        <!-- Update Assessments form -->
        <h2><u>Update Form of Real estates</u></h2>
        <form method="POST" onsubmit="return confirmUpdate();">

            <label for="property_name">Property Name:</label>
            <input type="text" name="property_name" value="<?php echo isset($pname) ? $pname : ''; ?>">
            <br><br>

            <label for="location">Location:</label>
            <input type="text" name="location" value="<?php echo isset($location) ? $location : ''; ?>">
            <br><br>

            <label for="purchase_price">Purchase Price:</label>
            <input type="text" name="purchase_price" value="<?php echo isset($pprice) ? $pprice : ''; ?>">
            <br><br>

            <label for="market_value">market_value:</label>
            <input type="number" name="market_value" value="<?php echo isset($mvalue) ? $mvalue : ''; ?>">
            <br><br>

            <label for="rental_income">Rental Income:</label>
            <input type="text" name="rental_income" value="<?php echo isset($rincome) ? $rincome : ''; ?>">
            <br><br>

            <label for="expenses">Expenses:</label>
            <input type="number" name="expenses" value="<?php echo isset($expense) ? $expense : ''; ?>">
            <br><br>

            <input type="submit" name="up" value="Update">
            <a href="Realestate_read_insert.php">Cancel</a><br><br><br>
            
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $id = $row['Property_id'];
        $pname = $_POST['property_name'];
    $location = $_POST['location'];
    $pprice = $_POST['purchase_price'];
    $mvalue = $_POST['market_value'];
    $rincome = $_POST['rental_income'];
    $expense = $_POST['expenses'];
    
    // Update the Assessments record in the database
    $stmt = $connection->prepare("UPDATE real_estate_investments SET  	Property_name=?,  Location=?, Purchase_price=?, Market_value=?,Rental_income=?,Expenses=? WHERE Property_id=?");
    $stmt->bind_param("ssssssi",$pname, $location, $pprice,   $mvalue, $rincome,$expense,     $id);
    $stmt->execute();
    
    // Redirect to Assessments.php
    header('Location: Realestate_read_insert.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
