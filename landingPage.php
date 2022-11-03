<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <header>
        <div class="judul">
            <img src="img/unmul.png" alt="unmul" width="90px">
            <h1>Portal Mahasiswa Unmul</h1>
        </div>
        <div class="akun">
            <p>Akun Orang</p>
            <a href="">Logout</a>
        </div>
    </header>

    <div class="content">
        <h1>Daftar Mahasiswa</h1>
        <div class="searching">
            <form action="" method="get">
                <input type="text" name="search" placeholder="Searching for.." class="search">
                <input type="submit" name="submit" value="cari" class="cari">
            </form>
        </div>
        <div class="tabel">
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                </tr>
                <?php
                    require "config.php";
                    if(isset($_GET['submit'])){
                        $search = $_GET['search'];
                        $no = 1;
                        $query = mysqli_query($db,"SELECT * FROM mahasiswa WHERE nim LIKE '%$search%'");
                        while($baris = mysqli_fetch_assoc($query)){
                            echo "
                            <tr>
                                <td>$no</td>
                                <td>$baris[nim]</td>
                                <td>$baris[nama]</td>
                                <td>$baris[prodi]</td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        $query = mysqli_query($db,"SELECT * FROM mahasiswa");
                        $no = 1;
                        while($baris = mysqli_fetch_assoc($query)){
                            echo "
                            <tr>
                                <td>$no</td>
                                <td>$baris[nim]</td>
                                <td>$baris[nama]</td>
                                <td>$baris[prodi]</td>
                            </tr>";
                            $no++;
                        }
                    }
                ?>
                
            </table>
        </div>
    </div>

</body>
</html>