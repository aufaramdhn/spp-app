<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'absensi');

function get_total_attend($id_murid, $keterangan, $tanggal_awal, $tanggal_akhir)
{
    global $koneksi;
    $Attend = $koneksi->query("SELECT * FROM tbl_absensi WHERE id_siswa = '$id_murid' AND keterangan = '$keterangan' AND tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
    return mysqli_num_rows($Attend);
}
