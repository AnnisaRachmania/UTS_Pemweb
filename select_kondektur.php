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
    
    <?php
        $query = "SELECT * FROM kondektur";
        $result_query = mysqli_query($koneksi, $query);

        echo "<center><h2>Data Kondektur</h2></center><br>";

        if (mysqli_num_rows($result_query) > 0) {
            echo "<table border ='2' margin='10' padding='8' width='100%'>
            <tr>
            <th> Id Kondektur </th>
            <th> Nama </th>
            </tr>";
            while($row = mysqli_fetch_assoc($result_query)) {
                echo "<tr>";
                echo "<td>".$row["id_kondektur"]."</td>";
                echo "<td>".$row["nama"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data Kondektur.";
        }
    ?>
</body>
</html>