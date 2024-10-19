require 'path/to/database.php'; 
$db = new \Database("localhost", "your_database", "root", "password");

// We define the necessary column names
$requiredColumns = ['name', 'sku', 'description', 'price', 'stock_quantity'];

// We create the stockManager object with $db
$stockManager = new stockManager($db, 'products', $requiredColumns);

// We add a new product
$stockManager->addProduct([
    'name' => 'Laptop',
    'sku' => 'SKU123',
    'description' => 'High performance laptop',
    'price' => 1500,
    'stock_quantity' => 10
]);
