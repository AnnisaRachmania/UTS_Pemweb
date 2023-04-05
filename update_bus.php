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
    <center><h2>Update Data Bus</h2></center>

    <?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_bus = $_POST["id_bus"];
            $plat = $_POST["plat"];
            $status = $_POST["status"];            
        }

        $query = "UPDATE bus SET id_bus='$id_bus', plat='$plat', status='$status' WHERE id_bus='$id_bus'";
        
        if(mysqli_query($koneksi, $query)){
            echo "<b>Data Bus Berhasil Diupdate dalam Database </b><br>";
        } else {
            echo "<b>!! Data Bus Gagal Diupdate dalam Database !!</b> <br>";
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br><label>Id Bus:</label>
            <input type="text" name="id_bus"><br><br>
        <label>Plat Bus:</label>
            <input type="text" name="plat"><br><br>
        <label>Status Bus:</label>
            <input type="text" name="status"><br><br>

    <input type="submit" value="Update"><br>
    </form>
    
</body>
</html>