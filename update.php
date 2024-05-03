<?php
require_once 'contacts.php'; 

// Set the database connection
Contacts::setKoneksi($conn);

// Initialize variables to hold existing data
$existing_data = array();

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch existing data by ID
    $result = Contacts::selectById($id);

    // Check if data exists
    if ($result && mysqli_num_rows($result) > 0) {
        $existing_data = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input, misalnya memastikan semua field terisi

    $id = $_POST['id'];
    $no_telepon = $_POST['no_telepon'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    // Panggil method update dari class Contacts
    $result = Contacts::update($id, $no_telepon, $nama, $alamat);

    if ($result) {
        // Jika update berhasil, redirect atau tampilkan pesan sukses
        echo "Data berhasil diperbarui.";
    } else {
        // Jika update gagal, tampilkan pesan error
        echo "Terjadi kesalahan saat memperbarui data.";
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
    <title>Update Kontak</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Update Contact</h2>
            <?php if(isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <input type="hidden" name="id" value="<?php echo isset($existing_data['id']) ? $existing_data['id'] : ''; ?>">
            <input type="text" name="no_telepon" placeholder="Nomor Telepon" value="<?php echo isset($existing_data['no_telepon']) ? $existing_data['no_telepon'] : ''; ?>" required>
            <input type="text" name="nama" placeholder="Nama" value="<?php echo isset($existing_data['nama']) ? $existing_data['nama'] : ''; ?>" required>
            <input type="text" name="alamat" placeholder="Alamat" value="<?php echo isset($existing_data['alamat']) ? $existing_data['alamat'] : ''; ?>" required>
            <button type="submit">Update Contact</button>
        </form>
    </div>
</body>
</html>
