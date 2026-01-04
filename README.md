**Nama            : Alipiani Dwi Putri**

**NIM             : 312410691**

**Kelas           : TI 24 A2**

**Mata Kuliah     : Pemrograman Web 1**

**Dosen Pengampu  : Agung Nugroho, S.Kom., M.Kom.**


# Lab11Web & Lab12Web

# Tugas Implementasikan konsep modularisasi dari praktikum sebelumnya dan terapkan konsep routing pada project yang baru.

# Struktur LAB11_PHP_OOP/

```
📁 LAB11_PHP_OOP/
├── 📁 assets/
│   └── styles.css
├── 📁 class/
│   ├── Database.php
│   └── Form.php
├── 📁 images/
│   ├── hp_oppo.jpg
│   ├── hp_samsung.jpg
│   └── hp_xiaomi.jpg
├── 📁 module/artikel/
│   ├── hapus.php
│   ├── index.php
│   ├── tambah.php
│   └── ubah.php
├── 📁 template/
│   ├── footer.php
│   ├── header.php
│   └── sidebar.php
├── 📄 .htaccess
├── 📄 config.php
└── 📄 index.php
```

# Tampilan Yang di hasilkan Beserta Penjelasan

# 1. Dashboard

- Deskripsi: Halaman utama/dashboard sistem manajemen barang dengan menu navigasi "Tambah Barang" dan tampilan data barang dalam tabel.

Fitur Utama:

- Dashboard ringkasan barang

- Menu navigasi ke halaman tambah barang

- Tabel data barang dengan kolom: ID, Kategori, Nama Barang, Harga Beli, Harga Jual, Stok, Aksi

- Tombol aksi (Edit/Hapus) untuk setiap barang

**Tampilan**





<img width="1916" height="878" alt="Screenshot 2025-12-08 221322" src="https://github.com/user-attachments/assets/ca8ac99b-d765-4e61-919a-b572ef05ed3f" />







# 2.Tambah Barang

- Deskripsi: Form untuk menambah barang baru ke dalam sistem.

Fitur Utama:

- Form input dengan field: Kategori, Nama Barang, Harga Beli, Harga Jual, Stok, Deskripsi

- Tombol "Kembali ke Daftar Barang"

- Tombol "Simpan" atau submit


**Tampilan**






<img width="1919" height="944" alt="Screenshot 2025-12-08 221357" src="https://github.com/user-attachments/assets/de7b4fed-f131-45d5-9c48-3ee832acd618" />








# 3. Data Barang

- Deskripsi: Halaman yang menampilkan daftar barang lengkap dalam format tabel.

Fitur Utama:

- Tabel dengan kolom: ID, Kategori, Nama Barang, Gambar, Harga Beli, Harga Jual, Stok, Aksi

- Data barang contoh (dummy data)

- Tombol aksi untuk setiap entri

**Tampilan**





<img width="1919" height="952" alt="Screenshot 2025-12-08 221417" src="https://github.com/user-attachments/assets/67a0a049-60e2-41d3-ba38-ef71c07d108d" />


















# 📚 Praktikum 13 - Implementasi Pagination dengan PHP

**Nama:** Alipiani Dwi Putri  
**NIM:** 312410691  
**Kelas:** TI 24 A2  
**Mata Kuliah:** Pemrograman Web 1  
**Dosen:** Agung Nugroho, S.Kom., M.Kom.

---

## 📋 Deskripsi

Praktikum ini merupakan implementasi sistem **Pagination** pada aplikasi manajemen data barang menggunakan PHP dan MySQL. Pagination digunakan untuk membatasi tampilan data menjadi beberapa halaman dengan navigasi yang user-friendly.

