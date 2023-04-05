<?php
    include ("connecttodatabase.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="crud_style.css">
</head>
<body>
<div class="navbar">
        <ul class="menu-navbar">
            <li class="li_menu">
                <a href="home.php" class="a-menu"><?php echo"Home"?></a> </li>
            <li class="li_menu">
                <a href="select_driver.php" class="a-menu"><?php echo"Driver"?></a></li>
            <li class="li_menu">
                <a href="select_kondektur.php" class="a-menu"><?php echo"Kondektur"?></a></li>
            <li class="li_menu">
                <a href="select_transupn.php" class="a-menu"><?php echo"TransUPN"?></a></li>
        </ul>
    </div>
    <center><h2 class="judul">Delete Data Bus</h2></center>

    <div class="body">
    <center><h2 class="judul">Delete Data Bus</h2></center>
    <?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_bus = $_POST["id_bus"];       
        }

        $query = "DELETE FROM bus WHERE id_bus='$id_bus'";
        
        if(mysqli_query($koneksi, $query)){
            echo "<b>Data Bus Berhasil Dihapus dalam Database </b><br>";
        } else {
            echo "<b>!! Data Bus Gagal Dihapus dalam Database !!</b> <br>";
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <br><label>Id Bus:</label>
        <select name="id_bus">
                <?php 
                $sql_bus = "SELECT id_bus FROM bus";
                $result_bus = mysqli_query($koneksi, $sql_bus);
                while ($row = mysqli_fetch_assoc($result_bus)) {
                    echo "<option value='" . $row['id_bus'] . "'>" . $row['id_bus'] . "</option>";
                } ?>
            </select><br><br>
        
    <input type="submit" value="Delete"><br>
    </form>
    </div>

</body>
</html>