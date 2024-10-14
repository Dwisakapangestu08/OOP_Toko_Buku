<?php
class Database
{
    private $host = 'localhost'; // Ganti sesuai konfigurasi
    private $db_name = 'nama_database'; // Ganti dengan nama database
    private $username = 'root'; // Ganti dengan username database
    private $password = ''; // Ganti dengan password database
    private $conn;

    // Method untuk membuat koneksi ke database
    public function connect()
    {
        $this->conn = null;

        try {
            // Membuat koneksi menggunakan PDO
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Set mode error PDO ke exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Koneksi berhasil!";
        } catch (PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }

        return $this->conn;
    }
}

// Cara penggunaan
$db = new Database();
$connection = $db->connect();
