<?php

$q_kelas = mysqli_query($conn, "SELECT * FROM kelas ORDER BY nama_kelas ASC")

?>

<div class="container my-5">
    <?= flash() ?>
    <div class="text-center">
        <h4>
            HALAMAN KELAS
        </h4>
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">Kelas</h4>
                        </div>
                        <div>
                            <a href="<?= $config ?> /index.php?page=tambah_kelas " class="btn btn-outline-success"><i class="bi bi-plus-circle"></i> Tambah Kelas</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="bg-light text-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($q_kelas as $kls) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kls['nama_kelas'] ?></td>
                                        <td><?= $kls['jurusan'] ?></td>
                                        <td>
                                            <a href="<?= $config ?>/index.php?page=edit_kelas&id_kelas=<?= $kls['id_kelas'] ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                            <a href="<?= $config ?>/index.php?page=hapus_kelas&id_kelas=<?= $kls['id_kelas'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin Menghapus Data?')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (mysqli_num_rows($q_kelas) < 1) : ?>
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