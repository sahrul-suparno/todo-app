<?php
    require_once('main.php');

    $id = $_GET['id'];
    $sql = "UPDATE activites SET activity_done = 1 where id = $id";
    $execute = query($sql);

    if ($execute) {
        header('Location: ../index.php?pesan=berhasil di selesaikan');
    }else {
        header('Location: ../index.php?pesan=gagal');
    }

?>