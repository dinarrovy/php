<?php
require_once 'database.php';
require_once 'contacts.php';

// Set the database connection
Contacts::setKoneksi($conn);


if(isset($_GET['id'])) {
    $contact_id = $_GET['id'];

    // Ambil data kontak dari database berdasarkan ID
    $result = mysqli_query($conn, "SELECT * FROM contacts WHERE id_contacts = $contact_id");

    if(mysqli_num_rows($result) == 1) {
        // Jika data kontak ditemukan, simpan ke dalam variabel $contact
        $contact = mysqli_fetch_assoc($result);
    } else {
        // Jika data kontak tidak ditemukan, tampilkan pesan kesalahan
        echo "Data kontak tidak ditemukan.";
        exit; // Keluar dari skrip
    }
} else {
    // Jika ID kontak tidak tersedia, tampilkan pesan kesalahan
    echo "ID kontak tidak tersedia.";
    exit; // Keluar dari skrip
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input, misalnya memastikan semua field terisi

    $id = $_POST['id'];
    $new_no_telepon = $_POST['no_telepon'];
    $new_nama = $_POST['nama'];
    $new_alamat = $_POST['alamat'];

    // Panggil method update dari class Contacts
    $result = Contacts::update($id, $new_no_telepon, $new_nama, $new_alamat);

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
            <!-- Tampilkan data kontak yang akan diperbarui -->
            <input type="hidden" name="id" value="<?php echo $contact['id_contacts']; ?>">
            <input type="text" name="no_telepon" placeholder="Nomor Telepon" value="<?php echo $contact['no_telepon']; ?>" required>
            <input type="text" name="nama" placeholder="Nama" value="<?php echo $contact['nama']; ?>" required>
            <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $contact['alamat']; ?>" required>
            <button type="submit">Update Contact</button>
        </form>
    </div>
</body>
</html>