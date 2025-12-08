<?php
// module/artikel/index.php
global $conn;

$query = "SELECT * FROM data_barang ORDER BY id_barang DESC";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    exit;
}
?>

<div class="content-area">
    <!-- Header -->
    <div class="title-section mb-4">
        <h1 class="title-main">📋 Data Barang</h1>
        <a href="?page=tambah-barang" class="btn" style="background: linear-gradient(135deg, #e91e63 0%, #f06292 100%); color: white; padding: 10px 25px; border-radius: 8px; text-decoration: none; font-weight: 600;">
            <span style="font-size: 1.2rem;">➕</span>
            <span style="margin-left: 8px;">Tambah Barang Baru</span>
        </a>
    </div>

    <?php if(mysqli_num_rows($result) > 0): ?>
    <div class="table-responsive">
        <table class="table" style="border-radius: 12px; overflow: hidden; border: 1px solid #f8bbd9; background: white;">
            <thead style="background: linear-gradient(135deg, #e91e63 0%, #f06292 100%); color: white;">
                <tr>
                    <th style="padding: 15px; border-bottom: 2px solid #f8bbd9;">ID</th>
                    <th style="padding: 15px; border-bottom: 2px solid #f8bbd9;">Kategori</th>
                    <th style="padding: 15px; border-bottom: 2px solid #f8bbd9;">Nama Barang</th>
                    <th style="padding: 15px; border-bottom: 2px solid #f8bbd9;">Gambar</th>
                    <th style="padding: 15px; border-bottom: 2px solid #f8bbd9;">Harga Beli</th>
                    <th style="padding: 15px; border-bottom: 2px solid #f8bbd9;">Harga Jual</th>
                    <th style="padding: 15px; border-bottom: 2px solid #f8bbd9;">Stok</th>
                    <th style="padding: 15px; border-bottom: 2px solid #f8bbd9;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr style="border-bottom: 1px solid #f8bbd9; transition: background 0.3s;">
                    <td style="padding: 15px; font-weight: 600; color: #e91e63;"><?php echo $row['id_barang']; ?></td>
                    <td style="padding: 15px;"><?php echo htmlspecialchars($row['kategori']); ?></td>
                    <td style="padding: 15px; font-weight: 500;"><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td style="padding: 15px;">
                        <?php if(!empty($row['gambar'])): ?>
                            <img src="images/<?php echo $row['gambar']; ?>" width="50" height="50" alt="Gambar" style="border-radius: 8px; border: 2px solid #f8bbd9;">
                        <?php else: ?>
                            <span style="color: #f48fb1; font-style: italic;">No image</span>
                        <?php endif; ?>
                    </td>
                    <td style="padding: 15px; color: #d81b60; font-weight: 600;">Rp <?php echo number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                    <td style="padding: 15px; color: #c2185b; font-weight: 600;">Rp <?php echo number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                    <td style="padding: 15px;">
                        <span style="background: #f8bbd9; color: #ad1457; padding: 5px 12px; border-radius: 20px; font-weight: 600;">
                            <?php echo $row['stok']; ?> unit
                        </span>
                    </td>
                    <td style="padding: 15px;">
                        <a href="?page=ubah&id=<?php echo $row['id_barang']; ?>" class="btn btn-sm" style="background: #f8bbd9; color: #ad1457; border: 1px solid #f48fb1; margin-right: 5px; padding: 6px 15px; border-radius: 6px;">
                            Ubah
                        </a>
                        <a href="?page=hapus&id=<?php echo $row['id_barang']; ?>" class="btn btn-sm" style="background: #e91e63; color: white; border: none; padding: 6px 15px; border-radius: 6px;" onclick="return confirm('Yakin hapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 20px; padding: 15px; background: #fce4ec; border-radius: 10px; border-left: 4px solid #e91e63;">
        <p style="margin: 0; color: #616161; font-size: 0.9rem;">
            <strong>Total Data:</strong> <?php echo mysqli_num_rows($result); ?> barang 
            | <strong>Theme:</strong> Pink OOP App
        </p>
    </div>
    
    <?php else: ?>
    <div class="action-box" style="text-align: center; padding: 40px;">
        <div style="font-size: 4rem; color: #f48fb1; margin-bottom: 20px;">📦</div>
        <h3 style="color: #e91e63; margin-bottom: 15px;">Belum ada data barang</h3>
        <p style="color: #616161; margin-bottom: 25px;">Mulai dengan menambahkan barang pertama Anda</p>
        <a href="?page=tambah-barang" class="btn" style="background: linear-gradient(135deg, #e91e63 0%, #f06292 100%); color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 1.1rem;">
            <span style="font-size: 1.3rem;">➕</span>
            <span style="margin-left: 10px;">Tambah Barang Pertama</span>
        </a>
    </div>
    <?php endif; ?>
</div>