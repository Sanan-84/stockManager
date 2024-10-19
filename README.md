# Stock Manager

**Stock Manager** is a PHP class designed for managing product stock and movements. It dynamically handles product information within a `products` table and enables tracking of stock changes.

## Requirements

- PHP 8.0 or higher

## Installation

1. Clone the project:
   ```bash
   git clone https://github.com/username/stock-manager.git

2. Install dependencies using Composer:
   ```bash
    composer install

3. Clone the basicdb library:
   ```bash
    git clone https://github.com/Sanan-84/basicdb.git

## Usage
To use the StockManager class, follow these steps:

## 1. Include the StockManager Class
    ```php
    require 'path/to/stockManager.php'; // Include the stockManager class
    require 'path/to/db.php'; // Include Database

## 2. Create a Database Connection
    ```php
    $db = new \Sanan\Database("localhost", "database_name", "username", "password");

## 3. Create a StockManager Instance
    ```php
    $requiredColumns = ['name', 'sku', 'description', 'price', 'stock_quantity'];
    $stockManager = new StockManager($db, 'products', $requiredColumns);

## 4. Add a Product
    ```php
    $stockManager->addProduct([
        'name' => 'Laptop',
        'sku' => 'SKU123',
        'description' => 'High performance laptop',
        'price' => 1500,
        'stock_quantity' => 10
    ]);

## 5. Retrieve a Product
    ```php
    $product = $stockManager->getProduct(1);
    print_r($product);

##6. Add Stock
    ```php
    $stockManager->addStock(1, 5); // Add 5 units to the product with ID 1

## 7. Remove Stock
    ```php
    $stockManager->removeStock(1, 3); // Remove 3 units from the product with ID 1

## Table Structure Requirements
The StockManager class requires the following columns in the products table:

name: Product name
sku: Unique stock keeping unit
description: Product description
price: Product price
stock_quantity: Quantity of product in stock

##Technologies Used
PHP
SQL (MySQL, MariaDB, etc.)
basicdb - For database operations

##License
This project is licensed under the GPL-3.0 License.

##Contact
Feel free to reach out if you have any questions or suggestions!

