<?php

session_destroy();

set_flash('success', 'Berhasil Logout');
header('Location: index.php');
