<?php
class Buku
{
    private $conn;
    private $table = 'buku'; // Nama tabel di database

    // Constructor untuk menerima koneksi database
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Create (Menambahkan data)
    public function create($judul_buku, $pengarang, $penerbit)
    {
        $query = "INSERT INTO " . $this->table . " (judul_buku, pengarang, penerbit) VALUES (:judul_buku, :pengarang, :penerbit)";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':judul_buku', $judul_buku);
        $stmt->bindParam(':pengarang', $pengarang);
        $stmt->bindParam(':penerbit', $penerbit);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Read (Mengambil semua data)
    public function read()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Show 
    public function show($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update (Mengubah data berdasarkan ID)
    public function update($id, $judul_buku, $pengarang, $penerbit)
    {
        $query = "UPDATE " . $this->table . " SET judul_buku = :judul_buku, pengarang = :pengarang, penerbit = :penerbit WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':judul_buku', $judul_buku);
        $stmt->bindParam(':pengarang', $pengarang);
        $stmt->bindParam(':penerbit', $penerbit);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete (Menghapus data berdasarkan ID)
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Bind parameter
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
