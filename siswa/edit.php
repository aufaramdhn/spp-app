<?php

$id = $_GET['id_siswa'];

$q_siswa = mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON (siswa.id_kelas = kelas.id_kelas) JOIN spp ON (siswa.id_spp = spp.id_spp) WHERE id_siswa = '$id'");

$kelas = mysqli_query($conn, "SELECT * FROM kelas");

$q_spp = mysqli_query($conn, "SELECT * FROM spp");

$siswa = mysqli_fetch_assoc($q_siswa);

if (isset($_POST['simpan'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $tahun = $_POST['tahun'];

    $tambah = mysqli_query($conn, "UPDATE siswa SET nisn ='$nisn', nama_siswa ='$nama', email ='$email', password ='$password', id_kelas ='$kelas', alamat ='$alamat', no_telp ='$notelp', id_spp ='$tahun' WHERE id_siswa = '$id'");

    set_flash('success', 'Akun siswa berhasil diedit');
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
                            <h4 class="mb-0">Edit siswa</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= flash() ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="number" class="form-control " name="nisn" id="nisn" placeholder="" value="<?= $siswa['nisn'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama siswa</label>
                            <input type="text" class="form-control " name="nama" id="nama" aria-describedby="helpId" placeholder="" value="<?= $siswa['nama_siswa'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control " name="email" id="email" placeholder="" value="<?= $siswa['email'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control " name="password" id="password" placeholder="" value="<?= $siswa['password'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas dan Jurusan</label>
                            <select class="form-select " name="kelas" id="kelas" required>
                                <option value="<?= $siswa['id_kelas'] ?>" hidden><?= $siswa['nama_kelas'] ?> | <?= $siswa['jurusan'] ?></option>
                                <?php foreach ($kelas as $kls) : ?>
                                    <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?> | <?= $kls['jurusan'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control " name="alamat" id="alamat" placeholder="" value="<?= $siswa['alamat'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="notelp" class="form-label">No. Telepon</label>
                            <input type="number" class="form-control " name="notelp" id="notelp" placeholder="" value="<?= $siswa['no_telp'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Ajaran</label>
                            <select class="form-select" name="tahun" id="tahun" required>
                                <option value="<?= $siswa['id_spp'] ?>" hidden><?= $siswa['tahun'] ?></option>
                                <?php foreach ($q_spp as $spp) : ?>
                                    <option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="confirm('Ingin mengubah data?')" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>