Proyek ini merupakan lanjutan dari [Praktikum 11 (PHP OOP)](https://github.com/Alipianidwiputri/Lab11Web) dengan penambahan fitur pagination dan berbagai enhancement UI/UX.

---

## ✨ Fitur Utama

### 🔢 **Pagination System**
- Menampilkan **10 data per halaman**
- Navigasi **Previous** dan **Next** button
- **Nomor halaman** yang dapat diklik langsung
- **Active page indicator** (highlight halaman aktif)
- **Disabled state** untuk Previous/Next di halaman pertama/terakhir
- Info jumlah data: *"Menampilkan 1-10 dari 35 data"*
- Smart page range: `1 ... 3 4 [5] 6 7 ... 10`

### 📦 **CRUD Operations**
- ➕ **Create** - Tambah data barang baru
- 📖 **Read** - Tampilkan data dengan pagination
- ✏️ **Update** - Edit data barang existing
- 🗑️ **Delete** - Hapus data dengan konfirmasi

### 🔐 **Authentication System**
- **Login** dengan session management
- **Logout** dengan session destroy
- **Dynamic menu** berubah sesuai status login
- **Welcome message** setelah login berhasil
- **Demo account** untuk testing

### 💕 **Pink Soft Theme**
- Gradient pink di header, sidebar, dan buttons
- Rounded corners untuk modern look
- Soft shadows untuk depth effect
- Pink custom scrollbar
- Hover animations dan transitions
- Responsive design untuk mobile

### 🎨 **UI/UX Enhancements**
- **Sidebar navigation** di sebelah kiri
- **Sticky header** tetap di atas saat scroll
- **Alert notifications** untuk feedback user
- **Form validation** dengan styling
- **Responsive table** untuk mobile devices

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Versi | Kegunaan |
|-----------|-------|----------|
| **PHP** | 8.0+ | Backend logic & server-side |
| **MySQL** | 5.7+ | Database management |
| **HTML5** | - | Struktur halaman |
| **CSS3** | - | Styling & animations |
| **JavaScript** | - | Client-side interactions |

---

## 📂 Struktur Project

```
LAB11_PHP_OOP/
├── 📁 assets/
│   └── style.css                    # CSS dengan tema Pink Soft
├── 📁 class/
│   ├── Database.php                 # Class untuk koneksi database
│   └── Form.php                     # Class untuk handling form
├── 📁 images/
│   ├── hp_oppo.jpg
│   ├── hp_samsung.jpg
│   └── hp_xiaomi.jpg
├── 📁 module/
│   ├── 📁 artikel/
│   │   ├── index.php               # Halaman data barang (dengan pagination)
│   │   ├── tambah.php              # Form tambah barang
│   │   ├── ubah.php                # Form edit barang
│   │   └── hapus.php               # Proses hapus barang
│   └── 📁 user/
│       ├── login.php               # Halaman login
│       ├── logout.php              # Proses logout
│       └── profile.php             # Halaman profile user
├── 📁 template/
│   ├── header.php                  # Header dengan sidebar
│   ├── footer.php                  # Footer template
│   └── sidebar.php                 # Sidebar navigation
├── .htaccess                       # URL rewriting
├── config.php                      # Konfigurasi database
├── index.php                       # Landing page
└── README.md                       # Dokumentasi project
```

---

## 🔧 Cara Instalasi

### 1️⃣ **Persiapan Environment**

Pastikan sudah terinstall:
- XAMPP (Apache + MySQL + PHP)
- Git (optional)
- Text Editor (VS Code, Sublime, dll)

### 2️⃣ **Clone/Download Project**

**Via Git:**
```bash
git clone https://github.com/Alipianidwiputri/Lab11Web.git
cd Lab11Web
```

**Via Download:**
- Download ZIP dari GitHub
- Extract ke folder `C:\xampp\htdocs\`

### 3️⃣ **Setup Database**

1. Buka **phpMyAdmin**: `http://localhost/phpmyadmin`
2. Buat database baru: `latihan1`
3. Import SQL atau jalankan query berikut:

```sql
-- Buat tabel data_barang
CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Buat tabel users
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert demo users
INSERT INTO `users` (`username`, `password`, `nama`, `email`) VALUES
('admin', 'admin123', 'Administrator', 'admin@example.com'),
('alipiani', 'password123', 'Alipiani Dwi Putri', 'alipiani@example.com');

-- Insert data dummy (untuk testing pagination)
INSERT INTO `data_barang` (`kategori`, `nama`, `harga_beli`, `harga_jual`, `stok`) VALUES
('Elektronik', 'HP Samsung Galaxy A54', 4500000.00, 5200000.00, 25),
('Elektronik', 'HP Oppo Reno 8', 3800000.00, 4500000.00, 30),
('Elektronik', 'HP Xiaomi Redmi Note 12', 2500000.00, 3000000.00, 40),
('Komputer', 'Laptop Asus VivoBook', 6500000.00, 7500000.00, 15),
('Komputer', 'Monitor LG 24 Inch', 1800000.00, 2200000.00, 28);
-- ... tambahkan 25 data lagi untuk total 30+ data
```

### 4️⃣ **Konfigurasi Database**

Edit file `config.php`:
```php
<?php
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}
if (!defined('DB_USER')) {
    define('DB_USER', 'root');
}
if (!defined('DB_PASS')) {
    define('DB_PASS', '');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'latihan1');
}
?>
```

### 5️⃣ **Jalankan Aplikasi**

1. Start **Apache** dan **MySQL** di XAMPP Control Panel
2. Buka browser
3. Akses: `http://localhost/LAB11_PHP_OOP/module/artikel/`

---

## 📱 Cara Penggunaan

### **1. Akses Halaman Data Barang**
```
http://localhost/LAB11_PHP_OOP/module/artikel/index.php
```

### **2. Login (Optional)**
- Klik menu **"Login"** di sidebar
- Gunakan demo account:
  - Username: `admin`
  - Password: `admin123`

### **3. Kelola Data Barang**
- **Tambah:** Klik tombol "➕ Tambah Barang"
- **Edit:** Klik tombol "Ubah" pada data yang ingin diedit
- **Hapus:** Klik tombol "Hapus" (akan ada konfirmasi)

### **4. Navigasi Pagination**
- Klik **Previous** untuk halaman sebelumnya
- Klik **Next** untuk halaman berikutnya
- Klik **nomor halaman** untuk langsung ke halaman tersebut

---

## 🎯 Logika Pagination

### **Konsep Dasar**

Pagination membagi data menjadi beberapa halaman dengan menggunakan SQL `LIMIT` dan `OFFSET`.

### **Rumus Perhitungan**

```php
// Data per halaman
$per_page = 10;

// Halaman saat ini
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Hitung offset (data mulai dari mana)
$offset = ($page - 1) * $per_page;

// Hitung total halaman
$total_pages = ceil($row_count / $per_page);

// Query dengan LIMIT dan OFFSET
$sql = "SELECT * FROM data_barang LIMIT $per_page OFFSET $offset";
```

### **Contoh Perhitungan**

| Halaman | Per Page | Offset | Data Ditampilkan |
|---------|----------|--------|------------------|
| 1 | 10 | 0 | Record 1-10 |
| 2 | 10 | 10 | Record 11-20 |
| 3 | 10 | 20 | Record 21-30 |
| 4 | 10 | 30 | Record 31-40 |

**Jika total data = 35:**
- Total halaman = `ceil(35 / 10)` = **4 halaman**
- Halaman 1: Data 1-10
- Halaman 2: Data 11-20
- Halaman 3: Data 21-30
- Halaman 4: Data 31-35 (hanya 5 data)

### **Implementasi Previous & Next**

```php
// Previous Button
<?php if ($page > 1): ?>
    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
<?php else: ?>
    <span class="disabled">Previous</span>
<?php endif; ?>

// Next Button
<?php if ($page < $total_pages): ?>
    <a href="?page=<?php echo $page + 1; ?>">Next</a>
<?php else: ?>
    <span class="disabled">Next</span>
<?php endif; ?>
```

---

## 💡 Fitur Tambahan (Enhancement)

Berikut adalah fitur-fitur tambahan yang saya implementasikan di luar requirement praktikum:

### 🎨 **1. Pink Soft Theme**

**Deskripsi:** Tema visual dengan warna pink yang soft dan profesional.

**Implementasi:**
- Gradient pink: `#ff85c0` → `#ffb3d9`
- Background: `#ffeef8` → `#ffe4f1` → `#ffd4ea`
- Rounded corners: 10-25px radius
- Soft shadows dengan warna pink
- Custom pink scrollbar

**File:** `assets/style.css`

**Preview:**
```css
.top-header {
    background: linear-gradient(135deg, #ff85c0 0%, #ffb3d9 100%);
}
```

---

### 🔐 **2. Authentication System**

**Deskripsi:** Sistem login dan logout dengan session management.

**Fitur:**
- Login form dengan validasi
- Session untuk tracking user yang login
- Logout dengan session destroy
- Demo account untuk testing
- Alert notifikasi login berhasil/gagal

**File:**
- `module/user/login.php` - Form login
- `module/user/logout.php` - Proses logout

**Demo Account:**
```
Username: admin
Password: admin123
```

**Flow:**
```
Login → Set Session → Redirect → Welcome Message
Logout → Destroy Session → Redirect → Logout Message
```

---

### 🎯 **3. Dynamic Menu Navigation**

**Deskripsi:** Menu sidebar yang berubah otomatis berdasarkan status login.

**Kondisi:**
- **Belum Login:** Menu menampilkan "🔐 Login"
- **Sudah Login:** Menu menampilkan "👤 Profile" + "🚪 Logout"

**Implementasi:**
```php
<?php if (isset($_SESSION['username'])): ?>
    <!-- Menu untuk user yang sudah login -->
    <li><a href="profile.php">👤 Profile</a></li>
    <li><a href="logout.php">🚪 Logout</a></li>
<?php else: ?>
    <!-- Menu untuk user yang belum login -->
    <li><a href="login.php">🔐 Login</a></li>
<?php endif; ?>
```

**File:** `template/header.php`

---

### 📊 **4. Info Pagination**

**Deskripsi:** Informasi jumlah data yang sedang ditampilkan.

**Format:** *"Menampilkan 1 - 10 dari 35 data"*

**Implementasi:**
```php
<div class="info-pagination">
    Menampilkan <?php echo $offset + 1; ?> - 
    <?php echo min($offset + $per_page, $row_count); ?> 
    dari <?php echo $row_count; ?> data
</div>
```

**Manfaat:**
- User tahu posisi data yang sedang dilihat
- User tahu total keseluruhan data
- Meningkatkan UX

---

### 🎪 **5. Sidebar Layout**

**Deskripsi:** Layout modern dengan sidebar di kiri dan konten di kanan.

**Struktur:**
```
┌──────────────────────────────────────┐
│  Header (Full Width)                 │
├──────┬───────────────────────────────┤
│      │                               │
│ Side │     Main Content              │
│ bar  │     (Konten dinamis)          │
│      │                               │
└──────┴───────────────────────────────┘
```

**Fitur:**
- Sticky sidebar (tetap saat scroll)
- Responsive (mobile → full width)
- Active menu indicator
- Icon untuk setiap menu

**File:** `template/header.php`, `assets/style.css`

---

### 🔔 **6. Alert Notifications**

**Deskripsi:** Notifikasi visual untuk feedback user action.

**Jenis Alert:**
- ✅ **Success** (hijau) - Data berhasil ditambah/edit/hapus
- ❌ **Error** (merah) - Login gagal, error sistem
- ℹ️ **Info** (biru) - Informasi umum

**Implementasi:**
```php
<?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
    <div class="alert alert-success">
        Data barang berhasil ditambahkan! ✅
    </div>
<?php endif; ?>
```

**Styling:**
```css
.alert-success {
    background: linear-gradient(135deg, #66d9aa 0%, #8ee5bf 100%);
    color: white;
    padding: 15px 20px;
    border-radius: 10px;
}
```

---

### ✨ **7. Hover & Animation Effects**

**Deskripsi:** Animasi smooth untuk meningkatkan interaktivitas.

**Implementasi:**

**Button Hover:**
```css
.btn-tambah:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 133, 192, 0.4);
}
```

**Table Row Hover:**
```css
table.data tbody tr:hover {
    background-color: #fff0f8;
}
```

**Page Link Hover:**
```css
.page-link:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(255, 133, 192, 0.4);
}
```

---

### 🎨 **8. Smart Page Range**

**Deskripsi:** Menampilkan range halaman yang smart, tidak semua nomor ditampilkan.

**Contoh:**
- Total 20 halaman, di halaman 10:
  ```
  Previous  1 ... 8 9 [10] 11 12 ... 20  Next
  ```

**Logic:**
```php
$range = 2; // Jumlah halaman di kiri & kanan
$start = max(1, $page - $range);
$end = min($total_pages, $page + $range);

// Tampilkan dots jika ada gap
if ($start > 1) {
    echo '<a href="?page=1">1</a>';
    if ($start > 2) {
        echo '<span>...</span>';
    }
}
```

---

### 📱 **9. Responsive Design**

**Deskripsi:** Tampilan menyesuaikan ukuran layar device.

**Breakpoints:**
```css
@media screen and (max-width: 768px) {
    .sidebar {
        width: 100%;
        position: relative;
    }
    
    .main-content {
        padding: 15px;
    }
}
```

**Fitur Responsive:**
- Sidebar full width di mobile
- Font size lebih kecil di mobile
- Padding & margin menyesuaikan
- Table scrollable horizontal

---

### 🎯 **10. Active Page Indicator**

**Deskripsi:** Halaman yang sedang aktif diberi highlight khusus.

**Implementasi:**
```php
<?php if ($i == $page): ?>
    <span class="page-link active"><?php echo $i; ?></span>
<?php else: ?>
    <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
<?php endif; ?>
```

**Styling:**
```css
.page-link.active {
    background: linear-gradient(135deg, #ff66a3 0%, #ff85c0 100%);
    font-weight: bold;
    transform: scale(1.05);
}
```

---

## 📸 Screenshots

### 1. Halaman Data Barang (dengan Pagination)
![Data Barang](screenshots/data-barang.png)
- Tabel data dengan 10 record per halaman
- Pagination buttons di bawah
- Info jumlah data ditampilkan

### 2. Halaman Login
![Login Page](screenshots/login.png)
- Form login dengan tema pink
- Demo account info
- Link kembali ke data barang

### 3. Form Tambah Barang
![Tambah Barang](screenshots/tambah.png)
- Form input dengan styling pink
- Validation pada setiap field
- Button submit & cancel

### 4. Pagination Navigation
![Pagination](screenshots/pagination.png)
- Previous & Next buttons
- Nomor halaman dengan active indicator
- Disabled state untuk first/last page

---

## 🎓 Pembelajaran

### **Yang Dipelajari dari Praktikum Ini:**

1. ✅ **SQL LIMIT & OFFSET** untuk pagination
2. ✅ **Perhitungan matematika** untuk page calculation
3. ✅ **PHP Session Management** untuk authentication
4. ✅ **CSS Modern** (gradient, shadow, animation)
5. ✅ **Responsive Web Design** dengan media queries
6. ✅ **UX/UI Principles** untuk user experience
7. ✅ **Error Handling** dan debugging
8. ✅ **Code Organization** dengan OOP dan modular structure

### **Skill yang Dikembangkan:**

- 💻 **Backend:** PHP, MySQL, Session
- 🎨 **Frontend:** HTML, CSS, JavaScript
- 🏗️ **Architecture:** MVC-like structure, OOP
- 🔧 **Tools:** Git, VS Code, phpMyAdmin
- 🎯 **Problem Solving:** Debugging, optimization

---

## 🐛 Troubleshooting

### **Problem 1: Pagination tidak muncul**
**Solusi:** 
- Pastikan data lebih dari 10 record
- Cek query SQL berhasil dijalankan
- Cek variable `$total_pages` tidak error

### **Problem 2: CSS tidak terapply**
**Solusi:**
- Clear browser cache (Ctrl + Shift + Delete)
- Hard refresh (Ctrl + F5)
- Cek path CSS di header.php

### **Problem 3: Error koneksi database**
**Solusi:**
- Cek Apache & MySQL sudah running
- Cek kredensial di config.php
- Cek nama database sudah benar

### **Problem 4: Login tidak berfungsi**
**Solusi:**
- Pastikan tabel `users` sudah dibuat
- Cek session_start() dipanggil
- Cek username & password sudah benar

---

## 🔮 Future Development

Beberapa ide pengembangan untuk ke depan:

- 🔍 **Search & Filter** - Cari data berdasarkan nama/kategori
- 📊 **Export Data** - Export ke Excel/PDF
- 📸 **Image Upload** - Upload gambar produk
- 📈 **Dashboard Analytics** - Statistik data barang
- 🎨 **Theme Switcher** - Pilihan tema warna
- 🔒 **Role Management** - Admin & User roles
- 📱 **PWA** - Progressive Web App support
- 🌐 **Multi-language** - Support bahasa Indonesia & English

---

## 📄 Lisensi

Project ini dibuat untuk keperluan pembelajaran dan dapat digunakan secara bebas untuk tujuan edukatif.

---

## 👩‍💻 Author

**Alipiani Dwi Putri**
- NIM: 312410691
- Kelas: TI 24 A2
- Email: alipiani@example.com
- GitHub: [@Alipianidwiputri](https://github.com/Alipianidwiputri)

---

## 🙏 Acknowledgments

- **Dosen Pembimbing:** Agung Nugroho, S.Kom., M.Kom.
- **Referensi:** Modul Praktikum Pemrograman Web 1
- **Tools:** XAMPP, VS Code, phpMyAdmin
- **Inspiration:** Modern web design & UX principles

---

## 📞 Contact & Support

Jika ada pertanyaan atau menemukan bug, silakan:
- 📧 Email: alipiani@example.com
- 💬 GitHub Issues: [Create Issue](https://github.com/Alipianidwiputri/Lab11Web/issues)
- 📱 WhatsApp: 08xx-xxxx-xxxx

---

<div align="center">

**⭐ Jika project ini membantu, jangan lupa beri star! ⭐**

Made with 💕 by **Alipiani Dwi Putri**

**© 2026 - Praktikum Pemrograman Web 1**

</div>









