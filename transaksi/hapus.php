<?php

hapus_data('pembayaran', 'id_pembayaran=' . $_GET['id_transaksi']);

set_flash('success', 'Transaksi berhasil dihapus');
back();
