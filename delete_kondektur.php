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
    <center><h2>Delete Kondektur</h2></center>

    <?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_kondektur = $_POST["id_kondektur"];  
        }?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br><label> Kondektur:</label>
        <select name="id_kondektur">
                <?php 
                    $sql_kondektur = "SELECT id_kondektur, nama FROM kondektur";
                    $result_kondektur = mysqli_query($koneksi, $sql_kondektur);
                    while ($row = mysqli_fetch_assoc($result_kondektur)) {
                    echo "<option value='" . $row['id_kondektur'] . "'>" . $row['nama'] . "</option>";
                } ?>
            </select><br><br>
    <input type="submit" value="Delete"><br><br>
    </form>


    <?php
        $query = "DELETE FROM kondektur WHERE id_kondektur='$id_kondektur'";
        
        if(mysqli_query($koneksi, $query)){
            echo "<b>Kondektur Berhasil Dihapus dari database </b><br>";
        } else {
            echo "<b>!! Kondektur Gagal Dihapus dari Database !!</b> <br>";
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    ?>
   
</body>
</html>