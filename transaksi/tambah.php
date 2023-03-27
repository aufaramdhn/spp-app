<?php

$bulan = mysqli_query($conn, "SELECT * FROM bulan");
$spp = mysqli_query($conn, "SELECT * FROM spp");
$siswa = mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas");

if (isset($_POST['simpan'])) {
    $admin = $_SESSION['id_user'];
    $siswa = $_POST['siswa'];
    $tanggal = $_POST['tanggal'];
    $bulan = $_POST['bulan'];
    $spp = $_POST['spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];


    $check_riwayat = mysqli_query($conn, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp = spp.id_spp WHERE id_siswa = '$siswa' AND spp_bulan = '$bulan' AND spp.id_spp = '$spp'");

    if (mysqli_num_rows($check_riwayat) > 0) {
        $riwayat = mysqli_fetch_assoc($check_riwayat);
        if ($riwayat['nominal'] == $riwayat['jumlah_bayar']) {
            set_flash('danger', 'Transaksi sudah ada');
            back();
            exit;
        }
    }
    $tambah = mysqli_query($conn, "INSERT INTO pembayaran VALUES(null,'" . rand(111111, 999999) . "','$admin','$siswa','$tanggal','$bulan','$spp','$jumlah_bayar')");

    set_flash('success', 'Transaksi berhasil ditambahkan');
    header('Location: index.php?page=transaksi');
    exit;
}

?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <?= flash() ?>

            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <a href="<?= $config ?>/index.php?page=transaksi" class="btn btn-outline-danger"><i class="bi bi-arrow-left"></i></a>
                        </div>
                        <div>
                            <h4 class="mb-0">Tambah Transaksi</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="siswa" class="form-label">Siswa</label>
                            <select id="id" class="form-select" name="siswa" id="siswa" required>
                                <option value="" hidden>Pilih Siswa</option>
                                <?php foreach ($siswa as $siswa) : ?>
                                    <option value="<?= $siswa['id_siswa'] ?>"><?= $siswa['nama_siswa'] ?> | <?= $siswa['nama_kelas'] ?> <?= $siswa['jurusan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="bulan" class="form-label">Bulan</label>
                            <select class="form-select" name="bulan" id="bulan" required>
                                <option value="" hidden>Pilih Bulan</option>
                                <?php foreach ($bulan as $bln) : ?>
                                    <option value="<?= $bln['id_bulan'] ?>"><?= $bln['nama_bulan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="spp" class="form-label">SPP</label>
                            <select id="id" class="form-select" name="state">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div> -->

                        <div class="mb-3">
                            <label for="spp" class="form-label">SPP</label>
                            <select class="form-select" name="spp" id="spp" required>
                                <option value="" hidden>Pilih SPP</option>
                                <?php foreach ($spp as $spp) : ?>
                                    <option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'] ?> | <?= number_format($spp['nominal'], '0', '.', '.') ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
                            <input type="number" class="form-control" name="jumlah_bayar" id="jumlah_bayar" required>
                        </div>

                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#id').select2();
    });
</script>