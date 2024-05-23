-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 10:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investment_portofolio_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `bonds`
--

CREATE TABLE `bonds` (
  `Bond_id` int(20) NOT NULL,
  `Bond_name` varchar(50) DEFAULT NULL,
  `Issuer` varchar(50) DEFAULT NULL,
  `Maturity_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Coupon_rate` varchar(50) DEFAULT NULL,
  `Yield_to_maturity` varchar(50) DEFAULT NULL,
  `Credit_rating` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bonds`
--

INSERT INTO `bonds` (`Bond_id`, `Bond_name`, `Issuer`, `Maturity_date`, `Coupon_rate`, `Yield_to_maturity`, `Credit_rating`) VALUES
(1, 'ABC Corporate Bond', 'ABC Inc', '2024-05-05 22:00:00', '4.5%', '5%', 'AAA'),
(2, 'XYZ Municipal Bond', 'XYZ City', '2024-05-03 22:00:00', '3.75%', '4.1%', 'AA'),
(4, 'ABC Municipal Bond', 'ABC City', '2024-05-10 22:00:00', '4.5%', '5%', 'CCC');

-- --------------------------------------------------------

--
-- Table structure for table `commodities`
--

CREATE TABLE `commodities` (
  `Commodities_id` int(20) NOT NULL,
  `Commodity_name` varchar(50) DEFAULT NULL,
  `Price` varchar(50) DEFAULT NULL,
  `Supply_demand_dynamics` varchar(50) DEFAULT NULL,
  `Future_contracts` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commodities`
--

INSERT INTO `commodities` (`Commodities_id`, `Commodity_name`, `Price`, `Supply_demand_dynamics`, `Future_contracts`) VALUES
(1, 'Gold', '$1800', 'Stable demand, limited new supply', 'Yes'),
(2, ' Crude Oil', '$70', 'Fluctuating demand, geopolitical factors impacting', 'yes'),
(3, 'Wheat', '$6', 'Seasonal variations in demand, weather impacts sup', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `Investment_id` int(20) NOT NULL,
  `Portofolio_id` int(20) DEFAULT NULL,
  `Investment_name` varchar(50) DEFAULT NULL,
  `Type_of_investment` varchar(50) DEFAULT NULL,
  `Amount` varchar(50) DEFAULT NULL,
  `Purchase_price` varchar(50) DEFAULT NULL,
  `Purchase_date` timestamp NULL DEFAULT NULL,
  `Current_value` varchar(50) DEFAULT NULL,
  `Dividends` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`Investment_id`, `Portofolio_id`, `Investment_name`, `Type_of_investment`, `Amount`, `Purchase_price`, `Purchase_date`, `Current_value`, `Dividends`) VALUES
(1, 1, 'Apple Inc', 'stocks', '100 shares', '$150 per share', '2024-05-10 22:00:00', ' $190 per share', '$100 per share quarterly'),
(2, 2, ' ABC Company Bonds', 'bonds', '500 bonds', ' $1000 per bond', '2024-05-09 22:00:00', '$1100 per bond', ' 6% annually'),
(8, 3, 'Best one', 'stocks', '100 shares', ' $1000 per bond', '2024-05-10 22:00:00', '$1100 per bond', '$100 per share quarterly');

-- --------------------------------------------------------

--
-- Table structure for table `mutual_funds`
--

CREATE TABLE `mutual_funds` (
  `Fund_id` int(20) NOT NULL,
  `Fund_name` varchar(50) DEFAULT NULL,
  `Fund_manager` varchar(50) DEFAULT NULL,
  `Expenses_ratio` varchar(50) DEFAULT NULL,
  `Nav` varchar(50) DEFAULT NULL,
  `Holdings` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mutual_funds`
--

INSERT INTO `mutual_funds` (`Fund_id`, `Fund_name`, `Fund_manager`, `Expenses_ratio`, `Nav`, `Holdings`) VALUES
(1, 'Global Growth Fund', 'John Smith', '0.75', '100.00', 'Technology,Healthy care, Energy'),
(2, 'Emerging Markets Fund', 'Jane Doe', '0.85', '50.00', 'Goods,Property');

-- --------------------------------------------------------

--
-- Table structure for table `option_contract`
--

CREATE TABLE `option_contract` (
  `Contract_id` int(20) NOT NULL,
  `Underlying_asset` varchar(50) DEFAULT NULL,
  `Strick_price` varchar(50) DEFAULT NULL,
  `Expiry_date` varchar(50) DEFAULT NULL,
  `Option_type` varchar(50) DEFAULT NULL,
  `Premium` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `option_contract`
--

INSERT INTO `option_contract` (`Contract_id`, `Underlying_asset`, `Strick_price`, `Expiry_date`, `Option_type`, `Premium`) VALUES
(1, ' XYZ Stock', '100', '2024-05-06', 'Call', '5.00'),
(2, 'ABC Stock', '50', '2024-05-09', 'Put', '3.50');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `ID` int(20) NOT NULL,
  `Investment_id` int(11) NOT NULL,
  `Total_return` varchar(50) DEFAULT NULL,
  `Annualized_return` varchar(50) DEFAULT NULL,
  `Volatility` varchar(50) DEFAULT NULL,
  `Sharp_ratio` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`ID`, `Investment_id`, `Total_return`, `Annualized_return`, `Volatility`, `Sharp_ratio`) VALUES
(1, 1, '0.15', '0.12', '0.20', '0.3'),
(4, 2, '0.5', '0.7', '0.8', '7'),
(5, 8, '29', '30', '30', '39');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `Portfolio_name` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Total_value` varchar(255) DEFAULT NULL,
  `Date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `Portfolio_name`, `Description`, `Total_value`, `Date_created`) VALUES
(1, 'Growth Portfolio', 'Long-term growth strategy focusing on tech and healthcare sectors', '$600,000', '2024-05-02'),
(2, ' Income Portfolio', 'Generates steady income through dividend-paying stocks and bonds', '$270,000', '2024-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `portfolioallocation`
--

CREATE TABLE `portfolioallocation` (
  `PortfolioID` int(11) NOT NULL,
  `AssetType` varchar(50) DEFAULT NULL,
  `AllocationPercentage` decimal(5,2) DEFAULT NULL,
  `TargetAllocation` decimal(10,2) DEFAULT NULL,
  `CurrentValue` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portfolioallocation`
--

INSERT INTO `portfolioallocation` (`PortfolioID`, `AssetType`, `AllocationPercentage`, `TargetAllocation`, `CurrentValue`) VALUES
(1, 'Stocks', 40.00, 500000.00, 200000.00),
(2, 'Bonds', 30.00, 300000.00, 150000.00),
(3, 'Mutual Funds', 40.00, 20000.00, 357.00);

-- --------------------------------------------------------

--
-- Table structure for table `real_estate_investments`
--

CREATE TABLE `real_estate_investments` (
  `Property_id` int(20) NOT NULL,
  `Property_name` varchar(50) DEFAULT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Purchase_price` varchar(50) DEFAULT NULL,
  `Market_value` varchar(50) DEFAULT NULL,
  `Rental_income` varchar(50) DEFAULT NULL,
  `Expenses` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `real_estate_investments`
--

INSERT INTO `real_estate_investments` (`Property_id`, `Property_name`, `Location`, `Purchase_price`, `Market_value`, `Rental_income`, `Expenses`) VALUES
(1, 'Downtown Condo', 'New York City', '500000', '600000', '2500', '800'),
(2, 'Suburban Home', 'Los Angeles', '700000', '800000', '3500', '1200'),
(3, 'Commercial Building', 'Chicago', '1000000', '1200000', '5000', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `Stock_id` int(20) NOT NULL,
  `Stock_name` varchar(50) DEFAULT NULL,
  `Sector` varchar(50) DEFAULT NULL,
  `Market_carp` varchar(50) DEFAULT NULL,
  `Dividend_yield` varchar(50) DEFAULT NULL,
  `Price_earning_ration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Stock_id`, `Stock_name`, `Sector`, `Market_carp`, `Dividend_yield`, `Price_earning_ration`) VALUES
(1, 'Apple Inc', 'Technology', '2350.20', '0.12', '28.45'),
(2, 'Muhabura', 'Cmmercial', '234', '2345', '2345');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `Transaction_id` int(20) NOT NULL,
  `Investment_id` int(20) NOT NULL,
  `Transaction_type` varchar(50) DEFAULT NULL,
  `Amount` varchar(50) DEFAULT NULL,
  `Transaction_price` varchar(50) DEFAULT NULL,
  `Transaction_date` timestamp NULL DEFAULT NULL,
  `Fees` varchar(50) DEFAULT NULL,
  `Taxes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`Transaction_id`, `Investment_id`, `Transaction_type`, `Amount`, `Transaction_price`, `Transaction_date`, `Fees`, `Taxes`) VALUES
(1, 1, 'Buy', '100', '1500', '2024-05-03 22:00:00', '5', '10'),
(2, 2, 'Sell', '50', '1200', '2024-05-06 22:00:00', '30', '80');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(20) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telephone` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `user_type` varchar(30) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `ComfirmPassword` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `FirstName`, `LastName`, `Username`, `Email`, `Telephone`, `Country`, `user_type`, `Password`, `ComfirmPassword`) VALUES
(1, 'INEZA', 'Eliane', 'elianeineza', 'inezaeliane0@gmail.com', '0786230115', 'Rwanda', 'Admin', '222014600', ''),
(2, 'IZERE', 'Elie', 'Elieizere', 'izere@gmail.com', '0788654321', 'Rwanda', 'User', '12345', ''),
(3, 'ISHIMWE', 'Emilie', 'emilieishimwe', 'emilie@gmail.com', '0786230115', 'Rwanda', 'Admin', '222014600', ''),
(4, 'ISHIMWE', 'Emilie', 'emilieishimwe', 'emilie@gmail.com', '0786230115', 'Rwanda', 'Admin', '222014600', ''),
(5, 'ISHIMWE', 'Emilie', 'emilieishimwe', 'emilie@gmail.com', '0786230115', 'Rwanda', 'Admin', '222014600', ''),
(6, 'ISHIMWE', 'Emilie', 'emilieishimwe', 'emilie@gmail.com', '0786230115', 'Rwanda', 'Admin', '222014600', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bonds`
--
ALTER TABLE `bonds`
  ADD PRIMARY KEY (`Bond_id`);

--
-- Indexes for table `commodities`
--
ALTER TABLE `commodities`
  ADD PRIMARY KEY (`Commodities_id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`Investment_id`),
  ADD UNIQUE KEY `Portofolio_id` (`Portofolio_id`);

--
-- Indexes for table `mutual_funds`
--
ALTER TABLE `mutual_funds`
  ADD PRIMARY KEY (`Fund_id`);

--
-- Indexes for table `option_contract`
--
ALTER TABLE `option_contract`
  ADD PRIMARY KEY (`Contract_id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Investment_id` (`Investment_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolioallocation`
--
ALTER TABLE `portfolioallocation`
  ADD PRIMARY KEY (`PortfolioID`);

--
-- Indexes for table `real_estate_investments`
--
ALTER TABLE `real_estate_investments`
  ADD PRIMARY KEY (`Property_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Stock_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Transaction_id`),
  ADD UNIQUE KEY `Investment_id` (`Investment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bonds`
--
ALTER TABLE `bonds`
  MODIFY `Bond_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `commodities`
--
ALTER TABLE `commodities`
  MODIFY `Commodities_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `Investment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mutual_funds`
--
ALTER TABLE `mutual_funds`
  MODIFY `Fund_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `option_contract`
--
ALTER TABLE `option_contract`
  MODIFY `Contract_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `real_estate_investments`
--
ALTER TABLE `real_estate_investments`
  MODIFY `Property_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `Stock_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Transaction_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
