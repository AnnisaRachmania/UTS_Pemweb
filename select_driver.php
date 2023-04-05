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
        $query = "SELECT * FROM driver";
        $result_query = mysqli_query($koneksi, $query);

        echo "<center><h2>Data Drivers</h2></center><br>";

        if (mysqli_num_rows($result_query) > 0) {
            echo "<table border ='3' width='100%' height='fit-content' padding='10' margin='8'>
            <tr>
            <th> Id Driver </th>
            <th> Nama </th>
            <th> No. SIM </th>
            <th> Alamat </th>
            </tr>";
            while($row = mysqli_fetch_assoc($result_query)) {
                echo "<tr>";
                echo "<td>".$row["id_driver"]."</td>";
                echo "<td>".$row["nama"]."</td>";
                echo "<td>".$row["no_sim"]."</td>";
                echo "<td>".$row["alamat"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data driver.";
        }
    ?>
</body>
</html>