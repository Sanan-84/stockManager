
# Stock Manager

Stock Manager is a class built in PHP that allows for the management of product stock. This class dynamically handles product information in a `products` table and enables tracking of stock movements.

## Requirements

- PHP 8.0 or higher
- [Sanan-84/basicdb](https://github.com/Sanan-84/basicdb) - For database connection

## Installation

1. Clone the project:
   ```bash
   git clone https://github.com/username/stock-manager.git
Install dependencies using composer (if applicable):

composer install
Clone the basicdb library:

git clone https://github.com/Sanan-84/basicdb.git
Usage
To use the StockManager class, follow these steps:

1. Include the StockManager Class
require 'path/to/StockManager.php'; // Include the StockManager class
require 'path/to/basicdb.php'; // Include BasicDB
2. Create a Database Connection
$db = new \Sanan\Database("localhost", "database_name", "username", "password");
3. Create a StockManager Instance
$requiredColumns = ['name', 'sku', 'description', 'price', 'stock_quantity'];
$stockManager = new StockManager($db, 'products', $requiredColumns);
4. Add a Product
$stockManager->addProduct([
    'name' => 'Laptop',
    'sku' => 'SKU123',
    'description' => 'High performance laptop',
    'price' => 1500,
    'stock_quantity' => 10
]);
5. Retrieve a Product
$product = $stockManager->getProduct(1);
print_r($product);
6. Add Stock
$stockManager->addStock(1, 5); // Add 5 units to the product with ID 1
7. Remove Stock
$stockManager->removeStock(1, 3); // Remove 3 units from the product with ID 1
Table Structure Requirements
The StockManager class requires the following columns in the products table:

name: Product name
sku: Unique stock keeping unit
description: Product description
price: Product price
stock_quantity: Quantity of product in stock
Technologies Used
PHP
SQL (MySQL, MariaDB, etc.)
basicdb - For database operations
License
This project is licensed under the MIT License.

Contact
Feel free to reach out if you have any questions!

