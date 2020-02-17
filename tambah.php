<?php
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
                    <legend>Tambah Mahasiswa</legend>
                    <form action="" method="post">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nim">NIM</label>
                                <input type="number" name="nim" class="form-control" placeholder="Masukan NIM Mahasiswa" id="nim">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Mahasiswa" id="nama">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="no_tlp">No Handphone</label>
                                <input type="number" name="no_tlp" class="form-control" placeholder="081234567890">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="alamat" class="text-center">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="Submit" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </fieldset>
            </div>
            <?php
            // cek apakah tombol submit sudah di tekan atau belum
            if (isset($_POST['Submit'])) {
                $nim    = $_POST['nim'];
                $nama   = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $no_tlp = $_POST['no_tlp'];

                // import koneksi
                include "db/koneksi.php";

                // Insert data ke tabel mahasiswa
                $result = mysqli_query($conn, "INSERT INTO tbl_mahasiswa(nim, nama, alamat, no_tlp) VALUES('$nim', '$nama', '$alamat', '$no_tlp')");

                // menampilkan pesan berhasil
                echo "<script>alert('Data Mahasiswa Berhasil di Tambahkan.')</script>";
                echo "<script>window.location = 'index.php';</script>";
            }
            ?>
        </div>
    </div>
</body>

</html>