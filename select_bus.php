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
    <style>
		.green { background-color: green; }
		.yellow { background-color: yellow; }
		.red { background-color: red; }
	</style>
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
<center><h2>Data Bus</h2></center><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="status">Filter Status:</label>
		<select name="status" id="status">
			<option value="">--Pilih Status--</option>
            <option value="all">Semua</option>
			<option value="1">Operasi</option>
			<option value="2">Cadangan</option>
			<option value="0">Perbaikan/rusak</option>
		</select>
		<input type="submit" name="filter" value="Filter">
</form><br>

<table border="1" margin="8" padding="10" height="fit-content" width="100%" >
		<tr>
			<th>ID Bus</th>
			<th>Plat</th>
			<th>Status</th>
            <th>Jumlah Km</th>
		</tr>
<?php
        $sql = "SELECT * FROM bus";

        if (isset($_POST['filter']) && $_POST['status'] != 'all') {
			$status_filter = $_POST['status'];
			$sql .= " WHERE status = $status_filter";
		}

        $result = mysqli_query($koneksi, $sql);

       // tampilkan hasil query
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$id_bus = $row['id_bus'];
				$plat= $row['plat'];
				$status = $row['status'];

				// warna background berdasarkan status bus
				if ($status == 1) {
					$bgcolor = "green";
				} elseif ($status == 2) {
					$bgcolor = "yellow";
				} else {
					$bgcolor = "red";
				}

                //ambil jumlah kilometer dari tabel lain
                $sql_km = "SELECT SUM(jumlah_km) as total_km FROM trans_upn WHERE id_bus = " . $row['id_bus'];
                $result_km = mysqli_query($koneksi, $sql_km);
                $row_km = mysqli_fetch_assoc($result_km);
   

				echo "<tr class='$bgcolor'>";
				echo "<td>$id_bus</td>";
				echo "<td>$plat</td>";
				echo "<td>$status</td>";
                echo "<td>".$row_km['total_km']."</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='4'>Tidak ada data bus yang ditemukan.</td></tr>";
		}

    ?>

</body>
</html>