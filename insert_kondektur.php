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
    <center><h2>Insert Kondektur</h2></center>

    <?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_kondektur = $_POST["id_kondektur"];
            $nama = $_POST["nama"];       
        }?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br><label>Id Kondektur:</label>
            <input type="text" name="id_kondektur"><br><br>
        <label>Nama:</label>
            <input type="text" name="nama"><br><br>
    <input type="submit" value="Insert"><br><br>
    </form>


    <?php
        $query = "INSERT INTO kondektur (id_kondektur, nama) 
                  VALUES ('$id_kondektur', '$nama')";
        
        if(mysqli_query($koneksi, $query)){
            echo "<b>Kondektur Berhasil Ditambahkan </b><br>";
        } else {
            echo "<b>!! Kondektur Gagal Ditambahkan ke Database !!</b> <br>";
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    ?>
   
</body>
</html>