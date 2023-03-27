<?php

$q_admin = mysqli_query($conn, "SELECT * FROM admin")

?>

<div class="container my-5">
    <?= flash() ?>
    <div class="text-center">
        <h4>
            HALAMAN ADMIN
        </h4>
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">Admin</h4>
                        </div>
                        <div>
                            <a href="<?= $config ?> /index.php?page=tambah_admin " class="btn btn-outline-success"><i class="bi bi-plus-circle"></i> Tambah Admin</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="bg-light text-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Admin</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($q_admin as $adm) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $adm['nama_admin'] ?></td>
                                        <td><?= $adm['email'] ?></td>
                                        <td><?= $adm['password'] ?></td>
                                        <td>
                                            <a href="<?= $config ?>/index.php?page=edit_admin&id_admin=<?= $adm['id_admin'] ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                            <a href="<?= $config ?>/index.php?page=hapus_admin&id_admin=<?= $adm['id_admin'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin Menghapus Data?')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (mysqli_num_rows($q_admin) < 1) : ?>
                                    <tr>
                                        <td class="text-center" colspan="9">Tidak ada data!</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>