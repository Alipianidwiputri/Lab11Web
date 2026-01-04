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








# Praktikum 12 - Autentikasi dan Session

Melanjutkan [Praktikum 11 (PHP OOP)](https://github.com/Alipianidwiputri/Lab11Web) dengan penambahan fitur **Login**, **Logout**, dan **Profile** menggunakan session management.

---

## Fitur Tambahan

### **1. Sistem Login** 
- Form login dengan validasi username & password
- Session tracking untuk user yang login
- Redirect otomatis jika belum login

### **2. Dynamic Menu** 
- **Sebelum Login:** Menu Login tampil
- **Setelah Login:** Menu Profile + Logout tampil

### **3. Halaman Profile** 
- Menampilkan informasi user yang sedang login
- Avatar dengan inisial nama
- Data: Username, Nama Lengkap, Email, Tanggal Terdaftar
- Button Logout

### **4. Session Protection** 
- Halaman data barang hanya bisa diakses setelah login
- Auto-redirect ke login jika session tidak ada

---

##  Database

### **Tabel: users**

```sql
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
```

### **Data Demo:**

| Username | Password | Nama | Email |
|----------|----------|------|-------|
| admin | admin123 | Administrator | admin@example.com |
| alipiani | password123 | Alipiani Dwi Putri | alipiani@example.com |
| user | user123 | User Demo | user@example.com |

---

##  Implementasi Kode

### **1. Session Management**

**File:** `module/user/login.php`

```php
<?php
// Start session dengan check
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verifikasi password (plain text untuk demo)
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            
            header("Location: ../artikel/index.php?login=success");
            exit();
        }
    }
}
?>
```

**Deskripsi:**
- Cek session aktif sebelum `session_start()`
- Validasi username & password dari database
- Set session jika login berhasil
- Redirect ke halaman data barang

---

### **2. Logout Function**

**File:** `module/user/logout.php`

```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION = array();
session_destroy();

header("Location: login.php?logout=success");
exit();
?>
```

**Deskripsi:**
- Hapus semua data session
- Destroy session
- Redirect ke halaman login

---

### **3. Profile Page**

**File:** `module/user/profile.php`

```php
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil data user dari database
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<div class="profile-container">
    <div class="profile-avatar">
        <?php echo strtoupper(substr($user['nama'], 0, 2)); ?>
    </div>
    <h3><?php echo htmlspecialchars($user['nama']); ?></h3>
    <p>@<?php echo htmlspecialchars($user['username']); ?></p>
    
    <!-- Info user -->
    <div class="profile-info">
        <div class="info-group">
            <label>Username:</label>
            <div><?php echo htmlspecialchars($user['username']); ?></div>
        </div>
        <!-- ... Info lainnya ... -->
    </div>
</div>
```

**Deskripsi:**
- Proteksi halaman dengan session check
- Query data user dari database
- Avatar dengan 2 huruf pertama nama
- Tampilan info lengkap user

---

### **4. Dynamic Menu (Header)**

**File:** `template/header.php`

```php
<ul class="navbar-nav ms-auto">
    <?php if (isset($_SESSION['username'])): ?>
        <!-- Menu setelah login -->
        <li><a href="../user/profile.php"> Profile</a></li>
        <li><a href="../user/logout.php"> Logout</a></li>
    <?php else: ?>
        <!-- Menu sebelum login -->
        <li><a href="../user/login.php">Login</a></li>
    <?php endif; ?>
</ul>
```

**Deskripsi:**
- Check session untuk dynamic menu
- Tampil Profile + Logout jika sudah login
- Tampil Login jika belum login

---

## Screenshots

### 1. Halaman Login (Sebelum Login)

<img width="733" height="498" alt="image" src="https://github.com/user-attachments/assets/c44be8dc-7638-4f2a-9066-1f900e71e740" />

- Form login dengan tema pink soft
- Demo account info
- Link kembali ke Data Barang

---

### 2. Menu Sidebar (Sebelum Login)

<img width="318" height="413" alt="image" src="https://github.com/user-attachments/assets/faa35af7-6625-4a07-84b3-b51be8945d42" />

**Menu:**
- Data Barang
- Tambah Barang
- Login

---

### 3. Halaman Login dengan Alert

halaman log in
<img width="1062" height="564" alt="image" src="https://github.com/user-attachments/assets/07cabd43-2840-4f6f-9df6-6fa84d16478b" />


- Alert hijau: "Selamat datang, [Nama]! 👋"
- Redirect otomatis ke Data Barang

---

### 4. Menu Sidebar (Setelah Login)

<img width="315" height="466" alt="image" src="https://github.com/user-attachments/assets/98636d5b-32d1-4e68-8f2b-3fddf1f7dce6" />

**Menu:**
- Data Barang
- Tambah Barang
- Profile ← Muncul setelah login
- Logout ← Muncul setelah login

---

### 5. Halaman Profile


<img width="1055" height="865" alt="image" src="https://github.com/user-attachments/assets/6ce8f589-6c82-41ca-a196-4199856a73f8" />


**Fitur:**
- Avatar circle dengan inisial (AL = Alipiani)
- Nama lengkap: Alipiani Dwi Putri
- Username: @alipiani
- Info: Username, Nama, Email, Terdaftar Sejak
- Button: Kembali + Logout

---

### 6. Database Tabel Users

<img width="1916" height="795" alt="Cuplikan layar 2026-01-04 141246" src="https://github.com/user-attachments/assets/8a8f44e3-712a-4e88-ba22-8efe59e5b464" />


**Data:**
- admin / admin123 / Administrator
- alipiani / password123 / Alipiani Dwi Putri
- user / user123 / User Demo

---

## 🎨 Styling

### **Pink Soft Theme**

```css
/* Profile Avatar */
.profile-avatar {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #ff85c0 0%, #ffb3d9 100%);
    border-radius: 50%;
    color: white;
    font-size: 48px;
}

/* Login Container */
.login-container {
    background: linear-gradient(135deg, #ffffff 0%, #fff5fb 100%);
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 8px 25px rgba(255, 133, 192, 0.15);
}

/* Profile Info Group */
.info-group {
    background: linear-gradient(135deg, #fff0f8 0%, #ffffff 100%);
    border-radius: 12px;
    border-left: 4px solid #ff99cc;
    padding: 15px;
}
```

---

## 🔄 Alur Kerja

### **Flow Diagram:**

```
┌─────────────────────────────────────────┐
│  User Akses Data Barang                 │
└────────────────┬────────────────────────┘
                 ↓
┌─────────────────────────────────────────┐
│  Cek Session: isset($_SESSION['user'])  │
└────────────────┬────────────────────────┘
                 ↓
         ┌───────┴────────┐
         │                │
    Session Ada?      Session Tidak Ada
         │                │
         ↓                ↓
┌──────────────┐   ┌──────────────────┐
│ Tampil Data  │   │ Redirect Login   │
│ Barang       │   │                  │
└──────────────┘   └────────┬─────────┘
                             ↓
                   ┌──────────────────┐
                   │  Form Login      │
                   └────────┬─────────┘
                            ↓
                   ┌──────────────────┐
                   │  Submit Login    │
                   └────────┬─────────┘
                            ↓
                   ┌──────────────────┐
                   │ Validasi User    │
                   └────────┬─────────┘
                            ↓
                    ┌───────┴────────┐
                    │                │
               Valid?            Invalid?
                    │                │
                    ↓                ↓
          ┌──────────────┐   ┌──────────────┐
          │ Set Session  │   │ Error Message│
          │ Redirect     │   │ "Salah!"     │
          └──────────────┘   └──────────────┘
```

---

## ✅ Testing

### **Test Case 1: Login Sukses**
```
1. Akses: http://localhost/lab11_php_oop/module/user/login.php
2. Input: admin / admin123
3. Klik: Login
4. Expected: Redirect ke Data Barang + Alert "Selamat datang!"
5. Result: ✅ Pass
```

### **Test Case 2: Login Gagal**
```
1. Input: admin / wrong_password
2. Klik: Login
3. Expected: Alert merah "Password salah!"
4. Result: ✅ Pass
```

### **Test Case 3: Akses Tanpa Login**
```
1. Logout dulu
2. Akses: http://localhost/lab11_php_oop/module/artikel/
3. Expected: Auto-redirect ke login.php
4. Result: ✅ Pass
```

### **Test Case 4: Profile Page**
```
1. Login dengan alipiani / password123
2. Klik menu "Profile"
3. Expected: Tampil halaman profile dengan data user
4. Result: ✅ Pass
```

### **Test Case 5: Logout**
```
1. Sudah login
2. Klik "Logout"
3. Expected: Session dihapus + redirect ke login
4. Result: ✅ Pass
```

---

## 📂 Struktur File

```
LAB11_PHP_OOP/
├── module/
│   ├── artikel/
│   │   ├── index.php        (Protected - butuh login)
│   │   ├── tambah.php       (Protected)
│   │   ├── ubah.php         (Protected)
│   │   └── hapus.php        (Protected)
│   └── user/
│       ├── login.php        ← BARU (Praktikum 12)
│       ├── logout.php       ← BARU (Praktikum 12)
│       └── profile.php      ← BARU (Praktikum 12)
├── template/
│   ├── header.php           (Updated - Dynamic menu)
│   └── footer.php
├── assets/
│   └── style.css            (Updated - Login & Profile CSS)
├── class/
│   ├── Database.php
│   └── Form.php
├── config.php
└── README.md
```

---

## 🚀 Cara Menjalankan

### **1. Setup Database:**
```sql
-- Jalankan di phpMyAdmin
CREATE TABLE users (...);
INSERT INTO users (...);
```

### **2. Akses Login:**
```
http://localhost/lab11_php_oop/module/user/login.php
```

### **3. Login:**
```
Username: admin
Password: admin123
```

### **4. Akses Profile:**
```
Sidebar → 👤 Profile
```

---
</div>























