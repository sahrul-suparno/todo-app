<?php
    require_once('main.php');

    $id = $_POST['id'];
    $aktifitas = $_POST['aktifitas'];
    $sql = "UPDATE activites SET activity_name = '$aktifitas'  where id = $id";
    $execute = query($sql);

    if ($execute) {
        header('Location: ../index.php?pesan=berhasil di ubah');
    }else {
        header('Location: ../index.php?pesan=gagal');
    }

?>