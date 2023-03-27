<?php

hapus_data('kelas', 'id_kelas=' . $_GET['id_kelas']);

set_flash('success', 'Nama kelas berhasil dihapus');
back();
