<?php

$id = $_GET['id_admin'];

$q_admin = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = '$id'");

$admin = mysqli_fetch_assoc($q_admin);

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $tambah = mysqli_query($conn, "UPDATE admin SET nama_admin = '$nama', email = '$email', password = '$password' WHERE id_admin = '$id'");

    set_flash('success', 'Akun admin berhasil diedit');
    header('Location: index.php?page=admin');
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
                            <a href="<?= $config ?>/index.php?page=admin" class="btn btn-outline-danger"><i class="bi bi-arrow-left"></i></a>
                        </div>
                        <div>
                            <h4 class="mb-0">Edit Admin</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= flash() ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Admin</label>
                            <input type="text" class="form-control " name="nama" id="nama" aria-describedby="helpId" placeholder="" value="<?= $admin['nama_admin'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control " name="email" id="email" placeholder="" value="<?= $admin['email'] ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control " name="password" id="password" placeholder="" value="<?= $admin['password'] ?>" required />
                        </div>

                        <button type="submit" class="btn btn-primary" onclick="confirm('Ingin mengubah data?')" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>