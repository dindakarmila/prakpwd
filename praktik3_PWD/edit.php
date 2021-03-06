<?php
//  // membuat koneksi database dengan menggunakan file konfigurasi
include_once("koneksi.php");
// Periksa apakah form dikirimkan untuk pembaruan pengguna, lalu arahkan kembali ke beranda setelah dilakukan pembaruan
if(isset($_POST['update']))
{ 
    $nim = $_POST['nim'];
    $nama=$_POST['nama'];
    $jkel=$_POST['jkel'];
    $alamat=$_POST['alamat'];
    $tgllhr=$_POST['tgllhr'];
    // update data pengguna
    $result = mysqli_query($con, "UPDATE mahasiswa SET 
    nama='$nama',jkel='$jkel',alamat='$alamat',tgllhr='$tgllhr' WHERE nim='$nim'");
    // Arahkan ulang ke beranda (index.php) untuk menampilkan hasil yang diperbarui dalam daftar
    header("Location: index.php");
    }
?>
<?php
    // Tampilkan data pengguna yang dipilih berdasarkan id
    // Mendapatkan id dari url
    $nim = $_GET['nim'];
    // Ambil data pengguna berdasarkan id (nim), dengan perintah SELECT * FROM mahasiswa WHERE nim='$nim'
    $result = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim='$nim'");
    while($user_data = mysqli_fetch_array($result))
    {
        $nim = $user_data['nim'];
        $nama = $user_data['nama'];
        $jkel = $user_data['jkel'];
        $alamat = $user_data['alamat'];
        $tgllhr = $user_data['tgllhr'];
    }
    ?>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


            <title>Edit Data Mahasiswa</title>
        </head>
        // membuat tabel untuk data-data untuk diubah 
        <body>
            <a href="index.php">Home</a>
                <br/><br/>
                <form name="update_mahasiswa" method="post" action="edit.php">
                    <table border="0">
                        <tr> 
                            <td>Nama</td>
                            <td><input type="text" name="nama" value=<?php echo $nama;?>></td>
                        </tr>
                        <tr> 
                            <td>Gender</td>
                            <td><input type="text" name="jkel" value=<?php echo $jkel;?>></td>
                        </tr>
                        <tr> 
                            <td>alamat</td>
                            <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
                        </tr>
                        <tr> 
                            <td>Tgl Lahir</td>
                            <td><input type="text" name="tgllhr" value=<?php echo $tgllhr;?>></td>
                        </tr>
                        <tr>
                            <td><input type="hidden" name="nim" value=<?php echo $_GET['nim'];?>></td>
                            <td><input type="submit" name="update" class="btn btn-success btn-sm m-2" value="Update"></td>
                        </tr>
                    </table>
                </form>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            </body>
        </html>
