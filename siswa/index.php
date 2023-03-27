<?php

$q_siswa = mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON (siswa.id_kelas = kelas.id_kelas) JOIN spp ON (siswa.id_spp = spp.id_spp)")

?>

<div class="container my-5">
    <?= flash() ?>
    <div class="text-center">
        <h4>
            HALAMAN SISWA
        </h4>
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">Siswa</h4>
                        </div>
                        <div>
                            <a href="<?= $config ?> /index.php?page=tambah_siswa " class="btn btn-outline-success"><i class="bi bi-plus-circle"></i> Tambah Siswa</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="bg-light text-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">NISN</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No. Telepon</th>
                                    <th scope="col">Tahun Ajaran</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($q_siswa as $sws) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $sws['nisn'] ?></td>
                                        <td><?= $sws['nama_siswa'] ?></td>
                                        <td><?= $sws['email'] ?></td>
                                        <td><?= $sws['password'] ?></td>
                                        <td><?= $sws['nama_kelas'] ?> <?= $sws['jurusan'] ?></td>
                                        <td><?= $sws['alamat'] ?></td>
                                        <td><?= $sws['no_telp'] ?></td>
                                        <td><?= $sws['tahun'] ?></td>
                                        <td>
                                            <a href="<?= $config ?>/index.php?page=edit_siswa&id_siswa=<?= $sws['id_siswa'] ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                            <a href="<?= $config ?>/index.php?page=hapus_siswa&id_siswa=<?= $sws['id_siswa'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin Menghapus Data?')"><i class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (mysqli_num_rows($q_siswa) < 1) : ?>
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