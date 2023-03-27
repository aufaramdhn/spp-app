<?php

$q_transaksi = mysqli_query($conn, "SELECT id_pembayaran,siswa.id_siswa,siswa.nama_siswa, spp.tahun, nama_kelas, jurusan FROM pembayaran JOIN admin ON (pembayaran.id_admin = admin.id_admin) JOIN siswa ON (pembayaran.id_siswa = siswa.id_siswa) JOIN spp ON (pembayaran.id_spp = spp.id_spp) JOIN kelas ON (siswa.id_kelas = kelas.id_kelas) GROUP BY siswa.id_siswa, spp.tahun");

$id_siswa = $_SESSION['id_user'];

$q_transaksi_u = mysqli_query($conn, "SELECT id_pembayaran,siswa.id_siswa,siswa.nama_siswa, spp.tahun, nama_kelas, jurusan FROM pembayaran JOIN admin ON (pembayaran.id_admin = admin.id_admin) JOIN siswa ON (pembayaran.id_siswa = siswa.id_siswa) JOIN spp ON (pembayaran.id_spp = spp.id_spp) JOIN kelas ON (siswa.id_kelas = kelas.id_kelas) WHERE siswa.id_siswa = '$id_siswa' GROUP BY siswa.id_siswa, spp.tahun")

?>
<div class="container my-5">
    <?= flash() ?>
    <div class="text-center">
        <h4>
            HALAMAN TRANSAKSI
        </h4>
        <?php if ($_SESSION['level'] == 'admin') : ?>
            <div class="container my-5">
                <div class="card shadow-sm">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">Transaksi</h4>
                            </div>
                            <div>
                                <a href="<?= $config ?> /index.php?page=tambah_transaksi " class="btn btn-outline-success"><i class="bi bi-plus-circle"></i> Tambah Transaksi</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-light text-primary">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($q_transaksi as $trx) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $trx['nama_siswa'] ?></td>
                                            <td><?= $trx['nama_kelas'] ?> <?= $trx['jurusan'] ?></td>
                                            <td><?= $trx['tahun'] ?></td>
                                            <td>
                                                <a href="<?= $config ?>/index.php?page=detail_transaksi&tahun=<?= $trx['tahun'] ?>&id_siswa=<?= $trx['id_siswa'] ?>" class="btn btn-outline-primary btn-sm">Lihat Selengkapnya</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php if (mysqli_num_rows($q_transaksi) < 1) : ?>
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
        <?php else : ?>
            <div class="container my-5">
                <div class="card shadow-sm">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0">Transaksi</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-light text-primary">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($q_transaksi_u as $trx) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $trx['nama_siswa'] ?></td>
                                            <td><?= $trx['nama_kelas'] ?> <?= $trx['jurusan'] ?></td>
                                            <td><?= $trx['tahun'] ?></td>
                                            <td>
                                                <a href="<?= $config ?>/index.php?page=detail_transaksi&tahun=<?= $trx['tahun'] ?>&id_siswa=<?= $trx['id_siswa'] ?>" class="btn btn-outline-primary btn-sm">Lihat Selengkapnya</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php if (mysqli_num_rows($q_transaksi) < 1) : ?>
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
        <?php endif ?>
    </div>
</div>