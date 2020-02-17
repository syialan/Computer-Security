<?php
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
                    <a href="" class="btn btn-success"> + Tambah Data</a>
                </div>
                <div class="col-lg-1"><a onclick="return confirm('Ingin Keluar ?')" href="logout.php" class="btn btn-danger"> Logout</a></div>
            </div>
            <div class="card-body">
                <fieldset>
                    <legend>Data Mahasiswa</legend>
                    <table id="dataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th width="13%">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>1722497818</td>
                                <td>Syihabudin Alawi</td>
                                <td>
                                    <a href="" class="btn btn-warning"> Edit</a>
                                    <a href="" class="btn btn-danger"> Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery-3.3.1.js"></script>
<script text="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script text="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script text="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

</html>