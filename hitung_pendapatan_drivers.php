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

    <center><h2>Hitung Pendapatan Driver</h2></center>

    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){  
            $id_driver = $_POST["id_driver"];   
            $bulan = $_POST["bulan"];
    }?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Id Driver:</label>
            <select name="id_driver">
                <?php 
                $sql_driver = "SELECT id_driver, nama FROM driver";
                $result_driver = mysqli_query($koneksi, $sql_driver);
                while ($row = mysqli_fetch_assoc($result_driver)) {
                    echo "<option value='" . $row['id_driver'] . "'>" . $row['nama'] . "</option>";
                } ?>
            </select><br><br>
    <label for="bulan">Pilih Bulan:</label>
		<select name="bulan" id="bulan">
			<option value="01">Januari</option>
			<option value="02">Februari</option>
			<option value="03">Maret</option>
			<option value="04">April</option>
			<option value="05">Mei</option>
			<option value="06">Juni</option>
			<option value="07">Juli</option>
			<option value="08">Agustus</option>
			<option value="09">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select>
		<input type="submit" name="submit" value="Hitung"><br><br>
    </form>

    <?php
            echo "<h3> Informasi Pendapatan Driver dengan Id ".$id_driver." Pada Bulan ".date('F', mktime(0, 0, 0, $bulan, 10))."</h3><br>";

			$sql_1 = "SELECT * FROM trans_upn WHERE MONTH(tanggal) = $bulan AND id_driver='$id_driver'";
			$result_1 = mysqli_query($koneksi, $sql_1);

            $sql_2 = "SELECT SUM(jumlah_km) as total_km FROM trans_upn WHERE MONTH(tanggal)='$bulan' AND id_driver='$id_driver'";
			$result_2 = mysqli_query($koneksi, $sql_2);


			if (mysqli_num_rows($result_2) > 0) {
			    $row = mysqli_fetch_assoc($result_2);
			    $total_km = $row['total_km'];
			    $total_pendapatan = $row['total_km']*3000;
			    echo "<p>Total Pendapatan Bulan ".date('F', mktime(0, 0, 0, $bulan, 10))." adalah: <b> Rp ".number_format($total_pendapatan,0,",",".")."</b></p>";
			    echo "<p>Jumlah total jarak yang ditempuh untuk sebulan ".date('F', mktime(0, 0, 0, $bulan, 10))." adalah: <b>".$total_km." KM</b></p><br>";
                
			} else {
			    echo "0 results";
            }

            echo "<p> Berikut Rincian Perjalanan Driver Id ".$id_driver." Pada Bulan ".date('F', mktime(0, 0, 0, $bulan, 10)).": </p><br>";

            if (mysqli_num_rows($result_1) > 0) {
				// menampilkan hasil query dalam bentuk tabel
				echo"<table border ='2'>
                <tr>
                <th> Id TransUPN </th>
                <th> Id Kondektur </th>
                <th> Id Bus</th>
                <th> Id Driver</th>
                <th> Jumlah Km </th>
                <th> Tanggal</th>
                </tr>";
                while($row = mysqli_fetch_assoc($result_1)) {
                    echo "<tr>";
                    echo "<td>".$row["id_trans_upn"]."</td>";
                    echo "<td>".$row["id_kondektur"]."</td>";
                    echo "<td>".$row["id_bus"]."</td>";
                    echo "<td>".$row["id_driver"]."</td>";
                    echo "<td>".$row["jumlah_km"]."</td>";
                    echo "<td>".$row["tanggal"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
			} else {
				echo "<p>Tidak ada data perjalanan bus pada bulan yang dipilih.</p>";
			}

    ?>



</body>
</html>