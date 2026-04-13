-- Step 1: Create or modify the food_order table with proper structure
-- Run this in PHPMyAdmin SQL tab

-- Drop existing table if it exists (CAUTION: This deletes existing data)
-- Comment out the next line if you want to keep existing data
DROP TABLE IF EXISTS food_order;

-- Create the food_order table with all necessary columns
CREATE TABLE food_order (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    U_ID INT NOT NULL,
    FoodName VARCHAR(255) NOT NULL,
    Quantity INT NOT NULL,
    ItemTotal DECIMAL(10, 2) NOT NULL,
    Total DECIMAL(10, 2) NOT NULL,
    TimeStamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_user_orders (U_ID, TimeStamp)
);

-- Verify the table structure
DESCRIBE food_order;
