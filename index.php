<?php

require("app/koneksi.php");
require("app/config.php");
require("app/fungsi.php");

if (isset($_GET['page']) && !isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
} else if (!isset($_GET['page']) && isset($_SESSION['login'])) {
    header('Location: index.php?page=home');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>SPP APP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/select2.min.css">

    <script src="assets/js/jquery.js"></script>

    <script src="assets/js/select2.min.js"></script>

    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">SPP APP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['login'])) : ?>
                            <?php if ($_SESSION['level'] == 'admin') : ?>
                                <a class="nav-link text-white" href="<?= $config ?>/index.php?page=home">Beranda</a>
                                <a class="nav-link text-white" href="<?= $config ?>/index.php?page=siswa">Siswa</a>
                                <a class="nav-link text-white" href="<?= $config ?>/index.php?page=admin">Admin</a>
                                <a class="nav-link text-white" href="<?= $config ?>/index.php?page=kelas">Kelas</a>
                                <a class="nav-link text-white" href="<?= $config ?>/index.php?page=spp">SPP</a>
                                <a class="nav-link text-white" href="<?= $config ?>/index.php?page=transaksi">Transaksi</a>
                                <a class="nav-link text-white btn btn-danger ms-2" href="<?= $config ?>/index.php?page=logout" onclick="return confirm('Ingin Logout?')">Logout</a>
                            <?php else : ?>
                                <a class="nav-link text-white" href="<?= $config ?>/index.php?page=transaksi">Transaksi</a>
                                <a class="nav-link text-white btn btn-danger" href="<?= $config ?>/index.php?page=logout" onclick="return confirm('Ingin Logout?')">Logout</a>
                            <?php endif ?>
                        <?php else : ?>
                            <a class="nav-link text-white" href="./">Login</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : '';

        switch ($page) {
            case 'home':
                include 'home/index.php';
                break;
            case 'siswa':
                include 'siswa/index.php';
                break;
            case 'tambah_siswa':
                include 'siswa/tambah.php';
                break;
            case 'edit_siswa':
                include 'siswa/edit.php';
                break;
            case 'hapus_siswa':
                include 'siswa/hapus.php';
                break;
            case 'admin':
                include 'admin/index.php';
                break;
            case 'tambah_admin':
                include 'admin/tambah.php';
                break;
            case 'edit_admin':
                include 'admin/edit.php';
                break;
            case 'hapus_admin':
                include 'admin/hapus.php';
                break;
            case 'kelas':
                include 'kelas/index.php';
                break;
            case 'tambah_kelas':
                include 'kelas/tambah.php';
                break;
            case 'edit_kelas':
                include 'kelas/edit.php';
                break;
            case 'hapus_kelas':
                include 'kelas/hapus.php';
                break;
            case 'spp':
                include 'spp/index.php';
                break;
            case 'tambah_spp':
                include 'spp/tambah.php';
                break;
            case 'edit_spp':
                include 'spp/edit.php';
                break;
            case 'hapus_spp':
                include 'spp/hapus.php';
                break;
            case 'transaksi':
                include 'transaksi/index.php';
                break;
            case 'detail_transaksi':
                include 'transaksi/detail.php';
                break;
            case 'tambah_transaksi':
                include 'transaksi/tambah.php';
                break;
            case 'edit_transaksi':
                include 'transaksi/edit.php';
                break;
            case 'hapus_transaksi':
                include 'transaksi/hapus.php';
                break;
            case 'logout':
                include 'auth/logout.php';
                break;
            default:
                include 'auth/login.php';
        }
        ?>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>