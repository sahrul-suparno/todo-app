<?php
    function koneksi() {
        $conn= mysqli_connect("localhost", "root","","todos");     
        if(!$conn) {
            die('koneksi gagal');
        }else {
            return $conn;
        }
    }

    function query($query)
    {
        $koneksi = koneksi();
        $result = mysqli_query($koneksi, $query);
        return $result;
    }

    function get_result($result)
    {
        $data = [];
        // $row = mysqli_fetch_assoc($result);
        // print_r($row);
        // die;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    function notifikasi($pesan){
        echo "<strong>Success!</strong> Data $pesan.";
    }



?>