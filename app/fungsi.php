<?php

session_start();

function set_flash($type, $message)
{
    $_SESSION['flash'] = [
        'message' => $message,
        'type' => $type
    ];
}

function flash()
{
    if (isset($_SESSION['flash'])) {
        echo '<div class="alert alert-' . $_SESSION['flash']['type'] . '" role="alert">
            ' . $_SESSION['flash']['message'] . '
        </div>';

        unset($_SESSION['flash']);
    }
}

function back()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function hapus_data($table, $condition)
{
    global $conn;

    $sql = "DELETE FROM $table WHERE $condition";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function nama_bulan($bulan)
{
    switch ($bulan) {
        case '1':
            return 'January';
            break;
        case '2':
            return 'February';
            break;
        case '3':
            return 'Maret';
            break;
        case '4':
            return 'April';
            break;
        case '5':
            return 'Mey';
            break;
        case '6':
            return 'June';
            break;
        case '7':
            return 'July';
            break;
        case '8':
            return 'August';
            break;
        case '9':
            return 'September';
            break;
        case '10':
            return 'October';
            break;
        case '11':
            return 'November';
            break;
        case '12':
            return 'Desember';
            break;
    }
}
