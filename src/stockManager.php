<?php
namespace Webservis;
class stockManager {
    private $db;
    private $tableName;
    private $columns;

    public function __construct($db, $tableName = 'products', $columns = []) {
        $this->db = $db;
        $this->tableName = $tableName;
        $this->columns = $columns;
    }

    public function addProduct($data) {
        foreach ($this->columns as $column) {
            if (!array_key_exists($column, $data)) {
                throw new Exception("Missing required column: $column");
            }
        }
        $this->db->insert($this->tableName)
            ->set($data);
    }

    public function getProduct($id) {
        return $this->db->from($this->tableName)
            ->where('id', $id)
            ->first();
    }

    public function addStock($productId, $quantity) {
        $this->updateStock($productId, $quantity, 'addition');
    }

    public function removeStock($productId, $quantity) {
        $this->updateStock($productId, $quantity, 'removal');
    }

    private function updateStock($productId, $quantity, $movementType) {
        $product = $this->getProduct($productId);
        if (!$product) {
            throw new Exception("Product not found");
        }

        if ($movementType === 'addition') {
            $newStock = $product['stock_quantity'] + $quantity;
        } elseif ($movementType === 'removal') {
            if ($product['stock_quantity'] < $quantity) {
                throw new Exception("Insufficient stock");
            }
            $newStock = $product['stock_quantity'] - $quantity;
        } else {
            throw new Exception("Invalid movement type");
        }

        $this->db->update($this->tableName)
            ->where('id', $productId)
            ->set(['stock_quantity' => $newStock]);
    }

    public function getAllProducts() {
        return $this->db->from($this->tableName)
            ->all();
    }
}
