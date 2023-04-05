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
    <center><h2>Insert TransUPN</h2></center>

    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_trans_upn = $_POST["id_trans_upn"];
            $id_kondektur = $_POST["id_kondektur"];
            $id_bus = $_POST["id_bus"];    
            $id_driver = $_POST["id_driver"];   
            $jumlah_km = $_POST["jumlah_km"];
            $tanggal = $_POST["tanggal"];
        }?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br><label>Id TransUPN:</label>
            <input type="text" name="id_trans_upn"><br><br>
        <label>Id Kondektur:</label>
            <select name="id_kondektur">
                <?php 
                    $sql_kondektur = "SELECT id_kondektur, nama FROM kondektur";
                    $result_kondektur = mysqli_query($koneksi, $sql_kondektur);
                    while ($row = mysqli_fetch_assoc($result_kondektur)) {
                    echo "<option value='" . $row['id_kondektur'] . "'>" . $row['nama'] . "</option>";
                } ?>
            </select><br><br>
        <label>Id bus:</label>
            <select name="id_bus">
                <?php 
                $sql_bus = "SELECT id_bus FROM bus";
                $result_bus = mysqli_query($koneksi, $sql_bus);
                while ($row = mysqli_fetch_assoc($result_bus)) {
                    echo "<option value='" . $row['id_bus'] . "'>" . $row['id_bus'] . "</option>";
                } ?>
            </select><br><br>
        <label>Id Driver:</label>
            <select name="id_driver">
                <?php 
                $sql_driver = "SELECT id_driver, nama FROM driver";
                $result_driver = mysqli_query($koneksi, $sql_driver);
                while ($row = mysqli_fetch_assoc($result_driver)) {
                    echo "<option value='" . $row['id_driver'] . "'>" . $row['nama'] . "</option>";
                } ?>
            </select><br><br>
        <label>Jumlah Km:</label>
            <input type="text" name="jumlah_km"><br><br>
        <label>Tanggal:</label>
            <input type="date" name="tanggal"><br><br>
    <input type="submit" value="Update"><br><br>
    </form>


    <?php
        $query = "UPDATE trans_upn SET id_trans_upn='$id_trans_upn', id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal= '$tanggal' WHERE id_trans_upn='$id_trans_upn'";
        
        if(mysqli_query($koneksi, $query)){
            echo "<b>Trans UPN Berhasil Diupdate </b><br>";
        } else {
            echo "<b>!! Trans UPN Gagal Diupdate dalam Database !!</b> <br>";
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    ?>
   
</body>
</html>