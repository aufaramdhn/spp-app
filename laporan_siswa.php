<?php
$active = 'laporan';
$title = 'Laporan Siswa | Admin';
include("../layouts/header.php");

date_default_timezone_set('Asia/jakarta');
$today = date("Y-m-d");

$queryRow = mysqli_query($koneksi, "SELECT * FROM tbl_absensi JOIN tbl_siswa ON tbl_siswa.id_siswa = tbl_absensi.id_siswa WHERE tanggal = $today");

$row = mysqli_num_rows($queryRow);
?>

<div class="container">
    <center>
        <h1 class="mt-5 fw-bold">LAPORAN SISWA</h1>
    </center>
    <br>
    <form method="get">
        <div class="d-flex align-items-center">
            <div class="me-2 print">
                <label>Dari Tanggal : </label>
                <input type="date" class="form-control print" name="dari_tgl" required="required">
            </div>
            <div class="me-2 print">
                <label> Sampai Tanggal : </label>
                <input type="date" class="form-control print" name="sampai_tgl" required="required">
            </div>
            <div class="me-2 print">
                <input href="" type="submit" name="filter" value="Filter" class="btn btn-primary btn-fill pull-right mt-4 me-2 print">
            </div>
            <div class="ms-auto mt-5 print">
                <a href="" class="btn btn-success mb-3 print" onclick="window.print()">PRINT LAPORAN</a><br>
            </div>
        </div>
    </form>
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alpa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $AttendedStudents = $koneksi->query("SELECT * FROM tbl_siswa ORDER BY nama");
            foreach ($AttendedStudents as $absensi) :
                if (isset($_GET['filter'])) :
                    $tanggal_awal = mysqli_real_escape_string($koneksi, $_GET['dari_tgl']);
                    $tanggal_akhir = mysqli_real_escape_string($koneksi, $_GET['sampai_tgl']);
            ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $absensi['nama'] ?></td>
                        <td>
                            <?= get_total_attend($absensi['id_siswa'], "Hadir", $tanggal_awal, $tanggal_akhir); ?>
                        </td>
                        <td>
                            <?= get_total_attend($absensi['id_siswa'], "Sakit", $tanggal_awal, $tanggal_akhir); ?>
                        </td>
                        <td>
                            <?= get_total_attend($absensi['id_siswa'], "Izin", $tanggal_awal, $tanggal_akhir); ?>
                        </td>
                        <td>
                            <?= get_total_attend($absensi['id_siswa'], "Alpa", $tanggal_awal, $tanggal_akhir); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php include("../layouts/footer.php") ?>