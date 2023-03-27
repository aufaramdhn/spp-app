<?php

hapus_data('admin', 'id_admin=' . $_GET['id_admin']);

set_flash('success', 'Akun admin berhasil dihapus');
back();
