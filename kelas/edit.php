<?php

$id = $_GET['id_kelas'];

$q_kelas = mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas = '$id'");

$kelas = mysqli_fetch_assoc($q_kelas);

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $password = $_POST['password'];

    $tambah = mysqli_query($conn, "UPDATE kelas SET nama_kelas = '$nama', jurusan = '$jurusan' WHERE id_kelas = '$id'");

    set_flash('success', 'Nama kelas berhasil diedit');
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
                            <h4 class="mb-0">Edit kelas</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= flash() ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama kelas</label>
                            <input type="text" class="form-control " name="nama" id="nama" aria-describedby="helpId" placeholder="" value="<?= $kelas['nama_kelas'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Email</label>
                            <input type="text" class="form-control " name="jurusan" id="jurusan" placeholder="" value="<?= $kelas['jurusan'] ?>" required />
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="confirm('Ingin mengubah data?')" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>