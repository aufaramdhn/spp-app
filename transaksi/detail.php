<?php

$id = $_GET['id_siswa'];
$tahun = $_GET['tahun'];

$q_transaksi = mysqli_query($conn, "SELECT *, DATE_FORMAT(tgl_bayar, '%d %M %Y') as tgl FROM pembayaran JOIN admin ON (pembayaran.id_admin = admin.id_admin) JOIN siswa ON (pembayaran.id_siswa = siswa.id_siswa) JOIN spp ON (pembayaran.id_spp = spp.id_spp) WHERE spp.tahun = '$tahun' AND siswa.id_siswa = '$id'");

?>

<div class="container my-5">
    <?= flash() ?>
    <div class="text-center">
        <h4>
            HALAMAN TRANSAKSI
        </h4>
        <div class="container my-5">
            <div class="card shadow-sm">
                <div class="card-header py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0">Transaksi</h4>
                        </div>
                        <div>
                            <a href="<?= $config ?> /index.php?page=transaksi " class="btn btn-outline-danger"><i class="bi bi-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="bg-light text-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">TRXID</th>
                                    <th scope="col">Nama Admin</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Tanggal Bayar</th>
                                    <th scope="col">SPP Bulan</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Jumlah Bayar</th>
                                    <?php if ($_SESSION['level'] == 'admin') : ?>
                                        <th scope="col">Opsi</th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($q_transaksi as $trx) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>#<?= $trx['trxid'] ?></td>
                                        <td><?= $trx['nama_admin'] ?></td>
                                        <td><?= $trx['nama_siswa'] ?></td>
                                        <td><?= $trx['tgl'] ?></td>
                                        <td><?= nama_bulan($trx['spp_bulan']) ?> <?= $trx['tahun'] ?></td>
                                        <td>Rp. <?= number_format($trx['nominal'], '0', '.', '.') ?></td>
                                        <td>Rp. <?= number_format($trx['jumlah_bayar'], '0', '.', '.') ?></td>
                                        <?php if ($_SESSION['level'] == 'admin') : ?>
                                            <td>
                                                <a href="<?= $config ?>/index.php?page=edit_transaksi&id_transaksi=<?= $trx['id_pembayaran'] ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></a>
                                                <a href="<?= $config ?>/index.php?page=hapus_transaksi&id_transaksi=<?= $trx['id_pembayaran'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ingin Menghapus Data?')"><i class="bi bi-trash"></i></a>
                                            </td>
                                        <?php endif ?>
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
    </div>
</div>