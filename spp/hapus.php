<?php

hapus_data('spp', 'id_spp=' . $_GET['id_spp']);

set_flash('success', 'SPP berhasil dihapus');
back();
