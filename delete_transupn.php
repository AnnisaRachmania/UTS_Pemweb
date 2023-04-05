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
    <center><h2>Delete TransUPN</h2></center>

    <h4>Pilih Id TransUpn yang akan dihapus:</h4>
    <?php
        $sql = "SELECT id_trans_upn FROM trans_upn";
        $result = mysqli_query($koneksi, $sql);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id_trans_upn = $_POST["id_trans_upn"];
    }?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Id TransUPN:</label>
        <select name="id_trans_upn">
                <?php 
                    while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_trans_upn'] . "'>" . $row['id_trans_upn'] . "</option>";
                } ?>
            </select><br><br>
    <input type="submit" value="Delete"><br><br>
    </form>


    <?php
        $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$id_trans_upn'";
        
        if(mysqli_query($koneksi, $query)){
            echo "<b>Trans UPN Berhasil Dihapus </b><br>";
        } else {
            echo "<b>!! Trans UPN Gagal Dihapus dari Database !!</b> <br>";
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    ?>
   
</body>
</html>