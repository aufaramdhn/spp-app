<?php

session_start();

include("../../apps/koneksi.php");

if (isset($_POST['bsimpanuser'])) {
    $id_user = $_POST['id_user'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $rekening = $_POST['rekening'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tempat = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $pp = $_FILES['img']['name'];
    $pp_tmp = $_FILES['img']['tmp_name'];
    $ktp = $_FILES['img_ktp']['name'];
    $ktp_tmp = $_FILES['img_ktp']['tmp_name'];

    $folder_foto = '../../assets/profile/';
    $folder_ktp = '../../assets/img-ktp/';

    move_uploaded_file($pp_tmp, $folder_foto . $pp);
    move_uploaded_file($ktp_tmp, $folder_ktp . $ktp);

    // $img_up = move_uploaded_file($pp . $folder_foto . $pp_tmp);

    // $ekstensi_diperbolehkan_foto = array('png', 'jpg');
    // $ekstensi_diperbolehkan_ktp = array('png', 'jpg');

    // $new_foto_img = $_FILES['img_foto_new']['name'];
    // $old_foto_img = $_POST['img_foto_old'];

    // $x_foto = explode('.', $new_foto_img);
    // $ekstensi_foto = strtolower(end($x_foto));

    // $ukuran_foto = $_FILES['img_foto_new']['size'];
    // $file_tmp_foto = $_FILES['img_foto_new']['tmp_name'];

    // $new_ktp_img = $_FILES['img_ktp_new']['name'];
    // $old_ktp_img = $_POST['img_ktp_old'];

    // $x_ktp = explode('.', $new_ktp_img);
    // $ekstensi_ktp = strtolower(end($x_ktp));

    // $ukuran_ktp = $_FILES['img_ktp_new']['size'];
    // $file_tmp_ktp = $_FILES['img_ktp_new']['tmp_name'];



    if ($ktp == '' && $pp == '') {
        $query = mysqli_query($koneksi, "UPDATE tbl_user SET nik='$nik',nama='$nama',rekening='$rekening',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', level='user' WHERE id_user = $id_user");
    } else if ($ktp != '' && $pp != '') {
        $query = mysqli_query($koneksi, "UPDATE tbl_user SET nik='$nik',nama='$nama',rekening='$rekening',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img='$pp', img_ktp='$ktp', level='user' WHERE id_user = $id_user");
    } else if ($pp == '') {
        $query = mysqli_query($koneksi, "UPDATE tbl_user SET nik='$nik',nama='$nama',rekening='$rekening',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img_ktp='$ktp', level='user' WHERE id_user = $id_user");
    } else if ($ktp == '') {
        $query = mysqli_query($koneksi, "UPDATE tbl_user SET nik='$nik',nama='$nama',rekening='$rekening',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img='$pp', level='user' WHERE id_user = $id_user");
    }
    // else {
    //     $update_filename_foto = $_FILES['img_foto_new']['name'];
    //     $update_filename_ktp = $_FILES['img_ktp_new']['name'];
    //     if (in_array($ekstensi_foto, $ekstensi_diperbolehkan_foto) === true || in_array($ekstensi_ktp, $ekstensi_diperbolehkan_ktp) === true) {
    //         //boleh upload file
    //         //uji jika ukuran file dibawah 1mb
    //         if ($ukuran_foto < 1044070 || $ukuran_ktp < 1044070) {
    //             //jika ukuran sesuai
    //             //PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
    //             move_uploaded_file($file_tmp_foto, $folder_foto . $new_foto_img);
    //             move_uploaded_file($file_tmp_ktp, $folder_ktp . $new_ktp_img);

    //             //simpan data ke dalam database
    //             $query = mysqli_query($koneksi, "UPDATE tbl_user SET nama='$nama',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img='$update_filename_foto', img_ktp='$update_filename_ktp', level='user' WHERE id_user = $id_user");
    //             if ($query) {
    //                 $_SESSION['info'] = 'Disimpan';
    //                 echo "<script>document.location='profile.php'</script>";
    //             } else {
    //                 $_SESSION['info'] = 'Gagal';
    //                 echo "<script>document.location='profile.php'</script>";
    //             }
    //         } else {
    //             //ukuran tidak sesuai
    //             $_SESSION['info'] = "ukuran";
    //             echo "<script>document.location='profile.php'</script>";
    //         }
    //     } else {
    //         //ektensi file yang di upload tidak sesuai
    //         $_SESSION['info'] = "format";
    //         echo "<script>document.location='profile.php'</script>";
    //     }
    // }

    if ($query == true) {
        $_SESSION['info'] = 'Disimpan';
        echo "<script>document.location.href='profile.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal';
        echo "<script>document.location.href='profile.php'</script>";
    }
}

if (isset($_POST['bsimpanadmin'])) {
    $id_user = $_POST['id_user'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $rekening = $_POST['rekening'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tempat = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $pp = $_FILES['img']['name'];
    $pp_tmp = $_FILES['img']['tmp_name'];
    $ktp = $_FILES['img_ktp']['name'];
    $ktp_tmp = $_FILES['img_ktp']['tmp_name'];

    $folder_foto = '../../assets/profile/';
    $folder_ktp = '../../assets/img-ktp/';

    move_uploaded_file($pp_tmp, $folder_foto . $pp);
    move_uploaded_file($ktp_tmp, $folder_ktp . $ktp);

    if ($ktp == '' && $pp == '') {
        $query = mysqli_query($koneksi, "UPDATE tbl_user SET nik='$nik',nama='$nama',rekening='$rekening',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', level='user' WHERE id_user = '" . $id_user . "'");
    } else if ($ktp != '' && $pp != '') {
        $query = mysqli_query($koneksi, "UPDATE tbl_user SET nik='$nik',nama='$nama',rekening='$rekening',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img='$pp', img_ktp='$ktp', level='user' WHERE id_user = '" . $id_user . "'");
    } else if ($pp == '') {
        $query = mysqli_query($koneksi, "UPDATE tbl_user SET nik='$nik',nama='$nama',rekening='$rekening',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img_ktp='$ktp', level='user' WHERE id_user = '" . $id_user . "'");
    } else if ($ktp == '') {
        $query = mysqli_query($koneksi, "UPDATE tbl_user SET nik='$nik',nama='$nama',rekening='$rekening',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img='$pp', level='user' WHERE id_user = '" . $id_user . "'");
    }

    if ($query == true) {
        $_SESSION['info'] = 'Disimpan';
        echo "<script>document.location.href='../user/user.php'</script>";
    } else {
        $_SESSION['info'] = 'Gagal';
        echo "<script>document.location.href='../user/user.php'</script>";
    }

    // $ekstensi_diperbolehkan = array('png', 'jpg');
    // $new_img = $_FILES['img_new']['name'];
    // $old_img = $_POST['img_old'];

    // $x = explode('.', $new_img);
    // $ekstensi = strtolower(end($x));
    // $ukuran = $_FILES['img_new']['size'];
    // $file_tmp = $_FILES['img_new']['tmp_name'];

    // $folder = '../../assets/profile/';

    // if ($new_img == '') {
    //     $update_filename = $old_img;
    //     $query = mysqli_query($koneksi, "UPDATE tbl_user SET nama='$nama',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img='$update_filename', level='user' WHERE id_user = $id_user");
    //     if ($query) {
    //         $_SESSION['info'] = 'Disimpan';
    //         echo "<script>document.location='../user/user.php'</script>";
    //     } else {
    //         $_SESSION['info'] = 'Gagal';
    //         echo "<script>document.location='../user/user.php'</script>";
    //     }
    // } else {
    //     $update_filename = $_FILES['img_new']['name'];
    //     if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    //         //boleh upload file
    //         //uji jika ukuran file dibawah 1mb
    //         if ($ukuran < 1044070) {
    //             //jika ukuran sesuai
    //             //PINDAHKAN FILE YANG DI UPLOAD KE FOLDER FILE aplikasi
    //             move_uploaded_file($file_tmp, $folder . $new_img);

    //             //simpan data ke dalam database
    //             $query = mysqli_query($koneksi, "UPDATE tbl_user SET nama='$nama',email='$email', password='$password', tempat_lahir='$tempat', tgl_lahir='$tgl', jk='$jk', agama='$agama', pekerjaan='$pekerjaan', telp='$telp', alamat='$alamat', img='$update_filename', level='user' WHERE id_user = $id_user");
    //             if ($query) {
    //                 $_SESSION['info'] = 'Disimpan';
    //                 echo "<script>document.location='../user/user.php'</script>";
    //             } else {
    //                 $_SESSION['info'] = 'Gagal';
    //                 echo "<script>document.location='../user/user.php'</script>";
    //             }
    //         } else {
    //             //ukuran tidak sesuai
    //             $_SESSION['info'] = "ukuran";
    //             echo "<script>document.location='../user/user.php'</script>";
    //         }
    //     } else {
    //         //ektensi file yang di upload tidak sesuai
    //         $_SESSION['info'] = "format";
    //         echo "<script>document.location='../user/user.php'</script>";
    //     }
    // }
}

if (isset($_POST['bkembaliuser'])) {
    header("Location: profile.php");
}

if (isset($_POST['bkembaliadmin'])) {
    header("Location: ../user/user.php");
}
