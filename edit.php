<?php
// import koneksi
include "db/koneksi.php";

// mengaktifkan session
session_start();
// cek apakah user telah login, jika belum maka dialihkan kehalaman login
if ($_SESSION['login'] != true) {
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentest</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header mb-5">
                <h1 class="text-center">Universitas Raharja</h1>
                <h3 class="text-center">Keamanan Komputer</h3>

            </div>
            <div class="row">
                <div class="col-lg-11">
                    <a href="index.php" class="btn btn-primary"> Kembali</a>
                </div>
                <div class="col-lg-1"><a onclick="return confirm('Ingin Keluar ?')" href="logout.php" class="btn btn-danger"> Logout</a></div>
            </div>
            <div class="card-body">
                <fieldset>
                    <legend>Edit Mahasiswa</legend>
                    <?php
                    $id = $_GET['id'];

                    $result = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE id = '$id'");

                    while ($mhs = mysqli_fetch_assoc($result)) {
                    ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nim">NIM</label>
                                    <input type="number" name="nim" class="form-control" value="<?= $mhs['nim']; ?>" id="nim">
                                    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= $mhs['nama']; ?>" id="nama">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="no_tlp">No Handphone</label>
                                    <input type="number" name="no_tlp" class="form-control" value="<?= $mhs['no_tlp']; ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="alamat" class="text-center">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="5"><?= $mhs['alamat']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="Update" class="btn btn-success" value="Simpan">
                            </div>
                        </form>
                    <?php } ?>
                </fieldset>
            </div>
            <?php
            // cek apakah tombol submit sudah di tekan atau belum
            if (isset($_POST['Update'])) {
                $id     = $_POST['id'];
                $nim    = $_POST['nim'];
                $nama   = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $no_tlp = $_POST['no_tlp'];

                // Update data ke tabel mahasiswa
                $result = mysqli_query($conn, "UPDATE tbl_mahasiswa SET
                nim      = '$nim',
                nama     = '$nama',
                alamat   = '$alamat',
                no_tlp   = '$no_tlp'
                WHERE id = '$id'");

                // menampilkan pesan berhasil
                echo "<script>alert('Data Mahasiswa Berhasil di Update.')</script>";
                echo "<script>window.location = 'index.php';</script>";
            }
            ?>
        </div>
    </div>
</body>

</html>