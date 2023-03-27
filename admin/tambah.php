<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $check_akun = mysqli_query($conn, "SELECT * FROM admin WHERE nama_admin = '$nama'");

    if (mysqli_num_rows($check_akun) > 0) {
        $akun = mysqli_fetch_assoc($check_akun);
        if ($akun['nama_admin'] == $nama) {
            set_flash('danger', 'Akun sudah ada');
            back();
            exit;
        }
    }
    $tambah = mysqli_query($conn, "INSERT INTO admin VALUES(null,'$nama','$email','$password')");

    set_flash('success', 'Akun admin berhasil ditambahkan');
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
                            <h4 class="mb-0">Tambah Admin</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?= flash() ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Admin</label>
                            <input type="text" class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="Masukan nama admin" required />
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan email" required />
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="Masukan password" required />
                        </div>

                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>