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
    <center><h2>Delete Driver</h2></center>

    <?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_driver = $_POST["id_driver"];     
        }?>

    <h4>Pilih Driver yang akan dihapus:</h4>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br><label>Driver :</label>
        <select name="id_driver">
                <?php 
                $sql_driver = "SELECT id_driver, nama FROM driver";
                $result_driver = mysqli_query($koneksi, $sql_driver);
                while ($row = mysqli_fetch_assoc($result_driver)) {
                    echo "<option value='" . $row['id_driver'] . "'>" . $row['nama'] . "</option>";
                } ?>
            </select><br><br>
    <input type="submit" value="Delete"><br><br>
    </form>


    <?php
        $query = "DELETE FROM driver WHERE id_driver='$id_driver'";
        
        if(mysqli_query($koneksi, $query)){
            echo "<b>Data Driver Berhasil Dihapus dalam Database </b><br>";
        } else {
            echo "<b>!! Data Driver Gagal Dihapus dalam Database !!</b> <br>";
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    ?>
   
</body>
</html>