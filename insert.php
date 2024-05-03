<?php
require_once 'contacts.php'; 

// Set the database connection
Contacts::setKoneksi($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input, misalnya memastikan semua field terisi

    $no_telepon = $_POST['no_telepon'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // Panggil method insert dari class Contacts
    $result = Contacts::insert($no_telepon, $nama, $alamat);

    if ($result) {
        // Jika insert berhasil, redirect atau tampilkan pesan sukses
        echo "Data berhasil disimpan.";
    } else {
        // Jika insert gagal, tampilkan pesan error
        echo "Terjadi kesalahan saat menyimpan data.";
    }
    // Close connection
    mysqli_close($conn);
}
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kontak</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Add Contact</h2>
            <?php if(isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <input type="text" name="no_telepon" placeholder="Nomor Telepon" required>
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <button type="submit">Add Contact</button>
        </form>
    </div>
</body>
</html>
