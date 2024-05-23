<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .dropdown-menu {
            display: none;
            list-style-type: none;
            margin-left: 20px;
        }

        .dropdown-menu li {
            margin-bottom: 0.5px;
        }

        .dropdown-menu a {
            color: #fff;
            text-decoration: none;
            padding: 0.2px;
            display: list-item;
        }

        .dropdown-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .menu .dropdown-toggle.active + .dropdown-menu {
            display: list-item;
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
    font-weight: bold;
}

.header--title li {
    margin-left: 20px;
    display: inline-block;
}

.header--title li a {
    text-decoration: none;
    color: #666; /* Adjust color as needed */
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
                <a href="Service.php" >
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
                <a href="logout.php">
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
    </div>

    <script>
        // Add JavaScript to handle dropdown functionality
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                toggle.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
