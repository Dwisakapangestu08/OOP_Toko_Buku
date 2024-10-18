<?php

include_once "buku.php";
include_once "connection/koneksi.php";

$database = new Koneksi();
$db = $database->connect();

$buku = new Buku($db);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $row = $buku->show($id);
}


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $update = $buku->update($id, $judul_buku, $pengarang, $penerbit);
    if ($update) {
        header("Location: data_buku.php");
    } else {
        echo "Gagal";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <h5 class="my-3">Tambah Buku</h5>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="text" class="form-control" id="judul_buku" value="<?= $row['judul_buku'] ?>" name="judul_buku">
                </div>
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" value="<?= $row['pengarang'] ?>" name="pengarang">
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" value="<?= $row['penerbit'] ?>" name="penerbit">
                </div>
                <button type="submit" name="update" class="btn btn-primary">Edit</button>
                <a href="data_buku.php" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>