<?php

include_once "buku.php";
include_once "connection/koneksi.php";

$koneksi = new Koneksi();
$db = $koneksi->connect();

$buku = new Buku($db);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $buku->delete($id);
}

$stmt = $buku->read();
$buku = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h5 class="mt-3">Data Buku</h5>
        <a href="tambah_buku.php" class="btn btn-primary my-2">Tambah Buku</a>
        <table class="table table-striped table-hover">
            <tr>
                <thead>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </thead>
            </tr>
            <?php
            $no = 1;
            foreach ($buku as $row) {
            ?>

                <tr>
                    <tbody>
                        <td><?= $no++ ?></td>
                        <td><?= $row['judul_buku'] ?></td>
                        <td><?= $row['pengarang'] ?></td>
                        <td><?= $row['penerbit'] ?></td>
                        <td>
                            <a href="edit_buku.php?edit=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                            <a href="data_buku.php?delete=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tbody>
                </tr>

            <?php
            }

            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>