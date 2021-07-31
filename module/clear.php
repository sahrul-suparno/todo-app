<?php
    require_once('main.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM activites where id = $id";
    $execute = query($sql);

    if ($execute) {
        header('Location: ../index.php?pesan= berhasil dihapus');
    }else {
        header('Location: ../index.php?pesan= gagal dihapus');
    }

?>