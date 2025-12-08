**Nama            : Alipiani Dwi Putri**

**NIM             : 312410691**

**Kelas           : TI 24 A2**

**Mata Kuliah     : Pemrograman Web 1**

**Dosen Pengampu  :**

# Lab11Web




**1. config**

**Code**
```
<?php
$config = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'latihan1'
];
?>
```
2. class/Database.php

Code
```
<?php
class Database
{
    protected $host;
    protected $user;
    protected $password;
    protected $db_name;
    protected $conn;

    public function __construct()
    {
        $this->getConfig();
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    private function getConfig()
    {
        include(__DIR__ . "/../config.php");
        $this->host = $config['host'];
        $this->user = $config['username'];
        $this->password = $config['password'];
        $this->db_name = $config['db_name'];
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function get($table, $where = null)
    {
        if ($where) {
            $where = " WHERE " . $where;
        }
        $sql = "SELECT * FROM " . $table . $where;
        $sql = $this->conn->query($sql);
        return $sql->fetch_assoc();
    }

    public function insert($table, $data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $column[] = $key;
                $value[] = "'{$val}'";
            }
            $columns = implode(",", $column);
            $values = implode(",", $value);
        }
        $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")";
        $sql = $this->conn->query($sql);

        if ($sql == true) {
            return $sql;
        } else {
            return false;
        }
    }

    public function update($table, $data, $where)
    {
        $update_value = [];
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $update_value[] = "$key='{$val}'";
            }
            $update_value = implode(",", $update_value);
        }

        $sql = "UPDATE " . $table . " SET " . $update_value . " WHERE " . $where;
        $sql = $this->conn->query($sql);

        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }
}
?>
```
**3. class/Form.php**

**Code**
```
<?php
/**
 * Nama Class: Form
 * Deskripsi: Class untuk membuat form inputan dinamis (Text, Textarea, Select, Radio, Checkbox)
 */
class Form
{
    private $fields = array();
    private $action;
    private $submit = "Submit Form";
    private $jumField = 0;

    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function displayForm()
    {
        echo "<form action='" . $this->action . "' method='POST'>";
        echo '<table width="100%" border="0">';

        foreach ($this->fields as $field) {
            echo "<tr><td align='right' valign='top'>" . $field['label'] . "</td>";
            echo "<td>";

            // Logika untuk menentukan tipe input
            switch ($field['type']) {
                case 'textarea':
                    echo "<textarea name='" . $field['name'] . "' cols='30' rows='4'></textarea>";
                    break;

                case 'select':
                    echo "<select name='" . $field['name'] . "'>";
                    foreach ($field['options'] as $value => $label) {
                        echo "<option value='" . $value . "'>" . $label . "</option>";
                    }
                    echo "</select>";
                    break;

                case 'radio':
                    foreach ($field['options'] as $value => $label) {
                        echo "<label><input type='radio' name='" . $field['name'] . "' value='" . $value . "'> " . $label . "</label> ";
                    }
                    break;

                case 'checkbox':
                    foreach ($field['options'] as $value => $label) {
                        // Untuk checkbox group, nama biasanya ditambah [] agar jadi array
                        echo "<label><input type='checkbox' name='" . $field['name'] . "[]' value='" . $value . "'> " . $label . "</label> ";
                    }
                    break;

                case 'password':
                    echo "<input type='password' name='" . $field['name'] . "'>";
                    break;

                default: // Defaultnya adalah text input biasa
                    echo "<input type='text' name='" . $field['name'] . "'>";
                    break;
            }
            echo "</td></tr>";
        }
        echo "<tr><td colspan='2'>";
        echo "<input type='submit' value='" . $this->submit . "'></td></tr>";
        echo "</table>";
        echo "</form>";
    }

    /**
     * addField
     * @param string $name Nama atribut (name='')
     * @param string $label Label untuk field
     * @param string $type Tipe input (text, textarea, select, radio, checkbox, password)
     * @param array $options Opsi untuk select/radio/checkbox (format: ['value' => 'Label'])
     */
    public function addField($name, $label, $type = "text", $options = array())
    {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type;
        $this->fields[$this->jumField]['options'] = $options;
        $this->jumField++;
    }
}
?>
```

**4. .htaccess**

**Code**
```
apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /lab11_php_oop/
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
</IfModule>
```

**5. index.php (Front Controller)**

**Code**
```
<?php
include "config.php";
include "class/Database.php";
include "class/Form.php";

session_start();

// ROUTING
$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
$segments = explode('/', trim($url, '/'));

$mod = isset($segments[0]) ? $segments[0] : 'home';
$page = isset($segments[1]) ? $segments[1] : 'index';

$file = "module/{$mod}/{$page}.php";

// LOAD TEMPLATE
include "template/header.php";

if (file_exists($file)) {
    include $file;
} else {
    echo '<div class="error">Modul tidak ditemukan: ' . $mod . '/' . $page . '</div>';
}

include "template/footer.php";
?>
```

**6. template/header.php**

**Code**
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 11 - PHP OOP</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; background: #f5f5f5; }
        .header { background: #2c3e50; color: white; padding: 1rem; }
        .header h1 { margin-bottom: 0.5rem; }
        .nav { display: flex; gap: 1rem; margin-top: 0.5rem; }
        .nav a { color: #ecf0f1; text-decoration: none; padding: 0.5rem 1rem; border-radius: 4px; transition: background 0.3s; }
        .nav a:hover { background: #34495e; }
        .container { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }
        .content { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .footer { text-align: center; padding: 1rem; margin-top: 2rem; color: #7f8c8d; border-top: 1px solid #ddd; }
        .btn { display: inline-block; padding: 0.5rem 1rem; background: #3498db; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn-success { background: #27ae60; }
        .btn-danger { background: #e74c3c; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        table th, table td { padding: 0.75rem; border: 1px solid #ddd; text-align: left; }
        table th { background: #f2f2f2; }
        .error { background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 4px; margin: 1rem 0; }
        .success { background: #d4edda; color: #155724; padding: 1rem; border-radius: 4px; margin: 1rem 0; }
    </style>
</head>
<body>
    <div class="header">
        <div class="container">
            <h1>Praktikum 11 - PHP OOP Lanjutan</h1>
            <div class="nav">
                <a href="/lab11_php_oop/">Home</a>
                <a href="/lab11_php_oop/handphone">Data Handphone</a>
                <a href="/lab11_php_oop/handphone/tambah">Tambah Handphone</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="content">
```
          
**7. template/footer.php**

**Code**
```
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <p>&copy; 2025 - Praktikum Pemrograman Web - Universitas Pelita Bangsa</p>
            <p>NIM: [Your NIM] - Nama: [Your Name]</p>
        </div>
    </div>
</body>
</html>
```

**Output**




<img width="1919" height="151" alt="image" src="https://github.com/user-attachments/assets/77f7d5d8-2960-47c4-b225-c924f8d1e78b" />


config dan httaces
<img width="621" height="317" alt="image" src="https://github.com/user-attachments/assets/2fa545d3-7cd6-4357-a538-b2f11f9d74e8" />

database dan form
<img width="588" height="282" alt="image" src="https://github.com/user-attachments/assets/fc10ceab-4e26-45e6-a9d3-cf71b00261fe" />

header, footer, dan sidebar 
<img width="754" height="346" alt="image" src="https://github.com/user-attachments/assets/d9d40a2b-81d8-4071-a74c-7120ac5e2f79" />

