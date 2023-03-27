<?php

if (isset($_POST['simpan'])) {
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];


    $check_riwayat = mysqli_query($conn, "SELECT * FROM spp WHERE tahun = '$tahun'");

    if (mysqli_num_rows($check_riwayat) > 0) {
        $riwayat = mysqli_fetch_assoc($check_riwayat);
        if ($riwayat['tahun'] == $tahun) {
            set_flash('danger', 'Akun sudah ada');
            back();
            exit;
        }
    }

    $tambah = mysqli_query($conn, "INSERT INTO spp VALUES(null,'$tahun','$nominal')");

    set_flash('success', 'SPP berhasil ditambahkan');
    header('Location: index.php?page=spp');
    exit;
}

?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header py-3">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <a href="<?= $config ?>/index.php?page=spp" class="btn btn-outline-danger"><i class="bi bi-arrow-left"></i></a>
                        </div>
                        <div>
                            <h4 class="mb-0">Tambah SPP</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= flash() ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control" name="tahun" id="tahun" placeholder="Masukan tahun" required />
                        </div>

                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukan nominal" required />
                        </div>

                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>