<?php
require_once __DIR__ . '/../../class/Database.php';

// Ambil ID dari routing
$hapus_id = $id ?? null;

if ($hapus_id) {
    $db = new Database();
    
    // Hapus menggunakan id_barang
    $query = "DELETE FROM data_barang WHERE id_barang = ?";
    $stmt = $db->conn->prepare($query);
    $stmt->bind_param("i", $hapus_id);
    $stmt->execute();
}

header("Location: /lab11_php_oop/index.php/artikel/index");
exit;
?>