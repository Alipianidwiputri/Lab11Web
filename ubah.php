<?php
// module/artikel/ubah.php
global $conn;

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$success = false;
$error = '';

// Ambil data barang yang akan diubah
if ($id > 0) {
    $query = "SELECT * FROM data_barang WHERE id_barang = $id";
    $result = mysqli_query($conn, $query);
    $barang = mysqli_fetch_assoc($result);
}

// Jika form disubmit (update data)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga_beli = mysqli_real_escape_string($conn, $_POST['harga_beli']);
    $harga_jual = mysqli_real_escape_string($conn, $_POST['harga_jual']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    $gambar = mysqli_real_escape_string($conn, $_POST['gambar']);
    
    if (!empty($nama) && !empty($harga_beli) && $id > 0) {
        $query = "UPDATE data_barang SET 
                  kategori = '$kategori',
                  nama = '$nama',
                  gambar = '$gambar',
                  harga_beli = '$harga_beli',
                  harga_jual = '$harga_jual',
                  stok = '$stok'
                  WHERE id_barang = $id";
        
        if (mysqli_query($conn, $query)) {
            $success = true;
            // Refresh data barang setelah update
            $query = "SELECT * FROM data_barang WHERE id_barang = $id";
            $result = mysqli_query($conn, $query);
            $barang = mysqli_fetch_assoc($result);
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    } else {
        $error = "Nama barang dan harga beli wajib diisi!";
    }
}

// Jika barang tidak ditemukan
if (!$barang && $id > 0) {
    echo '<div style="background: #f39c12; color: white; padding: 20px; border-radius: 10px; margin-bottom: 20px;">
            <strong>Data tidak ditemukan!</strong> Kembali ke <a href="?page=data-barang" style="color: white; text-decoration: underline;">Data Barang</a>
          </div>';
    exit;
}
?>

<div class="content-area">
    <!-- Header -->
    <div class="title-section mb-4">
        <h1 class="title-main">✏️ Ubah Barang</h1>
        <p style="color: #616161; font-size: 1rem;">Mengubah data barang ID: <strong style="color: #e91e63;"><?php echo $barang['id_barang']; ?></strong></p>
    </div>

    <?php if ($success): ?>
    <div style="background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%); color: white; padding: 15px; border-radius: 10px; margin-bottom: 25px; border-left: 5px solid #1e8449;">
        <div style="font-size: 1.5rem; margin-right: 10px; float: left;">✅</div>
        <div>
            <strong>Sukses!</strong> Data barang berhasil diperbarui.
            <a href="?page=data-barang" style="color: #a3e4d7; text-decoration: underline; margin-left: 10px;">Lihat Data Barang</a>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
    <div style="background: #e74c3c; color: white; padding: 15px; border-radius: 10px; margin-bottom: 25px;">
        <strong>Error:</strong> <?php echo $error; ?>
    </div>
    <?php endif; ?>

    <div class="action-box" style="max-width: 800px; margin: 0 auto;">
        <form method="POST" action="">
            <!-- Kategori -->
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #e91e63;">Kategori</label>
                <input type="text" class="form-control" name="kategori" value="<?php echo htmlspecialchars($barang['kategori']); ?>"
                       style="width: 100%; padding: 12px 15px; border: 2px solid #f8bbd9; border-radius: 8px; background: #fce4ec; color: #616161;"
                       required>
                <small style="color: #f48fb1; font-size: 0.85rem;">Contoh: Elektronik, Pakaian, Makanan, dll.</small>
            </div>
            
            <!-- Nama Barang -->
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #e91e63;">Nama Barang</label>
                <input type="text" class="form-control" name="nama" value="<?php echo htmlspecialchars($barang['nama']); ?>"
                       style="width: 100%; padding: 12px 15px; border: 2px solid #f8bbd9; border-radius: 8px; background: #fff; color: #333;"
                       required>
            </div>
            
            <!-- Gambar -->
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #e91e63;">Nama File Gambar</label>
                <input type="text" class="form-control" name="gambar" value="<?php echo htmlspecialchars($barang['gambar']); ?>"
                       style="width: 100%; padding: 12px 15px; border: 2px solid #f8bbd9; border-radius: 8px; background: #fff; color: #333;">
                <small style="color: #f48fb1; font-size: 0.85rem;">Contoh: hp_samsung.jpg, laptop.jpg, dll.</small>
            </div>
            
            <!-- Harga Beli & Harga Jual -->
            <div style="display: flex; gap: 20px; margin-bottom: 25px; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 250px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #e91e63;">Harga Beli</label>
                    <input type="number" class="form-control" name="harga_beli" value="<?php echo $barang['harga_beli']; ?>"
                           style="width: 100%; padding: 12px 15px; border: 2px solid #f8bbd9; border-radius: 8px; background: #fff; color: #333;"
                           required>
                </div>
                
                <div style="flex: 1; min-width: 250px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #e91e63;">Harga Jual</label>
                    <input type="number" class="form-control" name="harga_jual" value="<?php echo $barang['harga_jual']; ?>"
                           style="width: 100%; padding: 12px 15px; border: 2px solid #f8bbd9; border-radius: 8px; background: #fff; color: #333;"
                           required>
                </div>
            </div>
            
            <!-- Stok -->
            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #e91e63;">Stok</label>
                <input type="number" class="form-control" name="stok" value="<?php echo $barang['stok']; ?>"
                       style="width: 100px; padding: 12px 15px; border: 2px solid #f8bbd9; border-radius: 8px; background: #fff; color: #333;">
            </div>
            
            <!-- Tombol Aksi -->
            <div style="display: flex; gap: 15px; margin-top: 30px; padding-top: 25px; border-top: 2px solid #f8bbd9;">
                <button type="submit" class="btn" 
                        style="background: linear-gradient(135deg, #e91e63 0%, #f06292 100%); color: white; padding: 12px 35px; border-radius: 8px; border: none; font-weight: 600; font-size: 1.1rem; cursor: pointer;">
                    <span style="font-size: 1.2rem;">💾</span>
                    <span style="margin-left: 10px;">Update Barang</span>
                </button>
                
                <a href="?page=data-barang" class="btn" 
                   style="background: #f8bbd9; color: #ad1457; padding: 12px 35px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 1.1rem; border: 2px solid #f48fb1;">
                    <span style="font-size: 1.2rem;">↩️</span>
                    <span style="margin-left: 10px;">Batal</span>
                </a>
                
                <a href="?page=tambah-barang" class="btn" 
                   style="background: #3498db; color: white; padding: 12px 35px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 1.1rem;">
                    <span style="font-size: 1.2rem;">➕</span>
                    <span style="margin-left: 10px;">Tambah Baru</span>
                </a>
            </div>
        </form>
        
        <!-- Info -->
        <div style="margin-top: 30px; padding: 15px; background: #fce4ec; border-radius: 8px;">
            <p style="margin: 0; color: #616161; font-size: 0.9rem;">
                <strong>ID Barang:</strong> <?php echo $barang['id_barang']; ?> |
                <strong>Terakhir diubah:</strong> <?php echo date('d/m/Y H:i:s'); ?>
            </p>
        </div>
    </div>
</div>