<?php
require_once 'contacts.php'; 

// Set the database connection
Contacts::setKoneksi($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Mendapatkan ID kontak dari formulir
    $id = $_POST['id'];

    // Panggil method delete dari class Contacts
    $result = Contacts::delete($id);

    if ($result) {
        // Jika penghapusan berhasil, tampilkan pesan sukses
        echo "Data berhasil dihapus.";
    } else {
        // Jika penghapusan gagal, tampilkan pesan error
        echo "Terjadi kesalahan saat menghapus data.";
    }
    // Tutup koneksi
    mysqli_close($conn);
}
?>
