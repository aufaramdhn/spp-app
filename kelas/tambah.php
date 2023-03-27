<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];


    $check_riwayat = mysqli_query($conn, "SELECT * FROM kelas WHERE jurusan = '$jurusan'");

    if (mysqli_num_rows($check_riwayat) > 0) {
        $riwayat = mysqli_fetch_assoc($check_riwayat);
        if ($riwayat['jurusan'] == $nama) {
            set_flash('danger', 'Jurusan sudah ada');
            back();
            exit;
        }
    }
    $tambah = mysqli_query($conn, "INSERT INTO kelas VALUES(null,'$nama','$jurusan')");

    set_flash('success', 'Kelas berhasil ditambahkan');
    header('Location: index.php?page=kelas');
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
                            <a href="<?= $config ?>/index.php?page=kelas" class="btn btn-outline-danger"><i class="bi bi-arrow-left"></i></a>
                        </div>
                        <div>
                            <h4 class="mb-0">Tambah Kelas</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= flash() ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Masukan nama kelas" required />
                        </div>

                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" name="jurusan" id="jurusan" placeholder="Masukan jurusan" required />
                        </div>

                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>