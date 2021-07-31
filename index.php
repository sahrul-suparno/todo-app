<?php
    require_once("module/main.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

    <div class="container">
        <h2><a href="index.php">Aplikasi Todo List</a></h2>
        <?php
            if (isset($_GET['pesan'])) {
                echo "<div class='alert'>
                    <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span>";
                notifikasi($_GET['pesan']);
                echo "</div>";
            }
            
        ?>
        <p>kelola keseharianmu disini</p>
        <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'tambah') : ?>
            <form action="module/create.php" method="POST">
                <div class="row">
                    <div class="col-75">
                        <input type="text" id="aktifitas" name="aktifitas" placeholder="Mau melakukan apa hari ini?">
                    </div>
                    <div class="col-25">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>
        <?php endif; ?>
       
       
        <?php if (isset($_GET['aksi']) && $_GET['aksi'] == 'edit') : ?>
        <form action="module/edit.php" method="POST">
                <div class="row">
                    <input type="hidden" value="<?= $_GET['id'];?>" name= "id">
                    <div class="col-75">
                        <input type="text" value="<?= $_GET['aktifitas'];?>" id="aktifitas" name="aktifitas" placeholder="Mau melakukan apa hari ini?">
                    </div>
                    <div class="col-25">
                        <input type="submit" value="update">
                    </div>
                </div>
            </form>
        <?php endif; ?>



        <br>
        <a href="index.php?aksi=tambah" class="badge badge-coklat">tambah</a>
        <br>
        <br>
        <ul>
            <?php
             $sql = "SELECT * FROM activites";
             $result = query($sql);
             $todos = get_result($result)
            ?>

            <?php foreach ($todos as $todo) : ?>
                
                <li class="<?= $todo['activity_done']== 1 ? 'selesai' : ''; ?>"><?= $todo['activity_name'];?>
                
                    <div class="action">
                        <?php if ($todo['activity_done']== 0) : ?>
                        <a href="module/finish.php?id=<?=$todo['id'];?>" class="badge badge-biru">selesai</a>
                        <a href="index.php?aksi=edit&id=<?=$todo['id'];?>&aktifitas=<?=$todo['activity_name'];?>" class="badge badge-cream">ubah</a>
                        <?php endif; ?>
                        <a href="module/clear.php?id=<?=$todo['id'];?>" class="badge badge-merah">hapus</a>
                    </div>
                </li>
            <?php endforeach; ?>
            
        </ul>
    </div>
    </body>
</html>