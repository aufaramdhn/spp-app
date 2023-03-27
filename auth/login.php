<?php

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $data = mysqli_query($conn, "SELECT * FROM $level WHERE email='$email'");

    $row = mysqli_fetch_array($data);

    if (mysqli_num_rows($data) == 1) {
        if ($password == $row['password']) {
            if ($level == "admin") {
                // berfungsi membuat session
                $_SESSION['login'] = true;
                $_SESSION['level'] = 'admin';
                $_SESSION['id_user'] = $row['id_' . $level];
                //berfungsi mengalihkan ke halaman admin
                header("Location: index.php?page=home");
                // berfungsi mengecek jika user login sebagai moderator
            } else if ($level == "siswa") {
                // berfungsi membuat session
                $_SESSION['login'] = true;
                $_SESSION['level'] = 'siswa';
                $_SESSION['id_user'] = $row['id_' . $level];
                // berfungsi mengalihkan ke halaman moderator
                header("Location: index.php?page=transaksi");
            }
        } else {
            set_flash('danger', 'Email atau password salah!');
            header("Location: index.php?page=login");
            back();
        }
    } else {
        set_flash('danger', 'Akun tidak ditemukan!');
        header("Location: index.php?page=login");
        back();
    }
}

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-sm mb-5">
                <div class="card-header">
                    <h5 class="card-title mb-0 py-2">Login Page</h5>
                </div>
                <div class="card-body">

                    <?php flash() ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="email" id="email" value="">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Level</label>
                            <select class="form-select " name="level" id="level">
                                <option value="siswa">Siswa</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>

                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>

            <div class="text-center">
                Copyright &copy; <?= date('Y') ?> <span class="text-primary">SPP APP</span>. All Rights Reserved
            </div>
        </div>
    </div>
</div>