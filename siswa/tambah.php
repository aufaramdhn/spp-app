<?php

$kelas = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC");

$q_spp = mysqli_query($conn, "SELECT * FROM spp ORDER BY tahun ASC");

$rand_nisn = rand(1111111, 9999999);
$rand_no = rand(19999999, 99999999);

if (isset($_POST['simpan'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $tahun = $_POST['tahun'];


    $check_akun = mysqli_query($conn, "SELECT * FROM siswa WHERE nama_siswa = '$nama'");

    if (mysqli_num_rows($check_akun) > 0) {
        $akun = mysqli_fetch_assoc($check_akun);
        if ($akun['nama_siswa'] == $nama) {
            set_flash('danger', 'Akun siswa sudah ada');
            back();
            exit;
        }
    }
    $tambah = mysqli_query($conn, "INSERT INTO siswa VALUES(null,'$nisn','$nama','$email','$password','$kelas','$alamat','$notelp','$tahun')");

    set_flash('success', 'Akun siswa berhasil ditambahkan');
    header('Location: index.php?page=siswa');
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
                            <a href="<?= $config ?>/index.php?page=siswa" class="btn btn-outline-danger"><i class="bi bi-arrow-left"></i></a>
                        </div>
                        <div>
                            <h4 class="mb-0">Tambah Siswa</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= flash() ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="number" class="form-control " name="nisn" id="nisn" placeholder="Masukan NISN" value="<?= $rand_nisn ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama siswa</label>
                            <input type="text" class="form-control " name="nama" id="nama" aria-describedby="helpId" placeholder="Masukan nama siswa" required />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control " name="email" id="email" placeholder="Masukan email" required />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control " name="password" id="password" placeholder="Masukan password" required />
                        </div>

                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas dan Jurusan</label>
                            <select class="form-select " name="kelas" id="kelas" required>
                                <option value="" hidden>Pilih Kelas</option>
                                <?php foreach ($kelas as $kls) : ?>
                                    <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?> | <?= $kls['jurusan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control " name="alamat" id="alamat" placeholder="Masukan alamat" required />
                        </div>

                        <div class="mb-3">
                            <label for="notelp" class="form-label">No. Telepon</label>
                            <input type="number" class="form-control " name="notelp" id="notelp" placeholder="Masukan no telepon" value="<?= $rand_no ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Ajaran</label>
                            <select class="form-select" name="tahun" id="tahun" required>
                                <option value="" hidden>Pilih Tahun Ajaran</option>
                                <?php foreach ($q_spp as $spp) : ?>
                                    <option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>