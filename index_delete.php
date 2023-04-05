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

    <div class="body">

        <div class="body-2">
        <center><h2 class ="title-1">Delete Data</h2></center>
        <h2 class="title">Pilih Tabel Dari Data Yang Akan Didelete :</h2>

        <div class="menu">
        
        <ul class="ul-menu">
            <li class="li_menu">
                <a href="delete_bus.php" class="a-menu" ><?php echo"Bus"?></a> </li></ul>
        <ul class="ul-menu">
            <li class="li_menu">
                <a href="delete_driver.php" class="a-menu" ><?php echo"Driver"?></a></li></ul>
        <ul class="ul-menu">
            <li class="li_menu">
                <a href="delete_kondektur.php" class="a-menu" ><?php echo"Kondektur"?></a></li>
        </ul>
        <ul class="ul-menu">
            <li class="li_menu">
                <a href="delete_transupn.php" class="a-menu" ><?php echo"TransUPN"?></a></li>
        </ul>
        
        </div>

        </div>
    </div>
</body>
</html>