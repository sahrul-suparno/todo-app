<?php
    require_once('main.php');

    $aktifitas = $_POST['aktifitas'];
    $sql = "INSERT INTO activites (activity_name) VALUES('$aktifitas')";
    $execute = query($sql);

    if ($execute) {
        header('Location: ../index.php?pesan=berhasil disimpan');
    }else {
        header('Location: ../index.php?pesan=gagal');
    }

?>