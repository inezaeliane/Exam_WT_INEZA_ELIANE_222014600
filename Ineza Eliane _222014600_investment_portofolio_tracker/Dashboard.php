<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
        .card {
            margin-bottom: 20px;
        }

        /* Center Align */
        .text-center {
            text-align: center;
        }

        /* Right Align */
        .text-right {
            text-align: right;
        }

        /* Left Align */
        .text-left {
            text-align: left;
        }
    </style>
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
                <span>Primary</span>
                <h2>Dashboard</h2>
                <ul>
                <li><a href="home.html">Home</a></li>
      <li><a href="about.html">About us</a></li>
      <li><a href="contact.html">Contact us</a></li>
      <li><a href="register.html">Create new Account</a></li>
     
      </ul>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="pic.jpg" alt="User Image">
            </div>
        </div>
        <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Number of Users</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="portofolio_read_insert.php">
                            <h5 class="card-title"><i class="fas fa-home"></i> Portfolio</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="investment_read_insert.php">
                            <h5 class="card-title"><i class="fas fa-handshake"></i> Investment</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="transaction_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-users"></i> Transaction</h5>

                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="performance_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Performance</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="stock_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-home"></i>Stock</h5>
                   
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="bond_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-handshake"></i> Bonds</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="funds_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-users"></i> Mutual funds</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="Realestate_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Real Estate Investment</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="optioncontract_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-home"></i> Option Contract</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="commodities_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-handshake"></i> Commodities</h5>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <a href="portofolioallocation_read_insert.php">
                        <h5 class="card-title"><i class="fas fa-users"></i> Portofolio Allocation</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>
